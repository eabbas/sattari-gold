@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | لیست همه معاملات')
@section('content')
<style>

</style>

@if (session('success'))
<div
    class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
    <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
</div>
@endif
@if (session('failure'))
<div
    class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
    <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('failure') }} </span>
</div>
@endif

<!-- آرشیو معاملات -->
<div class="w-full flex flex-col gap-3 justify-start items-center">
    <!-- ارشیو معامله / هدر -->
    <section class="w-full mx-auto bg-(--secondary-dashbrd) flex items-center justify-between border-1 border-(--border-dashbrd) p-2 2 rounded-md">
        <h2 class="text-sm sm:text-base md:text-xl font-bold text-nowrap">آرشیو معامله</h2>
        <div class="flex items-center gap-3">
            <div id="openPopup_report" class="w-fit bg-(--info-dashbrd) text-xs md:text-base text-(--color-surface-dashbrd) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">
                گزارش معامله
            </div>
            <div class="w-fit bg-(--info-dashbrd) text-xs md:text-base text-(--color-surface-dashbrd) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">خروجی اکسل</div>
        </div>
        <div id="popup_report" class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 flex items-center justify-center transition-all">
            <div id="closePopup_report2" class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
            <div class="relative z-51 w-[80%] h-150 overflow-y-auto lg:w-200 bg-white rounded-md px-3 py-2">
                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                    <div class="font-bold">گزارش معاملات</div>
                    <div id="closePopup_report">
                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full flex flex-col">
                    <div class="w-full bg-(--primary-dashbrd)/20 flex items-center border-1 border-(--primary-dashbrd) rounded-lg px-1 md:px-2 py-1 md:py-2 gap-2">
                        <div class="w-3/12 flex flex-col sm:flex-row">
                            <span class="text-[10px] md:text-base font-bold">مجموع تراز آبشده</span>
                        </div>
                        <div class="bg-white w-9/24 flex flex-col sm:flex-row rounded-lg px-2 py-3">
                            <span class="text-xs md:text-base ml-1">
                                <span class="">وزنی</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(گرم) :</span>
                            </span>
                            <span class="text-xs md:text-base font-bold text-(--danger-dashbrd)">
                                <span class="">58.588-</span>
                                <span class="text-[8px] md:text-xs">بد</span>
                            </span>
                        </div>
                        <div class="bg-white w-9/24 flex flex-col sm:flex-row rounded-lg px-2 py-3">
                            <span class="text-xs md:text-base ml-1">
                                <span class="">مبلغ</span>
                                <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(ریالی) :</span>
                            </span>
                            <span class="text-xs md:text-base font-bold text-(--primary-dashbrd)">
                                <span class="">11.524.568-</span>
                                <span class="text-[8px] md:text-xs">بس</span>
                            </span>
                        </div>
                    </div>
                    <div class="w-full bg-zinc-100 rounded-lg grid grid-cols-3 mt-5 px-2 py-3 gap-y-5">
                        <div class="font-bold">ابشده نقدی</div>
                        <div class="text-xs md:text-base ml-1">
                            <span class="">وزن</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(گرم)</span>
                        </div>
                        <div class="text-xs md:text-base ml-1">
                            <span class="">مبلغ</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(ریالی)</span>
                        </div>
                        <div class="bg-white px-2 py-3 rounded-r-lg">تراز کل</div>
                        <div class="bg-white py-3 text-xs md:text-base font-bold text-(--danger-dashbrd)">
                            <span class="">58.588-</span>
                            <span class="text-[8px] md:text-xs">بد</span>
                        </div>
                        <div class="bg-white px-2 py-3 rounded-l-lg text-xs md:text-base font-bold text-(--primary-dashbrd)">
                            <span class="">11.524.568-</span>
                            <span class="text-[8px] md:text-xs">بس</span>
                        </div>
                        <div class="flex flex-col">
                            <span class=" text-base">فروش</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین منطقه : 80.698</span>
                        </div>
                        <div class="">267.013</div>
                        <div class="flex flex-col">
                            <span class=" text-base">49.568.254.236</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین وزن : 1.785</span>
                        </div>
                        <div class="col-span-3 h-[1px] bg-(--text-secondary-dashbrd)"></div>
                        <div class="flex flex-col">
                            <span class=" text-base">خرید</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین منطقه : 80.698</span>
                        </div>
                        <div class="">267.013</div>
                        <div class="flex flex-col">
                            <span class=" text-base">49.568.254.236</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین وزن : 1.785</span>
                        </div>
                        <div class="col-span-3 h-[1px] bg-(--text-secondary-dashbrd)"></div>
                        <div class="text-[8px] md:text-base text-(--text-secondary-dashbrd)">
                            <span class="">تعداد معامله :</span>
                            <span class="">299 عدد</span>
                        </div>
                    </div>
                    <div class="w-full bg-zinc-100 rounded-lg grid grid-cols-3 mt-5 px-2 py-3 gap-y-5">
                        <div class="font-bold">تمام سکه طرح جدید</div>
                        <div class="text-xs md:text-base ml-1">
                            <span class="">تعداد</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(عدد)</span>
                        </div>
                        <div class="text-xs md:text-base ml-1">
                            <span class="">مبلغ</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd)">(ریالی)</span>
                        </div>
                        <div class="bg-white px-2 py-3 rounded-r-lg">تراز کل</div>
                        <div class="bg-white py-3 text-xs md:text-base font-bold text-(--danger-dashbrd)">
                            <span class="">58.588-</span>
                            <span class="text-[8px] md:text-xs">بد</span>
                        </div>
                        <div class="bg-white px-2 py-3 rounded-l-lg text-xs md:text-base font-bold text-(--primary-dashbrd)">
                            <span class="">11.524.568-</span>
                            <span class="text-[8px] md:text-xs">بس</span>
                        </div>
                        <div class="flex flex-col">
                            <span class=" text-base">فروش</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین منطقه : 80.698</span>
                        </div>
                        <div class="">267.013</div>
                        <div class="flex flex-col">
                            <span class=" text-base">49.568.254.236</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین وزن : 1.785</span>
                        </div>
                        <div class="col-span-3 h-[1px] bg-(--text-secondary-dashbrd)"></div>
                        <div class="flex flex-col">
                            <span class=" text-base">خرید</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین منطقه : 80.698</span>
                        </div>
                        <div class="">267.013</div>
                        <div class="flex flex-col">
                            <span class=" text-base">49.568.254.236</span>
                            <span class="text-[8px] md:text-xs text-(--text-secondary-dashbrd) mt-2">میانگین وزن : 1.785</span>
                        </div>
                        <div class="col-span-3 h-[1px] bg-(--text-secondary-dashbrd)"></div>
                        <div class="text-[8px] md:text-base text-(--text-secondary-dashbrd)">
                            <span class="">تعداد معامله :</span>
                            <span class="">299 عدد</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ارشیو معامله / لسیت -->
    <section class="w-full mx-auto rounded-md border-1 border-(--border-dashbrd) mt-5 pb-10 overflow-hidden">
        <div class="w-full">
            <form action="" class="w-full bg-white grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2 py-5 px-2">
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        نام و نام خانوادگی
                    </legend>
                    <input class="w-full outline-none text-[10px] md:text-base" type="text" name="" id="" placeholder=" نام و نام خانوادگی" value="همه">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        نوع کالا
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" list="transction" name="" id="" placeholder="تراکنش" value="همه">
                    <datalist id="transction">
                        <option value="همه"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                    </datalist>
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        نوع معامله
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" list="transctionTyoe" name="" id="" placeholder="نوع تراکنش" value="همه">
                    <datalist id="transctionTyoe">
                        <option value="همه"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                    </datalist>
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        مرجع ثبت
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" list="status" name="" id="" placeholder="وضعیت" value="همه">
                    <datalist id="status">
                        <option value="همه"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                    </datalist>
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        تاریخ
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" name="" id="" placeholder="تاریخ">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        وزن/تعداد
                    </legend>
                    <input class="w-full outline-none text-xs  md:text-base" type="text" name="" id="" placeholder=" وزن/تعداد">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-[10px] md:text-sm">
                        شماره سند
                    </legend>
                    <input class="w-full outline-none text-xs  md:text-base" type="text" name="" id="" placeholder=" شماره سند">
                </fieldset>
                <button class="w-full md:w-fit font-bold text-xs md:text-base py-3 md:px-13 mt-2 col-span-1 md:text-right border-1 border-(--border-dashbrd) rounded-md text-center">اعمال</button>
            </form>
            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto">
                <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                    <div class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex flex-col md:flex-row">
                        <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                        <span class="hidden md:flex">|</span>
                        <span class="">ظرفیت باقیمانده 445 نفر</span>
                    </div>
                </div>
                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-xs lg:text-base">
                            <th class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ردیف
                            </th>
                            <th class="min-w-40 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                نام و نام خانوادگی
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                کالا
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                تعداد/وزن
                            </th>
                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                مظنه
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                مبلغ
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                شماره سند
                            </th>
                            <th class="min-w-33 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                تاریخ معامله
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="item_fayle text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-around">
                                <div class="w-18 px-2 py-1 bg-(--primary-dashbrd)/30 text-(--primary-dashbrd) text-center">
                                    خریدار
                                </div>
                                <div class="w-fit">
                                    ماهان فضلی
                                </div>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                شمش نقره
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1 گرم
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1.500.000
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                146.254.687.254
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 text-(--danger-dashbrd) rounded-md border-1 bordre-(--danger-dashbrd) p-1 cursor-pointer">
                                    تلاش مجدد
                                </span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-5/12 text-right">15:32</span>
                                <span class="w-2/12 text-right mx-2">|</span>
                                <span class="w-5/12 text-left">1406/3/5</span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                    تایید شده
                                </span>
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                <button class="open-popup-fayle w-fit text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md p-1 cursor-pointer text-center">
                                    <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                    </svg>
                                </button>
                                <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                        <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                        <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                            <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                                <div class="font-bold">مشاهده فیش واریزی</div>
                                                <div class="close-popup-fayle">
                                                    <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-6 gap-5 mt-5">
                                                <div class="col-span-6 flex items-center border-1 border-(--border-dashbrd) rounded-lg divide-x-1 divide-(--border-dashbrd) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">نام :</span>
                                                        <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره :</span>
                                                        <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">تاریخ ثبت :</span>
                                                        <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                    <div class="w-full bg-white divide-x-1 divide-(--border-dashbrd) flex items-center gap-2 p-2 rounded-lg">
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره کارت :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                        </div>
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره شبا :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6  border-1 border-(--border-dashbrd) rounded-lg p-2 flex items-center justify-center">
                                                    <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">تایید شده توسط :</span>
                                                    <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">مبلغ :</span>
                                                    <span>
                                                        <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">ریال</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </td>
                        </tr>
                        <tr class="item_fayle text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-around">
                                <div class="w-18 px-2 py-1 bg-(--danger-dashbrd)/30 text-(--danger-dashbrd) text-center">
                                    فروشنده
                                </div>
                                <div class="w-fit">
                                    ماهان فضلی
                                </div>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                شمش نقره
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1 گرم
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1.500.000
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                146.254.687.254
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-20 h-10 text-(--info-dashbrd) rounded-md border-1 bordre-(--info-dashbrd) p-1 cursor-pointer">
                                    ثبت سند
                                </span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-5/12 text-right">15:32</span>
                                <span class="w-2/12 text-right mx-2">|</span>
                                <span class="w-5/12 text-left">1406/3/5</span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 bg-(--danger-dashbrd)/20 text-(--danger-dashbrd) rounded-md border-1 bordre-(--danger-dashbrd) p-1 cursor-default">
                                    عدم تایید
                                </span>
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                <button class="open-popup-fayle w-fit text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md p-1 cursor-pointer text-center">
                                    <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                    </svg>
                                </button>
                                <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                        <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                        <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                            <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                                <div class="font-bold">مشاهده فیش واریزی</div>
                                                <div class="close-popup-fayle">
                                                    <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-6 gap-5 mt-5">
                                                <div class="col-span-6 flex items-center border-1 border-(--border-dashbrd) rounded-lg divide-x-1 divide-(--border-dashbrd) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">نام :</span>
                                                        <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره :</span>
                                                        <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">تاریخ ثبت :</span>
                                                        <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                    <div class="w-full bg-white divide-x-1 divide-(--border-dashbrd) flex items-center gap-2 p-2 rounded-lg">
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره کارت :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                        </div>
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره شبا :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6  border-1 border-(--border-dashbrd) rounded-lg p-2 flex items-center justify-center">
                                                    <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">تایید شده توسط :</span>
                                                    <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">مبلغ :</span>
                                                    <span>
                                                        <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">ریال</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </td>
                        </tr>
                        <tr class="item_fayle text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-around">
                                <div class="w-18 px-2 py-1 bg-(--primary-dashbrd)/30 text-(--primary-dashbrd) text-center">
                                    خریدار
                                </div>
                                <div class="w-fit">
                                    ماهان فضلی
                                </div>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                شمش نقره
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1 گرم
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1.500.000
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                146.254.687.254
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                14587
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-5/12 text-right">15:32</span>
                                <span class="w-2/12 text-right mx-2">|</span>
                                <span class="w-5/12 text-left">1406/3/5</span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 bg-zinc-400/20 text-zinc-500 rounded-md border-1 bordre-zinc-400 p-1 cursor-default">
                                    لغو شده
                                </span>
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-3">
                                <button class="open-popup-fayle w-fit text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md p-1 cursor-pointer text-center">
                                    <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z" />
                                    </svg>
                                </button>
                                <!-- <div class="popup-fayle fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 hidden flex items-center justify-center">
                                        <div class="close-popup-fayle2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                        <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                            <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                                <div class="font-bold">مشاهده فیش واریزی</div>
                                                <div class="close-popup-fayle">
                                                    <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                        <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-6 gap-5 mt-5">
                                                <div class="col-span-6 flex items-center border-1 border-(--border-dashbrd) rounded-lg divide-x-1 divide-(--border-dashbrd) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">نام :</span>
                                                        <span class="text-[10px] md:text-base font-bold">امید حسن نژاد</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره :</span>
                                                        <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                    </div>
                                                    <div class="w-4/12 flex flex-col sm:flex-row">
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">تاریخ ثبت :</span>
                                                        <span class="text-[10px] md:text-base font-bold">1405/2/7</span>
                                                    </div>
                                                </div>
                                                <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                    <div class="w-full bg-white divide-x-1 divide-(--border-dashbrd) flex items-center gap-2 p-2 rounded-lg">
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره کارت :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">6037 9975 4568 2589</span>
                                                        </div>
                                                        <div class="w-6/12 flex flex-col sm:flex-row gap-2">
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره شبا :</span>
                                                            <span class="text-[8px] sm:text-xs md:text-base font-bold">IR 584100000005478925784</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-span-6  border-1 border-(--border-dashbrd) rounded-lg p-2 flex items-center justify-center">
                                                    <img class="w-[90%] h-50 bg-zinc-300" src="" alt="">
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-2 py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">تایید شده توسط :</span>
                                                    <span class="text-[10px] md:text-base font-bold">محمد رضا عولیا فام</span>
                                                </div>
                                                <div class="col-span-3 bg-zinc-100 px-1 md:px-2 py-2 md:py-4 rounded-md  flex flex-col sm:flex-row">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">مبلغ :</span>
                                                    <span>
                                                        <span class="text-[10px] md:text-base font-bold">500.000.000</span>
                                                        <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">ریال</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </td>
                        </tr>
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



@endsection