@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | داشبوزد خانه جدید ')
@section('content')


<!-- dashboard_start -->
<div class="w-full flex flex-col gap-5 justify-start items-center">
    <div class="w-full grid sm:grid-cols-4 grid-cols-2 sm:grid-rows-1 grid-rows-2 sm:gap-5 gap-3">

        <div class="w-full min-h-full py-3 bg-white flex max-lg:flex-col lg:gap-5 gap-3 justify-start lg:items-start items-center p-3 border border-(--border) rounded-xl">
            <div class="p-2 rounded-full bg-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="sm:size-5 size-4 fill-green-900">
                    <path class="fa-secondary" d="M0 80C0 53.5 21.5 32 48 32H432c26.5 0 48 21.5 48 48V96v32 8.6c-9.4-5.4-20.3-8.6-32-8.6l-64 0v0H48C21.5 128 0 106.5 0 80z" />
                    <path class="fa-primary" d="M48 128H96v0l352 0c.4 0 .9 0 1.3 0c11.2 .2 21.6 3.6 30.7 8.9v-.3c19.1 11.1 32 31.7 32 55.4V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V240 192 80c0 26.5 21.5 48 48 48zM416 336a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 justify-start lg:items-start items-center">
                <h5 class="lg:text-lg max-sm:text-sm font-bold">نقد فردا</h5>
                <div class="flex gap-2 justify-start items-center">
                    <span class="lg:text-lg max-sm:text-sm font-bold">25,000,000</span>
                    <span class="lg:text-sm text-xs text-(--text-muted)">ریال</span>
                </div>
            </div>
        </div>
        <div class="w-full min-h-full py-3 bg-white flex max-lg:flex-col lg:gap-5 gap-3 justify-start lg:items-start items-center p-3 border border-(--border) rounded-xl">
            <div class="p-2 rounded-full bg-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="sm:size-5 size-4 fill-green-900">
                    <path d="M520 48H393.3C381 19.7 352.8 0 320 0s-61 19.7-73.3 48H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H241.6c5.8 28.6 26.9 51.7 54.4 60.3V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24H320 520c13.3 0 24-10.7 24-24s-10.7-24-24-24H344V156.3c27.5-8.6 48.6-31.7 54.4-60.3H520c13.3 0 24-10.7 24-24s-10.7-24-24-24zm-8 147.8L584.4 320H439.6L512 195.8zM386 337.1C396.8 382 449.1 416 512 416s115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L536.1 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L392.7 305.1c-5.7 9.8-9.3 21.1-6.7 32.1zM54.4 320l72.4-124.2L199.3 320H54.4zm72.4 96c62.9 0 115.2-34 126-78.9c2.6-11-1-22.3-6.7-32.1L150.9 141.8c-5-8.6-14.2-13.8-24.1-13.8s-19.1 5.3-24.1 13.8L7.6 305.1c-5.7 9.8-9.3 21.1-6.7 32.1C11.7 382 64 416 126.8 416zM320 48a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 justify-start lg:items-start items-center">
                <h5 class="lg:text-lg max-sm:text-sm font-bold">تراز معاملاتی</h5>
                <div class="flex gap-2 justify-start items-center">
                    <span class="lg:text-lg max-sm:text-sm font-bold">2,405,000,000</span>
                    <span class="lg:text-sm text-xs text-(--text-muted)">ریال</span>
                </div>
            </div>
        </div>
        <div class="w-full min-h-full py-3 bg-white flex max-lg:flex-col lg:gap-5 gap-3 justify-start lg:items-start items-center p-3 border border-(--border) rounded-xl">
            <div class="p-2 rounded-full bg-green-200">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-green-900">
                    <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 justify-start lg:items-start items-center">
                <h5 class="lg:text-lg max-sm:text-sm font-bold">خرید آینده نقدی</h5>
                <div class="flex gap-2 justify-start items-center">
                    <span class="lg:text-lg max-sm:text-sm font-bold">25,000,000</span>
                    <span class="lg:text-sm text-xs text-(--text-muted)">ریال</span>
                </div>
            </div>
        </div>
        <div class="w-full min-h-full py-3 bg-white flex flex-col lg:gap-5 gap-3 justify-start lg:items-start items-center p-3 border border-(--border) rounded-xl">
            <div class="w-full flex justify-between items-center">
                <h5 class="lg:text-lg max-sm:text-sm font-bold">وضعیت</h5>
                <div class="flex gap-2 justify-center items-center bg-green-100 rounded-full lg:px-4 px-2 lg:py-2 py-1">
                    <span class="lg:size-2 size-1.5 rounded-full bg-green-900"></span>
                    <span class="max-lg:text-sm max-sm:text-xs font-bold text-green-900">فعال</span>
                </div>
            </div>
            <div class="flex gap-2 justify-start items-center">
                <span class="size-2 rounded-full bg-green-900"></span>
                <p class="max-xl:text-sm max-sm:text-xs text-(--text-muted">حساب کاربری شما فعال می باشد</p>
            </div>
        </div>

        <!-- <div class="px-3 py-2 bg-white cart_shadow flex gap-10 justify-between items-center"> -->
        <!-- <h4 class="font-bold">نقد فردا</h4>
                         <div class="flex justify-start items-center gap-1">
                             <div class="bg-white cart_shadow flex gap-3 justify-between items-center text-sm font-bold text-(--disactive) p-2">
                                 <span>ف</span>
                                 <span>105,020</span>
                             </div>
                             <div class="bg-white cart_shadow flex gap-3 justify-between items-center text-sm font-bold text-(--active) p-2">
                                 <span>خ</span>
                                 <span>105,020</span>
                             </div>
                         </div> -->
        <!-- <div class="flex justify-start items-center sm:gap-5 gap-3">
                             <div class="sm:pl-7 pl-5 lg:h-13 h-11  flex sm:gap-4 gap-3 justify-start items-center rounded-full cart_shadow">
                                 <div class="lg:w-13 w-11 h-full bg-white rounded-full cart_shadow flex justify-center items-center">
                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4/12">
                                         <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                     </svg>
                                 </div>
                                 <div class="flex flex-col justify-center items-start gap-1">
                                     <span class="lg:text-xs text-[10px] text-(--text-secondary)">از تاریخ</span>
                                     <span class="lg:text-sm text-xs text-(--text-primary) font-bold">1404/05/01</span>
                                 </div>
                             </div>
                             <div class="sm:pl-7 pl-5 lg:h-13 h-11  flex sm:gap-4 gap-3 justify-start items-center rounded-full cart_shadow">
                                 <div class="lg:w-13 w-11 h-full bg-white rounded-full cart_shadow flex justify-center items-center">
                                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5/12">
                                         <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                                     </svg>
                                 </div>
                                 <div class="flex flex-col justify-center items-start gap-1">
                                     <span class="lg:text-xs text-[10px] text-(--text-secondary)">از تاریخ</span>
                                     <span class="lg:text-sm text-xs text-(--text-primary) font-bold">1404/05/01</span>
                                 </div>
                             </div>
                         </div> -->

        <!-- <div class="lg:w-1/2 w-full py-2 bg-[#F4F4F4] rounded-full flex gap-2 justify-start items-center px-4">
                             <div>
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5 fill-[#bcbcbc]">
                                     <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z" />
                                 </svg>
                             </div>
                             <input type="text" placeholder="جستجو..." class="w-full outline-none text-(--text-primary) font-bold">
                         </div> -->


        <!-- </div> -->
        <!-- <div class="h-full flex sm:gap-5 gap-3 justify-end items-center max-lg:hidden">
                         <div class="sm:px-3 py-1.5 p-1.5 rounded-full bg-white cart_shadow flex gap-1 justify-start items-center">
                             <div>
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-(--text-primary)">
                                     <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                                 </svg>
                             </div>
                             <span class="font-bold ">2</span>
                         </div>
                         <div class="relative sm:p-2.5 p-1.5 rounded-full bg-white cart_shadow">
                             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 fill-(--text-primary)">
                                 <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
                             </svg>
                             <span class="sm:size-2 size-1 bg-red-500 rounded-full absolute top-1.5 right-1.5"></span>
                         </div>
                     </div> -->
    </div>
    <div class="w-full flex flex-col gap-4 justify-start items-start">
        <div class="w-full bg-white rounded-xl md:hidden">
            <ul class="max-w-full flex gap-4 lg:gap-6 xl:gap-7 text-sm lg:text-base justify-start font-bold overflow-x-auto text-nowrap py-2">

                <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                    <div class="flex gap-2 justify-start items-center px-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="xl:size-4 size-5 rotate-90">
                                <path d="M182.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L128 141.3V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.3l41.4 41.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-96-96zm352 333.3c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L448 370.7V64c0-17.7-14.3-32-32-32s-32 14.3-32 32V370.7l-41.4-41.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0l96-96z"></path>
                            </svg>
                        </div>
                        <span>معاملات</span>
                    </div>
                    <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                </li>
                <li class="hover:text-(--active) flex justify-center flex-col items-center group cursor-pointer py-1 transition_normal">
                    <div class="flex gap-2 justify-start items-center px-2">
                        <div>
                            <svg version="1.1" viewBox="0 0 24 24" class="xl:size-4 size-5">
                                <path fill-rule="evenodd" d="M11.31 2.525a9.648 9.648 0 011.38 0c.055.004.135.05.162.16l.351 1.45c.153.628.626 1.08 1.173 1.278.205.074.405.157.6.249a1.832 1.832 0 001.733-.074l1.275-.776c.097-.06.186-.036.228 0 .348.302.674.628.976.976.036.042.06.13 0 .228l-.776 1.274a1.832 1.832 0 00-.074 1.734c.092.195.175.395.248.6.198.547.652 1.02 1.278 1.172l1.45.353c.111.026.157.106.161.161a9.653 9.653 0 010 1.38c-.004.055-.05.135-.16.162l-1.45.351a1.833 1.833 0 00-1.278 1.173 6.926 6.926 0 01-.25.6 1.832 1.832 0 00.075 1.733l.776 1.275c.06.097.036.186 0 .228a9.555 9.555 0 01-.976.976c-.042.036-.13.06-.228 0l-1.275-.776a1.832 1.832 0 00-1.733-.074 6.926 6.926 0 01-.6.248 1.833 1.833 0 00-1.172 1.278l-.353 1.45c-.026.111-.106.157-.161.161a9.653 9.653 0 01-1.38 0c-.055-.004-.135-.05-.162-.16l-.351-1.45a1.833 1.833 0 00-1.173-1.278 6.928 6.928 0 01-.6-.25 1.832 1.832 0 00-1.734.075l-1.274.776c-.097.06-.186.036-.228 0a9.56 9.56 0 01-.976-.976c-.036-.042-.06-.13 0-.228l.776-1.275a1.832 1.832 0 00.074-1.733 6.948 6.948 0 01-.249-.6 1.833 1.833 0 00-1.277-1.172l-1.45-.353c-.111-.026-.157-.106-.161-.161a9.648 9.648 0 010-1.38c.004-.055.05-.135.16-.162l1.45-.351a1.833 1.833 0 001.278-1.173 6.95 6.95 0 01.249-.6 1.832 1.832 0 00-.074-1.734l-.776-1.274c-.06-.097-.036-.186 0-.228.302-.348.628-.674.976-.976.042-.036.13-.06.228 0l1.274.776a1.832 1.832 0 001.734.074 6.95 6.95 0 01.6-.249 1.833 1.833 0 001.172-1.277l.353-1.45c.026-.111.106-.157.161-.161zM12 1c-.268 0-.534.01-.797.028-.763.055-1.345.617-1.512 1.304l-.352 1.45c-.02.078-.09.172-.225.22a8.45 8.45 0 00-.728.303c-.13.06-.246.044-.315.002l-1.274-.776c-.604-.368-1.412-.354-1.99.147-.403.348-.78.726-1.129 1.128-.5.579-.515 1.387-.147 1.99l.776 1.275c.042.069.059.185-.002.315a8.45 8.45 0 00-.302.728c-.05.135-.143.206-.221.225l-1.45.352c-.687.167-1.249.749-1.304 1.512a11.149 11.149 0 000 1.594c.055.763.617 1.345 1.304 1.512l1.45.352c.078.02.172.09.22.225.09.248.191.491.303.729.06.129.044.245.002.314l-.776 1.274c-.368.604-.354 1.412.147 1.99.348.403.726.78 1.128 1.129.579.5 1.387.515 1.99.147l1.275-.776c.069-.042.185-.059.315.002.237.112.48.213.728.302.135.05.206.143.225.221l.352 1.45c.167.687.749 1.249 1.512 1.303a11.125 11.125 0 001.594 0c.763-.054 1.345-.616 1.512-1.303l.352-1.45c.02-.078.09-.172.225-.22.248-.09.491-.191.729-.303.129-.06.245-.044.314-.002l1.274.776c.604.368 1.412.354 1.99-.147.403-.348.78-.726 1.129-1.128.5-.579.515-1.387.147-1.99l-.776-1.275c-.042-.069-.059-.185.002-.315.112-.237.213-.48.302-.728.05-.135.143-.206.221-.225l1.45-.352c.687-.167 1.249-.749 1.303-1.512a11.125 11.125 0 000-1.594c-.054-.763-.616-1.345-1.303-1.512l-1.45-.352c-.078-.02-.172-.09-.22-.225a8.469 8.469 0 00-.303-.728c-.06-.13-.044-.246-.002-.315l.776-1.274c.368-.604.354-1.412-.147-1.99-.348-.403-.726-.78-1.128-1.129-.579-.5-1.387-.515-1.99-.147l-1.275.776c-.069.042-.185.059-.315-.002a8.465 8.465 0 00-.728-.302c-.135-.05-.206-.143-.225-.221l-.352-1.45c-.167-.687-.749-1.249-1.512-1.304A11.149 11.149 0 0012 1zm2.5 11a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm1.5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <span>تنظیمات</span>
                    </div>
                    <div class="rounded-md group-hover:w-full w-[0px] bg-(--active) h-[2px] transition_normal"></div>
                </li>

            </ul>
        </div>
        <div class="w-full flex max-md:flex-col gap-4 justify-start items-start">
            <div class="md:w-40/100 w-full h-full flex flex-col gap-2 justify-start items-center max-md:hidden">
                <div class="w-full bg-white flex flex-col gap-2 justify-start items-center pb-3 overflow-y-hidden max-h-1000 rounded-xl transition_normal border-2 border-(--border)">
                    <div class="w-full py-2 flex flex-col gap-4 justify-start items-center">
                        <div class="w-full flex justify-between items-center h-10 xl:px-4 px-2">
                            <div class="w-12 h-6.5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
                            </div>
                            <div class="flex gap-4 justify-start items-center">
                                <span class="text-xl font-bold">سکه</span>
                                <div class="product_more_show_click">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5 rotate-180">
                                        <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full flex gap-3 justify-between items-center xl:px-4 px-2">
                            <div class="w-1/2 py-2 bg-white border border-(--border) rounded-xl flex justify-center items-center">
                                <span class="xl:text-sm text-xs text-(--text-primary) font-bold">مقطع های فعال (1)</span>
                            </div>
                            <div class="w-1/2 py-2 bg-(--border) rounded-xl flex justify-center items-center border border-white">
                                <span class="xl:text-sm text-xs text-#E7E8EA font-bold">مقطع های غیر فعال (1)</span>
                            </div>
                        </div>
                    </div>
                    <!-- product_sub_category_item -->
                    <div class=" w-full  xl:px-4 px-2 flex flex-col gap-2 justify-start items-center">
                        <!-- item_start -->
                        <div class="w-full border border-(--border) bg-white flex flex-col gap-3 justify-start items-center lg:p-2 p-1 rounded-xl">
                            <div class="w-full flex gap-4 justify-between items-center">
                                <h3 class="font-bold text-(--text-primary) max-xl:text-sm">سکه تمام بهار آزادی</h3>
                                <div class="flex justify-start items-center gap-1">
                                    <div class="flex justify-start items-center text-xs max-xl:text-[10px] text-(--text-muted)">
                                        <span> به روز رسانی :</span>
                                        <span class="font-bold">4دقیقه پیش </span>
                                    </div>
                                    <div data-setting_pro="open" class="setting_product_pup_up_click">
                                        <svg version="1.1" viewBox="0 0 24 24" class="octicon octicon-settings xl:size-5 size-4 fill-(--active)">
                                            <path fill-rule="evenodd" d="M11.31 2.525a9.648 9.648 0 011.38 0c.055.004.135.05.162.16l.351 1.45c.153.628.626 1.08 1.173 1.278.205.074.405.157.6.249a1.832 1.832 0 001.733-.074l1.275-.776c.097-.06.186-.036.228 0 .348.302.674.628.976.976.036.042.06.13 0 .228l-.776 1.274a1.832 1.832 0 00-.074 1.734c.092.195.175.395.248.6.198.547.652 1.02 1.278 1.172l1.45.353c.111.026.157.106.161.161a9.653 9.653 0 010 1.38c-.004.055-.05.135-.16.162l-1.45.351a1.833 1.833 0 00-1.278 1.173 6.926 6.926 0 01-.25.6 1.832 1.832 0 00.075 1.733l.776 1.275c.06.097.036.186 0 .228a9.555 9.555 0 01-.976.976c-.042.036-.13.06-.228 0l-1.275-.776a1.832 1.832 0 00-1.733-.074 6.926 6.926 0 01-.6.248 1.833 1.833 0 00-1.172 1.278l-.353 1.45c-.026.111-.106.157-.161.161a9.653 9.653 0 01-1.38 0c-.055-.004-.135-.05-.162-.16l-.351-1.45a1.833 1.833 0 00-1.173-1.278 6.928 6.928 0 01-.6-.25 1.832 1.832 0 00-1.734.075l-1.274.776c-.097.06-.186.036-.228 0a9.56 9.56 0 01-.976-.976c-.036-.042-.06-.13 0-.228l.776-1.275a1.832 1.832 0 00.074-1.733 6.948 6.948 0 01-.249-.6 1.833 1.833 0 00-1.277-1.172l-1.45-.353c-.111-.026-.157-.106-.161-.161a9.648 9.648 0 010-1.38c.004-.055.05-.135.16-.162l1.45-.351a1.833 1.833 0 001.278-1.173 6.95 6.95 0 01.249-.6 1.832 1.832 0 00-.074-1.734l-.776-1.274c-.06-.097-.036-.186 0-.228.302-.348.628-.674.976-.976.042-.036.13-.06.228 0l1.274.776a1.832 1.832 0 001.734.074 6.95 6.95 0 01.6-.249 1.833 1.833 0 001.172-1.277l.353-1.45c.026-.111.106-.157.161-.161zM12 1c-.268 0-.534.01-.797.028-.763.055-1.345.617-1.512 1.304l-.352 1.45c-.02.078-.09.172-.225.22a8.45 8.45 0 00-.728.303c-.13.06-.246.044-.315.002l-1.274-.776c-.604-.368-1.412-.354-1.99.147-.403.348-.78.726-1.129 1.128-.5.579-.515 1.387-.147 1.99l.776 1.275c.042.069.059.185-.002.315a8.45 8.45 0 00-.302.728c-.05.135-.143.206-.221.225l-1.45.352c-.687.167-1.249.749-1.304 1.512a11.149 11.149 0 000 1.594c.055.763.617 1.345 1.304 1.512l1.45.352c.078.02.172.09.22.225.09.248.191.491.303.729.06.129.044.245.002.314l-.776 1.274c-.368.604-.354 1.412.147 1.99.348.403.726.78 1.128 1.129.579.5 1.387.515 1.99.147l1.275-.776c.069-.042.185-.059.315.002.237.112.48.213.728.302.135.05.206.143.225.221l.352 1.45c.167.687.749 1.249 1.512 1.303a11.125 11.125 0 001.594 0c.763-.054 1.345-.616 1.512-1.303l.352-1.45c.02-.078.09-.172.225-.22.248-.09.491-.191.729-.303.129-.06.245-.044.314-.002l1.274.776c.604.368 1.412.354 1.99-.147.403-.348.78-.726 1.129-1.128.5-.579.515-1.387.147-1.99l-.776-1.275c-.042-.069-.059-.185.002-.315.112-.237.213-.48.302-.728.05-.135.143-.206.221-.225l1.45-.352c.687-.167 1.249-.749 1.303-1.512a11.125 11.125 0 000-1.594c-.054-.763-.616-1.345-1.303-1.512l-1.45-.352c-.078-.02-.172-.09-.22-.225a8.469 8.469 0 00-.303-.728c-.06-.13-.044-.246-.002-.315l.776-1.274c.368-.604.354-1.412-.147-1.99-.348-.403-.726-.78-1.128-1.129-.579-.5-1.387-.515-1.99-.147l-1.275.776c-.069.042-.185.059-.315-.002a8.465 8.465 0 00-.728-.302c-.135-.05-.206-.143-.225-.221l-.352-1.45c-.167-.687-.749-1.249-1.512-1.304A11.149 11.149 0 0012 1zm2.5 11a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm1.5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <!-- setting_product_pup_up_item -->
                                    <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                        <div data-setting_pro="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 setting_product_pup_up_click"></div>
                                        <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                            <div data-setting_pro="close_xmark" class="absolute top-5 left-5 setting_product_pup_up_click">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                </svg>
                                            </div>
                                            <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                                <h5 class="lg:text-xl sm:text-lg font-bold">تنظیمات</h5>
                                                <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(سکه تمام بهار آزادی)</span>
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
                                                        <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">توع</label>
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
                                </div>

                            </div>
                            <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center">
                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                    <div class="w-full flex justify-between items-center">
                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>
                                        <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
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
                                    </div>
                                </div>
                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                    <div class="w-full flex justify-between items-center">
                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">خرید</h5>
                                        <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
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
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- item_end -->
                        <!-- item_start -->
                        <div class="w-full border border-(--border) bg-white flex flex-col gap-3 justify-start items-center lg:p-2 p-1 rounded-xl">
                            <div class="w-full flex gap-4 justify-between items-center">
                                <h3 class="font-bold text-(--text-primary) max-xl:text-sm">سکه تمام بهار آزادی</h3>
                                <div class="flex justify-start items-center gap-1">
                                    <div class="flex justify-start items-center text-xs max-xl:text-[10px] text-(--text-muted)">
                                        <span> به روز رسانی :</span>
                                        <span class="font-bold">4دقیقه پیش </span>
                                    </div>
                                    <div data-setting_pro="open" class="setting_product_pup_up_click">
                                        <svg version="1.1" viewBox="0 0 24 24" class="octicon octicon-settings xl:size-5 size-4 fill-(--active)">
                                            <path fill-rule="evenodd" d="M11.31 2.525a9.648 9.648 0 011.38 0c.055.004.135.05.162.16l.351 1.45c.153.628.626 1.08 1.173 1.278.205.074.405.157.6.249a1.832 1.832 0 001.733-.074l1.275-.776c.097-.06.186-.036.228 0 .348.302.674.628.976.976.036.042.06.13 0 .228l-.776 1.274a1.832 1.832 0 00-.074 1.734c.092.195.175.395.248.6.198.547.652 1.02 1.278 1.172l1.45.353c.111.026.157.106.161.161a9.653 9.653 0 010 1.38c-.004.055-.05.135-.16.162l-1.45.351a1.833 1.833 0 00-1.278 1.173 6.926 6.926 0 01-.25.6 1.832 1.832 0 00.075 1.733l.776 1.275c.06.097.036.186 0 .228a9.555 9.555 0 01-.976.976c-.042.036-.13.06-.228 0l-1.275-.776a1.832 1.832 0 00-1.733-.074 6.926 6.926 0 01-.6.248 1.833 1.833 0 00-1.172 1.278l-.353 1.45c-.026.111-.106.157-.161.161a9.653 9.653 0 01-1.38 0c-.055-.004-.135-.05-.162-.16l-.351-1.45a1.833 1.833 0 00-1.173-1.278 6.928 6.928 0 01-.6-.25 1.832 1.832 0 00-1.734.075l-1.274.776c-.097.06-.186.036-.228 0a9.56 9.56 0 01-.976-.976c-.036-.042-.06-.13 0-.228l.776-1.275a1.832 1.832 0 00.074-1.733 6.948 6.948 0 01-.249-.6 1.833 1.833 0 00-1.277-1.172l-1.45-.353c-.111-.026-.157-.106-.161-.161a9.648 9.648 0 010-1.38c.004-.055.05-.135.16-.162l1.45-.351a1.833 1.833 0 001.278-1.173 6.95 6.95 0 01.249-.6 1.832 1.832 0 00-.074-1.734l-.776-1.274c-.06-.097-.036-.186 0-.228.302-.348.628-.674.976-.976.042-.036.13-.06.228 0l1.274.776a1.832 1.832 0 001.734.074 6.95 6.95 0 01.6-.249 1.833 1.833 0 001.172-1.277l.353-1.45c.026-.111.106-.157.161-.161zM12 1c-.268 0-.534.01-.797.028-.763.055-1.345.617-1.512 1.304l-.352 1.45c-.02.078-.09.172-.225.22a8.45 8.45 0 00-.728.303c-.13.06-.246.044-.315.002l-1.274-.776c-.604-.368-1.412-.354-1.99.147-.403.348-.78.726-1.129 1.128-.5.579-.515 1.387-.147 1.99l.776 1.275c.042.069.059.185-.002.315a8.45 8.45 0 00-.302.728c-.05.135-.143.206-.221.225l-1.45.352c-.687.167-1.249.749-1.304 1.512a11.149 11.149 0 000 1.594c.055.763.617 1.345 1.304 1.512l1.45.352c.078.02.172.09.22.225.09.248.191.491.303.729.06.129.044.245.002.314l-.776 1.274c-.368.604-.354 1.412.147 1.99.348.403.726.78 1.128 1.129.579.5 1.387.515 1.99.147l1.275-.776c.069-.042.185-.059.315.002.237.112.48.213.728.302.135.05.206.143.225.221l.352 1.45c.167.687.749 1.249 1.512 1.303a11.125 11.125 0 001.594 0c.763-.054 1.345-.616 1.512-1.303l.352-1.45c.02-.078.09-.172.225-.22.248-.09.491-.191.729-.303.129-.06.245-.044.314-.002l1.274.776c.604.368 1.412.354 1.99-.147.403-.348.78-.726 1.129-1.128.5-.579.515-1.387.147-1.99l-.776-1.275c-.042-.069-.059-.185.002-.315.112-.237.213-.48.302-.728.05-.135.143-.206.221-.225l1.45-.352c.687-.167 1.249-.749 1.303-1.512a11.125 11.125 0 000-1.594c-.054-.763-.616-1.345-1.303-1.512l-1.45-.352c-.078-.02-.172-.09-.22-.225a8.469 8.469 0 00-.303-.728c-.06-.13-.044-.246-.002-.315l.776-1.274c.368-.604.354-1.412-.147-1.99-.348-.403-.726-.78-1.128-1.129-.579-.5-1.387-.515-1.99-.147l-1.275.776c-.069.042-.185.059-.315-.002a8.465 8.465 0 00-.728-.302c-.135-.05-.206-.143-.225-.221l-.352-1.45c-.167-.687-.749-1.249-1.512-1.304A11.149 11.149 0 0012 1zm2.5 11a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm1.5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <!-- setting_product_pup_up_item -->
                                    <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal">
                                        <div data-setting_pro="close_black" class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1 setting_product_pup_up_click"></div>
                                        <div class="sm:w-9/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                                            <div data-setting_pro="close_xmark" class="absolute top-5 left-5 setting_product_pup_up_click">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-7">
                                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                                </svg>
                                            </div>
                                            <div class="px-5 py-5 flex gap-2 justify-start items-center">
                                                <h5 class="lg:text-xl sm:text-lg font-bold">تنظیمات</h5>
                                                <span class="max-lg:text-sm max-sm:text-xs font-bold text-[#58626A]">(سکه تمام بهار آزادی)</span>
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
                                                        <label for="group" class="pr-3 lg:text-sm text-xs text-[#58626A] font-bold">توع</label>
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
                                </div>

                            </div>
                            <div class="w-full flex max-lg:flex-col max-md:flex-row max-sm:flex-col  gap-2 justify-between items-center">
                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white shadow-sm shadow-(--color_product) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                    <div class="w-full flex justify-between items-center">
                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">فروش</h5>
                                        <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
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
                                    </div>
                                </div>
                                <div class="lg:w-1/2 md:w-full w-full h-full bg-white border border-(--border) flex flex-col gap-2 justify-start items-center p-2 rounded-xl">
                                    <div class="w-full flex justify-between items-center">
                                        <h5 class="max-xl:text-sm text-(--text-primary) font-bold">خرید</h5>
                                        <div class="xl:w-10 xl:h-5.5 w-9 h-5 bg-(--border) rounded-full flex justify-end items-center transition_normal relative group p-0.5 change_status_product">
                                            <div class="w-1/2 h-full rounded-full bg-white transition_normal"></div>
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
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- item_end -->






                    </div>
                    <!-- product_sub_category_item -->

                </div>




            </div>
            <div class="md:w-60/100 w-full sm:h-full bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-2 ">
                <div class="w-full flex justify-between items-center">
                    <div class="px-2 py-1.5 bg-white flex gap-2 justify-start items-center rounded-xl border border-(--border)" onclick="traz_moamelaty_pup_up('open')">
                        <h6 class="font-bold text-(--text-primary) max-lg:text-sm max-sm:text-xs">تراز معاملات :</h6>
                        <div class="flex gap-1 justify-start items-center text-(--text-secondary) lg:text-sm sm:text-xs text-[10px]">
                            <span>0</span>
                            <span class="font-bold">گرم</span>
                        </div>
                        <span class="min-w-[1px] w-[1px] h-8/12 bg-(--text-muted) rounded-full"></span>
                        <div class="flex gap-1 justify-start items-center text-(--text-secondary) lg:text-sm text-xs">
                            <span>0</span>
                            <span class="font-bold">ریال</span>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-4 size-3 rotate-90">
                                <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                            </svg>
                        </div>
                    </div>
                    <span class="sm:px-4 px-2 sm:py-2 py-1 border-2 border-(--border)  font-bold rounded-xl max-lg:text-sm max-sm:text-xs">
                        ارسال خودکار
                    </span>
                </div>

                <!-- تراز معاملاتی پاپ آپ-->
                <div class="w-full h-full fixed top-0 right-0 z-3 flex justify-center items-center invisible opacity-0 transition_normal" id="traz_moamelaty_pup_up_item">
                    <div class="w-full h-full bg-black/50 absolute top-0 right-0 -z-1" onclick="traz_moamelaty_pup_up('close')" id="traz_moamelaty_pup_up_item_close_black"></div>
                    <div class="lg:w-9/12 sm:w-11/12 w-full sm:h-11/12 h-full bg-white flex flex-col justify-start items-start relative overflow-y-auto">
                        <div class="absolute sm:top-5 top-2.5 sm:left-5 left-2.5" onclick="traz_moamelaty_pup_up('close')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="sm:size-7 size-5">
                                <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                            </svg>
                        </div>
                        <div class="sm:p-5 p-2.5 flex gap-2 justify-start items-center">
                            <h5 class="lg:text-xl sm:text-lg font-bold">گزارش معاملات روزانه</h5>
                        </div>
                        <span class="w-full h-0.5 bg-[#F2F2F2] rounded-full"></span>
                        <div class="w-full flex flex-col gap-4 justify-start items-start sm:p-5 p-2.5">
                            <div class="w-full flex max-sm:flex-col max-sm:gap-3 sm:justify-between items-center">
                                <div class="flex gap-2 justify-start items-center text-sm font-bold">
                                    <div class="sm:px-3 px-2 sm:py-1.5 py-1 bg-green-200 max-lg:text-sm max-sm:text-xs text-(--active) rounded-xl border-2 border-(--border)">امروز</div>
                                    <div class="sm:px-3 px-2 sm:py-1.5 py-1 bg-[#FBFCFE] text-[#88929A] rounded-xl border-2 border-(--border)">دیروز</div>
                                    <div class="sm:px-3 px-2 sm:py-1.5 py-1 bg-[#FBFCFE] text-[#88929A] rounded-xl border-2 border-(--border)">هفتگی</div>
                                    <div class="sm:px-3 px-2 sm:py-1.5 py-1 bg-[#FBFCFE] text-[#88929A] rounded-xl border-2 border-(--border)">ماهانه</div>
                                </div>
                                <div class="sm:w-4/12 w-full bg-white border-2 border-(--border) flex justify-between items-center lg:px-4 px-2 lg:py-3 py-1.5 rounded-xl">
                                    <div class="flex lg:gap-4 gap-2 justify-start items-center">
                                        <div>
                                            <svg version="1.1" class="can-badge can-alert has-solid lg:size-5 sm:size-4 size-3" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" focusable="false" role="img">
                                                <path class="clr-i-outline clr-i-outline-path-1" d="M32.25,6H29V8h3V30H4V8H7V6H3.75A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V7.81A1.78,1.78,0,0,0,32.25,6Z"></path>
                                                <path class="clr-i-outline clr-i-outline-path-14" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z"></path>
                                                <path class="clr-i-outline clr-i-outline-path-15" d="M26,10a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V9A1,1,0,0,0,26,10Z"></path>
                                                <path class="clr-i-outline--badged clr-i-outline-path-1--badged" d="M32,13.22V30H4V8H7V6H3.75A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V12.34A7.45,7.45,0,0,1,32,13.22Z" style="display:none"></path>
                                                <path class="clr-i-outline--badged clr-i-outline-path-14--badged" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z" style="display:none"></path>
                                                <path class="clr-i-outline--badged clr-i-outline-path-15--badged" d="M22.5,6H13V8h9.78A7.49,7.49,0,0,1,22.5,6Z" style="display:none"></path>
                                                <path class="clr-i-outline--alerted clr-i-outline-path-1--alerted" d="M33.68,15.4H32V30H4V8H7V6H3.75A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V15.38Z" style="display:none"></path>
                                                <path class="clr-i-outline--alerted clr-i-outline-path-12--alerted" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z" style="display:none"></path>
                                                <path class="clr-i-outline--alerted clr-i-outline-path-13--alerted clr-i-alert" d="M26.85,1.14,21.13,11A1.28,1.28,0,0,0,22.23,13H33.68A1.28,1.28,0,0,0,34.78,11L29.06,1.14A1.28,1.28,0,0,0,26.85,1.14Z" style="display:none"></path>
                                                <path class="clr-i-solid clr-i-solid-path-1" d="M32.25,6h-4V9a2.2,2.2,0,1,1-4.4,0V6H12.2V9A2.2,2.2,0,0,1,7.8,9V6h-4A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V7.81A1.78,1.78,0,0,0,32.25,6ZM10,26H8V24h2Zm0-5H8V19h2Zm0-5H8V14h2Zm6,10H14V24h2Zm0-5H14V19h2Zm0-5H14V14h2Zm6,10H20V24h2Zm0-5H20V19h2Zm0-5H20V14h2Zm6,10H26V24h2Zm0-5H26V19h2Zm0-5H26V14h2Z" style="display:none"></path>
                                                <path class="clr-i-solid clr-i-solid-path-2" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z" style="display:none"></path>
                                                <path class="clr-i-solid clr-i-solid-path-3" d="M26,10a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V9A1,1,0,0,0,26,10Z" style="display:none"></path>
                                                <path class="clr-i-solid--badged clr-i-solid-path-1--badged" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z" style="display:none"></path>
                                                <path class="clr-i-solid--badged clr-i-solid-path-2--badged" d="M30,13.5A7.5,7.5,0,0,1,22.5,6H12.2V9A2.2,2.2,0,0,1,7.8,9V6h-4A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V12.34A7.45,7.45,0,0,1,30,13.5ZM10,26H8V24h2Zm0-5H8V19h2Zm0-5H8V14h2Zm6,10H14V24h2Zm0-5H14V19h2Zm0-5H14V14h2Zm6,10H20V24h2Zm0-5H20V19h2Zm0-5H20V14h2Zm6,10H26V24h2Zm0-5H26V19h2Zm0-5H26V14h2Z" style="display:none"></path>
                                                <path class="clr-i-solid--alerted clr-i-solid-path-1--alerted" d="M33.68,15.4H22.23A3.68,3.68,0,0,1,19,9.89L21.29,6H12.2V9A2.2,2.2,0,0,1,7.8,9V6h-4A1.78,1.78,0,0,0,2,7.81V30.19A1.78,1.78,0,0,0,3.75,32h28.5A1.78,1.78,0,0,0,34,30.19V15.38ZM10,26H8V24h2Zm0-5H8V19h2Zm0-5H8V14h2Zm6,10H14V24h2Zm0-5H14V19h2Zm0-5H14V14h2Zm6,10H20V24h2Zm0-5H20V19h2Zm6,5H26V24h2Zm0-5H26V19h2Z" style="display:none"></path>
                                                <path class="clr-i-solid--alerted clr-i-solid-path-2--alerted" d="M10,10a1,1,0,0,0,1-1V3A1,1,0,0,0,9,3V9A1,1,0,0,0,10,10Z" style="display:none"></path>
                                                <path class="clr-i-solid--alerted clr-i-solid-path-3--alerted clr-i-alert" d="M26.85,1.14,21.13,11A1.28,1.28,0,0,0,22.23,13H33.68A1.28,1.28,0,0,0,34.78,11L29.06,1.14A1.28,1.28,0,0,0,26.85,1.14Z" style="display:none"></path>
                                                <rect class="clr-i-outline clr-i-outline-path-2" x="8" y="14" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-3" x="14" y="14" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-4" x="20" y="14" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-5" x="26" y="14" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-6" x="8" y="19" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-7" x="14" y="19" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-8" x="20" y="19" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-9" x="26" y="19" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-10" x="8" y="24" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-11" x="14" y="24" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-12" x="20" y="24" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-13" x="26" y="24" width="2" height="2"></rect>
                                                <rect class="clr-i-outline clr-i-outline-path-16" x="13" y="6" width="10" height="2"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-2--badged" x="8" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-3--badged" x="14" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-4--badged" x="20" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-5--badged" x="26" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-6--badged" x="8" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-7--badged" x="14" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-8--badged" x="20" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-9--badged" x="26" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-10--badged" x="8" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-11--badged" x="14" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-12--badged" x="20" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--badged clr-i-outline-path-13--badged" x="26" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-2--alerted" x="8" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-3--alerted" x="14" y="14" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-4--alerted" x="8" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-5--alerted" x="14" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-6--alerted" x="20" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-7--alerted" x="26" y="19" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-8--alerted" x="8" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-9--alerted" x="14" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-10--alerted" x="20" y="24" width="2" height="2" style="display:none"></rect>
                                                <rect class="clr-i-outline--alerted clr-i-outline-path-11--alerted" x="26" y="24" width="2" height="2" style="display:none"></rect>
                                                <circle class="clr-i-outline--badged clr-i-outline-path-16--badged clr-i-badge" cx="30" cy="6" r="5" style="display:none"></circle>
                                                <circle class="clr-i-solid--badged clr-i-solid-path-3--badged clr-i-badge" cx="30" cy="6" r="5" style="display:none"></circle>
                                                <polygon points="21.29 6 13 6 13 8 20.14 8 21.29 6"></polygon>
                                            </svg>
                                        </div>
                                        <span class="font-bold text-[#A7B0BB] max-lg:text-sm max-sm:text-xs">انتخاب تاریخ</span>
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="lg:size-5 sm:size-4 size-3">
                                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full  px-2 bg-[#F6FAF9] flex max-sm:flex-col sm:justify-between items-center border border-[#A7B0BB] rounded-xl">
                                <span class="py-3 lg:text-lg max-sm:text-sm font-bold text-nowrap">مجموع تراز آبشده</span>
                                <div class="sm:w-8/12 w-full h-full flex gap-5 justify-between">
                                    <div class="flex gap-2 justify-start items-center py-3">
                                        <span class="lg:text-sm text-xs text-[#A7B0BB]">(گرم)</span>
                                        <span class="font-bold text-(--disactive) max-lg:text-sm">{{number_format(108877)}}</span>
                                    </div>
                                    <span class="min-w-0.5 max-w-0.5 h-full bg-(--border)"></span>
                                    <div class="flex gap-2 justify-start items-center py-3">
                                        <span class="font-bold text-(--active) max-lg:text-sm">{{number_format(101010101010)}}</span>
                                        <span class="lg:text-sm text-xs text-[#A7B0BB]">ریال</span>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 justify-start items-center">
                                <div class="w-full flex flex-col justify-start items-center border-2 border-(--border) rounded-xl">
                                    <div class="w-full flex justify-start items-center bg-[#F6FAF9] sm:p-2 p-1.5">
                                        <div class="w-5/12 lg:text-lg max-sm:text-sm font-bold">تمام سکه طرح جدید</div>
                                        <div class="w-3/12 lg:text-sm sm:text-xs text-[10px] text-[#A7B0BB]">تعداد (عدد)</div>
                                        <div class="w-3/12 lg:text-sm sm:text-xs text-[10px] text-[#A7B0BB]">مبلغ (ریال)</div>
                                    </div>
                                    <div class="w-full flex justify-start items-center sm:p-2 p-1.5 border-b-2 border-(--border)">
                                        <div class="w-5/12 flex flex-col gap-1 justify-start items-start">
                                            <div class="max-lg:text-sm max-sm:text-xs font-bold">تراز کل</div>
                                            <p class="text-xs max-sm:text-[9px] text-[#A7B0BB]">3 عدد معادل 34.319 گرم</p>
                                        </div>
                                        <div class="w-3/12 text-(--disactive) font-bold max-lg:text-sm max-sm:text-xs">3-</div>
                                        <div class="w-3/12 max-lg:text-sm max-sm:text-xs font-bold text-(--active)">
                                            <span>{{number_format(450222000121)}}</span>
                                            <span>+</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-start items-center sm:p-2 p-1.5 border-b-2 border-(--border)">
                                        <div class="w-5/12 max-lg:text-sm max-sm:text-xs font-bold">فروش</div>
                                        <div class="w-3/12 max-lg:text-sm max-sm:text-xs font-bold">3-</div>
                                        <div class="w-3/12 max-lg:text-sm max-sm:text-xs font-bold">
                                            <span>{{number_format(450222000121)}}</span>
                                            <span>+</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-start items-center sm:p-2 p-1.5 border-b-2 border-(--border)">
                                        <div class="w-5/12 max-lg:text-sm max-sm:text-xs font-bold">خرید</div>
                                        <div class="w-3/12 max-lg:text-sm max-sm:text-xs font-bold">3-</div>
                                        <div class="w-3/12 max-lg:text-sm max-sm:text-xs font-bold">
                                            <span>{{number_format(450222000121)}}</span>
                                            <span>+</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-between items-center bg-[#F6FAF9] sm:p-2 p-1.5">
                                        <div class="sm:text-sm text-xs text-[#A7B0BB]">
                                            <span>تعداد معامله:</span>
                                            <span>42</span>
                                            <span>عدد</span>
                                        </div>
                                        <div class="flex sm:gap-3 gap-2 justify-start items-center">
                                            <span class="font-bold text-(--active) max-sm:text-sm">مشاهده معاملات</span>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="sm:size-5 size-4 rotate-90 fill-(--active)">
                                                    <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- تراز معاملاتی پاپ آپ-->

                <div class="w-full flex flex-col gap-2 justify-start items-center">
                    <!-- order_item -->
                    <div class="w-full bg-white border-2 border-(--border) flex flex-col gap-2 justify-start items-start p-2 rounded-xl">
                        <div class="w-full flex justify-between items-center">
                            <div class="px-3 py-1.5 bg-green-300 rounded-xl flex gap-1 justify-start items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-green-900">
                                        <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                </div>
                                <span class="text-green-900 font-bold max-xl:text-sm max-lg:text-xs">خرید سکه تمام بهار آزادی</span>
                            </div>
                            <div class="flex gap-1 justify-start items-center">
                                <span class="text-green-900 font-bold max-sm:text-sm time_order">00:00</span>
                                <div>
                                    <svg version="1.1" viewBox="0 0 16 16" class="size-5 max-sm:size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.75.75A.75.75 0 016.5 0h3a.75.75 0 010 1.5h-.75v1l-.001.041a6.718 6.718 0 013.464 1.435l.007-.006.75-.75a.75.75 0 111.06 1.06l-.75.75-.006.007a6.75 6.75 0 11-10.548 0L2.72 5.03l-.75-.75a.75.75 0 011.06-1.06l.75.75.007.006A6.718 6.718 0 017.25 2.541a.756.756 0 010-.041v-1H6.5a.75.75 0 01-.75-.75zM8 14.5A5.25 5.25 0 108 4a5.25 5.25 0 000 10.5zm.389-6.7l1.33-1.33a.75.75 0 111.061 1.06L9.45 8.861A1.502 1.502 0 018 10.75a1.5 1.5 0 11.389-2.95z"></path>
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <div class="w-full flex max-sm:flex-col max-sm:gap-1 justify-start">
                            <div class="sm:w-4/12 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">مشتری</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    حامد ستاری انور اصل مطلق بناب

                                </div>
                            </div>
                            <div class="sm:w-3/24 sm:min-h-full w-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap ">وزن (گرم)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    1.036
                                </div>
                            </div>
                            <div class="sm:w-7/24 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap ">کضنه (ربال)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    250,000,000,000
                                </div>
                            </div>
                            <div class="sm:w-3/12 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap sm:rounded-tl-md sm:rounded-bl-xs max-sm:rounded-l-md">مبلغ کل (ریال)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    250,555,000,000


                                </div>
                            </div>


                        </div>
                        <div class="w-full flex max-sm:flex-col max-sm:gap-2 justify-between items-center">
                            <div class="sm:w-74/100 w-full flex justify-between items-center">
                                <div class="w-49/100 h-full bg-(--active) rounded-lg flex justify-center items-center xl:text-lg max-lg:text-sm font-bold text-white py-2">تایید</div>
                                <div class="w-49/100 h-full bg-(--disactive) rounded-lg flex justify-center items-center xl:text-lg max-lg:text-sm font-bold text-white py-2">رد کردن</div>
                            </div>
                            <div class="sm:w-24/100 w-full h-full relative">
                                <div class="h-full border-2 border-(--disactive) rounded-lg flex gap-2 justify-center items-center py-2 xl:text-sm text-xs reason_reject_order_drap_down">
                                    <span class="text-(--disactive) font-bold">رد به دلیل</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-(--disactive)">
                                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- drop_down_item -->
                                <div class="w-full max-h-0 overflow-y-hidden bg-white absolute top-11 right-0 flex flex-col gap-2 justify-start items-center rounded-lg transition_normal z-1 xl:text-sm text-xs">
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                </div>
                                <!-- drop_down_item -->

                            </div>
                        </div>
                    </div>
                    <!-- order_item -->
                    <!-- order_item -->
                    <div class="w-full bg-white border-2 border-(--border) flex flex-col gap-2 justify-start items-start p-2 rounded-xl">
                        <div class="w-full flex justify-between items-center">
                            <div class="px-3 py-1.5 bg-green-300 rounded-xl flex gap-1 justify-start items-center">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-green-900">
                                        <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                </div>
                                <span class="text-green-900 font-bold max-xl:text-sm max-lg:text-xs">خرید سکه تمام بهار آزادی</span>
                            </div>
                            <div class="flex gap-1 justify-start items-center">
                                <span class="text-green-900 font-bold max-sm:text-sm time_order">00:00</span>
                                <div>
                                    <svg version="1.1" viewBox="0 0 16 16" class="size-5 max-sm:size-4" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.75.75A.75.75 0 016.5 0h3a.75.75 0 010 1.5h-.75v1l-.001.041a6.718 6.718 0 013.464 1.435l.007-.006.75-.75a.75.75 0 111.06 1.06l-.75.75-.006.007a6.75 6.75 0 11-10.548 0L2.72 5.03l-.75-.75a.75.75 0 011.06-1.06l.75.75.007.006A6.718 6.718 0 017.25 2.541a.756.756 0 010-.041v-1H6.5a.75.75 0 01-.75-.75zM8 14.5A5.25 5.25 0 108 4a5.25 5.25 0 000 10.5zm.389-6.7l1.33-1.33a.75.75 0 111.061 1.06L9.45 8.861A1.502 1.502 0 018 10.75a1.5 1.5 0 11.389-2.95z"></path>
                                    </svg>
                                </div>
                            </div>

                        </div>

                        <div class="w-full flex max-sm:flex-col max-sm:gap-1 justify-start">
                            <div class="sm:w-4/12 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap sm:rounded-tr-md sm:rounded-br-xs max-sm:rounded-r-md">مشتری</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    حامد ستاری انور اصل مطلق بناب

                                </div>
                            </div>
                            <div class="sm:w-3/24 sm:min-h-full w-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap ">وزن (گرم)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    1.036
                                </div>
                            </div>
                            <div class="sm:w-7/24 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap ">کضنه (ربال)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    250,000,000,000
                                </div>
                            </div>
                            <div class="sm:w-3/12 w-full sm:min-h-full flex sm:flex-col justify-start sm:items-center">
                                <div class="sm:w-full w-4/12 max-sm:min-h-full bg-(--border) flex justify-start items-center py-2 sm:px-2 px-4 text-xs sm:text-[8px] xl:text-xs max-sm:text-nowrap sm:rounded-tl-md sm:rounded-bl-xs max-sm:rounded-l-md">مبلغ کل (ریال)</div>
                                <div class="w-full h-full py-2 px-2 bg-white xl:text-sm text-xs font-bold border-2 border-(--border) sm:rounded-r-md rounded-l-md">
                                    250,555,000,000


                                </div>
                            </div>


                        </div>
                        <div class="w-full flex max-sm:flex-col max-sm:gap-2 justify-between items-center">
                            <div class="sm:w-74/100 w-full flex justify-between items-center">
                                <div class="w-49/100 h-full bg-(--active) rounded-lg flex justify-center items-center xl:text-lg max-lg:text-sm font-bold text-white py-2">تایید</div>
                                <div class="w-49/100 h-full bg-(--disactive) rounded-lg flex justify-center items-center xl:text-lg max-lg:text-sm font-bold text-white py-2">رد کردن</div>
                            </div>
                            <div class="sm:w-24/100 w-full h-full relative">
                                <div class="h-full border-2 border-(--disactive) rounded-lg flex gap-2 justify-center items-center py-2 xl:text-sm text-xs reason_reject_order_drap_down">
                                    <span class="text-(--disactive) font-bold">رد به دلیل</span>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-(--disactive)">
                                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <!-- drop_down_item -->
                                <div class="w-full max-h-0 overflow-y-hidden bg-white absolute top-11 right-0 flex flex-col gap-2 justify-start items-center rounded-lg transition_normal z-1 xl:text-sm text-xs">
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                    <div class="w-full py-2 border-2 border-(--disactive) rounded-lg text-(--disactive) flex justify-center items-center">تغییر مظنه</div>
                                </div>
                                <!-- drop_down_item -->

                            </div>
                        </div>
                    </div>
                    <!-- order_item -->



                </div>

            </div>
        </div>
    </div>
</div>
<!-- dashboard_end -->



<script>
    // home_dashboard_start
    let change_status_product = document.querySelectorAll('.change_status_product')
    change_status_product.forEach((item) => {
        item.addEventListener('click', function() {
            item.children[0].classList.toggle('translate-x-full')
            item.classList.toggle('bg-(--active)')
            item.classList.toggle('bg-(--border)')

        })
    })



    let change_price_product = document.querySelectorAll('.change_price_product')
    change_price_product.forEach((item) => {
        item.addEventListener('click', function() {
            if (item.getAttribute('data-price_pro') == 'plus') {
                let x = item.nextElementSibling.getAttribute('value')
                x++
                item.nextElementSibling.setAttribute('value', x)

            }
            if (item.getAttribute('data-price_pro') == 'minus') {
                let y = item.previousElementSibling.getAttribute('value')
                y--
                item.previousElementSibling.setAttribute('value', y)
            }

        })
    })




    // let closest = document.querySelectorAll('.closest')
    let product_more_show_click = document.querySelectorAll('.product_more_show_click')
    // let x = product_more_show_click.closest('.closest')
    product_more_show_click.forEach((item) => {
        item.addEventListener('click', function() {

            item.parentElement.parentElement.parentElement.parentElement.classList.toggle('max-h-14')
            item.parentElement.parentElement.parentElement.parentElement.classList.toggle('max-h-1000')
            item.classList.toggle('rotate-180')
        })
        console.log(item)

    })


    let reason_reject_order_drap_down = document.querySelectorAll('.reason_reject_order_drap_down')
    reason_reject_order_drap_down.forEach((item) => {
        item.addEventListener('click', function() {
            item.nextElementSibling.classList.toggle('max-h-0')
            item.nextElementSibling.classList.toggle('max-h-200')
            item.nextElementSibling.classList.toggle('p-1')
        })
    })




    let setting_product_pup_up_click = document.querySelectorAll('.setting_product_pup_up_click')
    setting_product_pup_up_click.forEach((item) => {
        item.addEventListener('click', function(data) {
            if (item.getAttribute('data-setting_pro') == 'open') {
                item.nextElementSibling.classList.remove('invisible')
                item.nextElementSibling.classList.remove('opacity-0')

            }
            if (item.getAttribute('data-setting_pro') == 'close_black') {
                item.parentElement.classList.add('invisible')
                item.parentElement.classList.add('opacity-0')
            }
            if (item.getAttribute('data-setting_pro') == 'close_xmark') {
                item.parentElement.parentElement.classList.add('invisible')
                item.parentElement.parentElement.classList.add('opacity-0')
            }
        })
    })

    // let traz_moamelaty_pup_up_item_close_black = document.getElementById('traz_moamelaty_pup_up_item_close_black')
    let traz_moamelaty_pup_up_item = document.getElementById('traz_moamelaty_pup_up_item')

    function traz_moamelaty_pup_up(item) {
        if (item == 'open') {
            traz_moamelaty_pup_up_item.classList.remove('invisible')
            traz_moamelaty_pup_up_item.classList.remove('opacity-0')
        }
        if (item == 'close') {
            traz_moamelaty_pup_up_item.classList.add('invisible')
            traz_moamelaty_pup_up_item.classList.add('opacity-0')
        }
    }

    // let countDown = document.getElementById('countDown')
    let time_order = document.querySelectorAll('.time_order')
    time_order.forEach((item) => {

        let count = 120
        let result = setInterval(() => {
            let minute = Math.floor(count / 60)
            let seconds = count % 60
            count -= 1
            if (count < 0) {
                clearInterval(result)
            }
            item.innerText = seconds.toString().padStart(2, "0") + " : " + minute.toString().padStart(2, "0");
        }, 1000)
    })

    // home_dashboard_end
</script>

@endsection