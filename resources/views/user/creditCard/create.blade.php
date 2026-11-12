@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | مدیریت کارت ها ')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa in-fa"> {{ session('failure') }} </span>
        </div>
    @endif
    <div class="w-full flex flex-col gap-4 justify-start items-center ">
        <form action="{{ route('creditCard.store') }}" method="POST"
            class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                <div class="p-1 bg-(--active) rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </div>
                <span class="font-bold  max-md:text-sm">افزودن شماره کارت جدید</span>
            </div>
            <div class="w-full grid sm:grid-cols-2 grid-cols-1  gap-3 gap-y-7 justify-start items-center">
                <div class="w-full flex flex-col justify-start items-start gap-2 relative">
                    <label for="card_number" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                        کارت</label>
                    <div class="w-full border-2 border-(--border) bg-white flex justify-between items-center rounded-xl">
                        <input type="number" name="card_number" id="card_number" value="{{ old('card_number') }}"
                            class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm py-2 px-3">
                    </div>
                    <span id="cardNumberErrorText" class="text-red-500 text-xs"></span>
                    @error('card_number')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center items-center gap-4">
                    <label for="show_in_home">کارت پیش فرض</label>
                    <label for="show_in_home" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                        <input type="checkbox" name="default" value="1" id="show_in_home" hidden class="peer">
                        <span
                            class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-(--active) transition-all duration-300"></span>
                        <span
                            class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                    </label>
                </div>
            </div>
            <button type="submit" onclick="submitCard(event)"
                class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl max-md:text-sm cursor-pointer">ثبت</button>
        </form>
        <div class="w-full overflow-x-auto">
            <table class="w-full border-collapse border-1 border-(--border) text-sm">
                <thead>
                    <tr class="bg-gray-100 text-nowrap text-sm max-sm:text-xs">
                        <th class="border-1 border-(--border) px-3 py-2">
                            ردیف
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            نام و نام خانوادگی
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            شماره کارت
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            شماره شبا
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            شماره حساب
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            کارت پیش فرض
                        </th>

                        <th class="border-1 border-(--border) px-3 py-2">
                            ابزار
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($creditCards as $card)
                        <tr class="item text-nowrap font-bold max-sm:text-sm">
                            <td class="px-3 py-2 flex items-center justify-center in-fa">
                                {{ $i }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{ $card->name }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center in-fa">
                                {{ $card->card_number }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center in-fa">
                                {{ $card->shaba_number }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center in-fa">
                                {{ $card->account_number }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2">
                                <label for="default{{ $card->id }}" onchange="defaultCard({{ $card->id }}, this)"
                                    class="w-[50px] h-[28px] mx-auto flex rounded-full cursor-pointer relative">
                                    <input type="radio" name="defaultCard" value="1" id="default{{ $card->id }}"
                                        hidden class="peer" @if ($card->default) checked @endif>
                                    <span
                                        class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-(--active) transition-all duration-300"></span>
                                    <span
                                        class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                </label>
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 flex gap-2">
                                <a href="{{ route('creditCard.delete', $card->id) }}"
                                    class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="size-4 fill-(--disactive)">
                                        <path
                                            d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function defaultCard(cardId, el) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('creditCard.update') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'cardId': cardId,
                    'userId': {{ Auth::id() }},
                },
                success: function(data) {
                    el.querySelector('input').checked = true
                },
                error: function() {
                    showMessage('open')
                    element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadow-lg">خطا در دریافت اطلاعات!</span>
                        `
                    message.children[0].appendChild(element)
                    setTimeout(() => {
                        showMessage('close')
                    }, 5000)
                }
            })
        }
    </script>
@endsection
