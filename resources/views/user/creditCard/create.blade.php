@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | مدیریت کارت ها ')
@section('content')
    @if ($errors->hasAny(['popupname','popupcard_number','popupaccount_number','popupshaba_number',]))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> پر کردن این فیلد الزامی است. </span>
        </div>
    @endif
    <div class="w-full flex flex-col gap-4 justify-start items-center ">
        <form action="{{ route('creditCard.store') }}" method="POST"
            class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::id() }}">
            <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                <div class="p-1 bg-(--active) rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </div>
                <span class="font-bold  max-md:text-sm">افزودن شماره حساب جدید</span>
            </div>
            <div class="w-full grid sm:grid-cols-2 grid-cols-1  gap-3 gap-y-7 justify-start items-center">
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">به نام</label>
                    <div
                        class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                        <input type="text" name="name"
                            class="w-full outline-none font-bold rounded-xl max-lg:text-sm">
                    </div>
                    @error('name')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="w-full flex flex-col justify-start items-start gap-2 relative">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                        کارت</label>
                    <div
                        class="w-full border-2 border-(--border) bg-white  py-2 px-3 flex justify-between items-center rounded-xl">
                        <input type="text" name="card_number"
                            class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                    </div>
                    @error('card_number')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                        شبا</label>
                    <div
                        class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                        <input type="text" name="shaba_number"
                            class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                        <span class="font-bold max-md:text-sm">IR</span>
                    </div>
                    @error('shaba_number')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                        حساب</label>
                    <div
                        class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                        <input type="text" name="account_number"
                            class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                    </div>
                    @error('account_number')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex items-center gap-4">
                    <label for="show_in_home">کارت پیش فرض</label>
                    <label for="show_in_home"
                        class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                        <input type="checkbox" name="default" value="1" id="show_in_home"
                            hidden class="peer">
                        <span
                            class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-(--active) transition-all duration-300"></span>
                        <span
                            class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                    </label>
                </div>
            </div>
            <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm cursor-pointer">
                افزودن به لیست
            </button>
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
                    @foreach ($creditcard as $card)
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
                                @if($card->default)
                                <div
                                    class="lg:w-12 w-10 lg:h-6.5 h-5.5 flex justify-center rounded-full items-center transition_normal relative group p-0.5 change_status_product mx-auto">
                                    <div class="text-center"> پیش فرض</div>
                                </div>
                                @else
                                <div
                                    class="lg:w-12 w-10 lg:h-6.5 h-5.5 flex justify-center rounded-full items-center transition_normal relative group p-0.5 change_status_product mx-auto">
                                    <div class="text-3xl">-</div>
                                </div>
                                @endif
                            </td>

                            <td class="border-1 border-(--border) px-3 py-2 flex gap-2">
                                <div>
                                    <div data-edit_cart="open" data-id="{{$card->id}}"
                                        class="popup_edit_cart text-(--primary-dashboard) border-1 border-(--active) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                        <svg class="size-4 fill-(--active)" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                        </svg>
                                    </div>
                                    <div
                                        class="fixed z-50 w-full h-dvh top-0 right-0 flex items-center justify-center invisible opacity-0 transition_normal">
                                        <div data-edit_cart="close_black"
                                            class="popup_edit_cart w-full h-full bg-black/50 absolute top-0 right-0 -z-1">
                                        </div>
                                        <div class=" lg:w-1/2 w-10/12 bg-white rounded-md px-3 py-2">
                                            <div
                                                class="w-full flex items-center justify-between border-b-1 border-(--border) pb-2">
                                                <div class="font-bold">ویرایش اطلاعات حساب</div>
                                                <div data-edit_cart="close_xmark" class="popup_edit_cart">
                                                    <svg class="size-6" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path
                                                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <form action="{{route('creditCard.update')}}" method="post" class="grid sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$card->id}}">
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        به نام
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="popupname" id="name" value="{{$card->name}}">
                                                        @error('popupname')
                                                            <div class="text-red-500">{{$message}}</div>
                                                        @enderror
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        شماره کارت
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="popupcard_number" id="card_number" value="{{ $card->card_number }}">
                                                        @error('popupcard_number')
                                                            <div class="text-red-500">{{$message}}</div>
                                                        @enderror
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        شماره شبا
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="popupshaba_number" id="shaba_number" value="{{ $card->shaba_number }}">
                                                        @error('popupshaba_number')
                                                            <div class="text-red-500">{{$message}}</div>
                                                        @enderror
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        شماره حساب
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="popupaccount_number" id="account_number" value="{{ $card->account_number }}">
                                                        @error('popupaccount_number')
                                                            <div class="text-red-500">{{$message}}</div>
                                                        @enderror
                                                </div>
                                                <div class="w-full flex justify-start items-start gap-2">
                                                    <label for="" class="md:text-sm text-xs text-nowrap font-bold text-[#8B929D]">کارت
                                                        اصلی</label>
                                                    <div class="">
                                                        <input type="checkbox" name="default" value="1" id="default" @if($card->default==1 ) checked  @endif>
                                                    </div>
                                                </div>
                                                <div class="col-span-2 w-full flex gap-4 justify-between items-center">
                                                    <button class="w-1/2 border-1 border-(--active) bg-(--active) sm:text-lg font-bold text-white py-2 rounded-md">ویرایش</button>
                                                    <button class="w-1/2 border-1 border-(--border) bg-(--disactive) sm:text-lg font-bold text-white py-2 rounded-md">لغو</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('creditCard.delete' , $card->id )}}" class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-(--disactive)">
                                        <path d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
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
        let popup_edit_cart = document.querySelectorAll('.popup_edit_cart')
        popup_edit_cart.forEach((item) => {
            item.addEventListener('click', function(data) {
                if (item.getAttribute('data-edit_cart') == 'open') {
                    item.nextElementSibling.classList.remove('invisible')
                    item.nextElementSibling.classList.remove('opacity-0')
                }
                if (item.getAttribute('data-edit_cart') == 'close_black') {
                    item.parentElement.classList.add('invisible')
                    item.parentElement.classList.add('opacity-0')
                }
                if (item.getAttribute('data-edit_cart') == 'close_xmark') {
                    item.parentElement.parentElement.parentElement.classList.add('invisible')
                    item.parentElement.parentElement.parentElement.classList.add('opacity-0')
                }
            })
        })
    </script>
@endsection
