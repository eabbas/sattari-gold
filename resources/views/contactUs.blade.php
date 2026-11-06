@extends('app.document')
@section('title')
    ستاری گلد | ارتباط با ما
@endsection
@section('content')
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

        .contact-bg {
            background:
                radial-gradient(circle at 85% 20%, rgba(220,190,125,.15), transparent 35%),
                linear-gradient(135deg, #f6efdf, #fcfaf6);
        }

        .form-input {
            width: 100%;
            border: 1px solid #e9e1d3;
            border-radius: 12px;
            background: #fff;
            padding: 14px 16px;
            outline: none;
            font-size: 13px;
            color: #51483b;
            transition: .25s;
        }

        .form-input:focus {
            border-color: #b68b43;
            box-shadow: 0 0 0 3px rgba(182,139,67,.09);
        }

        .form-input::placeholder {
            color: #b4aa9a;
        }

        .contact-card {
            transition: .3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            border-color: #d7bd88;
        }

        .gold-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, #c9a45e, transparent);
        }
    </style>


<!-- HERO -->
<section class="contact-bg overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 md:px-10 py-20 md:py-24">

        <div class="max-w-3xl mx-auto text-center">

            <span class="inline-flex items-center gap-2 text-xs tracking-widest text-[#a9823e]">
                <span class="w-6 h-px bg-[#c8a35c]"></span>
                CONTACT US
                <span class="w-6 h-px bg-[#c8a35c]"></span>
            </span>

            <h2 class="text-4xl md:text-6xl font-extrabold leading-relaxed mt-6">
                ما همیشه
                <span class="gold-text">کنار شما هستیم</span>
            </h2>

            <p class="text-sm md:text-base text-[#81796c] leading-9 mt-5">
                سوالی دارید یا به راهنمایی بیشتری نیاز دارید؟
                خوشحال می‌شویم صدای شما را بشنویم.
                برای ما ارتباط با شما، آغاز یک تجربه ارزشمند است.
            </p>

            <div class="flex justify-center gap-2 mt-8 text-[#b58b43]">
                <span>✦</span>
                <span class="w-16 h-px bg-[#d6bd8d] self-center"></span>
                <span>✧</span>
                <span class="w-16 h-px bg-[#d6bd8d] self-center"></span>
                <span>✦</span>
            </div>

        </div>
    </div>
</section>


<!-- CONTACT SECTION -->
<section class="py-16 md:py-24 px-5">

    <div class="max-w-7xl mx-auto grid lg:grid-cols-5 gap-10">

        <!-- FORM -->
        <div class="lg:col-span-3 bg-white rounded-[28px] p-6 md:p-10 border border-[#eee7da] shadow-sm">

            <div class="mb-9">
                <span class="text-xs tracking-widest text-[#a9823e]">SEND A MESSAGE</span>

                <h3 class="text-2xl font-bold mt-4">
                    پیامتان را برای ما بنویسید
                </h3>

                <p class="text-xs text-[#999083] mt-3 leading-7">
                    فرم زیر را تکمیل کنید تا بتوانیم بهتر به شما پاسخ دهیم.
                </p>
            </div>

            <form action="#" method="POST" class="space-y-6">

                <!-- Name + Phone -->
                <div class="grid sm:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-xs font-medium mb-3">
                            نام و نام خانوادگی
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="مثلاً محمد افتخاری"
                            class="form-input"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-xs font-medium mb-3">
                            شماره تماس
                        </label>

                        <input
                            type="tel"
                            name="phone"
                            placeholder="09xxxxxxxxx"
                            class="form-input"
                            dir="ltr"
                            required
                        >
                    </div>

                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-medium mb-3">
                        ایمیل
                        <span class="text-[#b7ad9d]">(اختیاری)</span>
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="example@email.com"
                        class="form-input"
                        dir="ltr"
                    >
                </div>

                <!-- Subject -->
                <div>
                    <label class="block text-xs font-medium mb-3">
                        موضوع پیام
                    </label>

                    <select name="subject" class="form-input">
                        <option value="" disabled selected>
                            موضوع مورد نظر را انتخاب کنید
                        </option>
                        <option value="product">مشاوره خرید محصول</option>
                        <option value="order">پیگیری سفارش</option>
                        <option value="price">استعلام قیمت</option>
                        <option value="support">پشتیبانی</option>
                        <option value="other">سایر موارد</option>
                    </select>
                </div>

                <!-- Message -->
                <div>
                    <label class="block text-xs font-medium mb-3">
                        متن پیام
                    </label>

                    <textarea
                        name="message"
                        rows="5"
                        placeholder="چطور می‌توانیم به شما کمک کنیم؟"
                        class="form-input resize-none"
                        required
                    ></textarea>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full gold-gradient text-white rounded-xl py-4 text-sm font-semibold hover:opacity-90 transition shadow-lg shadow-[#b68b43]/15 flex items-center justify-center gap-3">

                    ارسال پیام

                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.6">
                        <path d="M22 2 11 13"/>
                        <path d="m22 2-7 20-4-9-9-4 20-7Z"/>
                    </svg>

                </button>

            </form>
        </div>


        <!-- CONTACT INFO -->
        <div class="lg:col-span-2 space-y-5">

            <div class="mb-8">
                <span class="text-xs tracking-widest text-[#a9823e]">
                    GET IN TOUCH
                </span>

                <h3 class="text-2xl font-bold mt-4">
                    راه‌های ارتباطی
                </h3>

                <p class="text-xs text-[#91897d] leading-7 mt-3">
                    از راه‌های زیر می‌توانید با مجموعه طلای ستاری در ارتباط باشید.
                </p>
            </div>


            <!-- Phone -->
            <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                <div class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 11.19 18a19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.09 3.18 2 2 0 0 1 4.08 1h3a2 2 0 0 1 2 1.72c.12.96.36 1.9.72 2.79a2 2 0 0 1-.45 2.11L8.08 8.88a16 16 0 0 0 6 6l1.26-1.27a2 2 0 0 1 2.11-.45c.89.36 1.83.6 2.79.72A2 2 0 0 1 22 16.92Z"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-[#a49a89]">شماره تماس</p>
                    <a href="tel:YOUR_PHONE" class="text-sm font-semibold mt-2 block" dir="ltr">
                        شماره تماس فروشگاه
                    </a>
                </div>
            </div>


            <!-- Email -->
            <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                <div class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <rect x="2" y="4" width="20" height="16" rx="3"/>
                        <path d="m22 7-10 6L2 7"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-[#a49a89]">پست الکترونیکی</p>
                    <a href="mailto:YOUR_EMAIL" class="text-sm font-semibold mt-2 block" dir="ltr">
                        ایمیل فروشگاه
                    </a>
                </div>
            </div>


            <!-- Address -->
            <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                <div class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>
                </div>

                <div class="min-w-0">
                    <p class="text-xs text-[#a49a89]">آدرس فروشگاه</p>
                    <p class="text-sm font-semibold mt-2 leading-7">
                        آدرس فروشگاه خود را اینجا وارد کنید
                    </p>
                </div>
            </div>


            <!-- Working Hours -->
            <div class="bg-[#f2ead9] rounded-2xl p-6">

                <div class="flex items-center gap-3 mb-5">
                    <span class="text-[#a9823e]">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                    </span>

                    <h4 class="font-semibold text-sm">ساعات پاسخ‌گویی</h4>
                </div>

                <div class="flex justify-between text-xs py-3 border-b border-[#dfd1b4]">
                    <span class="text-[#847967]">شنبه تا پنجشنبه</span>
                    <span class="font-semibold">ساعت کاری فروشگاه</span>
                </div>

                <div class="flex justify-between text-xs pt-4">
                    <span class="text-[#847967]">جمعه</span>
                    <span class="font-semibold">طبق برنامه فروشگاه</span>
                </div>

            </div>

        </div>
    </div>
</section>


<!-- MAP / LOCATION -->
<section class="px-5 pb-20">

    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-10">
            <span class="text-xs tracking-widest text-[#a9823e]">OUR LOCATION</span>
            <h2 class="text-3xl font-bold mt-4">منتظر دیدار شما هستیم</h2>
            <p class="text-sm text-[#91897d] mt-3">
                برای بازدید حضوری، به فروشگاه طلای ستاری سر بزنید.
            </p>
        </div>

        <div class="rounded-[28px] overflow-hidden bg-[#f2ead9] border border-[#e9dfcc]">

            <div class="min-h-[280px] md:min-h-[350px] flex flex-col items-center justify-center text-center p-8">

                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-[#ad8742] shadow-sm">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5">
                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>
                </div>

                <h3 class="font-bold mt-6">موقعیت فروشگاه طلای ستاری</h3>

                <p class="text-xs text-[#887e6d] mt-3 leading-7">
                    برای نمایش نقشه، آدرس دقیق فروشگاه را در این بخش قرار دهید.
                </p>

                <a href="YOUR_MAP_LINK"
                   class="mt-6 bg-[#a9823e] text-white px-7 py-3 rounded-xl text-xs hover:bg-[#89662e] transition">
                    مشاهده موقعیت روی نقشه
                </a>

            </div>

        </div>
    </div>
</section>


<!-- CTA -->
<section class="px-5 pb-24">

    <div class="max-w-7xl mx-auto rounded-[28px] gold-gradient overflow-hidden relative">

        <div class="absolute -left-20 -top-32 w-80 h-80 rounded-full border border-white/20"></div>

        <div class="relative text-center py-16 px-5">

            <span class="text-white/80 text-xs tracking-widest">
                SATARI GOLD
            </span>

            <h2 class="text-3xl md:text-4xl text-white font-bold mt-5">
                یک انتخاب زیبا، یک تجربه ماندگار
            </h2>

            <p class="text-sm text-white/80 mt-5">
                از مجموعه محصولات ما دیدن کنید.
            </p>

            <a href="/shop"
               class="inline-flex mt-8 bg-white text-[#98732f] px-9 py-4 rounded-xl text-sm font-semibold hover:bg-[#faf4e8] transition">
                ورود به فروشگاه
                <span class="mr-3">←</span>
            </a>

        </div>
    </div>
</section>


@endsection