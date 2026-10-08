@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | مدیریت کالا ها ')
@section('content')


<!-- manage_product_start -->
<div class="w-full flex flex-col gap-5 lg:justify-start justify-center items-center">
    <section class="w-full mx-auto bg-white flex items-center justify-between border-1 border-(--border-dashbrd) p-2 2 rounded-md">
        <h2 class="text-base md:text-xl font-bold">مدیریت کالا ها</h2>
    </section>
    <section id="seke_nogre" class="w-full mx-auto rounded-md border-1 border-(--border-dashbrd) mt-5 pb-10 overflow-hidden">
        <div class="w-full flex items-center bg-zinc-300">
            <div onclick="conpen_product('seke', this)" class="w-6/12 bg-white text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer products">طلا</div>
            <div onclick="conpen_product('nogre', this)" class="w-6/12 bg-zinc-200 text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer products">نقره</div>
        </div>
        <div id="seke" class="w-full ">

            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto bg-white rounded-xl">
                <div class="w-full flex justify-between items-center px-2 py-3">
                    <div class="flex items-center justify-start gap-2">
                        <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                            <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                            <label class="text-xs md:text-base" for="selectAll">
                                انتخاب همه
                            </label>
                        </div>
                        <a href="" class="px-3 py-1.5 rounded-xl bg-red-200 border-2 border-(--disactive)">
                            حذف
                        </a>
                        <div class="bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd)  hidden md:flex flex-col md:flex-row">
                            <span class="">تعداد 5 سگخ ار 10 سکه انتخاب شد .</span>
                            <!-- <span class="hidden md:flex">|</span>
                                        <span class="">ظرفیت باقیمانده 445 نفر</span> -->
                        </div>
                    </div>
                    <div class="flex justify-start items-center gap-2">
                        <a href="" class="px-4 py-2 rounded-lg bg-white border-2 border-(--active) font-bold max-xl:text-sm max-sm:text-xs">
                            گروه بتدی سکه ها
                        </a>
                        <a href="" class="px-4 py-2 rounded-lg bg-(--active) border-2 border-(--active) font-bold max-xl:text-sm max-sm:after:text-xs text-white">
                            افزودن به خسابداری
                        </a>
                    </div>
                </div>
                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
                            <th class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ردیف
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                عتوان
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                گروه
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                فیمت فروش به مشتری
                            </th>
                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                سود خرید از مشتری
                            </th>

                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت فروش به مشتری

                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت خرید از مشتری
                            </th>

                            <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="item text-xs lg:text-base text-nowrap">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                تمام سکه
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                -
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                140-250
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex gap-10 justify-between font-bold">
                                    <span>0</span>
                                    <span>خط</span>
                                </div>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex justify-center items-center">
                                    <span class="px-3 py-1.5 rounded-xl bg-green-200 border-2 border-(--active) text-xs">فعال</span>
                                </div>
                            </td>

                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex justify-center items-center">
                                    <span class="px-3 py-1.5 rounded-xl bg-red-200 border-2 border-(--disactive) text-xs">غیر فعال</span>
                                </div>
                            </td>

                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center gap-3">
                                <!-- setting_product_pup_up_item -->

                                <button data-setting_pro_manage="open" class="setting_manage_product px-4 text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md py-2 cursor-pointer mx-auto">
                                    تنطیمات
                                </button>
                                <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                    <div data-setting_pro_manage="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 setting_manage_product"></div>
                                    <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                        <div data-setting_pro_manage="close_xmark" class="absolute top-5 left-5 setting_manage_product">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </div>
                                        <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                            <h5 class="lg:text-xl sm:text-lg font-bold">تنظیمات</h5>
                                            <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(سکه تمام)</span>
                                        </div>
                                        <span class="w-full h-0.5 bg-[#F2F2F2] rounded-full"></span>
                                        <div class="w-full flex flex-col gap-4 justify-start items-center p-5">
                                            <div class="w-full flex max-sm:flex-col sm:justify-between items-center gap-2">
                                                <div class="sm:w-1/2 w-full py-3 flex justify-between items-center px-3 bg-[#F0F3F4] rounded-xl">
                                                    <span class="max-lg:text-xs font-bold">وضعیت فروش به مشتری</span>
                                                    <div class="w-12 h-6.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                    </div>
                                                </div>
                                                <div class="sm:w-1/2 w-full py-3 flex justify-between items-center px-3 bg-[#F0F3F4] rounded-xl">
                                                    <span class="max-lg:text-xs font-bold">وضعیت خرید از مشتری</span>
                                                    <div class="w-12 h-6.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="" class="w-full flex lg:gap-5 gap-3 flex-wrap justify-start items-center">
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">عنوان</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="عنوان محصول">
                                                </div>
                                                <div class="lg:w-7/24 sm:w-33/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">گروه سکه</label>
                                                    <!-- <input type="text" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl px-3 py-3 font-bold"> -->
                                                    <select name="" id="group" class="w-full outline-none border-2 border-[#E9E9E9] rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold">
                                                        <option value="">انتخاب گروه</option>
                                                        <option value="">سکه بهار آزادی</option>
                                                        <option value="">سکه تمام آزادی</option>
                                                    </select>
                                                </div>
                                                <div class="lg:w-3/12 sm:w-33/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">انتخاب آیکن نمایشی سکه</label>
                                                    <!-- <input type="text" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl px-3 py-3 font-bold"> -->
                                                    <select name="" id="group" class="w-full outline-none lg:p-3 p-2 max-lg:text-sm max-sm:text-xs border-2 border-[#E9E9E9] rounded-xl font-bold">
                                                        <option value="">قطعی</option>
                                                        <option value="">شک دار</option>
                                                    </select>
                                                </div>
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">عیار</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="عیار را وارد کنید">
                                                </div>
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">ورن</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="وزن را وارد کنید">
                                                </div>
                                                <div class="w-full flex max-sm:flex-col sm:justify-between items-center gap-2">
                                                    <div class="sm:w-1/2 w-full flex lg:gap-4 gap-3 justify-start items-center lg:p-3 p-2 bg-[#F0F3F4] rounded-xl">
                                                        <input type="radio" name="alter" class="lg:size-5 size-4">
                                                        <span class="max-lg:text-sm max-sm:text-xs font-bold">به روز رسانی دستی مطنه</span>
                                                    </div>
                                                    <div class="sm:w-1/2 w-full lg:p-3 p-2 flex lg:gap-4 gap-3 justify-start items-center bg-[#F0F3F4] rounded-xl">
                                                        <input type="radio" name="alter" class="lg:size-5 size-4">
                                                        <span class="max-lg:text-sm max-sm:text-xs font-bold">به روز رسانی اتوماتیک مطنه</span>
                                                    </div>

                                                </div>
                                                <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center">
                                                    <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                        <div class="w-full flex justify-between items-center">
                                                            <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>
                                                            <!-- <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                                                 <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                                             </div> -->
                                                        </div>
                                                        <div class="w-full flex flex-col gap-1 justify-start items-start bg-white border border-(--border) rounded-xl p-1">
                                                            <span class="xl:text-sm text-xs font-bold text-(--text-secondary)">قیمت فروش</span>
                                                            <div class="w-full xl:h-10 h-8 flex justify-between items-center">
                                                                <div data-price_pro="plus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full flex bg-white justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--active)">
                                                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                                    </svg>
                                                                </div>
                                                                <input type="number" class="w-full h-full outline-none text-center" value="5000">
                                                                <div data-price_pro="minus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full bg-white flex justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--disactive)">
                                                                        <path d="M432 256c0 13.3-10.7 24-24 24L40 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l368 0c13.3 0 24 10.7 24 24z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                        <div class="w-full flex justify-between items-center">
                                                            <h5 class="max-xl:text-sm text-(--text-primary) font-bold">خرید</h5>
                                                            <!-- <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                                                 <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                                             </div> -->
                                                        </div>
                                                        <div class="w-full flex flex-col gap-1 justify-start items-start bg-white border border-(--border) rounded-xl p-1">
                                                            <span class="xl:text-sm text-xs font-bold text-(--text-secondary)">قیمت خرید</span>
                                                            <div class="w-full xl:h-10 h-8 flex justify-between items-center">
                                                                <div data-price_pro="plus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full flex bg-white justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--active)">
                                                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                                    </svg>
                                                                </div>
                                                                <input type="number" class="w-full h-full outline-none text-center" value="5000">
                                                                <div data-price_pro="minus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full bg-white flex justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--disactive)">
                                                                        <path d="M432 256c0 13.3-10.7 24-24 24L40 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l368 0c13.3 0 24 10.7 24 24z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- setting_product_pup_up_item -->

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="nogre" class="w-full hidden">

            <div class="w-full h-5 bg-zinc-200"></div>
            <div class="w-full overflow-x-auto bg-white rounded-xl">
                <div class="w-full flex justify-between items-center px-2 py-3">
                    <div class="flex items-center justify-start gap-2">
                        <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                            <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                            <label class="text-xs md:text-base" for="selectAll">
                                انتخاب همه
                            </label>
                        </div>
                        <a href="" class="px-3 py-1.5 rounded-xl bg-red-200 border-2 border-(--disactive)">
                            حذف
                        </a>
                        <div class="bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd)  hidden md:flex flex-col md:flex-row">
                            <span class="">تعداد 5 سگخ ار 10 سکه انتخاب شد .</span>
                            <!-- <span class="hidden md:flex">|</span>
                                        <span class="">ظرفیت باقیمانده 445 نفر</span> -->
                        </div>
                    </div>
                    <div class="flex justify-start items-center gap-2">
                        <a href="" class="px-4 py-2 rounded-lg bg-white border-2 border-(--active) font-bold max-xl:text-sm max-sm:text-xs">
                            گروه بتدی سکه ها
                        </a>
                        <a href="" class="px-4 py-2 rounded-lg bg-(--active) border-2 border-(--active) font-bold max-xl:text-sm max-sm:after:text-xs text-white">
                            افزودن به خسابداری
                        </a>
                    </div>
                </div>
                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
                            <th class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ردیف
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                عتوان
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                گروه
                            </th>
                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                فیمت فروش به مشتری
                            </th>
                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                سود خرید از مشتری
                            </th>

                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت فروش به مشتری

                            </th>
                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                وضعیت خرید از مشتری
                            </th>

                            <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="item text-xs lg:text-base text-nowrap">
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                1
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                نقره تمام سکه
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                -
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                140-250
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex gap-10 justify-between font-bold">
                                    <span>0</span>
                                    <span>خط</span>
                                </div>
                            </td>
                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex justify-center items-center">
                                    <span class="px-3 py-1.5 rounded-xl bg-green-200 border-2 border-(--active) text-xs">فعال</span>
                                </div>
                            </td>

                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                <div class="w-full h-full flex justify-center items-center">
                                    <span class="px-3 py-1.5 rounded-xl bg-green-200 border-2 border-(--active) text-xs">فعال</span>
                                </div>
                            </td>

                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center gap-3">
                                <!-- setting_product_pup_up_item -->

                                <button data-setting_pro_manage="open" class="setting_manage_product px-4 text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md py-2 cursor-pointer mx-auto">
                                    تنطیمات
                                </button>
                                <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                    <div data-setting_pro_manage="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 setting_manage_product"></div>
                                    <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                        <div data-setting_pro_manage="close_xmark" class="absolute top-5 left-5 setting_manage_product">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </div>
                                        <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                            <h5 class="lg:text-xl sm:text-lg font-bold">تنظیمات</h5>
                                            <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(سکه تمام نقره)</span>
                                        </div>
                                        <span class="w-full h-0.5 bg-[#F2F2F2] rounded-full"></span>
                                        <div class="w-full flex flex-col gap-4 justify-start items-center p-5">
                                            <div class="w-full flex max-sm:flex-col sm:justify-between items-center gap-2">
                                                <div class="sm:w-1/2 w-full py-3 flex justify-between items-center px-3 bg-[#F0F3F4] rounded-xl">
                                                    <span class="max-lg:text-xs font-bold">وضعیت فروش به مشتری</span>
                                                    <div class="w-12 h-6.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                    </div>
                                                </div>
                                                <div class="sm:w-1/2 w-full py-3 flex justify-between items-center px-3 bg-[#F0F3F4] rounded-xl">
                                                    <span class="max-lg:text-xs font-bold">وضعیت خرید از مشتری</span>
                                                    <div class="w-12 h-6.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="" class="w-full flex lg:gap-5 gap-3 flex-wrap justify-start items-center">
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">عنوان</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="عنوان محصول">
                                                </div>
                                                <div class="lg:w-7/24 sm:w-33/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">گروه سکه</label>
                                                    <!-- <input type="text" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl px-3 py-3 font-bold"> -->
                                                    <select name="" id="group" class="w-full outline-none border-2 border-[#E9E9E9] rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold">
                                                        <option value="">انتخاب گروه</option>
                                                        <option value="">سکه بهار آزادی</option>
                                                        <option value="">سکه تمام آزادی</option>
                                                    </select>
                                                </div>
                                                <div class="lg:w-3/12 sm:w-33/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">انتخاب آیکن نمایشی سکه</label>
                                                    <!-- <input type="text" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl px-3 py-3 font-bold"> -->
                                                    <select name="" id="group" class="w-full outline-none lg:p-3 p-2 max-lg:text-sm max-sm:text-xs border-2 border-[#E9E9E9] rounded-xl font-bold">
                                                        <option value="">قطعی</option>
                                                        <option value="">شک دار</option>
                                                    </select>
                                                </div>
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">عیار</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="عیار را وارد کنید">
                                                </div>
                                                <div class="lg:w-5/12 sm:w-62/100 w-full flex flex-col gap-1 justify-start items-start">
                                                    <label for="name" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">ورن</label>
                                                    <input type="text" id="name" class="w-full border-2 border-[#E9E9E9] outline-none rounded-xl lg:p-3 p-2 max-lg:text-sm max-sm:text-xs font-bold" placeholder="وزن را وارد کنید">
                                                </div>
                                                <div class="w-full flex max-sm:flex-col sm:justify-between items-center gap-2">
                                                    <div class="sm:w-1/2 w-full flex lg:gap-4 gap-3 justify-start items-center lg:p-3 p-2 bg-[#F0F3F4] rounded-xl">
                                                        <input type="radio" name="alter" class="lg:size-5 size-4">
                                                        <span class="max-lg:text-sm max-sm:text-xs font-bold">به روز رسانی دستی مطنه</span>
                                                    </div>
                                                    <div class="sm:w-1/2 w-full lg:p-3 p-2 flex lg:gap-4 gap-3 justify-start items-center bg-[#F0F3F4] rounded-xl">
                                                        <input type="radio" name="alter" class="lg:size-5 size-4">
                                                        <span class="max-lg:text-sm max-sm:text-xs font-bold">به روز رسانی اتوماتیک مطنه</span>
                                                    </div>

                                                </div>
                                                <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center">
                                                    <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                        <div class="w-full flex justify-between items-center">
                                                            <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>
                                                            <!-- <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                                                 <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                                             </div> -->
                                                        </div>
                                                        <div class="w-full flex flex-col gap-1 justify-start items-start bg-white border border-(--border) rounded-xl p-1">
                                                            <span class="xl:text-sm text-xs font-bold text-(--text-secondary)">قیمت فروش</span>
                                                            <div class="w-full xl:h-10 h-8 flex justify-between items-center">
                                                                <div data-price_pro="plus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full flex bg-white justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--active)">
                                                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                                    </svg>
                                                                </div>
                                                                <input type="number" class="w-full h-full outline-none text-center" value="5000">
                                                                <div data-price_pro="minus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full bg-white flex justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--disactive)">
                                                                        <path d="M432 256c0 13.3-10.7 24-24 24L40 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l368 0c13.3 0 24 10.7 24 24z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                        <div class="w-full flex justify-between items-center">
                                                            <h5 class="max-xl:text-sm text-(--text-primary) font-bold">خرید</h5>
                                                            <!-- <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                                                 <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                                             </div> -->
                                                        </div>
                                                        <div class="w-full flex flex-col gap-1 justify-start items-start bg-white border border-(--border) rounded-xl p-1">
                                                            <span class="xl:text-sm text-xs font-bold text-(--text-secondary)">قیمت خرید</span>
                                                            <div class="w-full xl:h-10 h-8 flex justify-between items-center">
                                                                <div data-price_pro="plus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full flex bg-white justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--active)">
                                                                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                                                    </svg>
                                                                </div>
                                                                <input type="number" class="w-full h-full outline-none text-center" value="5000">
                                                                <div data-price_pro="minus" class="xl:min-w-10 xl:w-10 min-w-8 w-8 h-full bg-white flex justify-center items-center change_price_product border border-(--border) rounded-xl">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2/3 fill-(--disactive)">
                                                                        <path d="M432 256c0 13.3-10.7 24-24 24L40 280c-13.3 0-24-10.7-24-24s10.7-24 24-24l368 0c13.3 0 24 10.7 24 24z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- setting_product_pup_up_item -->

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- manage_product-end -->



<script>

     // manage_product_start
        let seke = document.getElementById("seke");
        let nogre = document.getElementById("nogre");
        let seke_nogre = document.getElementById("seke_nogre");


        function conpen_product(state, el) {
            document.querySelectorAll('.products').forEach(products => {
                products.classList.remove('bg-white')
                products.classList.add('bg-zinc-200')
            })
            if (state == 'seke') {

                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                seke.classList.remove("hidden")
                nogre.classList.add("hidden")
            }
            if (state == 'nogre') {

                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                seke.classList.add("hidden")
                nogre.classList.remove("hidden")
            }
        }


        console.log('setting_manage_productsetting_manage_product')
        let setting_manage_product = document.querySelectorAll('.setting_manage_product')
        setting_manage_product.forEach((item) => {
            item.addEventListener('click', function(data) {
                if (item.getAttribute('data-setting_pro_manage') == 'open') {
                    item.nextElementSibling.classList.remove('invisible')
                    item.nextElementSibling.classList.remove('opacity-0')

                }
                if (item.getAttribute('data-setting_pro_manage') == 'close_black') {
                    item.parentElement.classList.add('invisible')
                    item.parentElement.classList.add('opacity-0')
                }
                if (item.getAttribute('data-setting_pro_manage') == 'close_xmark') {
                    item.parentElement.parentElement.classList.add('invisible')
                    item.parentElement.parentElement.classList.add('opacity-0')
                }
            })
        })
        // manage_product_end

</script>

@endsection