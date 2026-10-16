    <!-- bottom_menu_start -->
    <div class="w-full fixed bottom-0 right-0 z-9999 flex justify-center lg:hidden">
        <div
            class="w-full min-h-full bg-white/50 backdrop-blur-xl rounded-sm px-4 py-2 flex gap-3 items-center shadow-[0_0_20px_5px] shadow-black/50 text-gray-700">
            <div class="w-1/4 h-full flex justify-center items-center">
                <a href="{{ route('home') }}" class="flex flex-col gap-1 items-center">
                    <div class="p-2 rounded-full @if (Route::is('home')) bg-[#A56920] @else bg-white @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                            class="sm:size-5 size-4 fill-[#A56920] @if (Route::is('home')) fill-white @endif">
                            <path
                                d="M272.5 5.7c9-7.6 22.1-7.6 31.1 0l264 224c10.1 8.6 11.4 23.7 2.8 33.8s-23.7 11.3-33.8 2.8L512 245.5V432c0 44.2-35.8 80-80 80H144c-44.2 0-80-35.8-80-80V245.5L39.5 266.3c-10.1 8.6-25.3 7.3-33.8-2.8s-7.3-25.3 2.8-33.8l264-224zM288 55.5L112 204.8V432c0 17.7 14.3 32 32 32h48V312c0-22.1 17.9-40 40-40H344c22.1 0 40 17.9 40 40V464h48c17.7 0 32-14.3 32-32V204.8L288 55.5zM240 464h96V320H240V464z" />
                        </svg>
                    </div>
                    <span class="font-bold max-sm:text-xs">خانه</span>
                </a>
            </div>
            <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
            <div class="w-1/4 h-full flex justify-center items-center">
                <a href="{{ route('product.index') }}" class="flex flex-col gap-1 items-center">
                    <div class="p-2 rounded-full @if (Route::is('product.index')) bg-[#A56920] @else bg-white @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="sm:size-5 size-4 fill-[#A56920] @if (Route::is('product.index')) fill-white @endif">
                            <path
                                d="M160 112v48H288V112c0-35.3-28.7-64-64-64s-64 28.7-64 64zm-48 96H48V416c0 26.5 21.5 48 48 48H352c26.5 0 48-21.5 48-48V208H336v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208H160v56c0 13.3-10.7 24-24 24s-24-10.7-24-24V208zm0-48V112C112 50.1 162.1 0 224 0s112 50.1 112 112v48h64c26.5 0 48 21.5 48 48V416c0 53-43 96-96 96H96c-53 0-96-43-96-96V208c0-26.5 21.5-48 48-48h64z" />
                        </svg>
                    </div>
                    <span class="font-bold max-sm:text-xs">محصولات</span>
                </a>
            </div>
            <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
            <div class="w-1/4 h-full flex justify-center items-center">
                <a href="{{ route('user.profile') }}" class="flex flex-col gap-1 items-center">
                    <div class="p-2 rounded-full @if (Route::is('user.profile')) bg-[#A56920] @else bg-white @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                            class="sm:size-5 size-4 fill-[#A56920] @if (Route::is('user.profile')) fill-white @endif">
                            <path
                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                        </svg>
                    </div>
                    <span class="font-bold max-sm:text-xs">پروفایل</span>
                </a>
            </div>
            <span class="w-0.5 h-1/2 bg-[#e5b369] rounded-full"></span>
            <div class="w-1/4 h-full flex justify-center items-center">
                <a href="{{ route('wallet.wallet', [Auth::user()]) }}" class="flex flex-col gap-1 items-center">
                    <div class="p-2 rounded-full @if (Route::is('wallet.wallet')) bg-[#A56920] @else bg-white @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            class="sm:size-5 size-4 fill-none stroke-[#A56920] @if (Route::is('wallet.wallet')) stroke-white @endif"
                            stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 5.2H14.8L17.1 9.2H5.7L8 5.2Z" />
                            <path d="M8.7 6.3L7.1 9.2" />
                            <path d="M3.7 12.1H9.9L12 16.1H1.5L3.7 12.1Z" />
                            <path d="M4.5 13.2L2.9 16.1" />
                            <path d="M14.1 12.1H20.3L22.5 16.1H12L14.1 12.1Z" />
                            <path d="M19.5 13.2L21.1 16.1" />
                            <path d="M18.5 2.1V4.5M17.3 3.3H19.7" />
                        </svg>
                    </div>
                    <span class="font-bold max-sm:text-xs">سپرده طلا</span>
                </a>
            </div>

        </div>
    </div>
    <!-- bottom_menu_start -->
