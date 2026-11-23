<!-- bottom_menu_start -->
<div class="fixed bottom-0 right-0 z-30 w-full lg:hidden">
    <div
        class="mx-auto flex w-full items-center justify-between gap-2 border-t border-gray-200/70 bg-white/85 px-3 py-2 shadow-[0_-5px_25px_rgba(0,0,0,0.08)] backdrop-blur-xl">

        <!-- خانه -->
        <a href="{{ route('home') }}"
            class="flex flex-1 flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-200
           {{ Route::is('home') ? 'bg-[#e5b369]/15 text-[#b47b32]' : 'text-gray-500 hover:text-[#b47b32]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="none" stroke="currentColor"
                stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 10 9-7 9 7" />
                <path d="M5 9.5V20h14V9.5" />
                <path d="M9 20v-6h6v6" />
            </svg>
            <span class="text-xs font-bold">خانه</span>
        </a>

        <!-- محصولات -->
        <a href="{{ route('product.index') }}"
            class="flex flex-1 flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-200
           {{ Route::is('product.*') ? 'bg-[#e5b369]/15 text-[#b47b32]' : 'text-gray-500 hover:text-[#b47b32]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="none"
                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="m4 7 8-4 8 4-8 4-8-4Z" />
                <path d="M4 7v10l8 4 8-4V7" />
                <path d="M12 11v10" />
                <path d="m8 5 8 4" />
            </svg>
            <span class="text-xs font-bold">محصولات</span>
        </a>

        <!-- پروفایل -->
        <a href="{{ route('user.profile') }}"
            class="flex flex-1 flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-200
           {{ Route::is('user.*') ? 'bg-[#e5b369]/15 text-[#b47b32]' : 'text-gray-500 hover:text-[#b47b32]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="none"
                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="4" />
                <path d="M5 21v-2a7 7 0 0 1 14 0v2" />
            </svg>
            <span class="text-xs font-bold">پروفایل</span>
        </a>

        <!-- سپرده طلا -->
        <a href="{{ route('deal.create') }}"
            class="flex flex-1 flex-col items-center justify-center gap-1 rounded-xl py-2 transition-all duration-200
           {{ Route::is('deal.*') ? 'bg-[#e5b369]/15 text-[#b47b32]' : 'text-gray-500 hover:text-[#b47b32]' }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="none"
                stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 8h14l2 11H3L5 8Z" />
                <path d="M8 8l2-5h4l2 5" />
                <path d="M9 13h6" />
                <path d="M10 16h4" />
            </svg>
            <span class="text-xs font-bold">سپرده طلا</span>
        </a>

    </div>
</div>
<!-- bottom_menu_end -->
