@extends('app.document')
@section('title')
    ستاری گلد | {{ $product['title'] }}
@endsection
@section('content')
    @php
        $p1 = (int) preg_replace('/\D/', '', (string) $product->primary_price);
        $p2 = (int) preg_replace('/\D/', '', (string) $product->secondary_price);
        $discount = $p1 && $p2 && $p1 > $p2 ? round((1 - $p2 / $p1) * 100) : null;
        $mediaCount = $product->media->count();
    @endphp
    <main class="max-w-[1280px] mx-auto mb-32">
        <!-- آدرس -->
        <section class="w-11/12 mx-auto mt-8 flex items-center gap-2 text-xs md:text-sm text-(--color-text-muted)">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 hover:text-(--color-primary)">
                <svg class="size-4 fill-(--color-text)" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                </svg>
                خانه
            </a>
            <span>/</span>
            <a href="{{ route('product.index') }}" class="hover:text-(--color-primary)">محصولات</a>
            <span>/</span>
            <span class="text-(--color-text) in-fa">{{ $product->title }}</span>
        </section>
        <!-- گالری + اطلاعات محصول -->
        <section class="w-11/12 mx-auto mt-6 flex flex-col lg:flex-row gap-4 items-stretch">
            <!-- گالری -->
            <div class="w-full lg:w-7/12 flex flex-col lg:flex-row gap-3">
                <!-- تصاویر کوچک -->
                <div
                    class="order-2 lg:order-1 flex lg:flex-col gap-3 overflow-x-auto lg:overflow-y-auto lg:w-16 lg:max-h-[380px] shrink-0 pb-2 [&::-webkit-scrollbar]:w-[2px] [&::-webkit-scrollbar]:h-[2px] [&::-webkit-scrollbar-thumb]:bg-(--color-primary-500) [&::-webkit-scrollbar-thumb]:rounded-full">
                    @foreach ($product->media as $i => $media)
                        <img onclick="changeImage('{{ asset('storage/' . $media->media_path) }}', {{ $i + 1 }})"
                            src="{{ asset('storage/' . $media->media_path) }}" alt="img product"
                            class="thumb-img size-16 shrink-0 object-cover rounded-lg cursor-pointer border-2 {{ $i === 0 ? 'border-(--color-primary) opacity-100' : 'border-transparent opacity-70' }} hover:opacity-100 transition">
                    @endforeach
                </div>
                <!-- تصویر اصلی -->
                <div id="gallery-box"
                    class="order-1 lg:order-2 relative flex-1 rounded-2xl overflow-hidden bg-white min-h-60 lg:h-[380px]">
                    <img id="product-image" src="{{ asset('storage/' . $product->mainImg) }}" alt="{{ $product->title }}"
                        class="w-full h-full object-cover">
                    <button type="button" onclick="toggleFullscreen()" aria-label="تمام صفحه"
                        class="absolute top-3 left-3 size-9 rounded-lg bg-black/30 backdrop-blur flex items-center justify-center cursor-pointer hover:bg-black/50 transition">
                        <svg class="size-4 fill-none stroke-white" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5" />
                        </svg>
                    </button>
                    @if ($mediaCount)
                        <span id="image-counter"
                            class="absolute in-fa bottom-3 right-3 px-2.5 py-0.5 rounded-full bg-black/40 backdrop-blur text-white text-xs">
                            1 / {{ $mediaCount }}
                        </span>
                    @endif
                </div>
            </div>
            <!-- کارت اطلاعات -->
            <div class="w-full lg:w-5/12 bg-white rounded-2xl shadow-sm p-5 flex flex-col">
                <div class="flex items-start justify-between gap-3">
                    <h1 class="text-xl md:text-2xl font-bold text-(--color-text) order-1 in-fa">{{ $product->title }}</h1>
                </div>
                <p class="mt-2 text-(--color-text-secondary) text-sm in-fa max-h-10 h-10 ellipsis-2">
                    {{ $product->summary ?? 'سرمایه‌ای مطمئن، ارزشمند و ماندگار' }}
                </p>
                <span class="w-full h-px bg-(--color-border-gold) mt-4"></span>
                <!-- قیمت -->
                @if($product->count <= 5 && $product->count != 0)
                    <div class="w-full flex items-center gap-1.5 mt-3 pr-5">

                        <div class="text-gray-600 text-sm">
                          تنها
                        </div>
                        <div class=" text-red-500 in-fa text-sm">{{ $product->count }}</div>
                        <div class="text-gray-600 text-sm">
                        عدد موجود در انبار
                        </div>
                    </div>
                @endif
                <div class="mt-4 flex items-center justify-between gap-3 flex-wrap">
                    @if ($product->primary_price)
                        @if ($product->secondary_price)
                            <div class="flex items-center gap-3">
                                @if ($discount)
                                    <span
                                        class="px-3 py-1.5 rounded-xl bg-(--color-danger)/10 text-(--color-danger) font-bold text-xs in-fa">
                                        %{{ number_format($discount) }}
                                    </span>
                                @endif
                                <span class="text-xs text-gray-400 font-bold line-through">
                                    {{ $product->primary_price }} ریال
                                </span>
                            </div>
                            <div class="text-(--color-primary) font-bold flex items-baseline gap-2">
                                <span class="text-xl md:text-2xl in-fa">{{ number_format($product->secondary_price) }}</span>
                                <span class="text-sm">ریال</span>
                            </div>
                        @else
                            <div class="text-(--color-primary) font-bold flex items-baseline gap-2 mr-auto">
                                <span class="text-xl md:text-2xl in-fa">{{ number_format($product->primary_price) }}</span>
                                <span class="text-sm">ریال</span>
                            </div>
                        @endif
                    @else
                        <span class="text-(--color-primary) font-bold text-base">برای استعلام قیمت تماس بگیرید</span>
                    @endif
                </div>
              
                <div class="mt-5 flex items-center gap-2.5">
                    @if ($product->count == 0)
                        <button data-weight="10"
                            data-product-id="{{ $product->id }}"
                            class="addToCartBtns group flex-1 h-11 flex items-center justify-center gap-2 rounded-full bg-[image:var(--gradient-gold)] shadow-md cursor-no-drop transition-all duration-300 hover:shadow-lg" disabled>
                            <span class="text-white font-bold text-sm">ناموجود</span>
                        </button>
                    @else
                        <button onclick="addToCart(this)" id="add-to-cart-main" data-weight="10"
                            data-product-id="{{ $product->id }}"
                            class="addToCartBtns group flex-1 h-11 flex items-center justify-center gap-2 rounded-full bg-[image:var(--gradient-gold)] shadow-md cursor-pointer transition-all duration-300 hover:shadow-lg">
                            <svg class="size-4 fill-white" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 0H0V32H16 67.2l77.2 339.5 2.8 12.5H160 496h16V352H496 172.8l-14.5-64H496L566 64l10-32H542.5 100L95.6 12.5 92.8 0H80 16zm91.3 64H532.5l-60 192H151L107.3 64zM184 432a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm0 80a56 56 0 1 0 0-112 56 56 0 1 0 0 112zm248-56a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm80 0a56 56 0 1 0 -112 0 56 56 0 1 0 112 0z" />
                            </svg>
                            <span class="text-white font-bold text-sm">افزودن به سبد خرید</span>
                        </button>
                    @endif
                </div>
                
                <!-- ویژگی‌های اعتماد -->
                <div class="mt-auto pt-5">
                    <div
                        class="grid grid-cols-3 divide-x divide-x-reverse divide-zinc-200 rounded-xl bg-zinc-100/70 py-3 text-[10px] md:text-[11px] text-(--color-text-secondary)">
                        <div class="flex items-center justify-center gap-2 px-2">
                            <svg class="size-5 shrink-0 fill-(--color-primary)" viewBox="0 0 640 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span>ارسال به سراسر کشور</span>
                        </div>
                        <div class="flex items-center justify-center gap-2 px-2">
                            <svg class="size-5 shrink-0 fill-(--color-primary)" viewBox="0 0 512 512"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M73 127L256 49.4 439 127c5.9 2.5 9.1 7.8 9 12.8c-.4 91.4-38.4 249.3-186.3 320.1c-3.6 1.7-7.8 1.7-11.3 0C102.4 389 64.5 231.2 64 139.7c0-5 3.1-10.2 9-12.8zM457.7 82.8L269.4 2.9C265.2 1 260.7 0 256 0s-9.2 1-13.4 2.9L54.3 82.8c-22 9.3-38.4 31-38.3 57.2c.5 99.2 41.3 280.7 213.6 363.2c16.7 8 36.1 8 52.8 0C454.8 420.7 495.5 239.2 496 140c.1-26.2-16.3-47.9-38.3-57.2zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z" />
                            </svg>
                            <span>پرداخت امن و مطمئن</span>
                        </div>
                        <div class="flex items-center justify-center gap-2 px-2">
                            <svg class="size-6 text-(--color-primary)" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                            </svg>

                            <span>ضمانت اصالت کالا</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- بنر + مشخصات -->
        <section class="w-11/12 mx-auto mt-6 grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- مشخصات محصول -->
            <div class="bg-white rounded-2xl shadow-sm p-5 order-1 lg:order-1">
                
                <div class="flex items-center gap-3 pb-3 border-b border-zinc-200">
                    <?xml version="1.0" encoding="utf-8"?><!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg class='w-6' viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                        stroke-width="3" stroke="var(--color-primary)" fill="none">
                        <ellipse cx="23.07" cy="14.99" rx="15.22" ry="5.24" stroke-linecap="round" />
                        <path d="M38.3,21.8c0,2.89-6.82,5.24-15.23,5.24S7.85,24.69,7.85,21.8" stroke-linecap="round" />
                        <path d="M27.38,33.43c-.4,0-3.9,0-4.31,0-8.41,0-15.22-2.35-15.22-5.24" stroke-linecap="round" />
                        <path d="M24.91,40c-.6,0-1.22,0-1.84,0-8.41,0-15.22-2.34-15.22-5.24" stroke-linecap="round" />
                        <path d="M25.7,46.53a22.48,22.48,0,0,1-2.63.08c-8.41,0-15.22-2.35-15.22-5.24"
                            stroke-linecap="round" />
                        <line x1="7.85" y1="41.42" x2="7.85" y2="15.01" stroke-linecap="round" />
                        <line x1="38.3" y1="30.01" x2="38.3" y2="14.99" stroke-linecap="round" />
                        <ellipse cx="40.93" cy="35.82" rx="15.22" ry="5.24" stroke-linecap="round" />
                        <path d="M56.15,42.63c0,2.9-6.81,5.24-15.22,5.24S25.7,45.53,25.7,42.63" stroke-linecap="round" />
                        <path d="M56.15,49c0,2.9-6.81,5.25-15.22,5.25S25.7,51.91,25.7,49" stroke-linecap="round" />
                        <line x1="25.7" y1="48.92" x2="25.7" y2="35.07" stroke-linecap="round" />
                        <line x1="56.15" y1="49.21" x2="56.15" y2="35.64" stroke-linecap="round" />
                    </svg>
                    <h3 class="text-base font-bold text-(--color-text)">مشخصات محصول</h3>
                </div>
                @if (count($product->attributes) > 0)
                <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-y-4 divide-x divide-x-reverse divide-zinc-200">
                    @foreach ($product->attributes as $attribute)
                        <div class="flex flex-col items-center gap-1.5 px-2 text-center">
                           
                            <span class="text-xs text-(--color-text-secondary)">{{ $attribute->attribute_key }}</span>
                            <span class="text-sm font-bold text-(--color-primary) in-fa">
                                {{ $attribute->attribute_value }}
                            </span>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <!-- بنر سرمایه‌گذاری -->
            <div
                class="relative rounded-2xl overflow-hidden bg-gradient-to-l from-[#0f1a2e] via-[#16233b] to-[#0b1424] p-6 flex items-center justify-between min-h-40 order-2 lg:order-2">
                <div class="relative z-10 flex flex-col items-start gap-3">
                    <h3 class="text-lg md:text-xl font-bold text-(--color-primary)">سرمایه‌گذاری هوشمندانه</h3>
                    <p class="text-white text-sm">با طلای اصل و استاندارد</p>
                    <a href=""
                        class="mt-2 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[image:var(--gradient-gold)] text-white font-bold text-xs">
                        چرا طلا؟
                        <svg class="size-3 fill-white" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z" />
                        </svg>
                    </a>
                </div>
                <img class="absolute left-0 bottom-0 h-full w-1/2 object-contain object-left-bottom opacity-90"
                    src="{{ asset('assets/img/gold.webp') }}" alt="">
            </div>
        </section>
        @if (count($product['categories']) > 1)
        <!-- محصولات مرتبط -->
        <section class="w-11/12 mx-auto mt-10">
            <div class="flex items-center gap-2 mb-3">
                <?xml version="1.0" encoding="utf-8"?>

                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6" viewBox="0 0 512 512"
                    xml:space="preserve">
                    <style type="text/css">
                        <![CDATA[
                        .st0 {
                            fill: var(--color-primary);
                        }
                        ]]>
                    </style>
                    <g>
                        <polygon class="st0"
                            points="509.344,159.094 509.344,159.078 428.906,76.625 375.906,159.094 	" />
                        <polygon class="st0" points="188.531,192.547 256,445.063 323.484,192.547 	" />
                        <polygon class="st0"
                            points="198.953,159.094 312.453,159.094 312.453,159.078 254.797,79.625 198.953,159.078 	" />
                        <polygon class="st0"
                            points="344.422,146.188 395.375,66.938 286.906,66.938 344.406,146.188 	" />
                        <polygon class="st0" points="222.844,66.938 116.625,66.938 167.375,145.844 	" />
                        <polygon class="st0" points="83.094,76.625 2.656,159.078 2.656,159.094 136.125,159.094 	" />
                        <polygon class="st0" points="0,192.547 220.313,441.094 220.328,441.125 153.906,192.547 	" />
                        <polygon class="st0" points="358.094,192.547 291.688,441.125 291.703,441.094 512,192.547 	" />
                    </g>
                </svg>
                <h3 class="text-base md:text-lg font-bold text-(--color-text)">محصولات مرتبط</h3>
            </div>

            <div class="relative">
                <button type="button" onclick="slideRelated(1)" aria-label="بعدی"
                    class="hidden md:flex absolute -right-4 top-1/2 -translate-y-1/2 z-10 size-9 rounded-full bg-white shadow-md items-center justify-center cursor-pointer hover:bg-zinc-50">
                    <svg class="size-4 fill-(--color-text)" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z" />
                    </svg>
                </button>
                <button type="button" onclick="slideRelated(-1)" aria-label="قبلی"
                    class="hidden md:flex absolute -left-4 top-1/2 -translate-y-1/2 z-10 size-9 rounded-full bg-white shadow-md items-center justify-center cursor-pointer hover:bg-zinc-50">
                    <svg class="size-4 fill-(--color-text)" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z" />
                    </svg>
                </button>

                <div id="related-slider"
                    class="flex gap-4 overflow-x-auto snap-x snap-mandatory scroll-smooth py-3 px-1 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    @foreach ($product['categories'] as $category)
                        @foreach ($category['products'] as $pro)
                            @if ($pro['id'] != $product['id'])
                                <div
                                    class="snap-start shrink-0 w-48 bg-white rounded-xl shadow-sm hover:shadow-md transition-all p-3 flex flex-col items-center">
                                    <a href="{{ route('product.show', [$pro]) }}"
                                        class="w-full flex flex-col items-center">
                                        <img class="w-24 h-24 object-contain"
                                            src="{{ $pro->mainImg ? asset('storage/' . $pro->mainImg) : asset('storage/default.jpg') }}"
                                            alt="{{ $pro->title }}">
                                        <span
                                            class="mt-2 text-sm font-bold text-(--color-text)">{{ $pro->title }}</span>
                                    </a>
                                    <div class="w-full mt-3 flex items-center justify-between">
                                        @if ($pro->primary_price)
                                            <div class="text-(--color-primary) font-bold flex items-baseline gap-1">
                                                <span class="text-xs text-(--color-text)">ریال</span>
                                                <span
                                                    class="text-sm in-fa">{{ number_format($pro->secondary_price) ?: number_format($pro->primary_price) }}</span>
                                            </div>
                                        @else
                                            <span class="text-(--color-primary) text-[11px] font-bold">برای استعلام قیمت
                                                تماس بگیرید</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <section class="w-11/12 mx-auto mt-4 lg:mt-8">
            <p class="text-sm text-justify leading-[1.5] text-gray-600 in-fa">
                {{ $product->description }}
            </p>
        </section>
    </main>

    <!-- نوار سبد خرید موبایل -->
    <div
        class="fixed bottom-0 inset-x-0 z-50 md:hidden bg-white shadow-[0_-4px_16px_rgba(0,0,0,.08)] h-16 px-4 flex items-center justify-between gap-3">
        @if ($product->count == 0)
            <butto data-product-id="{{ $product->id }}"
                class="addToCartBtns w-1/2 h-10 rounded-full bg-[image:var(--gradient-gold)] text-white font-bold text-sm cursor-no-drop" disabled>
              ناموجود
            </butto>
        @else
            <button onclick="addToCart(this)" data-product-id="{{ $product->id }}"
                class="addToCartBtns w-1/2 h-10 rounded-full bg-[image:var(--gradient-gold)] text-white font-bold text-sm cursor-pointer">
                افزودن به سبد خرید
            </button>
        @endif
        <div class="text-(--color-primary) font-bold">
            <span class="text-base sm:text-xl in-fa">{{ number_format($product->secondary_price) ?: number_format($product->primary_price) }}</span>
            <span class="text-sm">ریال</span>
        </div>
    </div>

    <script>
        const mediaTotal = {{ $mediaCount }};

        function changeImage(imageSrc, index) {
            document.getElementById("product-image").src = imageSrc;
            const counter = document.getElementById("image-counter");
            if (counter && index) counter.textContent = index + " / " + mediaTotal;
            document.querySelectorAll(".thumb-img").forEach((el, i) => {
                const active = index ? i === index - 1 : false;
                el.classList.toggle("border-(--color-primary)", active);
                el.classList.toggle("opacity-100", active);
                el.classList.toggle("border-transparent", !active);
                el.classList.toggle("opacity-70", !active);
            });
        }

        function toggleFullscreen() {
            const box = document.getElementById("gallery-box");
            if (!document.fullscreenElement) box.requestFullscreen?.();
            else document.exitFullscreen?.();
        }

        // انتخاب وزن
        document.querySelectorAll(".weight-btn").forEach(btn => {
            btn.addEventListener("click", () => {
                document.querySelectorAll(".weight-btn").forEach(b => {
                    b.classList.remove("bg-[image:var(--gradient-gold)]", "text-white",
                        "border-transparent", "font-bold");
                    b.classList.add("bg-white", "text-(--color-text)", "border-(--color-zinc-200)");
                });
                btn.classList.add("bg-[image:var(--gradient-gold)]", "text-white", "border-transparent",
                    "font-bold");
                btn.classList.remove("bg-white", "text-(--color-text)", "border-(--color-zinc-200)");
                // وزن انتخاب‌شده روی دکمه سبد خرید ذخیره می‌شود تا در addToCart قابل خواندن باشد
                document.getElementById("add-to-cart-main").dataset.weight = btn.dataset.weight;
            });
        });

        // اسلایدر محصولات مرتبط (RTL)
        function slideRelated(dir) {
            const s = document.getElementById("related-slider");
            s.scrollBy({
                left: -dir * 280,
                behavior: "smooth"
            });
        }
    </script>

    <script>
        let proId = "{{ $product->id }}"
        let productId = "{{ $product->id }}"
    </script>
    <script src="{{ asset('assets/js/singleProduct.js') }}"></script>
@endsection
