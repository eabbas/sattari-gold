<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

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
    <main
        class="max-w-[1700px] mx-auto bg-[url({{ asset('assets/img/background.jpeg') }})] bg-cover bg-center min-h-screen">
        <section class="w-11/12 mx-auto flex items-center justify-between">
            <!-- بازگشت -->
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
            <!-- title -->
        </section>
        <section class="w-11/12 mx-auto flex items-start justify-between gap-10 mt-10">
            <div id="login"
                class="w-full md:w-6/12 xl:w-4/12 bg-(--color-primary-soft)/50 relative z-2 rounded-2xl mx-auto border-1 border-(--color-border-gold) h-auto py-5 px-4">
                <div class="w-12/12 flex items-center justify-center gap-5 ml-5">
                    <div
                        class="w-5/10 flex items-center justify-center text-xl font-semibold text-(--color-primary) p-3 border-b-2 border-(--color-border-gold) cursor-pointer">
                        ثبت رمز عبور جدید</div>
                </div>
                <form action="{{ route('user.savePassword') }}" method="POST"
                    class="w-full flex flex-col items-center justify-center" id="form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="w-full flex flex-col gap-y-3">
                        <div class="w-full flex flex-col gap-2">
                            <label for="password" class="text-(--color-primary)">رمز عبور</label>
                            <input id="password" type="password" placeholder="رمز عبور" name="password"
                                class="placeholder:text-right placeholder-(--color-zinc-400) text-sm block w-full rounded-md border-3 border-(--color-border-strong) px-3 py-3 font-normal text-(--color-text-secondary) outline-none transition-all focus:border-(--color-border-gold) focus:outline-none">
                            @error('password')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-row items-center gap-2 mt-2">
                            <span class="text-gray-400 ">حساب کاربری دارید؟</span>
                            <a href="{{ route('user.login') }}" class=" text-gray-800 font-bold">ورود</a>
                        </div>
                        <button onclick="checkAuth(event)"
                            class="w-full flex items-center justify-center gap-x-1 text-md font-bold mt-5 py-3 rounded-lg text-white bg-[image:var(--gradient-gold)] hover:opacity-85 transition cursor-pointer">بازیابی</button>
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
