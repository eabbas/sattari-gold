<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>

    <title>ستاری گلد | ورود</title>

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
    <main
        class="max-w-[1700px] mx-auto bg-[url({{ asset('assets/img/background.jpeg') }})] bg-cover bg-center min-h-screen">
        <section class="w-11/12 mx-auto flex items-center justify-between">
            <!-- بازگشت -->
            <a href="{{ route('home') }}"
                class="text-(--color-primary) px-4 py-2 border-1 border-(--color-border-gold) flex items-center justify-center mt-10 rounded-full">
                <svg fill="currentColor" class="group-hover:-translate-x-1 transition size-5 rotate-180"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
                <span class="text-(--color-text) font-bold">برگشت به خانه</span>
            </a>
            <!-- title -->
        </section>
        <section class="w-11/12 mx-auto flex items-start justify-between gap-10 mt-10">
            <div id="login"
                class="w-full md:w-6/12 xl:w-4/12 bg-(--color-primary-soft)/50 relative z-2 rounded-2xl mx-auto border-1 border-(--color-border-gold) h-auto py-5 px-4">
                <div class="w-12/12 flex items-center justify-center gap-5 ml-5">
                    <div
                        class="w-3/10 flex items-center justify-center text-xl font-semibold text-(--color-primary) p-3 border-b-2 border-(--color-border-gold) cursor-pointer">
                        ورود</div>
                </div>
                <form action="{{ route('user.checkUser') }}" method="POST"
                    class="w-full flex flex-col items-center justify-center" id="loginForm">
                    @csrf
                    <div class="w-full flex flex-col gap-y-3">
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
                        <div class="w-full flex flex-row justify-between items-center gap-2">
                            <div for="accept"
                                class="text-sm flex flex-row justify-start items-center gap-2 text-gray-400">
                                رمز عبور خود را
                                <a href="{{ route('user.forgetPassword') }}" class="text-gray-800 font-bold">فراموش
                                    کردم</a>
                            </div>
                            <a href="{{ route('user.loginWithCode') }}"
                                class="text-sm flex flex-row justify-start items-center gap-2 text-gray-400">ورود با
                                کد
                                تایید</a>
                        </div>
                        <button onclick="checkAuth(event)"
                            class="cursor-pointer w-full flex items-center justify-center gap-x-1 text-md font-bold mt-5 py-3 rounded-lg text-white bg-[image:var(--gradient-gold)] hover:opacity-85 transition">
                            ورود
                        </button>
                        <div class="flex items-center justify-center gap-x-2 mt-3">
                            <span class="text-lg text-(--color-zinc-800)">حساب کاربری ندارید؟</span>
                            <a href="{{ route('user.signup') }}"
                                class="text-lg text-(--color-primary) font-bold cursor-pointer underline">ثبت نام کنید!
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
        {{-- loader --}}
        <div id="loader"
            class="w-full h-full bg-black/50 fixed top-0 right-0 z-999 flex items-center justify-center transition-all duration-300 invisible opacity-0">
            <div class="p-10 bg-white shadow-xl rounded-lg flex flex-col items-center gap-10">
                <span class="w-20 h-20 animate-spin rounded-full border-4 border-yellow-100 border-t-yellow-600"></span>
                <p class="text-gray-600 font-bold text-xl">در حال بارگذاری لطفا شکیبا باشید....</p>
            </div>
        </div>
        {{-- loader --}}
    </main>

    <script>
        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

        let loginForm = document.getElementById('loginForm')
        let phoneNumber = document.getElementById('phoneNumber')
        let nationalCode = document.getElementById('nationalCode')
        let password = document.getElementById('password')

        function checkAuth(e) {
            e.preventDefault()
            if (phoneNumber.value == "" || password.value == "" || nationalCode.value == "") {
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
                loader('open')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.validate') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'phoneNumber': phoneNumber.value,
                        'nationalCode': nationalCode.value,
                        'password': password.value
                    },
                    success: function(data) {
                        loader('close')
                        if (!data.validate) {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">لطفا ثبت نام کنید</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                                location.assign("{{ route('user.signup') }}")
                            }, 2000)
                            return
                        }
                        if (!data.pass) {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">رمز عبور وارد شده اشتباه است</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                            return
                        }
                        if (!data.match) {
                            showMessage('open')
                            element.innerHTML = `
                                <span class="text-red-500">شماره تلفن و کد ملی باهم مطابقت ندارند</span>
                            `
                            message.children[0].appendChild(element)
                            setTimeout(() => {
                                showMessage('close')
                            }, 2000)
                            return
                        }
                        if (data.validate && data.pass && data.match) {
                            loginForm.submit()
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

        function loader(state) {
            let loader = document.getElementById('loader')
            if (state == 'open') {
                loader.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                loader.classList.add('invisible', 'opacity-0')
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
