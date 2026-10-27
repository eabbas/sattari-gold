@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | لیست همه معاملات')
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

    <!-- آرشیو معاملات -->
    <div class="w-full flex flex-col gap-3 justify-start items-center">
        <!-- ارشیو معامله / هدر -->
        <section
            class="w-full mx-auto bg-(--secondary-dashboard) flex items-center justify-between border-1 border-(--color-border) p-2 2 rounded-md">
            <h2 class="text-sm sm:text-base md:text-xl font-bold text-nowrap">آرشیو معامله</h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('deal.create') }}"
                    class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">
                    شروع معامله جدید
                </a>
                <div id="openPopup_report"
                    class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">
                    گزارش معامله
                </div>
                <div
                    class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">
                    خروجی اکسل</div>
            </div>
            <div id="popup_report"
                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 flex items-center justify-center transition-all">
                <div id="closePopup_report2" class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                </div>
                <div class="relative z-51 w-[80%] h-150 overflow-y-auto lg:w-200 bg-white rounded-md px-3 py-2">
                    <div class="w-full flex items-center justify-between border-b-1 border-(--color-border) pb-2">
                        <div class="font-bold">گزارش معاملات</div>
                        <div id="closePopup_report">
                            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="w-full flex flex-col">
                        <div
                            class="w-full bg-(--color-success)/20 flex items-center border-1 border-(--color-success) rounded-lg px-1 md:px-2 py-1 md:py-2 gap-2">
                            <div class="w-3/12 flex flex-col sm:flex-row">
                                <span class="text-[10px] md:text-base font-bold">مجموع تراز آبشده</span>
                            </div>
                            <div class="bg-white w-9/24 flex flex-col sm:flex-row rounded-lg px-2 py-3">
                                <span class="text-xs md:text-base ml-1">
                                    <span class="">وزنی</span>
                                    <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(گرم) :</span>
                                </span>
                                <span class="text-xs md:text-base font-bold text-(--color-danger)">
                                    <span class="">58.588-</span>
                                    <span class="text-[8px] md:text-xs">بد</span>
                                </span>
                            </div>
                            <div class="bg-white w-9/24 flex flex-col sm:flex-row rounded-lg px-2 py-3">
                                <span class="text-xs md:text-base ml-1">
                                    <span class="">مبلغ</span>
                                    <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(ریالی) :</span>
                                </span>
                                <span class="text-xs md:text-base font-bold text-(--color-success)">
                                    <span class="">11.524.568-</span>
                                    <span class="text-[8px] md:text-xs">بس</span>
                                </span>
                            </div>
                        </div>
                        <div class="w-full bg-zinc-100 rounded-lg grid grid-cols-3 mt-5 px-2 py-3 gap-y-5">
                            <div class="font-bold">ابشده نقدی</div>
                            <div class="text-xs md:text-base ml-1">
                                <span class="">وزن</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(گرم)</span>
                            </div>
                            <div class="text-xs md:text-base ml-1">
                                <span class="">مبلغ</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(ریالی)</span>
                            </div>
                            <div class="bg-white px-2 py-3 rounded-r-lg">تراز کل</div>
                            <div class="bg-white py-3 text-xs md:text-base font-bold text-(--color-danger)">
                                <span class="">58.588-</span>
                                <span class="text-[8px] md:text-xs">بد</span>
                            </div>
                            <div
                                class="bg-white px-2 py-3 rounded-l-lg text-xs md:text-base font-bold text-(--color-success)">
                                <span class="">11.524.568-</span>
                                <span class="text-[8px] md:text-xs">بس</span>
                            </div>
                            <div class="flex flex-col">
                                <span class=" text-base">فروش</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین منطقه :
                                    80.698</span>
                            </div>
                            <div class="">267.013</div>
                            <div class="flex flex-col">
                                <span class=" text-base">49.568.254.236</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین وزن :
                                    1.785</span>
                            </div>
                            <div class="col-span-3 h-[1px] bg-(--text-secondary-dashboard)"></div>
                            <div class="flex flex-col">
                                <span class=" text-base">خرید</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین منطقه :
                                    80.698</span>
                            </div>
                            <div class="">267.013</div>
                            <div class="flex flex-col">
                                <span class=" text-base">49.568.254.236</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین وزن :
                                    1.785</span>
                            </div>
                            <div class="col-span-3 h-[1px] bg-(--text-secondary-dashboard)"></div>
                            <div class="text-[8px] md:text-base text-(--text-secondary-dashboard)">
                                <span class="">تعداد معامله :</span>
                                <span class="">299 عدد</span>
                            </div>
                        </div>
                        <div class="w-full bg-zinc-100 rounded-lg grid grid-cols-3 mt-5 px-2 py-3 gap-y-5">
                            <div class="font-bold">تمام سکه طرح جدید</div>
                            <div class="text-xs md:text-base ml-1">
                                <span class="">تعداد</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(عدد)</span>
                            </div>
                            <div class="text-xs md:text-base ml-1">
                                <span class="">مبلغ</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard)">(ریالی)</span>
                            </div>
                            <div class="bg-white px-2 py-3 rounded-r-lg">تراز کل</div>
                            <div class="bg-white py-3 text-xs md:text-base font-bold text-(--color-danger)">
                                <span class="">58.588-</span>
                                <span class="text-[8px] md:text-xs">بد</span>
                            </div>
                            <div
                                class="bg-white px-2 py-3 rounded-l-lg text-xs md:text-base font-bold text-(--color-success)">
                                <span class="">11.524.568-</span>
                                <span class="text-[8px] md:text-xs">بس</span>
                            </div>
                            <div class="flex flex-col">
                                <span class=" text-base">فروش</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین منطقه :
                                    80.698</span>
                            </div>
                            <div class="">267.013</div>
                            <div class="flex flex-col">
                                <span class=" text-base">49.568.254.236</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین وزن :
                                    1.785</span>
                            </div>
                            <div class="col-span-3 h-[1px] bg-(--text-secondary-dashboard)"></div>
                            <div class="flex flex-col">
                                <span class=" text-base">خرید</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین منطقه :
                                    80.698</span>
                            </div>
                            <div class="">267.013</div>
                            <div class="flex flex-col">
                                <span class=" text-base">49.568.254.236</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashboard) mt-2">میانگین وزن :
                                    1.785</span>
                            </div>
                            <div class="col-span-3 h-[1px] bg-(--text-secondary-dashboard)"></div>
                            <div class="text-[8px] md:text-base text-(--text-secondary-dashboard)">
                                <span class="">تعداد معامله :</span>
                                <span class="">299 عدد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ارشیو معامله / لسیت -->
        <section class="w-full mx-auto rounded-md border-1 border-(--color-border) mt-5 pb-10 overflow-hidden">
            <div class="w-full">
                <div class="w-full pb-3 px-3 flex flex-row justify-end">
                        <button onclick="sort(this)" class="flex gap-5 items-center" data-sort="desc">
                            <span>مرتب سازی :</span>
                            <p>نزولی</p>
                            <img src="{{ asset('assets/img/sort/desc.png') }}"
                                style="
                            max-width: 30px;
                            max-height: 30px;
                            margin-top: 10px;
                            margin-left: 5px;
                            cursor: pointer;
                        "
                                alt="">
                        </button>
                    </div>
                <div class="w-full bg-white py-5 px-2 mb-2">
                    <div class="w-full grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2">
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                نام و نام خانوادگی
                            </legend>
                            <input class="w-full outline-none text-[10px] md:text-base" type="text" name="fullName"
                                id="fullName" placeholder=" نام و نام خانوادگی">
                        </fieldset>
                        {{-- <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                نوع کالا
                            </legend>
                           <select id="product" class="w-10/12 lg:w-8/12" name="product[]" data-placeholder="" multiple data-multi-select>
                                @foreach ($filter['language'] as $language)
                                    <option value="{{ $language['key'] }}" @if ($language['key'] == 'all') selected @endif>{{ $language['value'] }}</option>
                                @endforeach
                            </select>
                        </fieldset> --}}
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                نوع معامله
                            </legend>
                            <select id="dealType" name="dealType[]" data-placeholder="انتخاب کنید" data-multi-select
                                data-select-all-default="true" multiple>
                                <option value="buy">خرید</option>
                                <option value="sell">فروش</option>
                            </select>
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                وضعیت
                            </legend>
                            <select id="dealState" name="dealState[]" data-placeholder="انتخاب کنید" data-multi-select
                                data-select-all-default="true" multiple>
                                <option value="0">در انتظار</option>
                                <option value="1">تایید شده</option>
                                <option value="01">رد شده</option>
                            </select>
                        </fieldset>
                        {{-- <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                مرجع ثبت
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base" type="text" list="status"
                                name="" id="" placeholder="وضعیت" value="همه">
                            <datalist id="status">
                                <option value="همه"></option>
                                <option value="تهران"></option>
                                <option value="تهران"></option>
                                <option value="تهران"></option>
                            </datalist>
                        </fieldset> --}}
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                از تاریخ
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                name="fromDate" id="fromDate" placeholder="از تاریخ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                تا تاریخ
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                name="toDate" id="toDate" placeholder="تا تاریخ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                وزن
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" type="number" dir="ltr"
                                name="" id="weight" placeholder="وزن">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                مبلغ
                            </legend>
                            <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                                name="" id="price" placeholder="مبلغ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                شماره سند
                            </legend>
                            <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                                name="" id="dealId" placeholder=" شماره سند">
                        </fieldset>
                    </div>
                    <div class="w-full flex justify-end">
                        <button
                            class="w-fit flex items-center justify-center font-bold text-xs md:text-base py-2 md:px-6 mt-5 hover:bg-(--color-blue) hover:text-white transition-all duratoin-300 col-span-1 md:text-right border-1 border-(--color-blue) text-(--color-blue) rounded-md text-center cursor-pointer"
                            onclick="setDatas()">اعمال</button>
                    </div>
                </div>
                <div class="w-full h-5 bg-zinc-200"></div>
                <div class="w-full overflow-x-auto">
                    <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                        <div
                            class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashboard) flex flex-col md:flex-row">
                            <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                            <span class="hidden md:flex">|</span>
                            <span class="">ظرفیت باقیمانده 445 نفر</span>
                        </div>
                    </div>
                    <table class="w-full border-collapse border-1 border-(--color-border) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-xs lg:text-base">
                                <th class="border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="min-w-50 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    نام و نام خانوادگی
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    کالا
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    تعداد/وزن
                                </th>
                                <th class="min-w-25 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    مظنه
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    مبلغ
                                </th>
                                <th class="min-w-24 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    شماره سند
                                </th>
                                <th class="min-w-50 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    تاریخ معامله
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    وضعیت
                                </th>
                                <th class="min-w-20 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($deals as $deal)
                                @php
                                    $counter++;
                                @endphp
                                <tr class="item_fayle text-xs lg:text-base">
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $counter }}
                                    </td>
                                    <td class="p-1 md:px-3 md:py-2 flex items-center justify-around">
                                        <div
                                            class="w-18 px-2 py-1 {{ $deal->transaction->type == 'buy' ? 'border-2 border-(--color-success) text-(--color-success)' : 'border-2 border-(--color-danger) text-(--color-danger)' }} text-center rounded-lg">
                                            {{ $deal->transaction->type == 'buy' ? 'خرید' : 'فروش' }}
                                        </div>
                                        <div class="w-fit">
                                            {{ $deal->user->name . ' ' . $deal->user->family }}
                                        </div>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        شمش نقره
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $deal->goldWeight }} گرم
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ number_format($deal->goldPrice) }}
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $deal->buyPrice ? number_format($deal->buyPrice) : '-' }}
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        <span
                                            class="px-3 py-1.5 text-(--color-warning) rounded-md border-1 border-(--color-warning) p-1 cursor-pointer in-fa">
                                            {{ '100' . $deal->id }}
                                        </span>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        <span class="w-5/12 text-right in-fa">{{ $deal->time }}</span>
                                        <span class="w-2/12 text-right mx-2">|</span>
                                        <span class="w-5/12 text-left in-fa">{{ $deal->date }}</span>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        @if ($deal->state != 'تایید شده')
                                            <a href="{{ route('deal.conferm', $deal->id) }}"
                                                class="px-3 py-1.5 bg-[{{ $deal->color }}]/20 text-[{{ $deal->color }}] rounded-md border-1 border-[[{{ $deal->color }}]] p-1 cursor-default cursor-pointer">
                                                {{ $deal->state }}
                                            </a>
                                        @else
                                            <span
                                                class="px-3 py-1.5 bg-[{{ $deal->color }}]/20 text-[{{ $deal->color }}] rounded-md border-1 border-[[{{ $deal->color }}]] p-1 cursor-default">
                                                {{ $deal->state }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="relative p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                        <button
                                            class="open-popup-fayle w-fit text-(--color-success) border-1 border-(--color-success) rounded-md p-1 cursor-pointer text-center">
                                            <svg class="size-5 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 384 512">
                                                <path
                                                    d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                            </svg>
                                        </button>
                                        <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                            <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                <div class="w-full flex items-center justify-between border-b-1 border-(--color-border) pb-2">
                                                    <div class="font-bold">مشاهده فیش واریزی</div>
                                                    <div class="close-popup-fayle">
                                                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-6 gap-5 mt-5">
                                                    <div class="col-span-6 flex items-center border-1 border-(--color-border) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام :</span>
                                                            <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره :</span>
                                                            <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">تاریخ ثبت :</span>
                                                            <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                        <div class="w-full bg-white divide-x-1 divide-(--border-dashboard) flex items-center gap-2 p-2 rounded-lg">
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره کارت :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                            </div>
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره شبا :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6  border-1 border-(--color-border) rounded-lg p-2 flex items-center justify-center">
                                                        <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">تایید شده توسط :</span>
                                                        <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">مبلغ :</span>
                                                        <span>
                                                            <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard)">ریال</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </td>
                                </tr>
                            @endforeach
                            {{-- <tr class="item_fayle text-xs lg:text-base">
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1
                                </td>
                                <td
                                    class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 flex items-center justify-around">
                                    <div
                                        class="w-18 px-2 py-1 bg-(--color-danger)/30 text-(--color-danger) text-center">
                                        فروشنده
                                    </div>
                                    <div class="w-fit">
                                        ماهان فضلی
                                    </div>
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    شمش نقره
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1 گرم
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1.500.000
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    146.254.687.254
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    <span
                                        class="w-20 h-10 text-(--info-dashboard) rounded-md border-1 border-(--info-dashboard) p-1 cursor-pointer">
                                        ثبت سند
                                    </span>
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    <span class="w-5/12 text-right">15:32</span>
                                    <span class="w-2/12 text-right mx-2">|</span>
                                    <span class="w-5/12 text-left">1406/3/5</span>
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    <span
                                        class="w-10 h-10 bg-(--color-danger)/20 text-(--color-danger) rounded-md border-1 border-(--color-danger) p-1 cursor-default">
                                        عدم تایید
                                    </span>
                                </td>
                                <td
                                    class="relative border-1 border-(--color-border) p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                    <button
                                        class="open-popup-fayle w-fit text-(--color-success) border-1 border-(--color-success) rounded-md p-1 cursor-pointer text-center">
                                        <svg class="size-5 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                        </svg>
                                    </button>
                                    <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                            <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                <div class="w-full flex items-center justify-between border-b-1 border-(--color-border) pb-2">
                                                    <div class="font-bold">مشاهده فیش واریزی</div>
                                                    <div class="close-popup-fayle">
                                                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-6 gap-5 mt-5">
                                                    <div class="col-span-6 flex items-center border-1 border-(--color-border) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام :</span>
                                                            <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره :</span>
                                                            <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">تاریخ ثبت :</span>
                                                            <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                        <div class="w-full bg-white divide-x-1 divide-(--border-dashboard) flex items-center gap-2 p-2 rounded-lg">
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره کارت :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                            </div>
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره شبا :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6  border-1 border-(--color-border) rounded-lg p-2 flex items-center justify-center">
                                                        <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">تایید شده توسط :</span>
                                                        <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">مبلغ :</span>
                                                        <span>
                                                            <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard)">ریال</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                </td>
                            </tr>
                            <tr class="item_fayle text-xs lg:text-base">
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1
                                </td>
                                <td
                                    class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 flex items-center justify-around">
                                    <div
                                        class="w-18 px-2 py-1 bg-(--color-success)/30 text-(--color-success) text-center">
                                        خریدار
                                    </div>
                                    <div class="w-fit">
                                        ماهان فضلی
                                    </div>
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    شمش نقره
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1 گرم
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    1.500.000
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    146.254.687.254
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    14587
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    <span class="w-5/12 text-right">15:32</span>
                                    <span class="w-2/12 text-right mx-2">|</span>
                                    <span class="w-5/12 text-left">1406/3/5</span>
                                </td>
                                <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                    <span
                                        class="w-10 h-10 bg-zinc-400/20 text-zinc-500 rounded-md border-1 border-zinc-400 p-1 cursor-default">
                                        لغو شده
                                    </span>
                                </td>
                                <td
                                    class="relative border-1 border-(--color-border) p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                    <button
                                        class="open-popup-fayle w-fit text-(--color-success) border-1 border-(--color-success) rounded-md p-1 cursor-pointer text-center">
                                        <svg class="size-5 fill-(--color-success)" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                        </svg>
                                    </button>
                                    <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                            <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                <div class="w-full flex items-center justify-between border-b-1 border-(--color-border) pb-2">
                                                    <div class="font-bold">مشاهده فیش واریزی</div>
                                                    <div class="close-popup-fayle">
                                                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-6 gap-5 mt-5">
                                                    <div class="col-span-6 flex items-center border-1 border-(--color-border) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام :</span>
                                                            <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره :</span>
                                                            <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                        </div>
                                                        <div class="w-4/12 flex flex-col sm:flex-row">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">تاریخ ثبت :</span>
                                                            <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                        <div class="w-full bg-white divide-x-1 divide-(--border-dashboard) flex items-center gap-2 p-2 rounded-lg">
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره کارت :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                            </div>
                                                            <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                                <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره شبا :</span>
                                                                <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-6  border-1 border-(--color-border) rounded-lg p-2 flex items-center justify-center">
                                                        <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">تایید شده توسط :</span>
                                                        <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                    </div>
                                                    <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashboard)">مبلغ :</span>
                                                        <span>
                                                            <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashboard)">ریال</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- آرشیو معاملات -->



    <script>
        // ارشیو معامله / گزارش معامله
        let openPopup_report = document.getElementById("openPopup_report");
        let closePopup_report = document.getElementById("closePopup_report");
        let closePopup_report2 = document.getElementById("closePopup_report2");
        let popup_report = document.getElementById("popup_report");

        openPopup_report.addEventListener("click", () => {
            popup_report.classList.remove("invisible");
            popup_report.classList.remove("opacity-0");
            popup_report.classList.add("opacity-100");
            popup_report.classList.add("visible");
        });
        closePopup_report.addEventListener("click", () => {
            popup_report.classList.add("invisible");
            popup_report.classList.add("opacity-0");
            popup_report.classList.remove("opacity-100");
            popup_report.classList.remove("visible");
        });
        closePopup_report2.addEventListener("click", () => {
            popup_report.classList.add("invisible");
            popup_report.classList.add("opacity-0");
            popup_report.classList.remove("opacity-100");
            popup_report.classList.remove("visible");
        });
    </script>
    <script src="{{ asset('assets/js/adminDeal.js') }}"></script>


@endsection