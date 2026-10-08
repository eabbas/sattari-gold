@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | دسته بندی مشتریان ')
@section('content')


<!-- دسته بندی مشتریان -->

<div class="w-full flex flex-col gap-5 lg:justify-start justify-center items-center">
    <div class="w-full py-3 bg-white rounded-xl flex justify-between items-center px-4">
        <h4 class="text-xl font-bold">تنظیمات</h4>
        <div class="px-4 py-2 bg-(--active) rounded-xl font-bold text-white max-lg:text-sm max-sm:text-xs" onclick="create_category_user_new('open')">
            ایجاد دسته بندی جدید
        </div>
        <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal" id="create_category_user_new_item">
            <div class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1" onclick="create_category_user_new('close')"></div>
            <div class="sm:w-98/100 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                <div class="absolute top-5 left-5" onclick="create_category_user_new('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                </div>
                <div class="px-5 py-5 flex gap-2 justify-start items-center">
                    <h5 class="lg:text-xl sm:text-lg font-bold">ایجاد دسته بندی جدید</h5>
                    <!-- <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(ویژه)</span> -->
                </div>
                <div class="w-full flex max-md:flex-col gap-4 justify-start items-start">
                    <div class="md:w-40/100 w-full h-full p-5 flex flex-col gap-2 justify-start items-center  bg-white border-2 border-(--border)">
                        <form action="" class="w-full h-full flex flex-col gap-4 justify-start items-center">
                            <div class="w-full flex flex-col justify-start items-start gap-2">
                                <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">به نام</label>
                                <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                    <input type="text" class="w-full outline-none font-bold rounded-xl max-lg:text-sm" value="ویژه">
                                </div>
                            </div>
                            <div class="w-full flex flex-col justify-start items-start gap-2">
                                <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیام</label>
                                <textarea name="" id="" class="w-full h-22 outline-none border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl"></textarea>
                            </div>
                            <div class="w-full flex max-lg:flex-col xl:gap-4 gap-2 justify-start items-center">
                                <div class="lg:w-1/2 w-full py-2 xl:px-4 px-3 flex justify-between items-center bg-white rounded-xl border border-(--border)">
                                    <span class="max-xl:text-sm font-bold">
                                        وضعیت خرید
                                    </span>
                                    <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                    </div>
                                </div>
                                <div class="lg:w-1/2 w-full py-2 xl:px-4 px-3 flex justify-between items-center bg-white rounded-xl border border-(--border)">
                                    <span class="max-xl:text-sm font-bold">
                                        وضعیت فروش
                                    </span>
                                    <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-4 justify-start items-start bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                <div class="w-full flex justify-between items-center">
                                    <span class="max-xl:text-sm font-bold">
                                        تایید خودکار
                                    </span>
                                    <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                        <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                    </div>
                                </div>
                                <p class="xl:text-sm lg:text-xs text-[10px] text-(--text-secondary-dashbrd)">جهت فعال‌سازی، مقدار حداکثر هر مبلغ را مشخص کنید</p>
                            </div>
                            <div class="w-full flex flex-col gap-4 justify-start items-start bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                <h5 class="xl:text-lg font-bold">
                                    آیتم‌های دسته بندی
                                </h5>

                                <div class="w-full flex  justify-between items-center bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                    <div class="flex lg:gap-3 gap-2 justify-start items-center">
                                        <input type="checkbox" class="lg:size-5 size-4">
                                        <span class="max-xl:text-sm font-bold">تمام آزادی</span>
                                    </div>
                                    <div class="flex max-xl:flex-col justify-start gap-2 items-center">
                                        <div class="px-3 py-1.5 flex gap-4 justify-center items-center bg-red-200 rounded-xl xl:text-sm text-xs font-bold">
                                            <span>ف</span>
                                            <span>{{number_format(104500)}}</span>
                                        </div>
                                        <div class="px-3 py-1.5 flex gap-4 justify-center items-center bg-green-200 rounded-xl xl:text-sm text-xs font-bold">
                                            <span>خ</span>
                                            <span>{{number_format(104500)}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                                ثبت تغییرات
                            </button>

                        </form>
                    </div>

                    <div class="md:w-60/100 w-full sm:h-full bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-2  border-2 border-(--border)">
                        <div class="w-full flex gap-5 justify-start items-start">
                            <div class="w-1/2 text-(--active) flex justify-center flex-col items-center cursor-pointer group transition_normal">
                                <div class="flex gap-2 justify-start items-center px-2 py-3">
                                    <span class="lg:text-lg max-sm:tex-sm font-bold">ویژگی‌های دسته بندی</span>
                                </div>
                                <div class="rounded-md w-full bg-(--active) h-[2px] transition_normal"></div>
                            </div>
                            <div class="w-1/2 hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                                <div class="flex gap-2 justify-start items-center px-2 py-3">
                                    <span class="lg:text-lg max-sm:tex-sm font-bold">مشتریان دسته بندی</span>
                                </div>
                                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                            </div>
                        </div>
                        <!-- ویژگی دسته بندی ها -->
                        <div class="w-full flex flex-col justify-start items-center ">
                            <!-- product_prapety -->
                            <div class="w-full bg-white border-2 border-(--border) rounded-xl flex flex-col gap-4 justify-start items-center p-4">

                                <div class="w-full flex justify-start items-center">
                                    <h4 class="sm:text-lg font-bold">
                                        سکه تمام بهار آزادی
                                    </h4>
                                </div>
                                <div class="w-full flex max-lg:flex-col gap-4 justify-start items-start">
                                    <div class="md:w-30/100 w-full  bg-white p-1 rounded-xl flex lg:flex-col gap-1 justify-start items-center border-2 border-(--border) max-md:overflow-auto text-nowrap [&::-webkit-scrollbar]:h-0 [&::-webkit-scrollbar-thumb]:bg-none  [&::-webkit-scrollbar-thumb]:rounded-full">
                                        <div class="md:w-full py-3 px-4 bg-zinc-100  flex justify-start items-center font-bold maxlg:text-sm max-sm:text-xs rounded-xl">
                                            اختلاف قیمت
                                        </div>
                                        <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100  transition_normal flex justify-start items-center font-bold maxlg:text-sm max-sm:text-xs rounded-xl">
                                            حد مجاز معامله
                                        </div>
                                        <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100  transition_normal flex justify-start items-center font-bold maxlg:text-sm max-sm:text-xs rounded-xl">
                                            حد مجاز روزانه
                                        </div>
                                        <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100  transition_normal flex justify-start items-center font-bold maxlg:text-sm max-sm:text-xs rounded-xl">
                                            تایید خودکار
                                        </div>
                                    </div>
                                    <div class="lg:w-70/100 w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-start p-2 border-2 border-(--border)">
                                        <!-- اختلاف قیمت -->
                                        <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center ">
                                            <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                <div class="w-full flex justify-between items-center">
                                                    <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>

                                                    <div class="flex justify-start items-center gap-1 text-xs text-red-700 bg-red-200 rounded-md py-1 px-2">
                                                        <span>
                                                            خرید شما
                                                        </span>
                                                        <span>{{number_format(104500)}}</span>
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col gap-1 justify-start items-start bg-white border border-(--border) rounded-xl p-1">
                                                    <span class="xl:text-sm text-xs font-bold text-(--text-secondary)">اختلاف فروش</span>
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
                                                    <p class="text-xs text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                                </div>
                                            </div>
                                            <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                <div class="w-full flex justify-between items-center">
                                                    <h5 class="max-xl:text-sm text-(--text-primary) font-bold">اختلاف</h5>
                                                    <div class="flex justify-start items-center gap-1 text-xs text-green-700 bg-green-200 rounded-md py-1 px-2">
                                                        <span>
                                                            خرید شما
                                                        </span>
                                                        <span>{{number_format(104500)}}</span>
                                                    </div>
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
                                                    <p class="text-xs max-sm:text-[10px] text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- اختلاف قیمت -->
                                        <!-- حد مجاز معامله -->
                                        <div class="w-full flex flex-col gap-4 justify-start items-start hidden">
                                            <span class="self-end lg:py-2 py-1.5 lg:px-6 px-4 font-bold text-white bg-(--active) rounded-full max-lg:text-sm max-sm:text-xs">فعال</span>
                                            <div class="w-full flex justify-start gap-2 items-center">
                                                <div class="w-1/2 flex flex-col justify-start items-start gap-2 relative">
                                                    <div class="w-full flex justify-between items-center">
                                                        <label for="" class="text-xs font-bold text-[#8B929D]">حداقل وزن</label>
                                                        <span class="md:text-xs text-[10px] text-[#9BA4AA] px-2 py-1 rounded-full bg-zinc-100">غیر فعال</span>
                                                    </div>
                                                    <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                        <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                        <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                    </div>

                                                </div>
                                                <div class="w-1/2 flex flex-col justify-start items-start gap-2">
                                                    <!-- <div class="w-full flex justify-between items-center"> -->
                                                    <label for="" class="text-xs font-bold text-[#8B929D]">حداکثر وزن</label>
                                                    <!-- <span class="md:text-xs text-[10px] text-[#9BA4AA]">حذف پیغام</span> -->
                                                    <!-- </div> -->
                                                    <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                        <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                        <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <p class="text-xs text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                        </div>
                                        <!-- حد مجاز معامله -->
                                        <!-- تائید خودکار -->
                                        <div class="w-full flex justify-start gap-2 items-center hidden">
                                            <!-- <div class="w-1/2 flex flex-col justify-start items-start gap-2 relative">
                                                                                <div class="w-full flex justify-between items-center">
                                                                                    <label for="" class="text-xs font-bold text-[#8B929D]">حداقل وزن</label>
                                                                                    <span class="md:text-xs text-[10px] text-[#9BA4AA] px-2 py-1 rounded-full bg-zinc-100">غیر فعال</span>
                                                                                </div>
                                                                                <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                                                    <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                                                    <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                                                </div>
    
                                                                            </div> -->
                                            <div class="w-1/2 flex flex-col justify-start items-start gap-2">
                                                <div class="w-full flex justify-between items-center">
                                                    <label for="" class="text-xs font-bold text-[#8B929D]">حداکثر وزن</label>
                                                    <span class="md:text-xs text-[10px] text-white px-2 py-1 rounded-full bg-(--active)">فعال</span>
                                                </div>
                                                <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                    <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                    <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- تائید خودکار -->
                                    </div>
                                </div>
                                <div class="w-full flex justify-end items-center gap-2">

                                    <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                                        ثبت تغییرات
                                    </button>
                                    <button class=" border-1 border-(--disactive) rounded-md px-4 py-2 cursor-pointer font-bold text-(--disactive) max-md:text-sm">
                                        لغو
                                    </button>
                                </div>
                            </div>
                            <!-- product_prapety -->
                        </div>
                        <!-- ویژگی دسته بندی ها -->
                        <!-- مشتریان دسته بندی -->
                        <div class="w-full flex flex-col justify-start items-center p-4 hidden">
                            <div class="w-full flex justify-between items-center">
                                <h6 class="sm:text-lg font-bold">مشتریان دسته</h6>
                                <button data-add_user_category_user="open" class="self-end lg:px-8 sm:px-6 px-4 sm:py-2.5 py-1.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm add_user_in_category_user">
                                    افزودن مشتری به دسته
                                </button>

                                <!-- add_user_in_category_user_pup_up_item -->
                                <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                    <div data-add_user_category_user="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 add_user_in_category_user"></div>
                                    <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto rounded-xl">
                                        <div data-add_user_category_user="close_xmark" class="absolute top-5 left-5 add_user_in_category_user">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </div>
                                        <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                            <h5 class="lg:text-xl sm:text-lg font-bold">افزودن مشتری به دسته</h5>
                                        </div>


                                        <div class="w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-4">
                                            <h6 class="text-lg font-bold">
                                                لیست همه مشتریان
                                            </h6>

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

                                            <div class="w-full overflow-x-auto bg-white rounded-xl">
                                                <div class="w-full flex items-center justify-start gap-2 py-3">
                                                    <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                                                        <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                                                        <label class="text-xs md:text-base" for="selectAll">
                                                            انتخاب همه
                                                        </label>
                                                    </div>
                                                    <div class=" bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex justify-start items-start gap-2">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-(--active)">
                                                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                                            </svg>
                                                        </div>
                                                        <p>تعداد 9 دسته بندی مشتریان یافت شد</p>
                                                    </div>
                                                </div>
                                                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                                                    <thead>
                                                        <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
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
                                                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                آخرین معامله
                                                            </th>
                                                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                کد ملی
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                کد حسابداری
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                دسته بندی
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                وضعیت
                                                            </th>

                                                            <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                ابزار
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="item text-xs lg:text-base">
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                                                <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                                1
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                ماهان
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                09145474545
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                1هفته پیش
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                1 ساعت پیش
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                15488666
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                543543543543553
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                ویژه
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                                                    فعال
                                                                </span>
                                                            </td>


                                                            <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex justify-center items-center gap-3">

                                                                <button class=" border-1 border-(--active) font-bold text-(--active) rounded-md px-2 py-2 cursor-pointer">
                                                                    افزودن
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <!-- add_user_in_category_user_pup_up_item -->


                            </div>
                            <div class="w-full flex flex-col justify-start items-center">








                                <div class="w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-center">
                                    <div class="w-full overflow-x-auto bg-white rounded-xl">
                                        <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                                            <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                                                <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                                                <label class="text-xs md:text-base" for="selectAll">
                                                    انتخاب همه
                                                </label>
                                            </div>
                                            <div class=" bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex justify-start items-start gap-2">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-(--active)">
                                                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                                    </svg>
                                                </div>
                                                <p>تعداد 9 دسته بندی مشتریان یافت شد</p>
                                            </div>
                                        </div>
                                        <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                                            <thead>
                                                <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
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
                                                    <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        آخرین معامله
                                                    </th>
                                                    <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        کد ملی
                                                    </th>
                                                    <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        کد حسابداری
                                                    </th>
                                                    <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        دسته بندی
                                                    </th>
                                                    <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        وضعیت
                                                    </th>

                                                    <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                        ابزار
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="item text-xs lg:text-base">
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                                        <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                        1
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        ماهان
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        09145474545
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        1هفته پیش
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        1 ساعت پیش
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        15488666
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        543543543543553
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        ویژه
                                                    </td>
                                                    <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                        <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                                            فعال
                                                        </span>
                                                    </td>


                                                    <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex justify-center items-center gap-3">

                                                        <button class=" border-1 border-(--disactive) rounded-md px-2 py-2 cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5 fill-(--disactive)">
                                                                <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                                                            </svg>
                                                        </button>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>









                            </div>
                        </div>
                        <!-- مشتریان دسته بندی -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-4 bg-white rounded-xl flex flex-col gap-4 justify-start items-center">
        <div class="w-full overflow-x-auto bg-white rounded-xl">
            <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                    <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                    <label class="text-xs md:text-base" for="selectAll">
                        انتخاب همه
                    </label>
                </div>
                <div class=" bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex justify-start items-start gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-(--active)">
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                        </svg>
                    </div>
                    <p>تعداد 9 دسته بندی مشتریان یافت شد</p>
                </div>
            </div>
            <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                <thead>
                    <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
                        <th class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            ردیف
                        </th>
                        <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            نام دسته بندی
                        </th>
                        <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            تعداد مشتریات
                        </th>
                        <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            تاریخ ایجاد دسته بندی
                        </th>
                        <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            وضعیت خرید
                        </th>
                        <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            وضعیت قروش
                        </th>
                        <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            وضعیت تائید خودکار
                        </th>
                        <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            پیفام عمومی
                        </th>

                        <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                            ابزار
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="item text-xs lg:text-base">
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                            <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                            1
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            ویژه
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            5
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            <div class="w-full h-full flex gap-15 justify-between items-center">
                                <span>16:57</span>
                                <span>1405/05/03</span>
                            </div>
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                فعال
                            </span>
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                فعال
                            </span>
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                فعال
                            </span>
                        </td>
                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                            -
                        </td>

                        <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex justify-center items-center gap-3">


                            <div data-show_category_user="open" class="text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-3 py-2 cursor-pointer show_category_user_pup_up_item">
                                مشاهده
                            </div>
                            <!-- show_category_user_pup_up_item -->
                            <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                <div data-show_category_user="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 show_category_user_pup_up_item"></div>
                                <div class="sm:w-10/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                    <div data-show_category_user="close_xmark" class="absolute top-5 left-5 show_category_user_pup_up_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                    </div>
                                    <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                        <h5 class="lg:text-xl sm:text-lg font-bold">مشاهده</h5>
                                        <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(ویژه)</span>
                                    </div>
                                    <div class="w-full flex max-md:flex-col gap-4 justify-start items-start p-5">
                                        <div class="md:w-40/100 w-full h-full p-3 flex flex-col gap-2 justify-start items-start  bg-white border-2 border-(--border)">
                                            <!-- <div class="flex gap-2 justify-start items-center border border-(--border) px-4 py-2 rounded-xl">
                                                            <span class="font-bold">عنوان دسته :</span>
                                                            <span class="font-bold text-(--text-secondary-dashbrd)">ویژه</span>
                                                        </div>
                                                        <div class="flex gap-2 justify-start items-center border border-(--border) px-4 py-2 rounded-xl">
                                                            <span class="font-bold">تعداد مشتریان دسته :</span>
                                                            <span class="font-bold text-(--text-secondary-dashbrd)">5</span>
                                                        </div> -->
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">عنوان دسته</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                                    حامد ستاری انور اصل مطلق بناب

                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">تعداد مشتریان</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">

                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">حداکثر وزن معامله</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">حداقل وزن معامله</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">تائید خودکار</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">اختلاف قیمت فروش</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">اختلاف قیمت خرید</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">وضعیت خرید</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">وضعیت فروش</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>
                                            <div class="w-full flex justify-start sm:items-center">
                                                <div class="w-5/12 h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-sm max-lg:text-xs max-sm:text-[10px] max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">متن پیغام</div>
                                                <div class="w-7/12 h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">


                                                </div>
                                            </div>

                                        </div>
                                        <div class="md:w-60/100 w-full h-full p-3 flex flex-col gap-2 justify-start items-start  bg-white border-2 border-(--border)">
                                            <div class="flex gap-2 justify-start items-center">
                                                <h5 class="lg:text-lg font-bold">لیست مشتریان دسته</h5>
                                            </div>
                                            <div class="w-full overflow-x-auto pb-4">
                                                <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                                                    <thead>
                                                        <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
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
                                                            <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                آخرین معامله
                                                            </th>
                                                            <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                کد ملی
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                کد حسابداری
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                دسته بندی
                                                            </th>
                                                            <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                وضعیت
                                                            </th>


                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="item text-xs lg:text-base">
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                                                <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                                1
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                ماهان
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                09145474545
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                1هفته پیش
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                1 ساعت پیش
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                15488666
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                543543543543553
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                ویژه
                                                            </td>
                                                            <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                                                    فعال
                                                                </span>
                                                            </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- show_category_user_pup_up_item -->


                            <button class=" border-1 border-(--disactive) rounded-md px-2 py-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5 fill-(--disactive)">
                                    <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
                            </button>




                            <div data-edit_category_user="open" class="text-(--primary-dashbrd) border-1 border-(--primary-dashbrd) rounded-md px-3 py-2 cursor-pointer edit_category_user_pup_up_item">
                                <svg class="size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                </svg>
                            </div>
                            <!-- edit_category_user_pup_up_item -->
                            <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                <div data-edit_category_user="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 edit_category_user_pup_up_item"></div>
                                <div class="sm:w-98/100 w-full sm:h-98/100 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                    <div data-edit_category_user="close_xmark" class="absolute top-5 left-5 edit_category_user_pup_up_item">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                    </div>
                                    <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                        <h5 class="lg:text-xl sm:text-lg font-bold">ویرایش</h5>
                                        <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(ویژه)</span>
                                    </div>
                                    <div class="w-full flex max-md:flex-col gap-4 justify-start items-start">
                                        <div class="md:w-40/100 w-full h-full p-5 flex flex-col gap-2 justify-start items-center  bg-white border-2 border-(--border)">
                                            <form action="" class="w-full h-full flex flex-col gap-4 justify-start items-center">
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">به نام</label>
                                                    <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                        <input type="text" class="w-full outline-none font-bold rounded-xl max-lg:text-sm" value="ویژه">
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیام</label>
                                                    <textarea name="" id="" class="w-full h-22 outline-none border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl"></textarea>
                                                </div>
                                                <div class="w-full flex max-lg:flex-col xl:gap-4 gap-2 justify-start items-center">
                                                    <div class="lg:w-1/2 w-full py-2 xl:px-4 px-3 flex justify-between items-center bg-white rounded-xl border border-(--border)">
                                                        <span class="max-xl:text-sm font-bold">
                                                            وضعیت خرید
                                                        </span>
                                                        <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                        </div>
                                                    </div>
                                                    <div class="lg:w-1/2 w-full py-2 xl:px-4 px-3 flex justify-between items-center bg-white rounded-xl border border-(--border)">
                                                        <span class="max-xl:text-sm font-bold">
                                                            وضعیت فروش
                                                        </span>
                                                        <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-full flex flex-col gap-4 justify-start items-start bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                                    <div class="w-full flex justify-between items-center">
                                                        <span class="max-xl:text-sm font-bold">
                                                            تایید خودکار
                                                        </span>
                                                        <div class="lg:w-12 w-10 lg:h-6.5 h-5.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                                                        </div>
                                                    </div>
                                                    <p class="xl:text-sm lg:text-xs text-[10px] text-(--text-secondary-dashbrd)">جهت فعال‌سازی، مقدار حداکثر هر مبلغ را مشخص کنید</p>
                                                </div>
                                                <div class="w-full flex flex-col gap-4 justify-start items-start bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                                    <h5 class="xl:text-lg font-bold">
                                                        آیتم‌های دسته بندی
                                                    </h5>

                                                    <div class="w-full flex  justify-between items-center bg-white rounded-xl border border-(--border) py-2 xl:px-4 px-3">
                                                        <div class="flex lg:gap-3 gap-2 justify-start items-center">
                                                            <input type="checkbox" class="lg:size-5 size-4">
                                                            <span class="max-xl:text-sm font-bold">تمام آزادی</span>
                                                        </div>
                                                        <div class="flex max-xl:flex-col justify-start gap-2 items-center">
                                                            <div class="px-3 py-1.5 flex gap-4 justify-center items-center bg-red-200 rounded-xl xl:text-sm text-xs font-bold">
                                                                <span>ف</span>
                                                                <span>{{number_format(104500)}}</span>
                                                            </div>
                                                            <div class="px-3 py-1.5 flex gap-4 justify-center items-center bg-green-200 rounded-xl xl:text-sm text-xs font-bold">
                                                                <span>خ</span>
                                                                <span>{{number_format(104500)}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                                                    ثبت تغییرات
                                                </button>

                                            </form>
                                        </div>

                                        <div class="md:w-60/100 w-full sm:h-full bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-2  border-2 border-(--border)">
                                            <div class="w-full flex gap-5 justify-start items-start">
                                                <div class="w-1/2 text-(--active) flex justify-center flex-col items-center cursor-pointer group transition_normal">
                                                    <div class="flex gap-2 justify-start items-center px-2 py-3">
                                                        <span class="lg:text-lg max-sm:tex-sm font-bold">ویژگی‌های دسته بندی</span>
                                                    </div>
                                                    <div class="rounded-md w-full bg-(--active) h-[2px] transition_normal"></div>
                                                </div>
                                                <div class="w-1/2 hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                                                    <div class="flex gap-2 justify-start items-center px-2 py-3">
                                                        <span class="lg:text-lg max-sm:tex-sm font-bold">مشتریان دسته بندی</span>
                                                    </div>
                                                    <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                                                </div>
                                            </div>
                                            <!-- ویژگی دسته بندی ها -->
                                            <div class="w-full flex flex-col justify-start items-center hidden">
                                                <!-- product_prapety -->
                                                <div class="w-full bg-white border-2 border-(--border) rounded-xl flex flex-col gap-4 justify-start items-center p-4">

                                                    <div class="w-full flex justify-start items-center">
                                                        <h4 class="sm:text-lg font-bold">
                                                            سکه تمام بهار آزادی
                                                        </h4>
                                                    </div>
                                                    <div class="w-full flex max-lg:flex-col gap-4 justify-start items-start">
                                                        <div class="md:w-30/100 w-full  bg-white p-1 rounded-xl flex lg:flex-col gap-1 justify-start items-center border-2 border-(--border) max-md:overflow-auto text-nowrap [&::-webkit-scrollbar]:h-0 [&::-webkit-scrollbar-thumb]:bg-none  [&::-webkit-scrollbar-thumb]:rounded-full">
                                                            <div class="md:w-full py-3 px-4 bg-zinc-100  flex justify-start items-center font-bold rounded-xl">
                                                                اختلاف قیمت
                                                            </div>
                                                            <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100 active:bg-zinc-500 transition_normal flex justify-start items-center font-bold rounded-xl">
                                                                حد مجاز معامله
                                                            </div>
                                                            <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100 active:bg-zinc-500 transition_normal flex justify-start items-center font-bold rounded-xl">
                                                                حد مجاز روزانه
                                                            </div>
                                                            <div class="md:w-full py-3 px-4 bg-white hover:bg-zinc-100 active:bg-zinc-500 transition_normal flex justify-start items-center font-bold rounded-xl">
                                                                تایید خودکار
                                                            </div>
                                                        </div>
                                                        <div class="lg:w-70/100 w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-start p-2 border-2 border-(--border)">
                                                            <!-- اختلاف قیمت -->
                                                            <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center ">
                                                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>

                                                                        <div class="flex justify-start items-center gap-1 text-xs text-red-700 bg-red-200 rounded-md py-1 px-2">
                                                                            <span>
                                                                                خرید شما
                                                                            </span>
                                                                            <span>{{number_format(104500)}}</span>
                                                                        </div>
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
                                                                        <p class="text-xs text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                                                    </div>
                                                                </div>
                                                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">خرید</h5>
                                                                        <div class="flex justify-start items-center gap-1 text-xs text-green-700 bg-green-200 rounded-md py-1 px-2">
                                                                            <span>
                                                                                خرید شما
                                                                            </span>
                                                                            <span>{{number_format(104500)}}</span>
                                                                        </div>
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
                                                                        <p class="text-xs max-sm:text-[10px] text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!-- اختلاف قیمت -->
                                                            <!-- حد مجاز معامله -->
                                                            <div class="w-full flex flex-col gap-4 justify-start items-start hidden">
                                                                <span class="self-end lg:py-2 py-1.5 lg:px-6 px-4 font-bold text-white bg-(--active) rounded-full max-lg:text-sm max-sm:text-xs">فعال</span>
                                                                <div class="w-full flex justify-start gap-2 items-center">
                                                                    <div class="w-1/2 flex flex-col justify-start items-start gap-2 relative">
                                                                        <div class="w-full flex justify-between items-center">
                                                                            <label for="" class="text-xs font-bold text-[#8B929D]">حداقل وزن</label>
                                                                            <span class="md:text-xs text-[10px] text-[#9BA4AA] px-2 py-1 rounded-full bg-zinc-100">غیر فعال</span>
                                                                        </div>
                                                                        <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                                            <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                                            <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="w-1/2 flex flex-col justify-start items-start gap-2">
                                                                        <!-- <div class="w-full flex justify-between items-center"> -->
                                                                        <label for="" class="text-xs font-bold text-[#8B929D]">حداکثر وزن</label>
                                                                        <!-- <span class="md:text-xs text-[10px] text-[#9BA4AA]">حذف پیغام</span> -->
                                                                        <!-- </div> -->
                                                                        <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                                            <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                                            <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <p class="text-xs text-zinc-500">مقدار محدودیت برای هر معامله</p>
                                                            </div>
                                                            <!-- حد مجاز معامله -->
                                                            <!-- تائید خودکار -->
                                                            <div class="w-full flex justify-start gap-2 items-center hidden">
                                                                <!-- <div class="w-1/2 flex flex-col justify-start items-start gap-2 relative">
                                                                                <div class="w-full flex justify-between items-center">
                                                                                    <label for="" class="text-xs font-bold text-[#8B929D]">حداقل وزن</label>
                                                                                    <span class="md:text-xs text-[10px] text-[#9BA4AA] px-2 py-1 rounded-full bg-zinc-100">غیر فعال</span>
                                                                                </div>
                                                                                <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                                                    <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                                                    <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                                                </div>
    
                                                                            </div> -->
                                                                <div class="w-1/2 flex flex-col justify-start items-start gap-2">
                                                                    <div class="w-full flex justify-between items-center">
                                                                        <label for="" class="text-xs font-bold text-[#8B929D]">حداکثر وزن</label>
                                                                        <span class="md:text-xs text-[10px] text-white px-2 py-1 rounded-full bg-(--active)">فعال</span>
                                                                    </div>
                                                                    <div class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                                        <input type="text" class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                                        <span class="font-bold max-md:text-sm max-sm:text-xs text-zinc-400">گرم</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- تائید خودکار -->
                                                        </div>
                                                    </div>
                                                    <div class="w-full flex justify-end items-center gap-2">

                                                        <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                                                            ثبت تغییرات
                                                        </button>
                                                        <button class=" border-1 border-(--disactive) rounded-md px-4 py-2 cursor-pointer font-bold text-(--disactive) max-md:text-sm">
                                                            لغو
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- product_prapety -->
                                            </div>
                                            <!-- ویژگی دسته بندی ها -->
                                            <!-- مشتریان دسته بندی -->
                                            <div class="w-full flex flex-col justify-start items-center p-4 ">
                                                <div class="w-full flex justify-between items-center">
                                                    <h6 class="sm:text-lg font-bold">مشتریان دسته</h6>
                                                    <button data-add_user_category_user="open" class="self-end lg:px-8 sm:px-6 px-4 sm:py-2.5 py-1.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm add_user_in_category_user">
                                                        افزودن مشتری به دسته
                                                    </button>

                                                    <!-- add_user_in_category_user_pup_up_item -->
                                                    <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                                        <div data-add_user_category_user="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 add_user_in_category_user"></div>
                                                        <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto rounded-xl">
                                                            <div data-add_user_category_user="close_xmark" class="absolute top-5 left-5 add_user_in_category_user">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                                </svg>
                                                            </div>
                                                            <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                                                <h5 class="lg:text-xl sm:text-lg font-bold">افزودن مشتری به دسته</h5>
                                                            </div>


                                                            <div class="w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-4">
                                                                <h6 class="text-lg font-bold">
                                                                    لیست همه مشتریان
                                                                </h6>

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

                                                                <div class="w-full overflow-x-auto bg-white rounded-xl">
                                                                    <div class="w-full flex items-center justify-start gap-2 py-3">
                                                                        <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                                                                            <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                                                                            <label class="text-xs md:text-base" for="selectAll">
                                                                                انتخاب همه
                                                                            </label>
                                                                        </div>
                                                                        <div class=" bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex justify-start items-start gap-2">
                                                                            <div>
                                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-(--active)">
                                                                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                                                                </svg>
                                                                            </div>
                                                                            <p>تعداد 9 دسته بندی مشتریان یافت شد</p>
                                                                        </div>
                                                                    </div>
                                                                    <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                                                                        <thead>
                                                                            <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
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
                                                                                <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    آخرین معامله
                                                                                </th>
                                                                                <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    کد ملی
                                                                                </th>
                                                                                <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    کد حسابداری
                                                                                </th>
                                                                                <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    دسته بندی
                                                                                </th>
                                                                                <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    وضعیت
                                                                                </th>

                                                                                <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                                    ابزار
                                                                                </th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr class="item text-xs lg:text-base">
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                                                                    <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                                                    1
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    ماهان
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    09145474545
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    1هفته پیش
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    1 ساعت پیش
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    15488666
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    543543543543553
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    ویژه
                                                                                </td>
                                                                                <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                                    <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                                                                        فعال
                                                                                    </span>
                                                                                </td>


                                                                                <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex justify-center items-center gap-3">

                                                                                    <button class=" border-1 border-(--active) font-bold text-(--active) rounded-md px-2 py-2 cursor-pointer">
                                                                                        افزودن
                                                                                    </button>

                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>


                                                        </div>
                                                    </div>

                                                    <!-- add_user_in_category_user_pup_up_item -->


                                                </div>
                                                <div class="w-full flex flex-col justify-start items-center">








                                                    <div class="w-full  bg-white rounded-xl flex flex-col gap-4 justify-start items-center">
                                                        <div class="w-full overflow-x-auto bg-white rounded-xl">
                                                            <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                                                                <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                                                                    <input class="appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer" type="checkbox" name="" id="selectAll">
                                                                    <label class="text-xs md:text-base" for="selectAll">
                                                                        انتخاب همه
                                                                    </label>
                                                                </div>
                                                                <div class=" bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashbrd) flex justify-start items-start gap-2">
                                                                    <div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-(--active)">
                                                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <p>تعداد 9 دسته بندی مشتریان یافت شد</p>
                                                                </div>
                                                            </div>
                                                            <table class="w-full border-collapse border-1 border-(--border-dashbrd) text-sm">
                                                                <thead>
                                                                    <tr class="bg-gray-100 text-xs lg:text-base text-nowrap">
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
                                                                        <th class="min-w-30 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            آخرین معامله
                                                                        </th>
                                                                        <th class="min-w-25 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            کد ملی
                                                                        </th>
                                                                        <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            کد حسابداری
                                                                        </th>
                                                                        <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            دسته بندی
                                                                        </th>
                                                                        <th class="min-w-20 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            وضعیت
                                                                        </th>

                                                                        <th class="min-w-45 border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2">
                                                                            ابزار
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr class="item text-xs lg:text-base">
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex items-center justify-center gap-2">
                                                                            <input type="checkbox" name="" class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashbrd) checked:bg-(--primary-dark-dashbrd) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                                            1
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            ماهان
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            09145474545
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            1هفته پیش
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            1 ساعت پیش
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            15488666
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            543543543543553
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            ویژه
                                                                        </td>
                                                                        <td class="border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 text-center">
                                                                            <span class="w-10 h-10 bg-(--primary-dashbrd)/20 text-(--primary-dashbrd) rounded-md border-1 bordre-(--primary-dashbrd) p-1 cursor-default">
                                                                                فعال
                                                                            </span>
                                                                        </td>


                                                                        <td class="relative border-1 border-(--border-dashbrd) p-1 md:px-3 md:py-2 flex justify-center items-center gap-3">

                                                                            <button class=" border-1 border-(--disactive) rounded-md px-2 py-2 cursor-pointer">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5 fill-(--disactive)">
                                                                                    <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path>
                                                                                </svg>
                                                                            </button>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>









                                                </div>
                                            </div>
                                            <!-- مشتریان دسته بندی -->


                                        </div>
                                    </div>



                                </div>
                            </div>
                            <!-- edit_category_user_pup_up_item -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- دسته بندی مشتریان -->



<script>

     // category_user_start
        let create_category_user_new_item = document.getElementById('create_category_user_new_item')

        function create_category_user_new(item) {
            if (item == 'open') {
                create_category_user_new_item.classList.remove('invisible')
                create_category_user_new_item.classList.remove('opacity-0')
            }
            if (item == 'close') {
                create_category_user_new_item.classList.add('invisible')
                create_category_user_new_item.classList.add('opacity-0')
            }
        }


        let show_category_user_pup_up_item = document.querySelectorAll('.show_category_user_pup_up_item')
        show_category_user_pup_up_item.forEach((item) => {
            item.addEventListener('click', function(data) {
                if (item.getAttribute('data-show_category_user') == 'open') {
                    item.nextElementSibling.classList.remove('invisible')
                    item.nextElementSibling.classList.remove('opacity-0')

                }
                if (item.getAttribute('data-show_category_user') == 'close_black') {
                    item.parentElement.classList.add('invisible')
                    item.parentElement.classList.add('opacity-0')
                }
                if (item.getAttribute('data-show_category_user') == 'close_xmark') {
                    item.parentElement.parentElement.classList.add('invisible')
                    item.parentElement.parentElement.classList.add('opacity-0')
                }
            })
        })

        let edit_category_user_pup_up_item = document.querySelectorAll('.edit_category_user_pup_up_item')
        edit_category_user_pup_up_item.forEach((item) => {
            item.addEventListener('click', function(data) {
                if (item.getAttribute('data-edit_category_user') == 'open') {
                    item.nextElementSibling.classList.remove('invisible')
                    item.nextElementSibling.classList.remove('opacity-0')

                }
                if (item.getAttribute('data-edit_category_user') == 'close_black') {
                    item.parentElement.classList.add('invisible')
                    item.parentElement.classList.add('opacity-0')
                }
                if (item.getAttribute('data-edit_category_user') == 'close_xmark') {
                    item.parentElement.parentElement.classList.add('invisible')
                    item.parentElement.parentElement.classList.add('opacity-0')
                }
            })
        })
        let add_user_in_category_user = document.querySelectorAll('.add_user_in_category_user')
        add_user_in_category_user.forEach((item) => {
            item.addEventListener('click', function(data) {
                if (item.getAttribute('data-add_user_category_user') == 'open') {
                    item.nextElementSibling.classList.remove('invisible')
                    item.nextElementSibling.classList.remove('opacity-0')

                }
                if (item.getAttribute('data-add_user_category_user') == 'close_black') {
                    item.parentElement.classList.add('invisible')
                    item.parentElement.classList.add('opacity-0')
                }
                if (item.getAttribute('data-add_user_category_user') == 'close_xmark') {
                    item.parentElement.parentElement.classList.add('invisible')
                    item.parentElement.parentElement.classList.add('opacity-0')
                }
            })
        })

        // category_user_end

</script>

@endsection