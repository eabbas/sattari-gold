@extends('app.document')
@section('title')
    طلای ستاری | درباره ما
@endsection
@section('content')
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        
        body {
            background: #faf8f3;
        }

        .gold-text {
            background: linear-gradient(120deg, #98702f, #e6c77f, #b18a45);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gold-gradient {
            background: linear-gradient(135deg, #b68b43, #e9d29b);
        }

        .hero-bg {
            background:
                radial-gradient(circle at 80% 20%, rgba(222,193,133,.17), transparent 35%),
                linear-gradient(135deg, #f5eddd, #fcfaf5 65%);
        }

        .gold-line {
            background: linear-gradient(90deg, transparent, #c9a45e, transparent);
            height: 1px;
        }

        .image-overlay {
            background: linear-gradient(to top, rgba(35,28,18,.55), transparent);
        }

        .hover-card {
            transition: .3s ease;
        }

        .hover-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 45px rgba(145,110,49,.10);
        }
    </style>



<!-- HERO -->
<section class="hero-bg overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 md:px-10 py-20 md:py-28">

        <div class="grid md:grid-cols-2 gap-14 items-center">

            <div>
                <span class="text-xs tracking-widest text-[#a9823e] font-medium">
                    درباره ما | ستاری گلد
                </span>

                <h2 class="text-4xl md:text-6xl font-bold leading-[1.5] mt-6 flex flex-col gap-3">
                    زیبایی در جزئیات است،
                    <span class="gold-text">ماندگاری در اعتماد</span>
                </h2>

                <p class="text-sm md:text-base text-[#81796c] leading-9 mt-6 max-w-xl">
                    در طلای ستاری باور داریم که طلا فقط یک زیور نیست؛
                    ترکیبی از زیبایی، ارزش و خاطراتی است که برای همیشه
                    همراه انسان باقی می‌مانند.
                    هدف ما فراهم کردن تجربه‌ای دلنشین، مطمئن و متفاوت
                    از انتخاب و خرید طلاست.
                </p>

                <div class="flex flex-wrap gap-4 mt-9">
                    <a href="{{ route('product.index') }}"
                       class="px-7 py-4 rounded-xl bg-[#a9823e] text-white text-sm hover:bg-[#89662e] transition">
                        دیدن محصولات
                    </a>

                    <a href="{{ route('contactUs') }}"
                       class="px-7 py-4 rounded-xl border border-[#d7c59f] text-[#92733c] text-sm hover:bg-white transition">
                        ارتباط با ما
                    </a>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="relative">
                <div class="absolute -top-5 -right-5 w-28 h-28 border border-[#d6bc87] rounded-full"></div>

                <div class="relative rounded-[32px] overflow-hidden aspect-[4/5] max-h-[540px] shadow-2xl shadow-[#8c6b36]/10 float-end">
                    <img
                        src="{{ asset('assets/img/404bg.jpg') }}"
                        alt="زیورآلات طلای لوکس"
                        class="w-full h-full object-cover"
                    >
                    <div class="absolute inset-0 image-overlay"></div>

                    <div class="absolute bottom-8 right-8 left-8 text-white">
                        <p class="text-xs tracking-widest text-[#edcf8e]">SATARI GOLD</p>
                        <h3 class="text-2xl font-bold mt-3">
                            درخشش، فراتر از زمان
                        </h3>
                    </div>
                </div>

                
            </div>

        </div>
    </div>
</section>


<!-- BRAND INTRODUCTION -->
<section class="py-24 px-5">
    <div class="max-w-4xl mx-auto text-center">

        <span class="text-xs text-[#a9823e] tracking-widest">
            WHO WE ARE
        </span>

        <h2 class="text-3xl md:text-4xl font-bold mt-5">
            داستان ما، از یک انتخاب زیبا آغاز می‌شود
        </h2>

        <div class="gold-line w-32 mx-auto my-8"></div>

        <p class="text-sm md:text-base leading-10 text-[#827b70]">
            طلای ستاری با نگاهی به زیبایی، ظرافت و ارزش ماندگار طلا،
            تلاش می‌کند فضایی برای انتخابی آگاهانه و لذت‌بخش فراهم کند.
            ما می‌خواهیم هر مشتری با آرامش خاطر محصول مورد علاقه خود را
            انتخاب کند و تجربه‌ای خوشایند از خرید داشته باشد.
            برای ما، اعتماد مشتری تنها یک شعار نیست؛
            بلکه اصلی است که باید در تمام مراحل خرید همراه او باشد.
        </p>

    </div>
</section>


<!-- VALUES -->
<section class="bg-white py-24 px-5">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16">
            <span class="text-xs tracking-widest text-[#a9823e]">OUR VALUES</span>
            <h2 class="text-3xl font-bold mt-4">چیزی که به آن باور داریم</h2>
            <p class="text-sm text-[#999083] mt-4">
                اصولی که مسیر ما را در ارائه خدمات بهتر مشخص می‌کنند.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Item 1 -->
            <div class="hover-card border border-[#eee7da] rounded-2xl p-7 text-center">
                <div class="w-16 h-16 rounded-2xl bg-[#f6efdf] mx-auto flex items-center justify-center text-[#ad8742]">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.4">
                        <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="font-bold mt-6">اعتماد و اطمینان</h3>
                <p class="text-xs text-[#91897d] leading-7 mt-3">
                    ایجاد تجربه‌ای شفاف و قابل اطمینان در تمام مراحل خرید.
                </p>
            </div>

            <!-- Item 2 -->
            <div class="hover-card border border-[#eee7da] rounded-2xl p-7 text-center">
                <div class="w-16 h-16 rounded-2xl bg-[#f6efdf] mx-auto flex items-center justify-center text-[#ad8742]">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.4">
                        <path d="M12 2 3 9l9 13 9-13-9-7Z"/>
                        <path d="M3 9h18M12 2l-3 7 3 13 3-13-3-7Z"/>
                    </svg>
                </div>
                <h3 class="font-bold mt-6">ظرافت و زیبایی</h3>
                <p class="text-xs text-[#91897d] leading-7 mt-3">
                    توجه به جزئیات و انتخاب محصولاتی با جلوه‌ای ماندگار.
                </p>
            </div>

            <!-- Item 3 -->
            <div class="hover-card border border-[#eee7da] rounded-2xl p-7 text-center">
                <div class="w-16 h-16 rounded-2xl bg-[#f6efdf] mx-auto flex items-center justify-center text-[#ad8742]">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.4">
                        <path d="M12 8v4l3 2"/>
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                </div>
                <h3 class="font-bold mt-6">احترام به مشتری</h3>
                <p class="text-xs text-[#91897d] leading-7 mt-3">
                    ارزش دادن به زمان، نیازها و انتخاب‌های هر مشتری.
                </p>
            </div>

            <!-- Item 4 -->
            <div class="hover-card border border-[#eee7da] rounded-2xl p-7 text-center">
                <div class="w-16 h-16 rounded-2xl bg-[#f6efdf] mx-auto flex items-center justify-center text-[#ad8742]">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.4">
                        <path d="M12 2v20M2 12h20"/>
                        <path d="m5 5 14 14M19 5 5 19"/>
                    </svg>
                </div>
                <h3 class="font-bold mt-6">شفافیت</h3>
                <p class="text-xs text-[#91897d] leading-7 mt-3">
                    ارائه اطلاعات روشن برای تصمیم‌گیری بهتر و آگاهانه‌تر.
                </p>
            </div>

        </div>
    </div>
</section>


<!-- FEATURE IMAGE -->
<section class="py-24 px-5">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-14 items-center">

        <div class="relative">
            <div class="rounded-[28px] overflow-hidden aspect-[5/4]">
                <img
                    src="{{ asset('assets/img/404bg.jpg') }}"
                    alt="زیورآلات طلا"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>

        <div>
            <span class="text-xs tracking-widest text-[#a9823e]">
                OUR COMMITMENT
            </span>

            <h2 class="text-3xl md:text-4xl font-bold leading-relaxed mt-5">
                خریدی که با اطمینان آغاز می‌شود
            </h2>

            <p class="text-sm text-[#837b70] leading-9 mt-5">
                انتخاب طلا، انتخابی ارزشمند است.
                به همین دلیل تلاش می‌کنیم اطلاعات مورد نیاز مشتریان
                به شکلی روشن و قابل فهم در اختیارشان قرار بگیرد.
                ما به تجربه خریدی ساده، محترمانه و مطمئن اهمیت می‌دهیم.
            </p>

            <div class="space-y-5 mt-8">

                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 rounded-full bg-[#f2e9d6] text-[#a9823e] flex items-center justify-center">✓</span>
                    <span class="text-sm">ارائه اطلاعات شفاف محصولات</span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 rounded-full bg-[#f2e9d6] text-[#a9823e] flex items-center justify-center">✓</span>
                    <span class="text-sm">توجه به کیفیت و جزئیات</span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="w-8 h-8 rounded-full bg-[#f2e9d6] text-[#a9823e] flex items-center justify-center">✓</span>
                    <span class="text-sm">احترام به انتخاب و سلیقه مشتری</span>
                </div>

            </div>
        </div>

    </div>
</section>




@endsection