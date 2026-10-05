<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <title>ستاری گلد | ثبت نام</title>
</head>

<body>
    <div class="absolute z-999 top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer" onclick="showMessage('close')"
                viewBox="0 0 384 512">
                <path
                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
            </svg>

        </div>
    </div>
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    <main
        class="max-w-[1700px] mx-auto bg-[url({{ asset('assets/img/background.jpeg') }})] bg-cover bg-center min-h-screen">
        <section class="w-11/12 mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}"
                class="text-(--color-primary) px-4 py-2 border-1 border-(--color-border-gold) flex items-center justify-center mt-10 rounded-full">
                <svg fill="currentColor" class="group-hover:-translate-x-1 transition size-5 rotate-180"
                    xmlns="http://www.w3.org/2000/svg" width="" height="" viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
                <span class="text-(--color-text) font-bold">برگشت به خانه</span>
            </a>
        </section>
        <section class="w-11/12 mx-auto flex items-start justify-between gap-10 mt-10">
            <div id="login"
                class="mb-5 w-full md:w-6/12 xl:w-4/12 bg-(--color-primary-soft)/50 relative z-2 rounded-2xl mx-auto border-1 border-(--color-border-gold) h-auto py-5 px-4">
                <div class="w-12/12 flex items-center justify-center gap-5 ml-5">
                    <div
                        class="w-3/10 flex items-center justify-center text-xl font-semibold text-(--color-primary) p-3 border-b-2 border-(--color-border-gold) cursor-pointer">
                        ثبت نام</div>
                </div>
                <form action="{{ route('user.store') }}" method="POST"
                    class="w-full flex flex-col items-center justify-center" id="signupForm">
                    @csrf
                    <div class="w-full flex flex-col gap-y-3">
                        <div class="w-full flex flex-col gap-2">
                            <label for="name" class="text-(--color-primary)">نام</label>
                            <input id="name" type="text" placeholder="نام" name="name"
                                value="{{ old('name') }}"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="family" class="text-(--color-primary)">نام خانوادگی</label>
                            <input id="family" type="text" placeholder="نام خانوادگی" name="family"
                                value="{{ old('family') }}"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('family')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="phoneNumber" class="text-(--color-primary)">شماره تلفن</label>
                            <input id="phoneNumber" type="number" placeholder="شماره تلفن" name="phoneNumber"
                                value="{{ old('phoneNumber') }}"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('phoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="nationalCode" class="text-(--color-primary)">کد ملی</label>
                            <input id="nationalCode" type="number" placeholder="کد ملی" name="nationalCode"
                                value="{{ old('nationalCode') }}"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('nationalCode')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="password" class="text-(--color-primary)">رمز عبور</label>
                            <input id="password" type="password" placeholder="رمز عبور" name="password"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('password')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col gap-2">
                            <label for="code" class="text-(--color-primary)">کد ارسال شده</label>
                            <div class="w-full flex items-center justify-between gap-2">
                                <input placeholder="کد ارسال شده" type="number" name="code" id="code"
                                    class="w-7/12 placeholder:text-right placeholder-(--color-zinc-400) text-sm block rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                                <button type="button" onclick="sendCode()" id="countDown"
                                    class="w-5/12 bg-[image:var(--gradient-gold)] flex items-center justify-center text-white rounded-md px-3 py-3 cursor-pointer">ارسال
                                    کد</button>
                            </div>
                        </div>
                        <button onclick="checkAuth(event)"
                            class="cursor-pointer w-full flex items-center justify-center gap-x-1 text-md font-bold mt-5 py-3 rounded-lg text-white bg-[image:var(--gradient-gold)] hover:opacity-85 transition">
                            ثبت نام
                        </button>
                        <div class="flex items-center justify-center gap-x-2 mt-3">
                            <span class="text-lg text-(--color-zinc-800)">حساب کاربری دارید؟</span>
                            <a href="{{ route('user.login') }}"
                                class="text-lg text-(--color-primary) font-bold cursor-pointer underline">وارد شوید
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w-fit lg:w-8/12 h-full hidden md:flex flex-col items-start justify-start mt-5">
                <div class="relative px-5 py-3 flex flex-col gap-5">
                    <div class="absolute inset-0 bg-white/5 backdrop-blur-sm rounded-lg"></div>
                    <div class="relative z-10 text-5xl font-bold flex flex-col gap-5 bg-inherit">
                        <span class="">به دنیای ارزشمند طلا</span>
                        <span class="text-(--color-primary)">خوش آمدید</span>
                    </div>
                    <div class="relative z-10 w-90 line-clamp-2">
                        <span class="text-(--color-text-secondary)">با ثبت نام در ستاری گلد، به جدید ترین قیمت ها،
                            محصولات متنوع و امکانات ویژه دسترسی پیدا کنید</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        let code = document.getElementById('code')
        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        function sendCode() {
            let phoneNumber = document.getElementById('phoneNumber')
            if (phoneNumber.value == "") {
                showMessage('open')
                element.innerHTML = `
                        <span class="text-red-500">!</span>
                        <span>لطفا شماره تلفن را وارد کنید</span>
                    `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.sendSMS') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                    },
                    success: function(data) {
                        if (!data) {
                            counter()
                            showMessage('open')
                            element.innerHTML = `
                                <span>✅</span>
                                <span class="text-shadow-lg">کد ارسال شد</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                        } else {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">کاربر قبلا با این شماره ثبت نام کرده است!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('user.login') }}")
                            }, 2000)
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                            <span>❌</span>
                            <span class="text-shadow-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        let signupForm = document.getElementById('signupForm')

        function checkAuth(e) {
            e.preventDefault()
            let phoneNumber = document.getElementById('phoneNumber')
            let nationalCode = document.getElementById('nationalCode')
            if (phoneNumber.value == "" || code.value == "" || nationalCode.value == "") {
                showMessage('open')
                element.innerHTML = `
                <span class="text-red-500">!</span>
                <span>لطفا همه فیلد ها را پر کنید</span>
                `
                message.children[0].appendChild(element)
                setTimeout(() => {
                    showMessage('close')
                }, 2000)
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.checkAuth') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'nationalCode': nationalCode.value,
                        'code': code.value
                    },
                    success: function(user) {
                        if (user.validate) {
                            showMessage('open')
                            element.innerHTML = `
                            <span class="text-red-500">این شماره قبلا ثبت شده است ، لطفا وارد شوید!</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('user.login') }}")
                            }, 2000)
                        } else {
                            if (user.nationalCode) {
                                showMessage('open')
                                element.innerHTML = `
                                <span class="text-shadow-lg">این کد ملی قبلا ثبت شده است.</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                                return
                            }
                            if (!user.checkCode) {
                                showMessage('open')
                                element.innerHTML = `
                                <span class="text-shadow-lg">کد وارد شده نامعتبر است.!</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                                return
                            }
                            if (!user.match) {
                                showMessage('open')
                                element.innerHTML = `
                                <span class="text-shadow-lg">شماره تلفن و کد ملی وارد شده باهم مطابقت ندارند</span>
                                `
                                message.children[0].appendChild(element)
                                setTimeout(() => {
                                    showMessage('close')
                                }, 2000)
                                return
                            }
                            if (user.checkCode && user.match) {
                                signupForm.submit()
                            }
                        }
                    },
                    error: function() {
                        showMessage('open')
                        element.innerHTML = `
                        <span>❌</span>
                        <span class="text-shadow-lg">خطا در دریافت اطلاعات!</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 2500)
                    }
                })
            }
        }

        let countDown = document.getElementById('countDown')

        function counter() {
            let phoneNumber = document.getElementById('phoneNumber')
            countDown.classList.add('cursor-no-drop')
            countDown.classList.remove('cursor-pointer')
            countDown.classList.remove('hover:bg-sky-600')
            countDown.classList.add('hover:bg-sky-500/50')
            countDown.classList.remove('bg-sky-500')
            countDown.classList.add('bg-sky-500/50')
            countDown.setAttribute('disabled', true)
            countDown.setAttribute('dir', 'ltr')
            let count = 120
            let result = setInterval(() => {
                let minute = Math.floor(count / 60)
                let seconds = count % 60
                count -= 1
                if (count < 0) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    })
                    $.ajax({
                        url: "{{ route('user.removeActivationCode') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'phoneNumber': phoneNumber.value
                        },
                        success: function(data) {
                            countDown.classList.remove('cursor-no-drop')
                            countDown.classList.add('bg-[#eb3254]')
                            countDown.classList.remove('bg-[#eb3254]/50')
                            countDown.classList.add('cursor-pointer')
                            countDown.classList.add('hover:bg-[#d52b4a]')
                            countDown.classList.remove('hover:bg-[#d52b4a]/50')
                            countDown.removeAttribute('disabled')
                            countDown.removeAttribute('dir')
                            countDown.innerText = "ارسال مجدد"
                        },
                        error: function() {
                            showMessage('open')
                            element.innerHTML = `
                                <span>❌</span>
                                <span class="text-shadow-lg">خطا در دریافت اطلاعات!</span>
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

        function showMessage(state) {
            if (state == 'open') {
                message.classList.remove('top-0')
                message.classList.remove('opacity-0')
                message.classList.remove('invisible')
                message.classList.add('top-2/10')
            }
            if (state == 'close') {
                message.classList.remove('top-2/10')
                message.classList.add('top-0')
                message.classList.add('opacity-0')
                message.classList.add('invisible')
            }
        }
        let modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            setTimeout(() => {
                modal.classList.add('opacity-0', 'invisible')
            }, 3000)
        })
    </script>
</body>

</html>
