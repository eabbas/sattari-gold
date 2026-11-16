@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | لیست همه معاملات')

@section('content')

    {{-- پیام موفقیت --}}
    @if (session('success'))
        <div
            class="modal fixed top-10 right-0 sm:right-5 z-9999999999 flex items-center justify-center rounded-xl border border-green-200 bg-green-50 px-8 py-5 shadow-lg transition-all duration-300">
            <span class="text-sm font-semibold text-green-700">
                {{ session('success') }}
            </span>
        </div>
    @endif

    {{-- پیام خطا --}}
    @if (session('failure'))
        <div
            class="modal fixed top-10 right-0 sm:right-5 z-9999999999 flex items-center justify-center rounded-xl border border-red-200 bg-red-50 px-8 py-5 shadow-lg transition-all duration-300">
            <span class="text-sm font-semibold text-red-700">
                {{ session('failure') }}
            </span>
        </div>
    @endif

    <div class="w-full flex flex-col gap-5 text-[#29251F]">

        {{-- هدر صفحه --}}
        <section
            class="w-full flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 rounded-2xl border border-[#E7E2D9] bg-white p-4 shadow-sm">

            <div class="flex items-center gap-3">
                <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-[#D6AD60]/15 text-[#B88A3B]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01" />
                    </svg>
                </div>

                <div>
                    <h2 class="text-base md:text-xl font-bold">آرشیو معاملات</h2>
                    <p class="text-xs text-[#78716C] mt-1">مشاهده، بررسی و مدیریت تمامی معاملات</p>
                </div>
            </div>

            <a href="{{ route('deal.create') }}"
                class="w-full sm:w-fit flex items-center justify-center gap-2 rounded-xl bg-[#B88A3B] px-5 py-3 text-xs md:text-sm font-bold text-white transition-all duration-200 hover:bg-[#9F742F]">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14" />
                </svg>

                شروع معامله جدید
            </a>
        </section>

        {{-- بخش اصلی --}}
        <section class="w-full overflow-hidden rounded-2xl border border-[#E7E2D9] bg-white shadow-sm">

            {{-- سربرگ جدول --}}
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-[#E7E2D9] p-4">

                <div>
                    <h3 class="text-sm md:text-base font-bold">لیست تمامی معاملات</h3>
                    <p class="mt-1 text-[11px] text-[#78716C]">فیلتر و جستجوی معاملات ثبت‌شده</p>
                </div>

                <button onclick="sort(this)"
                    class="flex items-center gap-3 rounded-lg border border-[#E7E2D9] bg-[#F8F5EF] px-3 py-2 text-xs font-semibold text-[#78716C] transition hover:border-[#D6AD60] hover:text-[#B88A3B]"
                    data-sort="desc">

                    <span>مرتب‌سازی:</span>
                    <p class="text-[#29251F]">جدید به قدیمی</p>

                    <img src="{{ asset('assets/img/sort/desc.png') }}" class="w-5 h-5 object-contain" alt="مرتب‌سازی">
                </button>
            </div>

            {{-- فیلترها --}}
            <div class="m-3 md:m-4 rounded-xl border border-[#E7E2D9] bg-[#F8F5EF] p-3 md:p-4">

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            نام و نام خانوادگی
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="text" name="fullName" id="fullName" placeholder="نام مشتری">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            نوع معامله
                        </legend>
                        <select id="dealType" name="dealType[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="buy">خرید</option>
                            <option value="sell">فروش</option>
                        </select>
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            وضعیت
                        </legend>
                        <select id="dealState" name="dealState[]" data-placeholder="انتخاب کنید" data-multi-select
                            data-select-all-default="true" multiple>
                            <option value="0">در انتظار</option>
                            <option value="1">تایید شده</option>
                            <option value="-1">رد شده</option>
                        </select>
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            از تاریخ
                        </legend>
                        <input class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none" dir="ltr"
                            type="text" name="fromDate" id="fromDate" placeholder="از تاریخ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            تا تاریخ
                        </legend>
                        <input class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none" dir="ltr"
                            type="text" name="toDate" id="toDate" placeholder="تا تاریخ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            وزن
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="number" dir="ltr" id="weight" placeholder="وزن">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            مبلغ
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="number" dir="ltr" id="price" placeholder="مبلغ">
                    </fieldset>

                    <fieldset
                        class="min-w-0 rounded-lg border border-[#E7E2D9] bg-white px-3 py-2 focus-within:border-[#B88A3B] transition">
                        <legend class="px-1 text-[10px] md:text-xs font-semibold text-[#78716C]">
                            شماره سند
                        </legend>
                        <input
                            class="w-full bg-transparent text-xs md:text-sm text-[#29251F] outline-none placeholder:text-[#A8A29E]"
                            type="number" dir="ltr" id="dealId" placeholder="شماره سند">
                    </fieldset>

                </div>

                <div class="flex justify-end mt-4">
                    <button onclick="setDatas()"
                        class="flex items-center justify-center gap-2 rounded-lg bg-[#B88A3B] px-7 py-2.5 text-xs md:text-sm font-bold text-white transition-all duration-200 hover:bg-[#9F742F]">

                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4h18M6 9h12m-9 5h6m-3 0v6" />
                        </svg>

                        اعمال فیلترها
                    </button>
                </div>
            </div>

            {{-- جدول معاملات --}}
            <div class="w-full overflow-x-auto px-3 md:px-4 pb-5">

                <table class="w-full min-w-[1050px] border-collapse text-xs md:text-sm">

                    <thead>
                        <tr class="bg-[#F8F5EF] text-[#78716C]">
                            <th class="border border-[#E7E2D9] px-3 py-3">ردیف</th>
                            <th class="min-w-50 border border-[#E7E2D9] px-3 py-3">نام و نام خانوادگی</th>
                            <th class="min-w-25 border border-[#E7E2D9] px-3 py-3">نوع معامله</th>
                            <th class="min-w-30 border border-[#E7E2D9] px-3 py-3">تعداد / وزن</th>
                            <th class="min-w-25 border border-[#E7E2D9] px-3 py-3">مظنه
                                <span class="text-[10px] text-gray-400">(ریال)</span>
                            </th>
                            <th class="min-w-30 border border-[#E7E2D9] px-3 py-3">مبلغ
                                <span class="text-[10px] text-gray-400">(ریال)</span>
                            </th>
                            <th class="min-w-30 border border-[#E7E2D9] px-3 py-3">علت رد</th>
                            <th class="min-w-24 border border-[#E7E2D9] px-3 py-3">شماره سند</th>
                            <th class="min-w-50 border border-[#E7E2D9] px-3 py-3">تاریخ معامله</th>
                            <th class="min-w-30 border border-[#E7E2D9] px-3 py-3">وضعیت</th>
                        </tr>
                    </thead>

                    <tbody id="dealsTableBody">

                        @php
                            $counter = 0;
                        @endphp

                        @foreach ($deals as $deal)
                            @php
                                $counter++;
                            @endphp

                            <tr class="item_fayle text-center text-[#29251F] transition-colors hover:bg-[#F8F5EF]/70">

                                <td class="border border-[#E7E2D9] px-3 py-3 text-[#78716C] in-fa">
                                    {{ $counter }}
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3">
                                    <div class="flex items-center justify-center gap-3">
                                        <span class="font-semibold whitespace-nowrap">
                                            {{ $deal->user->name . ' ' . $deal->user->family }}
                                        </span>

                                    </div>
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3">
                                    <span
                                        class="min-w-16 rounded-lg px-2 py-1 text-[10px] font-bold
                                            {{ $deal->transaction->type == 'buy'
                                                ? 'border border-green-200 bg-green-50 text-green-700'
                                                : 'border border-red-200 bg-red-50 text-red-700' }}">
                                        {{ $deal->transaction->type == 'buy' ? 'خرید' : 'فروش' }}
                                    </span>
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3 in-fa">
                                    {{ $deal->goldWeight }} گرم
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3 font-medium in-fa">
                                    {{ number_format($deal->goldPrice) }}
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3 font-bold in-fa">
                                    {{ $deal->buyPrice ? number_format($deal->buyPrice) : '-' }}
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3 text-red-600 in-fa">
                                    {{ $deal->message ? $deal->message : '-' }}
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3">
                                    <span
                                        class="inline-flex rounded-lg border border-[#D6AD60]/50 bg-[#D6AD60]/10 px-3 py-1.5 font-semibold text-[#B88A3B] in-fa">
                                        {{ '100' . $deal->id }}
                                    </span>
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3 whitespace-nowrap">
                                    <span class="in-fa">{{ $deal->time }}</span>
                                    <span class="mx-2 text-[#D6AD60]">|</span>
                                    <span class="in-fa">{{ $deal->date }}</span>
                                </td>

                                <td class="border border-[#E7E2D9] px-3 py-3">

                                    @if ($deal->state != 'تایید شده')
                                        @can('access', 'deal_confirm')
                                            <span onclick="deal('open', {{ Js::from($deal) }})"
                                                style="background-color: {{ $deal->color }}20; color: {{ $deal->color }}; border-color: {{ $deal->color }};"
                                                class="inline-flex cursor-pointer rounded-lg border px-3 py-1.5 font-semibold whitespace-nowrap">
                                                {{ $deal->state }}
                                            </span>
                                        @endcan
                                    @else
                                        <span
                                            style="background-color: {{ $deal->color }}20; color: {{ $deal->color }}; border-color: {{ $deal->color }};"
                                            class="inline-flex rounded-lg border px-3 py-1.5 font-semibold whitespace-nowrap">
                                            {{ $deal->state }}
                                        </span>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </section>
    </div>

    {{-- پاپ‌آپ بررسی معامله --}}
    <div id="popup"
        class="fixed inset-0 z-999999 bg-black/50 flex items-center justify-center p-3 opacity-0 invisible transition-all duration-300">

        <div class="w-full max-w-3xl rounded-2xl border border-[#E7E2D9] bg-[#F8F5EF] p-4 md:p-6 shadow-2xl">

            {{-- هدر پاپ‌آپ --}}
            <div class="flex items-center justify-between border-b border-[#E7E2D9] pb-4">

                <div>
                    <h3 class="text-base md:text-lg font-bold text-[#29251F]">
                        بررسی و تأیید معامله
                    </h3>
                    <p class="mt-1 text-xs text-[#78716C]">
                        اطلاعات معامله انتخاب‌شده
                    </p>
                </div>

                <button type="button" onclick="deal('clos')"
                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-white border border-[#E7E2D9] text-[#78716C] hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition">
                    ✕
                </button>
            </div>

            {{-- اطلاعات معامله --}}
            <div class="mt-4 overflow-x-auto rounded-xl border border-[#E7E2D9] bg-white">

                <table class="w-full min-w-[550px] text-xs md:text-sm">

                    <thead>
                        <tr class="bg-[#F8F5EF] text-[#78716C]">
                            <th class="border-b border-[#E7E2D9] p-3 text-start">مشتری</th>
                            <th class="border-b border-[#E7E2D9] p-3 text-start">وزن (گرم)</th>
                            <th class="border-b border-[#E7E2D9] p-3 text-start">مظنه (ریال)</th>
                            <th class="border-b border-[#E7E2D9] p-3 text-start">مبلغ کل (ریال)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="font-bold text-[#29251F]">
                            <td class="p-3" id="name"></td>
                            <td class="p-3 in-fa" id="goldweight"></td>
                            <td class="p-3 in-fa" id="goldprice"></td>
                            <td class="p-3 in-fa text-[#B88A3B]" id="fullprice"></td>
                        </tr>
                    </tbody>

                </table>
            </div>

            {{-- عملیات --}}
            <div class="mt-5 flex flex-col sm:flex-row gap-3">

                <a href=""
                    class="flex-1 flex items-center justify-center rounded-xl bg-[#B88A3B] py-3 font-bold text-sm text-white transition hover:bg-[#9F742F]"
                    id="check">
                    تأیید معامله
                </a>

                <form class="flex-[1.5] flex flex-col sm:flex-row gap-2" action="{{ route('deal.cancel') }}"
                    method="POST">

                    @csrf

                    <input type="hidden" name="id" id="deal_id">

                    <input
                        class="min-w-0 flex-1 rounded-xl border border-[#E7E2D9] bg-white px-3 py-3 text-xs text-[#29251F] outline-none transition placeholder:text-[#A8A29E] focus:border-[#B88A3B]"
                        type="text" name="message" placeholder="دلیل عدم تأیید را بنویسید">

                    <button type="submit"
                        class="rounded-xl border border-red-200 bg-red-50 px-5 py-3 text-sm font-bold text-red-600 transition hover:bg-red-600 hover:text-white">
                        عدم تأیید
                    </button>

                </form>

            </div>
        </div>
    </div>

    <script>
        // پاپ‌آپ گزارش معامله
        const openPopup_report = document.getElementById("openPopup_report");
        const closePopup_report = document.getElementById("closePopup_report");
        const closePopup_report2 = document.getElementById("closePopup_report2");
        const popup_report = document.getElementById("popup_report");

        if (openPopup_report && popup_report) {
            openPopup_report.addEventListener("click", () => {
                popup_report.classList.remove("invisible", "opacity-0");
                popup_report.classList.add("visible", "opacity-100");
            });
        }

        [closePopup_report, closePopup_report2].forEach(button => {
            if (button && popup_report) {
                button.addEventListener("click", () => {
                    popup_report.classList.add("invisible", "opacity-0");
                    popup_report.classList.remove("visible", "opacity-100");
                });
            }
        });

        // نمایش جزئیات معامله
        function deal(door, selectedDeal) {

            const popup = document.getElementById("popup");
            const name = document.getElementById("name");
            const goldweight = document.getElementById("goldweight");
            const goldprice = document.getElementById("goldprice");
            const fullprice = document.getElementById("fullprice");
            const check = document.getElementById("check");
            const deal_id = document.getElementById("deal_id");

            if (door === "open") {

                popup.classList.remove("opacity-0", "invisible");
                popup.classList.add("opacity-100", "visible");

                deal_id.value = selectedDeal.id;

                name.innerText = selectedDeal.user.name + ' ' + selectedDeal.user.family;
                goldweight.innerText = selectedDeal.goldWeight;
                goldprice.innerText = Number(selectedDeal.goldPrice).toLocaleString('fa-IR');
                fullprice.innerText = Number(selectedDeal.buyPrice).toLocaleString('fa-IR');

                check.setAttribute('href', '{{ url('deal/confirm') }}/' + selectedDeal.id);
            }

            if (door === "clos") {
                popup.classList.add("opacity-0", "invisible");
                popup.classList.remove("opacity-100", "visible");
            }
        }
    </script>

    <script src="{{ asset('assets/js/adminDeal.js') }}"></script>

@endsection
