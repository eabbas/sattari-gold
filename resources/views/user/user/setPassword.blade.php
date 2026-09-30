<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/IMG_20251225_131334_688.png') }}">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <title>ستاری گلد | ثبت رمز عبور جدید</title>

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
    <main class="w-full lg:h-dvh flex flex-row items-center p-4">
        <div class="w-full lg:w-1/2 lg:h-full p-4 lg:p-10 flex flex-col items-center gap-10">
            <h2 class="text-2xl font-bold text-gray-800 text-center mt-10">ثبت رمز عبور جدید</h2>

            <form action="{{ route('user.savePassword') }}" method="post" class="w-9/12 flex flex-col gap-4"
                id="form">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="w-full">
                    <input type="password"
                        class="w-full outline-none px-5 py-2 border border-gray-300 rounded-lg placeholder-gray-300 transition-all duration-300 focus:border-blue-700/30 focus:bg-blue-100/30 focus:inset-shadow-sm inset-shadow-blue-700/10"
                        name="password" id="password" placeholder="رمز عبور">
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
        let form = document.getElementById('form')

        function checkAuth(e) {
            let pass = document.getElementById('password')
            e.preventDefault()
            if (pass.value == '') {
                alert('رمز خود را وارد کنید!')
            } else {
                form.submit()
            }
        }
    </script>
</body>

</html>
