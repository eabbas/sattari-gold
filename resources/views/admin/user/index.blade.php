@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | کاربران')
@section('content')
@if (session('message'))
<div
    class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
    <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
</div>
@endif

<!-- list_users_start -->
<div class="w-full flex flex-col gap-3 justify-start items-center">
    <!-- لیست مشتریان / هدر -->
    <section class="w-full mx-auto bg-(--secondary-dashbrd) flex items-center justify-between border-1 border-(--border-dashbrd) p-2 2 rounded-md">
        <h2 class="text-base md:text-xl font-bold">لیست مشتریان</h2>
        <div id="openPopup-userList" class="w-fit bg-(--info-dashbrd) text-xs md:text-base text-(--color-surface-dashbrd) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
            <span class="">
                <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z"></path>
                </svg>
            </span>
            <div class="">مشتری جدید</div>
        </div>
        <div id="popup-userList" class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
            <div id="closePopup-userList2" class="close-popup-edit2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
            <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                    <div class="font-bold"> مشتری جدید</div>
                    <div id="closePopup-userList">
                        <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                        </svg>
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                    <label class="col-span-3 text-xs md:text-sm lg:text-base" for="name">
                        نام و نام خانوادگی
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="name" placeholder="نام و نام خانوادگی">
                    </label>
                    <label class="col-span-3 text-xs md:text-sm lg:text-base" for="number">
                        شماره موبایل
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="number" placeholder="شماره موبایل">
                    </label>
                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="numberMeli">
                        کدملی
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="numberMeli" placeholder="کدملی">
                    </label>
                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="dey">
                        تاریخ تولد
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="dey" placeholder="تاریخ تولد">
                    </label>
                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                        معرف
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="user" placeholder="مپپلا حسین عولیا نژاد">
                    </label>
                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                        کد حسابداری
                        <input class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="user" placeholder="کد حسابداری">
                    </label>
                    <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="categoryName">
                        نام دسته‌بندی
                        <select class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="categoryName">
                            <option value="">salam</option>
                            <option value="">salam</option>
                            <option value="" selected>boy</option>
                            <option value="">salam</option>
                        </select>
                    </label>
                    <label class="col-span-6 text-xs md:text-sm lg:text-base" for="text">
                        توضیحات
                        <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="text"></textarea>
                    </label>
                    <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashbrd) text-(--primary-dashbrd) py-4 rounded-md">ثبت مشتری</button>
                    <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashbrd) text-(--danger-dashbrd) py-4 rounded-md"> لغو</button>
                </div>
            </div>
        </div>
    </section>
    <!-- لیست مشتریان / لسیت -->
    <section id="confirmed_pending" class="w-full mx-auto rounded-md border-1 border-(--border-dashbrd) mt-5 pb-10 overflow-hidden">
        <div class="w-full flex items-center bg-zinc-300">
            <div onclick="conpen('confirmed', this)" class="w-6/12 bg-white text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers">مشتریان تایید شده</div>
            <div onclick="conpen('pending', this)" class="w-6/12 bg-zinc-200 text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers"> مشتریان در انتظار تایید</div>
        </div>
        <div id="confirmed" class="w-full">
            <form action="" class="w-full bg-white grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2 py-5 px-2">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd) text-xs md:text-base" type="text" name="" id="" placeholder="نام و نام خانوادگی">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd) text-xs md:text-base" type="text" name="" id="" placeholder="شماره موبایل">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd) text-xs md:text-base" type="text" name="" id="" placeholder="کدملی">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd) text-xs md:text-base" type="text" name="" id="" placeholder="کد حساب داری">
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        دسته بندی
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" name="" id="" placeholder="نام">
                </fieldset>
                <fieldset class="w-full border-1 border-(--border-dashbrd) rounded-md p-2">
                    <legend class="px-2 text-(--text-secondary-dashbrd) text-xs md:text-sm">
                        وضعیت مشتری
                    </legend>
                    <input class="w-full outline-none text-xs md:text-base" type="text" name="" id="" placeholder="نام">
                </fieldset>
                <button class="w-full md:w-fit py-3 md:px-13 mt-2 col-span-2 md:text-right border-1 border-(--border-dashbrd) rounded-md text-center">اعمال</button>
            </form>
            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto">
                <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                    <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                        <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                        <label class="text-xs md:text-base" for="selectAll">
                            انتخاب همه
                        </label>
                    </div>
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
                                آخرین بازدید
                            </th>
                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                آخرین معامله
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                کد ملی
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                کد حسابداری
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                دسته‌بندی
                            </th>
                            <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="item_list text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
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
                                -
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                    فعال
                                </span>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                قلک طلا
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center gap-3">
                                <button class="open-popup-wallet w-3/6 text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-3 py-2 cursor-pointer">
                                    کیف پول
                                </button>
                                <div class="popup-wallet fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                    <div class="close-popup-wallet2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                    <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                        <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                            <div class="font-bold">کیف پول</div>
                                            <div class="close-popup-wallet">
                                                <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-5 mt-5">
                                            <div class="col-span-6 flex items-center border-1 border-(--border-dashbrd) rounded-lg divide-x-1 divide-(--border-dashbrd) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                <div class="w-6/12">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">نام :</span>
                                                    <span class="text-xs md:text-base font-bold">امید حسن نژاد</span>
                                                </div>
                                                <div class="w-6/12">
                                                    <span class="text-xs md:text-base text-(--text-secondary-dashbrd) ml-1">شماره :</span>
                                                    <span class="text-[10px] md:text-base font-bold">09123456789</span>
                                                </div>
                                            </div>
                                            <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                <div class="w-full bg-white divide-y-1 divide-(--border-dashbrd) p-2 rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pb-2">
                                                            <span class="">
                                                                <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                    <path d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                                                </svg>
                                                            </span>
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) font-bold">
                                                                موجودی ریال
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pb-2">95.478.555</div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pt-2">
                                                            <span class="text-(--text-secondary-dashbrd) text-xs md:text-sm">
                                                                موجودی قابل برداشت
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pt-2">
                                                            <span class="">
                                                                95.478.555
                                                            </span>
                                                            <span class="text-(--text-secondary-dashbrd) text-[6px] md:text-xs">
                                                                تومان
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-span-6 flex items-center border-1 border-(--border-dashbrd) rounded-lg divide-x-1 divide-(--border-dashbrd) px-2 py-3 gap-2">
                                                <label for="plass" class="w-6/12 flex items-center gap-1 md:gap-3">
                                                    <input class="accent-(--primary-dashbrd) size-4 md:size-5" type="radio" name="yes" id="plass">
                                                    <span class="text-xs md:text-base font-bold">افزایش موجودی</span>
                                                </label>
                                                <label for="maiez" class="w-6/12 flex items-center gap-1 md:gap-3">
                                                    <input class="accent-(--primary-dashbrd) size-4 md:size-5" type="radio" name="yes" id="maiez">
                                                    <span class="text-xs md:text-base font-bold">کاهش موجودی</span>
                                                </label>
                                            </div>
                                            <label class="col-span-3" for="categoryName">
                                                نوع تراکنش
                                                <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="categoryName">
                                                    <option value="">طلا</option>
                                                    <option value="">نقره</option>
                                                    <option value="" selected>ریال</option>
                                                    <option value="">شمش</option>
                                                </select>
                                            </label>
                                            <label class="col-span-3" for="welcome">
                                                مبلغ
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="" placeholder="ریال">
                                            </label>
                                            <label class="col-span-6" for="text">
                                                توضیحات
                                                <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="text"></textarea>
                                            </label>
                                            <button class="col-span-3 border-1 border-(--primary-dashbrd) text-(--primary-dashbrd) py-4 rounded-md">ثبت</button>
                                            <button class="col-span-3 border-1 border-(--danger-dashbrd) text-(--danger-dashbrd) py-4 rounded-md"> لغو</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="open-popup-look w-2/6 text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-2 py-2 cursor-pointer">
                                    بیشتر
                                </button>
                                <div class="popup-look fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                    <div class="close-popup-look2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                    <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                        <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                            <div class="font-bold text-sm md:text-xl">اطلاعات بیشتر</div>
                                            <div class="close-popup-look">
                                                <svg class="size-4 md:size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-5 mt-5">
                                            <div class="col-span-6 flex items-center justify-between">
                                                <div class="font-bold text-sm md:text-lg">مشخصات کاربر</div>
                                                <div class="open-popup-look-edit w-fit text-(--primary-dashbrd) font-bold border-1 border-(--primary-dashbrd) rounded-md p-2 cursor-pointer">ویرایش</div>
                                            </div>
                                            <div class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                                <span class="text-xs md:text-base text-(--text-secondary-dashbrd)">نام :</span>
                                                <span class="text-xs md:text-base font-semibold">حسین ستاره</span>
                                            </div>
                                            <div class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                                <span class="text-[10px] md:text-base text-(--text-secondary-dashbrd)">شماره موبایل :</span>
                                                <span class="text-xs md:text-base font-semibold">09123456789</span>
                                            </div>
                                            <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                <span class="text-[10px] md:text-base text-(--text-secondary-dashbrd)">معرف :</span>
                                                <span class="text-xs md:text-base font-semibold">محمد رضا عولیافان</span>
                                            </div>
                                            <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                <span class="text-[10px] md:text-base text-(--text-secondary-dashbrd)">کد حساب داری :</span>
                                                <span class="text-xs md:text-base font-semibold">-</span>
                                            </div>
                                            <div class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                <span class="text-[10px] md:text-base text-(--text-secondary-dashbrd)">نام دستع بندی :</span>
                                                <span class="text-xs md:text-base font-semibold">-</span>
                                            </div>
                                            <div class="col-span-6 bg-zinc-100 p-3 rounded-lg flex items-center justify-between gap-2">
                                                <span class="text-[10px] md:text-base text-(--text-secondary-dashbrd)">ارسال اطلاعات ورود از طریق پیامک به مشتری</span>
                                                <button class="bg-(--primary-dashbrd) text-sm md:text-base text-white font-semibold rounded-lg px-5 md:px-10 py-1 md:py-3 cursor-pointer">ارسال</button>
                                            </div>
                                            <div class="col-span-6 text-sm  md:text-lg font-bold">کیف پول</div>
                                            <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                <div class="w-full bg-white divide-y-1 divide-(--border-dashbrd) p-2 rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pb-2">
                                                            <span class="">
                                                                <svg class="size-5 fill-(--primary-dashbrd)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                    <path d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                                                </svg>
                                                            </span>
                                                            <span class="text-xs md:text-base text-(--text-secondary-dashbrd) font-bold">
                                                                موجودی ریال
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pb-2">95.478.555</div>
                                                    </div>
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center gap-3 pt-2">
                                                            <span class="text-(--text-secondary-dashbrd) text-xs md:text-sm">
                                                                موجودی قابل برداشت
                                                            </span>
                                                        </div>
                                                        <div class="font-bold pt-2">
                                                            <span class="">
                                                                95.478.555
                                                            </span>
                                                            <span class="text-(--text-secondary-dashbrd) text-[6px] md:text-xs">
                                                                تومان
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="open-popup-edited w-1/6 text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center">
                                    <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                    </svg>
                                </button>
                                <div class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                    <div class="close-popup-edit2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                    <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                        <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                            <div class="font-bold">ویرایش اطلاعات</div>
                                            <div class="close-popup-edit">
                                                <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                                            <label class="col-span-3 text-xs md:text-sm lg:text-base" for="name">
                                                نام و نام خانوادگی
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="name">
                                            </label>
                                            <label class="col-span-3 text-xs md:text-sm lg:text-base" for="number">
                                                شماره موبایل
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="number">
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="numberMeli">
                                                کدملی
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="numberMeli">
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="dey">
                                                تاریخ تولد
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="dey">
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                                                معرف
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="user">
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="user">
                                                کد حسابداری
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="user">
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="categoryName">
                                                نام دسته‌بندی
                                                <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="categoryName">
                                                    <option value="">salam</option>
                                                    <option value="">salam</option>
                                                    <option value="" selected>boy</option>
                                                    <option value="">salam</option>
                                                </select>
                                            </label>
                                            <label class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base" for="welcome">
                                                تعداد ورودی همزنان
                                                <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="welcome">
                                                    <option value="">salam</option>
                                                    <option value="">salam</option>
                                                    <option value="" selected>boy</option>
                                                    <option value="">salam</option>
                                                </select>
                                            </label>
                                            <label class="col-span-6 text-xs md:text-sm lg:text-base" for="text">
                                                یاداشت
                                                <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="text"></textarea>
                                            </label>
                                            <label class="border-1 border-(--border-dashbrd) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer" for="onlyAvailableDesktop">
                                                <div class="text-zinc-700 text-sm">
                                                    وضعیت مشتری (فعال)
                                                </div>
                                                <div class="relative inline-flex cursor-pointer items-center">
                                                    <input class="peer sr-only" id="onlyAvailableDesktop" type="checkbox">
                                                    <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashbrd) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashbrd-dark-dashbrd)"></div>
                                                </div>
                                            </label>
                                            <label class="border-1 border-(--border-dashbrd) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer" for="password">
                                                <div class="text-zinc-700 text-sm">
                                                    ورود با رمز عبور
                                                </div>
                                                <div class="relative inline-flex cursor-pointer items-center">
                                                    <input class="peer sr-only" id="password" type="checkbox">
                                                    <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashbrd) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashbrd-dark-dashbrd)"></div>
                                                </div>
                                            </label>
                                            <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashbrd) text-(--primary-dashbrd) py-4 rounded-md">ویرایش</button>
                                            <button class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashbrd) text-(--danger-dashbrd) py-4 rounded-md"> لغو</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="pending" class="w-full hidden">
            <form action="" class="w-full bg-white grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2 py-5 px-2">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="" placeholder="نام و نام خانوادگی">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="" placeholder="شماره موبایل">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="" placeholder="کدملی">
                <input class="w-full border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="" placeholder="کد حساب داری">
                <button class="w-fit px-13 py-3 mt-2 col-span-2 md:col-span-4 border-1 border-(--border-dashbrd) rounded-md">اعمال</button>
            </form>
            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto">

                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm mt-5">
                    <thead class="w-full">
                        <tr class="bg-gray-100 text-xs lg:text-base">
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ردیف
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                نام و نام خانوادگی
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                شماره موبایل
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                کد ملی
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                زمان ثبت‌نام
                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="item_2 text-xs lg:text-base">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                ماهان فضلی
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                09179256525
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                35478952
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                16:50 | 1405/6/6
                            </td>
                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center flex items-center gap-3">
                                <button class="open-look-cont w-3/6 bg-(--primary-dashbrd) text-white rounded-md px-3 py-2 cursor-pointer text-nowrap">
                                    تایید و بازبینی
                                </button>
                                <div class="popup-look-cont fixed z-50 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                    <div class="close-popup-look-cont2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                                    <form action="" class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2">
                                        <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashbrd) pb-2">
                                            <div class="text-sm md:text-base font-bold text-nowrap">بازبینی اطلاعات مشتری و تایید</div>
                                            <div class="close-popup-look-cont">
                                                <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                            <label class="col-span-1 md:col-span-2" for="">
                                                کد ملی
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="">
                                            </label>
                                            <label class="col-span-1 md:col-span-2" for="">
                                                تاریخ تولد
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="">
                                            </label>
                                            <label class="col-span-1 md:col-span-2" for="">
                                                معرف
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="">
                                            </label>
                                            <label class="col-span-1 md:col-span-2" for="">
                                                کد حسابداری
                                                <input class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" type="text" name="" id="">
                                            </label>
                                            <label class="col-span-1 md:col-span-2" for="categoryNameS">
                                                نام دسته‌بندی
                                                <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="categoryNameS">
                                                    <option value="">salam</option>
                                                    <option value="">salam</option>
                                                    <option value="" selected>boy</option>
                                                    <option value="">salam</option>
                                                </select>
                                            </label>
                                            <label class="col-span-1 md:col-span-2" for="welcomS">
                                                تعداد ورودهای همزنان
                                                <select class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="welcomS">
                                                    <option value="">salam</option>
                                                    <option value="">salam</option>
                                                    <option value="" selected>boy</option>
                                                    <option value="">salam</option>
                                                </select>
                                            </label>
                                            <label class="col-span-2 md:col-span-6" for="text">
                                                یادداشت
                                                <textarea class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashbrd) rounded-md p-2 outline-(--border-dashbrd)" name="" id="text"></textarea>
                                            </label>
                                            <label class="border-1 border-(--border-dashbrd) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-3 flex items-center justify-between w-full py-4 px-4 cursor-pointer" for="passwordd">
                                                <div class="text-zinc-700 text-sm">
                                                    ورود با رمز عبور
                                                </div>
                                                <div class="relative inline-flex cursor-pointer items-center">
                                                    <input class="peer sr-only" id="passwordd" type="checkbox">
                                                    <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashbrd) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashbrd-dark-dashbrd)"></div>
                                                </div>
                                            </label>
                                            <label for="massege" class="col-span-2 md:col-span-6 flex items-center justify-start gap-3 text-black">
                                                <input id="massege" type="checkbox" name="" class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                ارسال پیامک تایید ثبت نام در اپلیکیشن
                                            </label>
                                            <button class="col-span-1 md:col-span-3 border-1 border-(--primary-dashbrd) text-(--primary-dashbrd) py-4 rounded-md font-bold">ثبت</button>
                                            <button class="col-span-1 md:col-span-3 border-1 border-(--danger-dashbrd) text-(--danger-dashbrd) py-4 rounded-md font-bold"> لغو</button>
                                        </div>
                                    </form>
                                </div>
                                <button class="w-3/6 bg-(--danger-dashbrd) text-white rounded-md px-2 py-2 cursor-pointer text-nowrap">
                                    حذف درخواست
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- list_users_start -->
<script>

 //   لسیت مشتریان / پاپاپ ایجاد مشتری جدید
        let openPopup_userList = document.getElementById("openPopup-userList");
        let closePopup_userList = document.getElementById("closePopup-userList");
        let closePopup_userList2 = document.getElementById("closePopup-userList2");
        let popup_userList = document.getElementById("popup-userList");

        openPopup_userList.addEventListener("click", () => {
            popup_userList.classList.remove("invisible");
            popup_userList.classList.remove("opacity-0");
            popup_userList.classList.add("opacity-100");
            popup_userList.classList.add("visible");
        });
        closePopup_userList.addEventListener("click", () => {
            popup_userList.classList.add("invisible");
            popup_userList.classList.add("opacity-0");
            popup_userList.classList.remove("opacity-100");
            popup_userList.classList.remove("visible");
        });
        closePopup_userList2.addEventListener("click", () => {
            popup_userList.classList.add("invisible");
            popup_userList.classList.add("opacity-0");
            popup_userList.classList.remove("opacity-100");
            popup_userList.classList.remove("visible");
        });



        // لیست مشتری / لیست مشتری - مشتریان در انتظار تایید
        let confirmed = document.getElementById("confirmed");
        let pending = document.getElementById("pending");
        let confirmed_pending = document.getElementById("confirmed_pending");

        function conpen(state, el) {
            document.querySelectorAll('.customers').forEach(customer => {
                customer.classList.remove('bg-white')
                customer.classList.add('bg-zinc-200')
            })
            if (state == 'pending') {
                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                confirmed.classList.add("hidden")
                pending.classList.remove("hidden")
            }
            if (state == 'confirmed') {
                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                confirmed.classList.remove("hidden")
                pending.classList.add("hidden")
            }
        }


        // لیست مشتری / انتخواب همه
        const selectAll = document.querySelector("#selectAll");
        const rowCheckboxes = document.querySelectorAll(".row-checkbox");

        // انتخاب یا لغو انتخاب همه
        selectAll.addEventListener("change", () => {

            rowCheckboxes.forEach((checkbox) => {
                checkbox.checked = selectAll.checked;
            });

        });


        // بررسی انتخاب دستی ردیف‌ها
        rowCheckboxes.forEach((checkbox) => {

            checkbox.addEventListener("change", () => {

                const allSelected = [...rowCheckboxes]
                    .every((checkbox) => checkbox.checked);

                selectAll.checked = allSelected;

            });

        });

        // لیست مشتریان / کیف پوا - بیشتر - ادیت
        const item_list = document.querySelectorAll(".item_list");

        // console.log(items)
        item_list.forEach((item_list) => {

            const openBtn_edited = item_list.querySelector(".open-popup-edited");
            console.log(openBtn_edited)
            const openBtn_look_edit = item_list.querySelector(".open-popup-look-edit");
            const popup_edit = item_list.querySelector(".popup-edit");
            const closeBtn_edit = item_list.querySelector(".close-popup-edit");
            const closeBtn_edit2 = item_list.querySelector(".close-popup-edit2");
            const openBtn_look = item_list.querySelector(".open-popup-look");
            const popup_look = item_list.querySelector(".popup-look");
            const closeBtn_look = item_list.querySelector(".close-popup-look");
            const closeBtn_look2 = item_list.querySelector(".close-popup-look2");
            const openBtn_wallet = item_list.querySelector(".open-popup-wallet");
            const popup_wallet = item_list.querySelector(".popup-wallet");
            const closeBtn_wallet = item_list.querySelector(".close-popup-wallet");
            const closeBtn_wallet2 = item_list.querySelector(".close-popup-wallet2");

            openBtn_edited.addEventListener("click", () => {
                popup_edit.classList.remove("invisible");
                popup_edit.classList.remove("opacity-0");
                popup_edit.classList.add("opacity-100");
                popup_edit.classList.add("visible");
            });

            closeBtn_edit.addEventListener("click", () => {
                popup_edit.classList.add("invisible");
                popup_edit.classList.add("opacity-0");
                popup_edit.classList.remove("opacity-100");
                popup_edit.classList.remove("visible");
            });
            closeBtn_edit2.addEventListener("click", () => {
                popup_edit.classList.add("invisible");
                popup_edit.classList.add("opacity-0");
                popup_edit.classList.remove("opacity-100");
                popup_edit.classList.remove("visible");
            });


            openBtn_look_edit.addEventListener("click", () => {
                popup_edit.classList.remove("invisible");
                popup_edit.classList.remove("opacity-0");
                popup_edit.classList.add("visible");
                popup_edit.classList.add("opacity-100");
                popup_look.classList.remove("visible");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
            });


            openBtn_look.addEventListener("click", () => {
                popup_look.classList.remove("invisible");
                popup_look.classList.remove("opacity-0");
                popup_look.classList.add("opacity-100");
                popup_look.classList.add("visible");
            });
            closeBtn_look.addEventListener("click", () => {
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.remove("visible");
            });
            closeBtn_look2.addEventListener("click", () => {
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.remove("visible");
            });


            openBtn_wallet.addEventListener("click", () => {
                popup_wallet.classList.remove("invisible");
                popup_wallet.classList.remove("opacity-0");
                popup_wallet.classList.add("opacity-100");
                popup_wallet.classList.add("visible");
            });
            closeBtn_wallet.addEventListener("click", () => {
                popup_wallet.classList.add("invisible");
                popup_wallet.classList.add("opacity-0");
                popup_wallet.classList.remove("opacity-100");
                popup_wallet.classList.remove("visible");
            });
            closeBtn_wallet2.addEventListener("click", () => {
                popup_wallet.classList.add("invisible");
                popup_wallet.classList.add("opacity-0");
                popup_wallet.classList.remove("opacity-100");
                popup_wallet.classList.remove("visible");
            });



        });


        // لیست مشتری / تایید و بازبینی
        const items_2 = document.querySelectorAll(".item_2");

        items_2.forEach((item_2) => {


            const openBtn_look_cont = item_2.querySelector(".open-look-cont");
            const popup_look_cont = item_2.querySelector(".popup-look-cont");
            const closeBtn_look_cont = item_2.querySelector(".close-popup-look-cont");
            const closeBtn_look_cont2 = item_2.querySelector(".close-popup-look-cont2");

            openBtn_look_cont.addEventListener("click", () => {
                popup_look_cont.classList.remove("invisible");
                popup_look_cont.classList.remove("opacity-0");
                popup_look_cont.classList.add("opacity-100");
                popup_look_cont.classList.add("visible");
            });
            closeBtn_look_cont.addEventListener("click", () => {
                popup_look_cont.classList.add("invisible");
                popup_look_cont.classList.add("opacity-0");
                popup_look_cont.classList.remove("opacity-100");
                popup_look_cont.classList.remove("visible");
            });
            closeBtn_look_cont2.addEventListener("click", () => {
                popup_look_cont.classList.add("invisible");
                popup_look_cont.classList.add("opacity-0");
                popup_look_cont.classList.remove("opacity-100");
                popup_look_cont.classList.remove("visible");
            });
        });



</script>
<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection