@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | تنظیمات پیام‌ها')

@section('content')
    <div class="w-full flex justify-center">
        <div class="w-full md:w-11/12 xl:w-10/12 flex flex-col gap-5">

            {{-- افزودن پیام جدید --}}
            <form action="{{ route('message.store') }}" method="POST"
                class="w-full flex flex-col gap-5 rounded-2xl border border-(--border) bg-white p-4 sm:p-6 shadow-sm">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                <div class="flex items-center gap-3">
                    <span class="flex size-9 items-center justify-center rounded-xl bg-(--active)/10 text-(--active)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-current">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-7.2 32-32s-7.2-32-32-32H256V80z" />
                        </svg>
                    </span>
                    <div>
                        <h2 class="font-bold text-base sm:text-lg">افزودن پیام جدید</h2>
                        <p class="mt-1 text-xs text-[#8B929D]">پیام موردنظر را بنویسید و بخش مربوط به آن را انتخاب کنید.</p>
                    </div>
                </div>

                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-4">
                    <div class="flex flex-col gap-2 md:col-span-3">
                        <label for="message" class="text-sm font-bold text-[#68717D]">متن پیام</label>
                        <textarea id="message" name="message" rows="4" required placeholder="متن پیام را وارد کنید..."
                            class="w-full resize-y rounded-xl border border-(--border) bg-[#FAFBFD] px-4 py-3 text-sm font-medium leading-7 outline-none transition focus:border-(--active) focus:bg-white focus:ring-2 focus:ring-(--active)/10">{{ old('message') }}</textarea>
                    </div>

                    <div class="flex flex-col gap-2 md:col-span-1">
                        <label for="createSegment" class="text-sm font-bold text-[#68717D]">انتخاب بخش</label>
                        <select name="segment_id" id="createSegment" required
                            class="w-full rounded-xl border border-(--border) bg-[#FAFBFD] px-3 py-3 text-sm outline-none transition focus:border-(--active) focus:bg-white focus:ring-2 focus:ring-(--active)/10">
                            <option value="">انتخاب کنید</option>
                            @foreach ($segment as $seg)
                                <option value="{{ $seg->id }}" @selected(old('segment_id') == $seg->id)>
                                    {{ $seg->en_name }} {{ $seg->fa_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-2 md:col-span-1">
                        <span class="text-sm font-bold text-[#68717D]">وضعیت نمایش</span>
                        <div class="flex h-[44px] items-center gap-3">
                            <input type="hidden" name="status" value="0">
                            <label for="createStatus" class="relative flex h-[28px] w-[50px] cursor-pointer rounded-full">
                                <input type="checkbox" name="status" value="1" id="createStatus" hidden class="peer"
                                    @checked(old('status', '1') == '1')>
                                <span
                                    class="size-full rounded-full bg-gray-300 shadow-inner transition-all duration-300 peer-checked:bg-(--active)"></span>
                                <span
                                    class="absolute left-1 top-1 size-[20px] rounded-full bg-white shadow-md transition-all duration-300 peer-checked:translate-x-[22px]"></span>
                            </label>
                            <span class="text-sm font-medium text-[#68717D]">نمایش پیام</span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-(--active) px-6 py-3 text-sm font-bold text-white shadow-sm transition hover:opacity-90 active:scale-[.98]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3.5 fill-current">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-7.2 32-32s-7.2-32-32-32H256V80z" />
                        </svg>
                        افزودن پیام
                    </button>
                </div>
            </form>

            {{-- فهرست پیام‌ها --}}
            <section class="w-full overflow-hidden rounded-2xl border border-(--border) bg-white shadow-sm">
                <div class="flex items-center justify-between gap-3 border-b border-(--border) px-4 py-4 sm:px-5">
                    <div class="flex items-center gap-3">
                        <span class="flex size-9 items-center justify-center rounded-xl bg-[#FAFBFD] text-(--active)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-current">
                                <path
                                    d="M64 96c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32z" />
                            </svg>
                        </span>
                        <div>
                            <h2 class="font-bold text-base">پیام‌های ثبت‌شده</h2>
                            <p class="mt-1 text-xs text-[#8B929D]">مدیریت و ویرایش پیام‌ها</p>
                        </div>
                    </div>
                    <span class="rounded-lg bg-[#FAFBFD] px-3 py-1.5 text-xs font-bold text-[#68717D]">
                        {{ $message->count() }} پیام
                    </span>
                </div>

                <div class="w-full overflow-x-auto">
                    <table class="w-full min-w-[560px] border-collapse text-sm">
                        <thead>
                            <tr class="bg-[#FAFBFD] text-xs font-bold text-[#68717D]">
                                <th class="w-16 border-b border-(--border) px-4 py-4 text-center">ردیف</th>
                                <th class="border-b border-(--border) px-4 py-4 text-right">متن پیام</th>
                                <th class="w-36 border-b border-(--border) px-4 py-4 text-center">بخش</th>
                                <th class="w-32 border-b border-(--border) px-4 py-4 text-center">وضعیت</th>
                                <th class="w-28 border-b border-(--border) px-4 py-4 text-center">ابزار</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-(--border)">
                            @forelse ($message as $mess)
                                <tr class="transition hover:bg-[#FAFBFD]">
                                    <td class="px-4 py-4 text-center text-xs font-semibold text-[#8B929D]">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td
                                        class="max-w-xl whitespace-normal break-words px-4 py-4 text-right font-medium leading-7 text-[#343B45]">
                                        {{ $mess->message }}
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <span
                                            class="inline-flex rounded-lg bg-[#FAFBFD] px-3 py-1.5 text-xs font-semibold text-[#68717D]">
                                            {{ $mess->segment?->fa_name ?? 'بدون بخش' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        @if ((int) $mess->status === 1)
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                                <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                                فعال
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">
                                                <span class="size-1.5 rounded-full bg-rose-500"></span>
                                                غیرفعال
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            @can('access', ['message_edit'])
                                                <button type="button" onclick="popup('open', '{{ $mess->id }}')"
                                                    aria-label="ویرایش پیام"
                                                    class="flex size-9 items-center justify-center rounded-lg border border-(--active)/30 bg-(--active)/5 text-(--active) transition hover:bg-(--active) hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        class="size-4 fill-current">
                                                        <path
                                                            d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117z" />
                                                    </svg>
                                                </button>
                                            @endcan
                                            @can('access', ['message_delete'])
                                                <a href="{{ route('message.delete', $mess->id) }}" aria-label="حذف پیام"
                                                    onclick="return confirm('از حذف این پیام اطمینان دارید؟')"
                                                    class="flex size-9 items-center justify-center rounded-lg border border-(--disactive)/30 bg-(--disactive)/5 text-(--disactive) transition hover:bg-(--disactive) hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                        class="size-4 fill-current">
                                                        <path
                                                            d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.5 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2-16-16-16s-16 7.2-16 16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                    </svg>
                                                </a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-12 text-center">
                                        <div class="flex flex-col items-center gap-2 text-[#8B929D]">
                                            <span
                                                class="flex size-12 items-center justify-center rounded-2xl bg-[#FAFBFD]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="size-5 fill-current">
                                                    <path
                                                        d="M64 96c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h320c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32z" />
                                                </svg>
                                            </span>
                                            <span class="text-sm font-bold">هنوز پیامی ثبت نشده است</span>
                                            <span class="text-xs">برای شروع، از فرم بالا یک پیام جدید اضافه کنید.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    {{-- پنجره ویرایش --}}
    <div id="editPopup"
        class="invisible fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 opacity-0 transition-all duration-200"
        aria-hidden="true">
        <div class="absolute inset-0" onclick="popup('close')"></div>

        <div class="relative z-10 w-full max-w-2xl rounded-2xl bg-white p-4 shadow-2xl sm:p-6">
            <div class="flex items-center justify-between border-b border-(--border) pb-4">
                <div>
                    <h3 class="font-bold text-base sm:text-lg">ویرایش پیام</h3>
                    <p class="mt-1 text-xs text-[#8B929D]">اطلاعات پیام را ویرایش کنید.</p>
                </div>
                <button type="button" onclick="popup('close')" aria-label="بستن"
                    class="flex size-9 items-center justify-center rounded-lg bg-[#FAFBFD] text-[#68717D] transition hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4 fill-current">
                        <path
                            d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('message.update') }}" method="POST" class="mt-5 flex flex-col gap-4">
                @csrf
                <input type="hidden" name="id" id="message_id">

                <div class="flex flex-col gap-2">
                    <label for="popupMessage" class="text-sm font-bold text-[#68717D]">متن پیام</label>
                    <textarea name="popupMessage" id="popupMessage" rows="4" required
                        class="w-full resize-y rounded-xl border border-(--border) bg-[#FAFBFD] px-4 py-3 text-sm font-medium leading-7 outline-none transition focus:border-(--active) focus:bg-white focus:ring-2 focus:ring-(--active)/10"></textarea>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="editSegment" class="text-sm font-bold text-[#68717D]">انتخاب بخش</label>
                    <select name="segment_id" id="editSegment" required
                        class="w-full rounded-xl border border-(--border) bg-[#FAFBFD] px-3 py-3 text-sm outline-none transition focus:border-(--active) focus:bg-white focus:ring-2 focus:ring-(--active)/10">
                        <option value="">انتخاب کنید</option>
                        @foreach ($segment as $seg)
                            <option value="{{ $seg->id }}">{{ $seg->en_name }} {{ $seg->fa_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="text-sm font-bold text-[#68717D]">وضعیت نمایش</span>
                    <div class="flex h-[44px] items-center gap-3">
                        <input type="hidden" name="status" value="0">
                        <label for="editStatus" class="relative flex h-[28px] w-[50px] cursor-pointer rounded-full">
                            <input type="checkbox" name="status" value="1" id="editStatus" hidden class="peer">
                            <span
                                class="size-full rounded-full bg-gray-300 shadow-inner transition-all duration-300 peer-checked:bg-(--active)"></span>
                            <span
                                class="absolute left-1 top-1 size-[20px] rounded-full bg-white shadow-md transition-all duration-300 peer-checked:translate-x-[22px]"></span>
                        </label>
                        <span class="text-sm font-medium text-[#68717D]">نمایش پیام</span>
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-2 border-t border-(--border) pt-4 sm:flex-row sm:justify-end">
                    <button type="button" onclick="popup('close')"
                        class="rounded-xl border border-(--border) px-5 py-2.5 text-sm font-bold text-[#68717D] transition hover:bg-[#FAFBFD]">
                        انصراف
                    </button>
                    <button type="submit"
                        class="rounded-xl bg-(--active) px-7 py-2.5 text-sm font-bold text-white transition hover:opacity-90 active:scale-[.98]">
                        ذخیره تغییرات
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const editPopup = document.getElementById('editPopup');
        const popupMessage = document.getElementById('popupMessage');
        const messageId = document.getElementById('message_id');
        const editSegment = document.getElementById('editSegment');
        const editStatus = document.getElementById('editStatus');

        function popup(door, id = null) {
            if (door === 'close') {
                editPopup.classList.add('invisible', 'opacity-0');
                editPopup.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('overflow-hidden');
                return;
            }

            if (door !== 'open' || !id) return;

            popupMessage.value = '';
            messageId.value = '';
            editSegment.value = '';
            editStatus.checked = true;

            editPopup.classList.remove('invisible', 'opacity-0');
            editPopup.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');

            $.ajax({
                url: "{{ route('message.edit') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    messageId.value = response.id;
                    popupMessage.value = response.message;
                    editSegment.value = response.segment_id;
                    editStatus.checked = Number(response.status) === 1;
                },
                error: function() {
                    popup('close');
                    alert('دریافت اطلاعات پیام با خطا مواجه شد. لطفاً دوباره تلاش کنید.');
                }
            });
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !editPopup.classList.contains('invisible')) {
                popup('close');
            }
        });
    </script>
@endsection
