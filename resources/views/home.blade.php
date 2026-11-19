@extends('app.document')

@section('title', 'طلای ستاری | صفحه اول')

@section('content')

    {{-- Notifications --}}
    @if (session('success'))
        <div
            class="modal fixed top-10 right-0 sm:right-5 z-[9999999999] flex items-center justify-center rounded-xl border border-green-200 bg-green-100 px-8 py-5 text-green-800 shadow-lg transition-all duration-300 in-fa">
            <span class="text-sm in-fa">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('failure'))
        <div
            class="modal fixed top-25 right-10 z-[5000] flex items-center justify-center rounded-xl border border-red-200 bg-red-100 px-8 py-5 text-red-800 shadow-lg transition-all duration-300">
            <span class="text-sm in-fa">{{ session('failure') }}</span>
        </div>
    @endif

    @session('clearStorage')
        <script>
            localStorage.clear();
        </script>
    @endsession

    {{-- Hero --}}
    <section
        class="relative isolate mx-auto flex w-full 2xl:container flex-col items-center justify-center overflow-hidden bg-[#fffdf9] bg-cover bg-center bg-no-repeat px-3 pb-8 pt-20 lg:pb-12 lg:pt-12
        @if ($header) bg-[url('{{ asset('storage/' . $header->header_bg) }}')] @endif">

        <div
            class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(circle_at_15%_20%,rgba(225,168,79,0.13),transparent_30%),radial-gradient(circle_at_85%_45%,rgba(195,146,77,0.09),transparent_30%)]">
        </div>

        @if ($header)
            <div class="flex w-11/12 flex-col items-center justify-center lg:w-5/12">

                <img src="{{ asset('storage/' . $header->header_img) }}"
                    class="w-8/12 object-contain drop-shadow-[0_15px_25px_rgba(110,75,30,0.12)] sm:w-6/12 lg:w-10/12"
                    alt="">

                <h2
                    class="mt-4 flex items-center justify-center gap-1 text-center text-xl font-bold leading-relaxed text-gray-800 sm:text-2xl lg:text-3xl">
                    <span>{{ $header->title }}</span>
                </h2>

                <p class="mt-2 max-w-xl text-center text-xs leading-7 text-gray-600 sm:text-sm">
                    {{ $header->subTitle }}
                </p>

                <div class="flex w-full items-center justify-center gap-4 pt-6">
                    <a href="{{ route($header->btnLink) }}"
                        class="group flex w-1/2 items-center justify-center gap-2 rounded-full bg-gradient-to-b from-[#e3ab5a] to-[#a56920] px-4 py-3 text-white shadow-lg shadow-[#a56920]/15 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#a56920]/25 sm:w-1/3">

                        <svg class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1 rotate-180"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M19 12H5m0 0 7-7m-7 7 7 7" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="text-xs font-bold sm:text-sm">{{ $header->btnText }}</span>
                    </a>
                </div>
            </div>
        @endif

        {{-- Price Bar --}}
        <div
            class="mt-8 w-11/12 rounded-2xl border border-[#eee3d3] bg-white p-2 shadow-[0_12px_35px_rgba(75,55,30,0.07)] lg:mt-12">

            <div class="grid grid-cols-1 rounded-xl bg-gradient-to-br from-[#fffaf3] to-[#f8f0e5] p-2 lg:grid-cols-3">

                {{-- Gold --}}
                <div
                    class="relative flex w-full items-center justify-between gap-3 border-b border-[#e5b369]/40 px-3 py-4 last:border-b-0 lg:justify-center lg:border-b-0 lg:border-l lg:border-[#e5b369]/50 lg:px-5">

                    <span class="flex items-center gap-1 text-xs font-bold text-emerald-500 in-fa">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19V5m0 0-5 5m5-5 5 5" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        % 1.1 +
                    </span>

                    <span class="font-bold text-gray-800 in-fa">{{ number_format(26520000) }}</span>

                    <span class="text-xs text-gray-500 in-fa">طلای 18 عیار</span>

                    <img src="{{ asset('assets/img/gold-bar.webp') }}" class="h-8 w-8 object-contain" alt="">
                </div>

                {{-- Coin --}}
                <div
                    class="relative flex w-full items-center justify-between gap-3 border-b border-[#e5b369]/40 px-3 py-4 last:border-b-0 lg:justify-center lg:border-b-0 lg:border-l lg:border-[#e5b369]/50 lg:px-5">

                    <span class="flex items-center gap-1 text-xs font-bold text-emerald-500 in-fa">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19V5m0 0-5 5m5-5 5 5" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        % 1.16 +
                    </span>

                    <span class="font-bold text-gray-800 in-fa">{{ number_format(271590000) }}</span>

                    <span class="text-xs text-gray-500 in-fa">سکه امامی</span>

                    <img src="{{ asset('assets/img/coin.webp') }}" class="h-8 w-8 object-contain" alt="">
                </div>

                {{-- Ounce --}}
                <div class="flex w-full items-center justify-between gap-3 px-3 py-4 lg:justify-center lg:px-5">

                    <span class="flex items-center gap-1 text-xs font-bold text-emerald-500 in-fa">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                            <path d="M12 19V5m0 0-5 5m5-5 5 5" stroke="currentColor" stroke-width="1.7"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        % 1.1 +
                    </span>

                    <span class="font-bold text-gray-800 in-fa">{{ number_format(4151.94) }}</span>

                    <span class="text-xs text-gray-500 in-fa">انس طلا</span>

                    <img src="{{ asset('assets/img/gold.webp') }}" class="h-8 w-8 object-contain" alt="">
                </div>

            </div>
        </div>
    </section>

    {{-- Introduction --}}
    <section
        class="relative mx-auto w-full overflow-hidden bg-gradient-to-b from-[#fff] to-[#fcf8f2] py-12 lg:py-16 2xl:container">

        <div class="pointer-events-none absolute -right-24 top-10 h-72 w-72 rounded-full bg-[#e1a84f]/5 blur-3xl"></div>

        <div class="relative mx-auto grid w-11/12 grid-cols-1 items-center gap-8 lg:grid-cols-2 lg:gap-14">

            {{-- Video Placeholder --}}
            <div
                class="group relative aspect-video w-full overflow-hidden rounded-3xl border border-[#eadbc5] bg-gradient-to-br from-[#f9f0e3] to-[#eee0ca] shadow-[0_15px_35px_rgba(70,50,25,0.08)]">

                <div class="absolute inset-0 flex flex-col items-center justify-center gap-4">

                    <div
                        class="flex h-16 w-16 items-center justify-center rounded-full border border-white/80 bg-white/90 text-[#c3924d] shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:bg-[#c3924d] group-hover:text-white sm:h-20 sm:w-20">

                        <svg class="mr-1 h-7 w-7 sm:h-8 sm:w-8" viewBox="0 0 24 24" fill="none">
                            <path d="m9 6 10 6-10 6V6Z" fill="currentColor" stroke="currentColor" stroke-width="1.5"
                                stroke-linejoin="round" />
                        </svg>

                    </div>

                    <span class="text-xs font-bold text-gray-500 sm:text-sm">
                        محل قرارگیری ویدیو
                    </span>

                </div>
            </div>

            {{-- Introduction Text --}}
            <div class="flex flex-col gap-4 lg:pr-5">

                <span class="flex items-center gap-2 text-xs font-bold text-[#c3924d] sm:text-sm">
                    <span class="h-1.5 w-7 rounded-full bg-[#c3924d]"></span>
                    آشنایی با ستاری گلد
                </span>

                <h2 class="text-xl font-bold leading-[1.9] text-gray-800 sm:text-2xl lg:text-3xl">
                    همراه مطمئن شما در مسیر سرمایه‌گذاری طلا
                </h2>

                <p class="text-justify text-xs leading-8 text-gray-600 sm:text-sm sm:leading-9 lg:text-base">
                    در ستاری گلد تلاش می‌کنیم تجربه‌ای ساده، شفاف و مطمئن از خرید و فروش طلا برای شما فراهم کنیم.
                    هدف ما ایجاد بستری قابل اعتماد است تا بتوانید با آگاهی بیشتر برای سرمایه خود تصمیم بگیرید
                    و با خیالی آسوده مسیر سرمایه‌گذاری خود را دنبال کنید.
                </p>

                <a href="{{ route('aboutUs') }}"
                    class="group flex w-fit items-center gap-2 rounded-full bg-gradient-to-b from-[#e3ab5a] to-[#a56920] px-5 py-3 text-xs font-bold text-white shadow-lg shadow-[#a56920]/15 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#a56920]/20 sm:text-sm">

                    آشنایی بیشتر با ما

                    <svg class="h-5 w-5 transition-transform duration-300 group-hover:-translate-x-1" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M19 12H5m0 0 7-7m-7 7 7 7" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </a>

            </div>
        </div>
    </section>

    {{-- Products --}}
    <section class="mx-auto w-full bg-white py-12 lg:py-16 2xl:container">

        <div class="mx-auto w-11/12">

            {{-- Section Heading --}}
            <div class="flex w-full items-end justify-between gap-3">

                <div class="flex flex-col gap-2">
                    <span class="text-xs font-bold text-[#c3924d] sm:text-sm">محصولات منتخب</span>

                    <h2 class="text-lg font-bold text-gray-800 sm:text-2xl">
                        محصولات ما
                    </h2>

                    <p class="text-xs font-medium text-gray-500 sm:text-sm">
                        با اطمینان سرمایه‌گذاری کنید
                    </p>
                </div>

                <a href="{{ route('product.index') }}"
                    class="group flex shrink-0 items-center justify-end gap-1.5 rounded-full border border-[#eee2d0] px-3 py-2 transition-all duration-300 hover:border-[#c3924d] hover:bg-[#fbf5ec] sm:gap-2 sm:px-4">

                    <span
                        class="text-[10px] font-bold text-gray-600 transition-colors group-hover:text-[#a56920] sm:text-xs">
                        مشاهده بیشتر
                    </span>

                    <svg class="h-5 w-5 text-[#c3924d] transition-transform duration-300 group-hover:translate-x-1 rotate-180"
                        viewBox="0 0 24 24" fill="none">
                        <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="1.7"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            {{-- Product Cards --}}
            <div class="mt-8 grid w-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6 xl:grid-cols-4">

                @foreach ($products as $product)
                    <div
                        class="group relative flex w-full flex-col overflow-hidden rounded-2xl border border-[#eee7dd] bg-white shadow-[0_5px_20px_rgba(45,35,20,0.05)] transition-all duration-300 hover:-translate-y-1.5 hover:border-[#e1a84f]/50 hover:shadow-[0_15px_35px_rgba(45,35,20,0.11)]">

                        @if ($product->percent)
                            <span
                                class="absolute right-3 top-3 z-10 rounded-lg bg-[#c3924d] px-3 py-1.5 text-[10px] font-bold text-white shadow-md in-fa">
                                {{ number_format($product->percent) }} %
                            </span>
                        @endif

                        <a href="{{ route('product.show', [$product]) }}"
                            class="block w-full overflow-hidden bg-[#faf7f2]">

                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block h-48 w-full object-cover transition-transform duration-500 group-hover:scale-105 sm:h-44"
                                alt="">
                        </a>

                        <div class="flex w-full flex-1 flex-col gap-3 p-4">

                            <a href="{{ route('product.show', [$product]) }}" class="block">
                                <h3
                                    class="text-sm font-bold leading-7 text-gray-800 transition-colors duration-200 group-hover:text-[#a56920]">
                                    {{ $product['title'] }}
                                </h3>
                            </a>

                            @if ($product->summary)
                                <p class="ellipsis-2 h-10 max-h-10 text-xs leading-6 text-gray-400">
                                    {{ $product->summary }}
                                </p>
                            @endif

                            <div
                                class="mt-auto flex w-full flex-row items-center justify-between gap-2 border-t border-dashed border-[#eee5d9] pt-4">

                                @if ($product->primary_price)
                                    @if ($product->secondary_price)
                                        <div class="space-y-1.5">
                                            <div class="text-xs text-gray-400 line-through in-fa">
                                                {{ $product->primary_price }} ریال
                                            </div>

                                            <div class="flex flex-row items-center gap-1">
                                                <span class="text-sm font-bold text-gray-800 in-fa">
                                                    {{ number_format($product->secondary_price) }}
                                                </span>

                                                <span class="text-xs font-bold text-[#c3924d]">
                                                    ریال
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex flex-row items-center gap-1">
                                            <span class="text-sm font-bold text-gray-800 in-fa">
                                                {{ number_format($product->primary_price) }}
                                            </span>

                                            <span class="text-xs font-bold text-[#c3924d]">
                                                ریال
                                            </span>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-[10px] leading-5 text-gray-500">
                                        برای استعلام قیمت تماس بگیرید
                                    </span>
                                @endif

                                <a href="{{ route('product.show', [$product]) }}"
                                    class="flex shrink-0 items-center justify-center gap-1 rounded-full bg-[#f6eddf] px-3 py-2 text-[#a56920] transition-all duration-300 hover:bg-[#c3924d] hover:text-white">

                                    <span class="text-[10px] font-bold">
                                        مشاهده محصول
                                    </span>

                                    <svg class="h-4 w-4 rotate-180" viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12h14m0 0-6-6m6 6-6 6" stroke="currentColor" stroke-width="1.8"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- Why Us --}}
    <section class="relative w-full overflow-hidden bg-[#faf8f4] py-14 sm:py-16 lg:py-20 2xl:container mx-auto">

        <div class="pointer-events-none absolute -right-24 -top-24 h-80 w-80 rounded-full bg-[#d6ad60]/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -left-20 h-72 w-72 rounded-full bg-[#d6ad60]/10 blur-3xl">
        </div>

        <div class="relative mx-auto w-11/12">

            {{-- Heading --}}
            <div class="mb-10 flex flex-col items-center text-center lg:mb-14">
                <span
                    class="mb-3 inline-flex items-center gap-2 rounded-full border border-[#e9dcc7] bg-white px-4 py-2 text-xs font-bold text-[#b68b4c]">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#c3924d]"></span>
                    مزایای انتخاب ما
                </span>

                <h2 class="text-xl font-bold text-[#302b25] sm:text-3xl">
                    چرا <span class="text-[#bd914e]">ستاری گلد</span>؟
                </h2>

                <p class="mt-3 max-w-lg text-xs leading-7 text-gray-500 sm:text-sm">
                    تجربه‌ای امن، آسان و مطمئن برای خرید و سرمایه‌گذاری در بازار طلا
                </p>

                <div class="mt-5 h-1 w-14 rounded-full bg-[#d6ad60]"></div>
            </div>

            <div class="grid items-center gap-8 lg:grid-cols-8 lg:gap-6">

                {{-- Benefits --}}
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:col-span-8 lg:gap-4">

                    {{-- Support --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 13v-2a8 8 0 0 1 16 0v2" />
                                <path d="M4 13h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 1-2Z" />
                                <path d="M20 13h-2a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-2a2 2 0 0 0-1-2Z" />
                                <path d="M16 19a4 4 0 0 1-4 2" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">پشتیبانی تخصصی</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">همراهی کارشناسان مجرب در تمام مراحل
                        </p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                    {{-- Investment --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 10 12 4l9 6" />
                                <path d="M5 10v9m4-9v9m6-9v9m4-9v9M3 21h18" />
                                <path d="M2 10h20" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">سرمایه‌گذاری مطمئن</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">راهی هوشمندانه برای حفظ ارزش سرمایه
                        </p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                    {{-- Low Fee --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 5 5 19" />
                                <circle cx="6.5" cy="6.5" r="2.5" />
                                <circle cx="17.5" cy="17.5" r="2.5" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">کارمزد پایین</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">هزینه کمتر، تجربه خرید بهتر</p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                    {{-- Online Buy --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3h2l2.5 12h11L21 7H6" />
                                <circle cx="10" cy="20" r="1.5" />
                                <circle cx="18" cy="20" r="1.5" />
                                <path d="m10 10 2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">خرید و فروش آنلاین</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">معامله آسان در تمام ساعات شبانه‌روز
                        </p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                    {{-- Live Prices --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18" />
                                <path d="m7 14 4-4 3 3 6-7" />
                                <path d="M15 6h5v5" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">قیمت‌های لحظه‌ای</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">دسترسی به آخرین نرخ‌های بازار</p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                    {{-- Security --}}
                    <div
                        class="group relative overflow-hidden rounded-2xl border border-[#eee5d9] bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-[#d6ad60]/60 hover:shadow-xl hover:shadow-[#9c7436]/10 sm:p-5">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-[#fbf4e9] text-[#bd914e] transition-all duration-300 group-hover:bg-[#bd914e] group-hover:text-white">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z" />
                                <path d="m9 12 2 2 4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-[#39332c] sm:text-sm">امنیت بالا</h3>
                        <p class="mt-2 text-[10px] leading-6 text-gray-500 sm:text-xs">حفاظت از اطلاعات و دارایی‌های شما
                        </p>
                        <span
                            class="absolute -bottom-5 -left-5 h-16 w-16 rounded-full bg-[#d6ad60]/5 transition-all duration-300 group-hover:scale-150"></span>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- Comments --}}
    <section class="mx-auto w-full bg-white py-10 lg:py-16 2xl:container">

        <div
            class="mx-auto w-11/12 overflow-hidden rounded-3xl border border-[#eee1cf] bg-gradient-to-br from-[#f7eddf] via-[#fffaf4] to-white px-4 py-6 shadow-[0_10px_30px_rgba(60,40,15,0.05)] sm:px-6 lg:py-8">

            {{-- Comments Heading --}}
            <div class="mb-6 lg:mb-8">

                <span class="mb-2 block text-xs font-bold text-[#c3924d] sm:text-sm">
                    تجربه مشتریان
                </span>

                <h2 class="text-lg font-bold text-gray-800 sm:text-xl">
                    نظرات کاربران
                </h2>

                <p class="mt-2 text-xs font-medium text-gray-500 sm:text-sm">
                    اعتماد شما بزرگترین سرمایه ماست
                </p>

            </div>

            {{-- Comments List --}}
            <div class="flex w-full gap-3 overflow-x-auto px-1 pb-3 sm:gap-4 lg:gap-5"
                style="scrollbar-color: #e1a84f #e5e7eb00; scrollbar-width: thin;">

                @foreach ($comments as $comment)
                    <div
                        class="min-h-full min-w-full max-w-full pb-2 sm:min-w-[49%] sm:max-w-[49%] lg:min-w-[32%] lg:max-w-[32%]">

                        <div
                            class="flex h-full w-full flex-col rounded-2xl border border-[#eee7dd] bg-white p-4 shadow-[0_5px_18px_rgba(40,30,15,0.045)] transition-all duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-5">

                            <div class="flex items-center gap-3">

                                @if ($comment->img)
                                    <img src="{{ asset('storage/' . $comment->img) }}"
                                        class="h-12 w-12 rounded-full border-2 border-[#f0e2cd] object-cover"
                                        alt="">
                                @else
                                    <img src="{{ asset('assets/img/user.png') }}"
                                        class="h-12 w-12 rounded-full border-2 border-[#f0e2cd] object-cover"
                                        alt="">
                                @endif

                                <div class="flex flex-col gap-1">
                                    <span class="text-sm font-bold text-gray-800">
                                        {{ $comment->userName }}
                                    </span>

                                    <span class="text-[10px] text-[#c3924d]">
                                        مشتری ستاری گلد
                                    </span>
                                </div>

                                <svg class="mr-auto h-7 w-7 text-[#e8d7bc]" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M10 11H5.5A2.5 2.5 0 0 0 3 13.5V17h7v-6Zm11 0h-4.5a2.5 2.5 0 0 0-2.5 2.5V17h7v-6Z"
                                        fill="currentColor" />
                                </svg>

                            </div>

                            <p class="mt-5 max-h-24 overflow-y-auto text-xs leading-7 text-gray-600 sm:text-sm">
                                {{ $comment->comment }}
                            </p>

                            <div
                                class="mt-auto flex w-full items-center justify-between border-t border-dashed border-[#eee5d9] pt-4">
                                <span class="text-[10px] text-gray-400 in-fa">
                                    {{ $comment->time }}
                                </span>

                                <span class="text-[10px] text-gray-400 in-fa">
                                    {{ $comment->date }}
                                </span>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
