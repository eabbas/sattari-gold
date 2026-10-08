@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | واریز و برداشت ها')
@section('content')
<!-- واریز و برداشت -->
<div class="w-full flex flex-col gap-3 justify-start items-center">
    <!-- واریز و برداشت / هدر -->
    <section class="w-full mx-auto bg-(--secondary-dashbrd) flex items-center justify-between border-1 border-(--border-dashbrd) p-2 2 rounded-md">
        <h2 class="text-base md:text-xl font-bold">واریز و برداشت</h2>
        <div id="openPopup-deposit" class="w-fit bg-(--info-dashbrd) text-xs md:text-base text-(--color-surface-dashbrd) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
            <span class="">
                <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"></path>
                </svg>
            </span>
            <div class="">خروجی اکسل</div>
        </div>
        <div id="popup-deposit" class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
            <div id="closePopup-deposit2" class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                    <div class="font-bold">خروجی اکسل</div>
                    <div id="closePopup-deposit">
                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- واریز و برداشت / لسیت -->
    <section class="w-full mx-auto rounded-md border-1 border-(--border-dashbrd) mt-5 pb-10 overflow-hidden">
        <div class="w-full">
            <form action="" class="w-full bg-white grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2 py-5 px-2">
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        نام و نام خانوادگی
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" name="" id="" placeholder=" نام و نام خانوادگی" value="همه">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        تراکنش
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
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        نوع تراکنش
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
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        تاریخ
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" name="" id="" placeholder="تاریخ">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        وضعیت
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" list="status" name="" id="" placeholder="وضعیت" value="همه">
                    <datalist id="status">
                        <option value="همه"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                        <option value="تهران"></option>
                    </datalist>
                </fieldset>
                <button class="w-full md:w-fit py-3 md:px-13 mt-2 col-span-2 md:col-span-3 md:text-right border-1 border-(--border-dashbrd) rounded-md text-center">اعمال</button>
            </form>
            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto">
                <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                    <div class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd)  hidden md:flex flex-col md:flex-row">
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
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                نام و نام خانوادگی
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                شماره موبایل
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                تراکنش
                            </th>
                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                نوع تراکنش
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                مبلغ/وزن
                            </th>
                            <th class="min-w-33 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                تاریخ درخواست
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                شماره سند
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
                        <tr class="item_deposit text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                ماهان فضلی
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                09179256525
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                1 هفته قبل
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                -
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                35478952
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-5/12 text-right">15:32</span>
                                <span class="w-2/12 text-right mx-2">|</span>
                                <span class="w-5/12 text-left">1406/3/5</span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                -
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                    تایید شده
                                </span>
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center gap-3">
                                <button class="open-popup-deposit w-full text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-3 py-2 cursor-pointer">
                                    مشاهده
                                </button>
                                <div class="popup-deposit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
                                    <div class="close-popup-deposit2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                    <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                        <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                            <div class="font-bold">مشاهده فیش واریزی</div>
                                            <div class="close-popup-deposit">
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
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- واریز و برداشت -->
<script>
     // واریز و برداشت / اکسل
        let openPopup_deposit = document.getElementById("openPopup-deposit");
        let closePopup_deposit = document.getElementById("closePopup-deposit");
        let closePopup_deposit2 = document.getElementById("closePopup-deposit2");
        let popup_deposit = document.getElementById("popup-deposit");

        openPopup_deposit.addEventListener("click", () => {
            popup_deposit.classList.remove("invisible");
            popup_deposit.classList.remove("opacity-0");
            popup_deposit.classList.add("opacity-100");
            popup_deposit.classList.add("visible");
        });
        closePopup_deposit.addEventListener("click", () => {
            popup_deposit.classList.add("invisible");
            popup_deposit.classList.add("opacity-0");
            popup_deposit.classList.remove("opacity-100");
            popup_deposit.classList.remove("visible");
        });
        closePopup_deposit2.addEventListener("click", () => {
            popup_deposit.classList.add("invisible");
            popup_deposit.classList.add("opacity-0");
            popup_deposit.classList.remove("opacity-100");
            popup_deposit.classList.remove("visible");
        });

        //  واریز و برداشت / مشاهده
        const items_deposit = document.querySelectorAll(".item_deposit");

        items_deposit.forEach((item_deposit) => {

            const openBtn_deposit = item_deposit.querySelector(".open-popup-deposit");
            const popup_deposit = item_deposit.querySelector(".popup-deposit");
            const closeBtn_deposit = item_deposit.querySelector(".close-popup-deposit");
            const closeBtn_deposit2 = item_deposit.querySelector(".close-popup-deposit2");

            openBtn_deposit.addEventListener("click", () => {
                popup_deposit.classList.remove("invisible");
                popup_deposit.classList.remove("opacity-0");
                popup_deposit.classList.add("opacity-100");
                popup_deposit.classList.add("visible");
            });
            closeBtn_deposit.addEventListener("click", () => {
                popup_deposit.classList.add("invisible");
                popup_deposit.classList.add("opacity-0");
                popup_deposit.classList.remove("opacity-100");
                popup_deposit.classList.remove("visible");
            });
            closeBtn_deposit2.addEventListener("click", () => {
                popup_deposit.classList.add("invisible");
                popup_deposit.classList.add("opacity-0");
                popup_deposit.classList.remove("opacity-100");
                popup_deposit.classList.remove("visible");
            });



        });
</script>
@endsection