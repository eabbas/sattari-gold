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
                radial-gradient(circle at 85% 20%, rgba(220, 190, 125, .15), transparent 35%),
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
            box-shadow: 0 0 0 3px rgba(182, 139, 67, .09);
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


    <div
        class="modal fixed top-10 right-0 sm:right-5 z-[9999999999]  items-center justify-center rounded-xl border border-green-200 bg-green-100 px-8 py-5 text-green-800 shadow-lg transition-all duration-300 in-fa @if(!session('success')) hidden @else flex @endif" id="successMessage">
        <span class="text-sm in-fa">پیام شما با موفقیت ارسال شد</span>
    </div>

    <div class="fixed top-10 right-0 invisible opacity-0 sm:right-5 z-[9999999999]  items-center justify-center rounded-xl border border-red-200 bg-red-100 px-8 py-5 text-red-800 shadow-lg transition-all duration-300 in-fa"
        id="message"></div>



    <!-- HERO -->
    <section class="contact-bg overflow-hidden">
        <div class="max-w-7xl mx-auto px-5 md:px-10 py-20 md:py-24">

            <div class="max-w-3xl mx-auto text-center">

                <span class="inline-flex items-center gap-2 text-xs tracking-widest text-[#a9823e]">
                    <span class="w-6 h-px bg-[#c8a35c]"></span>
                    CONTACT US
                    <span class="w-6 h-px bg-[#c8a35c]"></span>
                </span>

                <h2 class="text-4xl md:text-6xl font-bold leading-relaxed mt-6">
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

                </div>

                <form action="{{ route('contactUs.store') }}" method="POST" class="space-y-6" id="contactForm">
                    @csrf
                    <!-- Name + Phone -->
                    <div class="grid sm:grid-cols-2 gap-5">

                        <div>
                            <label class="flex text-xs font-bold mb-3">
                                نام و نام خانوادگی
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="text" name="fullName" id="fullName" placeholder="مثلاً محمد افتخاری" class="form-input"
                                required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-3">
                                شماره تماس
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="tel" name="phone" id="phoneNumber" placeholder="09xxxxxxxxx" class="form-input" dir="ltr"
                                required>
                        </div>

                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-bold mb-3">
                            ایمیل
                            <span class="text-[#b7ad9d]">(اختیاری)</span>
                        </label>

                        <input type="email" name="email" id="email" placeholder="example@email.com" class="form-input"
                            dir="ltr">
                    </div>

                    <!-- Subject -->
                    <div>
                        <label class="block text-xs font-bold mb-3">
                            موضوع پیام
                        </label>

                        <select name="subject" id="subject" class="form-input">
                            <option value="empty" disabled selected>
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
                        <label class="block text-xs font-bold mb-3">
                            متن پیام
                            <span class="text-red-500">*</span>
                        </label>

                        <textarea name="message" rows="5" placeholder="چطور می‌توانیم به شما کمک کنیم؟" class="form-input resize-none"
                            required></textarea>
                    </div>

                    <div class="w-full flex items-center gap-3 lg:gap-5">
                        
                        <input type="text" name="code" id="code" class="form-input w-1/2 lg:w-3/4"
                        dir="ltr">
                        <button type="button" id="countDown" class="block w-1/2 lg:w-1/3 text-xs py-4 font-bold h-full rounded-md text-center cursor-pointer gold-gradient text-white" onclick="sendCode(this)">
                            ارسال کد تایید  
                            
                        </button>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full gold-gradient text-white rounded-xl py-4 text-sm font-bold opacity-50 transition shadow-lg shadow-[#b68b43]/15 flex items-center justify-center gap-3 cursor-no-drop" disabled id="submitBtn" onclick="submitButton(event)">
                            {{-- hover:opacity-90 --}}
                        ارسال پیام

                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <path d="M22 2 11 13" />
                            <path d="m22 2-7 20-4-9-9-4 20-7Z" />
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

                </div>


                <!-- Phone -->
                <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                    <div
                        class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2A19.8 19.8 0 0 1 11.19 18a19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.09 3.18 2 2 0 0 1 4.08 1h3a2 2 0 0 1 2 1.72c.12.96.36 1.9.72 2.79a2 2 0 0 1-.45 2.11L8.08 8.88a16 16 0 0 0 6 6l1.26-1.27a2 2 0 0 1 2.11-.45c.89.36 1.83.6 2.79.72A2 2 0 0 1 22 16.92Z" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs text-[#a49a89]">شماره تماس</p>
                        <a href="tel:YOUR_PHONE" class="text-sm font-bold mt-2 block" dir="ltr">
                            شماره تماس فروشگاه
                        </a>
                    </div>
                </div>


                <!-- Email -->
                <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                    <div
                        class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="4" width="20" height="16" rx="3" />
                            <path d="m22 7-10 6L2 7" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs text-[#a49a89]">پست الکترونیکی</p>
                        <a href="mailto:YOUR_EMAIL" class="text-sm font-bold mt-2 block" dir="ltr">
                            ایمیل فروشگاه
                        </a>
                    </div>
                </div>


                <!-- Address -->
                <div class="contact-card bg-white border border-[#eee7da] rounded-2xl p-6 flex items-center gap-5">

                    <div
                        class="w-14 h-14 shrink-0 rounded-2xl bg-[#f6efdf] flex items-center justify-center text-[#ad8742]">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                            <circle cx="12" cy="10" r="2.5" />
                        </svg>
                    </div>

                    <div class="min-w-0">
                        <p class="text-xs text-[#a49a89]">آدرس فروشگاه</p>
                        <p class="text-sm font-bold mt-2 leading-7">
                            آدرس فروشگاه خود را اینجا وارد کنید
                        </p>
                    </div>
                </div>


                <!-- Working Hours -->
                <div class="bg-[#f2ead9] rounded-2xl p-6">

                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-[#a9823e]">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                        </span>

                        <h4 class="font-bold text-sm">ساعات پاسخ‌گویی</h4>
                    </div>

                    <div class="flex justify-between text-xs py-3 border-b border-[#dfd1b4]">
                        <span class="text-[#847967]">شنبه تا پنجشنبه</span>
                        <span class="font-bold">ساعت کاری فروشگاه</span>
                    </div>

                    <div class="flex justify-between text-xs pt-4">
                        <span class="text-[#847967]">جمعه</span>
                        <span class="font-bold">طبق برنامه فروشگاه</span>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- MAP / LOCATION -->
    <section class="px-5">

        <div class="max-w-7xl mx-auto">

            <div class="text-center mb-10">
                <span class="text-xs tracking-widest text-[#a9823e]">OUR LOCATION</span>
                <h2 class="text-3xl font-bold mt-4">منتظر دیدار شما هستیم</h2>
            </div>

            <div class="rounded-[28px] overflow-hidden bg-[#f2ead9] border border-[#e9dfcc]">

                <div class="min-h-[280px] md:min-h-[350px] flex flex-col items-center justify-center text-center p-8">

                    <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center text-[#ad8742] shadow-sm">
                        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5">
                            <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                            <circle cx="12" cy="10" r="2.5" />
                        </svg>
                    </div>

                    <a href="YOUR_MAP_LINK"
                        class="mt-6 bg-[#a9823e] text-white px-7 py-3 rounded-xl text-xs hover:bg-[#89662e] transition">
                        مشاهده موقعیت روی نقشه
                    </a>

                </div>

            </div>
        </div>
    </section>

    <div id="loader"
            class="w-full h-full bg-black/50 fixed top-0 right-0 z-999 flex items-center justify-center transition-all duration-300 invisible opacity-0">
            <div class="p-5 bg-white shadow-xl rounded-lg flex flex-col items-center gap-10">
                <span
                    class="w-15 md:w-20 h-15 md:h-20 animate-spin rounded-full border-4 border-yellow-100 border-t-yellow-600"></span>
                <p class="text-gray-600 font-bold text-sm md:text-xl">در حال بارگذاری لطفا شکیبا باشید....</p>
            </div>
        </div>

    <script>
        let successMessage = document.getElementById('successMessage')
        if(!successMessage.classList.contains('hidden')){
            setTimeout(() => {
                successMessage.classList.add('hidden')
            }, 3000)
        }


        let message = document.getElementById('message')
        let submitBtn = document.getElementById('submitBtn')
       
        let phoneNumber = document.getElementById('phoneNumber')
        
        let code = document.getElementById('code')
        let contactForm = document.getElementById('contactForm')
       

        function loader(status) {
            if (status === 'open') {
                document.getElementById('loader').classList.remove('invisible', 'opacity-0')
            }
            if (status === 'close') {
                document.getElementById('loader').classList.add('invisible', 'opacity-0')
            }
        }

        code.addEventListener('input', ()=>{
            if(code.value != ''){
                submitBtn.classList.remove('opacity-50', 'cursor-no-drop')
                submitBtn.classList.add('cursor-pointer', 'hover:opacity-90')
                submitBtn.disabled = false
            } else {
                submitBtn.classList.remove('cursor-pointer', 'hover:opacity-90')
                submitBtn.classList.add('opacity-50', 'cursor-no-drop')
                submitBtn.disabled = true
            }
        })

        function sendCode(el) {
            el.innerHTML =
                "<div class='size-4 mx-auto border-2 border-white border-t-[#eb3153]/0 rounded-full animate-spin'></div>"
            if (phoneNumber.value == '') {
                el.innerHTML = 'ارسال کد'
                openMessage('وارد کردن شماره تلفن الزامی است')
                setTimeout(function() {
                    closeMessage()
                }, 2000)
            } else {
                $.ajax({
                    url: api + "sendValidationCode",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value
                    },
                    success: function(response) {
                            console.log(response)
                            openMessage('پیام ارسال شد')
                            setTimeout(function() {
                                closeMessage()
                            }, 2000)
                        
                            counter()
                        
                    },
                    error: function() {
                        openMessage('خطا در دریافت داده!')
                        setTimeout(function() {
                            closeMessage()
                        }, 2000)
                    }
                })
                setTimeout(()=>{
                   counter()
                }, 1500)
            }
        }

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-purple-500')
            countDown.classList.add('hover:bg-purple-500/50')
            countDown.classList.remove('bg-purple-500')
            countDown.classList.add('bg-purple-500/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                  
                    $.ajax({
                        url: api + 'removeActivationCode',
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function(data) {
                            console.log(data)
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-purple-500')
                            countDown.classList.remove('bg-purple-500/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-purple-500')
                            countDown.classList.remove('hover:bg-purple-500/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadw-lg">خطا در دریافت اطلاعات!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2500)
                        }
                    })
                    clearInterval(result)
                }
                countDown.innerText = minute.toString().padStart(2, "0") + " : " + seconds.toString().padStart(2,
                    "0");
            }, 1000)
        }
        function openMessage(content) {
            message.innerHTML = ''
            let element = document.createElement('div')
            element.classList = 'flex items-center justify-center'
            element.innerHTML = content
            message.appendChild(element)
            message.classList.remove('invisible')
            message.classList.remove('opacity-0')
        }

        function closeMessage() {
            message.classList.add('invisible')
            message.classList.add('opacity-0')
        }
        

        function submitButton(e){
            loader('open')
            e.preventDefault()
            $.ajax({
                url: api+'checkContactCode',
                type: "POST",
                dataType: "json",
                data: {'code': code.value, 'phoneNumber': phoneNumber.value},
                success: function(response){
                    loader('close')
                    if(response){
                        contactForm.submit()
                    } else {
                        openMessage('کد وارد شده نامعتبر!')
                        setTimeout(function() {
                            closeMessage()
                        }, 2000)
                    }
                },
                error: function(){
                    console.error('failed to load data')
                }
            })
        }
    </script>
@endsection
