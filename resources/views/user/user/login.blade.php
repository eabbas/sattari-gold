<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/IMG_20251225_131334_688.png') }}">
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
    <main class="w-full lg:h-dvh flex flex-row items-center p-4">
        <div class="w-full lg:w-1/2 lg:h-full p-4 lg:p-10 flex flex-col items-center gap-10">
            <h2 class="text-2xl font-bold text-gray-800 text-center mt-10">ورود با رمز عبور</h2>
            <div class="flex flex-row items-center gap-2">
                <span class="text-gray-400 text-xs">حساب کاربری ندارید؟</span>
                <a href="{{ route('user.signup') }}" class="text-xs text-gray-800 font-bold">ثبت نام</a>
            </div>
            <form action="{{ route('user.checkUser') }}" method="post" class="w-9/12 flex flex-col gap-4"
                id="loginForm">
                @csrf
                <div class="w-full">
                    <input type="number"
                        class="w-full outline-none px-5 py-2 border border-gray-300 rounded-lg placeholder-gray-300 transition-all duration-300 focus:border-blue-700/30 focus:bg-blue-100/30 focus:inset-shadow-sm inset-shadow-blue-700/10"
                        name="phoneNumber" id="phoneNumber" placeholder="شماره تلفن" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <input type="number"
                        class="w-full outline-none px-5 py-2 border border-gray-300 rounded-lg placeholder-gray-300 transition-all duration-300 focus:border-blue-700/30 focus:bg-blue-100/30 focus:inset-shadow-sm inset-shadow-blue-700/10"
                        name="nationalCode" id="nationalCode" placeholder="کد ملی" value="{{ old('nationalCode') }}">
                    @error('nationalCode')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <input type="password"
                        class="w-full outline-none px-5 py-2 border border-gray-300 rounded-lg placeholder-gray-300 transition-all duration-300 focus:border-blue-700/30 focus:bg-blue-100/30 focus:inset-shadow-sm inset-shadow-blue-700/10"
                        name="password" id="password" placeholder="رمز عبور">
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-row justify-between items-center gap-2">
                    <div for="accept" class="text-sm flex flex-row justify-start items-center gap-2 text-gray-400">
                        رمز عبور خود را
                        <a href="{{ route('user.forgetPassword') }}" class="text-gray-800 font-bold">فراموش کردم</a>
                    </div>
                    <a href="{{ route('user.loginWithCode') }}"
                        class="text-sm flex flex-row justify-start items-center gap-2 text-gray-400">ورود با کد
                        تایید</a>
                </div>
                <button onclick="checkAuth(event)"
                    class="py-3 rounded-md text-white text-sm font-bold bg-sky-500 cursor-pointer transition-all duration-300 hover:bg-sky-600">ورود</button>
            </form>
        </div>
        <div class="hidden lg:flex items-center justify-center w-1/2 h-full rounded-lg relative">
            <a href="{{ route('home') }}"
                class="px-4 py-1.5 bg-gray-700/30 rounded-full flex flex-row items-center absolute top-5 right-5 transition-all duration-300 hover:bg-gray-700/50">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    class="size-3 fill-white" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
                <span class="text-xs text-white">بازگشت به خانه</span>
            </a>
            <img src="{{ asset('assets/img/hero.webp') }}" class="w-2/3 h-auto" alt="">
        </div>
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
        let modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            setTimeout(() => {
                modal.classList.add('opacity-0', 'invisible')
            }, 3000)
        })
    </script>
</body>

</html>
