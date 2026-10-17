@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنضیمات جدید ')
@section('content')
<div class="w-full flex justify-center items-center">
    <div
        class="md:w-60/100 w-full sm:h-full bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-4">
        <ul
            class="w-full flex gap-4 lg:gap-6 xl:gap-7 text-sm lg:text-base justify-start font-bold overflow-x-auto border-b-2 border-(--border) [&amp;::-webkit-scrollbar]:h-1.5  [&amp;::-webkit-scrollbar-thumb]:bg-(--border)  [&amp;::-webkit-scrollbar-thumb]:rounded-full text-nowrap">
            <li
                class="text-(--active) flex justify-center flex-col items-center cursor-pointer group transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>تنظیمات عمومی</span>
                </div>
                <div class="rounded-md w-full bg-(--active) h-[2px] transition_normal"></div>
            </li>
            <li
                class="hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>حساب ها</span>
                </div>
                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
            </li>
            <li
                class="hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>تماس ها</span>
                </div>
                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
            </li>
            <li
                class="hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>تحویل فیزیکی</span>
                </div>
                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
            </li>
            <li
                class="hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>تغییرات مظنه و سود</span>
                </div>
                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
            </li>
            <li
                class="hover:text-(--active) flex justify-center flex-col  items-center group cursor-pointer transition_normal">
                <div class="flex gap-2 justify-start items-center px-2 py-3">
                    <span>محدود سازی وزن / تعداد معملات</span>
                </div>
                <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
            </li>


        </ul>
        <!-- تنضیمات عمومی -->
        <div class="w-full flex flex-col gap-4 justify-start items-center hidden">
            <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                <div class="md:p-2 p-1.5 bg-green-200 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                        class="md:size-6 size-4 fill-(--active)">
                        <<path
                            d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                    </svg>
                </div>
                <span class="font-bold  max-md:text-sm">پیغام عمومی خود را وارد کنید</span>
            </div>
            <form action="" class="w-full flex flex-col gap-6 justify-start items-start">
                <div class="w-full flex flex-col justify-start items-center gap-2">
                    <div class="w-full flex justify-between items-center">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیغام</label>
                        <span class="md:text-xs text-[10px] text-[#9BA4AA]">حذف پیغام</span>
                    </div>
                    <textarea name="" id=""
                        class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>
                </div>
                <div class="w-full flex flex-col justify-start items-center gap-2">
                    <div class="w-full flex justify-between items-center">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">مدت زمان نمایش
                            پیغام</label>
                    </div>
                    <select name="" id=""
                        class="w-full py-2 outline-none border-2 border-(--border) font-bold rounded-xl px-3 bg-white  max-md:text-sm">
                        <option value="">نمایش برای همیشه</option>
                        <option value="">1ماهه</option>
                    </select>
                </div>
                <div class="w-full flex flex-col gap-2 justify-start items-start">
                    <div class="w-full flex justify-start items-center gap-4">
                        <div class="p-2 bg-green-200 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                class="size-6 fill-(--active)">
                                <<path
                                    d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                            </svg>
                        </div>
                        <span class="font-bold  max-md:text-sm">قوانین و شرایط استفاده از اپلیکیشن را وارد
                            کنید</span>
                    </div>
                    <textarea name="" id=""
                        class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>
                </div>
                <div class="w-full flex flex-col gap-2 justify-start items-start">
                    <div class="w-full flex justify-start items-center gap-4">
                        <div class="p-2 bg-green-200 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                class="size-6 fill-(--active)">
                                <<path
                                    d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                            </svg>
                        </div>
                        <span class="font-bold  max-md:text-sm">متن آغازین برای نمایش در صفحه ورود برنامه را وارد
                            کنید</span>
                    </div>
                    <textarea name="" id=""
                        class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>
                </div>
                <div class="w-full flex justify-end items-center">
                    <button class="px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                        ثبت تغییرات
                    </button>
                </div>


            </form>
        </div>
        <!-- تنضیمات عمومی -->
        <!-- حساب ها -->
        <div class="w-full flex flex-col gap-4 justify-start items-center ">
            <form action="{{ route('Message.create') }}" method="POST"
                class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                @csrf
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="p-1 bg-(--active) rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">افزودن پیام جدید</span>
                </div>
                <div
                    class="w-full gap-3 gap-y-7 justify-start items-center">
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیام</label>
                        <div
                            class="w-full border-2 border-(--border) py-6 px-3 bg-white flex justify-between items-center rounded-xl">
                            <textarea type="text" name="message" class="w-full outline-none font-bold rounded-xl max-lg:text-sm"></textarea>
                        </div>
                    </div>
                </div>
                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    افزودن پیام
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
                                ابزار
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($message as $mess)
                        <tr class="item text-nowrap font-bold max-sm:text-sm">
                            <td class="px-3 py-2 flex items-center justify-center">
                                {{$i}}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{$mess->message}}
                            </td>


                            <td class="border-1 border-(--border) px-3 py-2 flex justify-center gap-2">
                                <div>
                                    <div data-edit_cart="open"
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
                                            <form action=""
                                                class="grid sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        نام و نام خانوادگی
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="" id="name">
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        شماره کارت
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="" id="name">
                                                </div>
                                                <div class="w-full flex flex-col justify-start items-start gap-2">
                                                    <label class="" for="name">
                                                        شماره شبا
                                                    </label>
                                                    <input
                                                        class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                        type="text" name="" id="name">
                                                </div>

                                                <div
                                                    class="col-span-2 w-full flex gap-4 justify-between items-center">
                                                    <button
                                                        class="w-1/2 border-1 border-(--active) bg-(--active) sm:text-lg font-bold text-white py-2 rounded-md">ویرایش</button>
                                                    <button
                                                        class="w-1/2 border-1 border-(--border) bg-(--disactive) sm:text-lg font-bold text-white py-2 rounded-md">
                                                        لغو</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{route('Message.delete' , $mess->id)}}"
                                    class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5  cursor-pointer flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="size-4 fill-(--disactive)">
                                        <path
                                            d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                            @php
                                $i++
                            @endphp
                            @endforeach
                    </tbody>
                </table>
            </div>



        </div>
        <!-- حساب ها -->
        <!-- تماس ها -->
        <div class="w-full flex flex-col gap-4 justify-start items-center hidden">
            <form action=""
                class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="p-1 bg-(--active) rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">افزودن شماره تماس جدید</span>
                </div>
                <div
                    class="w-full grid xl:grid-cols-3 sm:grid-cols-2 grid-cols-1  gap-3 justify-start items-center">
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">عنوان</label>
                        <div
                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                            <input type="text" class="w-full outline-none font-bold rounded-xl max-lg:text-sm">
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">نوع
                            شماره</label>

                        <select name="" id=""
                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                            <option value="">انتخاب نوع شماره</option>
                            <option value="">اینستاگرام</option>
                            <option value="">شماره همراه</option>
                        </select>

                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                            تماس</label>
                        <div
                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                            <input type="text" class="outline-none font-bold rounded-xl max-lg:text-sm">

                        </div>
                    </div>

                </div>
                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    افزودن به لیست
                </button>
            </form>

            <div class="w-full flex flex-col justify-start items-start gap-2">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="md:p-2 p-1.5 bg-green-200 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="md:size-6 size-4 fill-(--active)">
                            <path
                                d="M375.8 275.2c-16.4-7-35.4-2.4-46.7 11.4l-33.2 40.6c-46-26.7-84.4-65.1-111.1-111.1L225.3 183c13.8-11.3 18.5-30.3 11.4-46.7l-48-112C181.2 6.7 162.3-3.1 143.6 .9l-112 24C13.2 28.8 0 45.1 0 64v0C0 295.2 175.2 485.6 400.1 509.5c9.8 1 19.6 1.8 29.6 2.2c0 0 0 0 0 0c0 0 .1 0 .1 0c6.1 .2 12.1 .4 18.2 .4l0 0c18.9 0 35.2-13.2 39.1-31.6l24-112c4-18.7-5.8-37.6-23.4-45.1l-112-48zM441.5 464C225.8 460.5 51.5 286.2 48.1 70.5l99.2-21.3 43 100.4L154.4 179c-18.2 14.9-22.9 40.8-11.1 61.2c30.9 53.3 75.3 97.7 128.6 128.6c20.4 11.8 46.3 7.1 61.2-11.1l29.4-35.9 100.4 43L441.5 464zM48 64v0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0s0 0 0 0" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">پیغام عمومی خود را وارد کنید</span>
                </div>
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border-1 border-(--border) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-nowrap text-sm max-sm:text-xs">

                                <th class="border-1 border-(--border) px-3 py-2">
                                    عنوان
                                </th>
                                <th class="border-1 border-(--border) px-3 py-2">
                                    نوع شماره
                                </th>
                                <th class="border-1 border-(--border) px-3 py-2">
                                    شماره تماس
                                </th>

                                <th class="border-1 border-(--border) px-3 py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="item text-nowrap font-bold max-sm:text-sm">

                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    واتساپ
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    واتساپ
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    0992571265
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 flex gap-2">
                                    <div>
                                        <div data-edit_cart="open"
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
                                                    <div class="font-bold">ویرایش اطلاعات تماس</div>
                                                    <div data-edit_cart="close_xmark" class="popup_edit_cart">
                                                        <svg class="size-6" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 384 512">
                                                            <path
                                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <form action=""
                                                    class="grid sm:grid-cols-2 grid-cols-1 gap-5 mt-5">
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2">
                                                        <label class="" for="name">
                                                            عنوان
                                                        </label>
                                                        <input
                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                            type="text" name="" id="name">
                                                    </div>
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2">
                                                        <label class="" for="name">
                                                            نوع شماره
                                                        </label>
                                                        <input
                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                            type="text" name="" id="name">
                                                    </div>
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2">
                                                        <label class="" for="name">
                                                            شماره تماس
                                                        </label>
                                                        <input
                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border) rounded-md p-2 outline-none"
                                                            type="text" name="" id="name">
                                                    </div>


                                                    <div
                                                        class="col-span-2 w-full flex gap-4 justify-between items-center">
                                                        <button
                                                            class="w-1/2 border-1 border-(--active) bg-(--active) sm:text-lg font-bold text-white py-2 rounded-md">ویرایش</button>
                                                        <button
                                                            class="w-1/2 border-1 border-(--border) bg-(--disactive) sm:text-lg font-bold text-white py-2 rounded-md">
                                                            لغو</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button
                                        class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="size-4 fill-(--disactive)">
                                            <path
                                                d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- تماس ها -->
        <!-- تحویل فیزیکی -->
        <div class="w-full flex flex-col gap-4 justify-start items-center hidden">
            <div
                class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="md:p-2 p-1.5 bg-green-200 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                            class="md:size-6 size-4 fill-(--active)">
                            <<path
                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">پیغام عمومی</span>
                </div>
                <div class="w-full flex flex-col justify-start items-center gap-2">
                    <div class="w-full flex justify-between items-center">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن
                            پیغام</label>
                        <span class="md:text-xs text-[10px] text-[#9BA4AA]">حذف پیغام</span>
                    </div>
                    <textarea name="" id=""
                        class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>
                </div>
                <button
                    class="self-end px-25 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    ثبت
                </button>
            </div>
            <div action=""
                class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="p-1 bg-(--active) rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">افزودن شعبه جدید</span>
                </div>
                <div class="w-full grid sm:grid-cols-2 grid-cols-1  gap-3 justify-start items-center">
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">عنوان</label>
                        <div
                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                            <input type="text" class="w-full outline-none font-bold rounded-xl max-lg:text-sm">
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                            تماس</label>
                        <div
                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                            <input type="text"
                                class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-4">
                                    <path
                                        d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">آدرس</label>
                        <textarea name="" id=""
                            class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>

                    </div>
                    <div class="w-full flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">توضیحات</label>
                        <textarea name="" id=""
                            class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>

                    </div>

                </div>
                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    افزودن شعبه
                </button>
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-2">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="md:p-2 p-1.5 bg-green-200 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                            class="md:size-6 size-4 fill-(--active)">
                            <path
                                d="M0 185.8c0-6.4 1.6-12.7 4.7-18.3L82.4 25C90.8 9.6 106.9 0 124.5 0h391c17.6 0 33.7 9.6 42.1 25l77.7 142.4c3.1 5.6 4.7 11.9 4.7 18.3c0 21.1-17.1 38.2-38.2 38.2H576V488c0 13.3-10.7 24-24 24s-24-10.7-24-24V224H384V472c0 22.1-17.9 40-40 40H104c-22.1 0-40-17.9-40-40V224H38.2C17.1 224 0 206.9 0 185.8zM112 224v96H336V224H112zM515.5 48l-391 0L54.7 176H585.3L515.5 48zM112 464H336V368H112v96z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">شعبه ها</span>
                </div>
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border-1 border-(--border) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-nowrap text-sm max-sm:text-xs">

                                <th class="border-1 border-(--border) px-3 py-2">
                                    عنوان
                                </th>
                                <th class="border-1 border-(--border) px-3 py-2">
                                    شماره تماس
                                </th>
                                <th class="border-1 border-(--border) px-3 py-2">
                                    آدرس
                                </th>

                                <th class="border-1 border-(--border) px-3 py-2">
                                    توضیحات
                                </th>
                                <th class="border-1 border-(--border) px-3 py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="item  font-bold max-sm:text-sm max-h-20">

                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    بناب
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    0992571265
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    بناب مسیتمس سایبمستی ب سمیابمسی یب سیمب ب یبسیب سیب یبل سیب ییبسیب
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 text-center">
                                    بناب مسیتمس سایبمستی ب سمیابمسی یب سیمب ب یبسیب سیب یبل سیب ییبسیب
                                </td>
                                <td class="border-1 border-(--border) px-3 py-2 flex gap-2">
                                    <div>
                                        <div data-edit_cart="open"
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
                                            <div class="lg:w-1/2 w-10/12 bg-white rounded-md px-3 py-2">
                                                <div
                                                    class="w-full flex items-center justify-between border-b-1 border-(--border) pb-2">
                                                    <div class="font-bold">ویرایش اطلاعات شعبه</div>
                                                    <div data-edit_cart="close_xmark" class="popup_edit_cart">
                                                        <svg class="size-6" fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 384 512">
                                                            <path
                                                                d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="w-full grid sm:grid-cols-2 grid-cols-1 gap-3 mt-5">
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2 max-sm:col-span-2">
                                                        <label for=""
                                                            class="md:text-sm text-xs font-bold text-[#8B929D]">عنوان</label>
                                                        <div
                                                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                            <input type="text"
                                                                class="w-full outline-none font-bold rounded-xl max-lg:text-sm">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2 max-sm:col-span-2">
                                                        <label for=""
                                                            class="md:text-sm text-xs font-bold text-[#8B929D]">شماره
                                                            تماس</label>
                                                        <div
                                                            class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                                            <input type="text"
                                                                class="w-10/12 outline-none font-bold rounded-xl max-lg:text-sm">
                                                            <div>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 576 512" class="size-4">
                                                                    <path
                                                                        d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2 max-sm:col-span-2">
                                                        <label for=""
                                                            class="md:text-sm text-xs font-bold text-[#8B929D]">آدرس</label>
                                                        <textarea name="" id=""
                                                            class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>

                                                    </div>
                                                    <div
                                                        class="w-full flex flex-col justify-start items-start gap-2 max-sm:col-span-2">
                                                        <label for=""
                                                            class="md:text-sm text-xs font-bold text-[#8B929D]">توضیحات</label>
                                                        <textarea name="" id=""
                                                            class="w-full h-22 outline-none border-2 border-(--border) p-2 font-bold rounded-xl bg-white"></textarea>
                                                    </div>
                                                    <div
                                                        class="col-span-2 w-full flex gap-4 justify-between items-center">
                                                        <button
                                                            class="w-1/2 border-1 border-(--active) bg-(--active) sm:text-lg font-bold text-white py-2 rounded-md">ویرایش</button>
                                                        <button
                                                            class="w-1/2 border-1 border-(--border) bg-(--disactive) sm:text-lg font-bold text-white py-2 rounded-md">
                                                            لغو</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button
                                        class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="size-4 fill-(--disactive)">
                                            <path
                                                d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- تحویل فیزیکی -->
        <!-- محدود سازی وزن -->
        <div class="w-full flex flex-col gap-4 justify-start items-center hidden">
            <div class="w-full flex gap-2 justify-start items-start">
                <div class="p-0.5 rounded-full border border-(--text-secondary)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 512"
                        class="size-3 fill-(--text-secondary)">
                        <path
                            d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V320c0 17.7 14.3 32 32 32s32-14.3 32-32V64zM32 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                    </svg>
                </div>
                <p class="lg:text-sm sm:text-xs text-[10px] text-(--text-secondary) font-bold">این قسمت میتواند وزن
                    / تعداد معاملات را برای مشتریان محدود کند</p>
            </div>
            <form action="" class="w-full flex flex-col gap-4 justify-start items-center">
                <div
                    class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                    <h5 class="text-lg font-bold">سکه</h5>
                    <div class="w-full flex max-sm:flex-col gap-4 justify-start items-center">
                        <div class="sm:w-1/2 w-full flex flex-col justify-start items-start gap-2">
                            <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">حداقل تعداد
                                در هر معامله</label>

                            <input type="text"
                                class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl font-bold max-lg:text-sm">

                        </div>
                        <div class="sm:w-1/2 w-full flex flex-col justify-start items-start gap-2">
                            <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">حداکثر تعداد
                                در هر معامله</label>
                            <input type="text"
                                class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl font-bold max-lg:text-sm">
                        </div>
                    </div>
                </div>
                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    ثبت تغییرات
                </button>
            </form>

        </div>
        <!-- محدود سازی وزن -->
    </div>
</div>
@endsection