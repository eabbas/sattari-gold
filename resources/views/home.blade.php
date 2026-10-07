@extends('app.document')
@section('title', 'طلای ستاری | صفحه اول')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-25 right-10 z-5000 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-25 right-10 z-5000 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    <!-- hero -->
    <section
        class="2xl:container mx-auto w-full @if ($header) bg-[url('{{ asset('storage/' . $header->header_bg) }}')] @endif bg-cover bg-no-repeat flex flex-col justify-center items-center pb-5 pt-20 lg:pt-10">
        @if ($header)
            <div class="w-10/12 lg:w-5/12 flex flex-col justify-center items-center">
                <img src="{{ asset('storage/' . $header->header_img) }}" class="w-1/2 lg:w-11/12" alt="">
                <h2 class="text-xl lg:text-3xl text-gray-800 font-bold flex justify-center items-center gap-1 mt-1.5">
                    <span>{{ $header->title }}</span>
                    {{-- <span class="text-[#c98323]">با طلا</span> --}}
                </h2>
                <p class="text-xs lg:text-sm text-gray-600 text-center mt-1.5">{{ $header->subTitle }}</p>
                <div class="w-full flex justify-center items-center gap-4 pt-5">
                    <a href="{{ route($header->btnLink) }}"
                        class="group flex justify-center items-center w-1/2 lg:w-1/3 gap-1 py-2 lg:py-3 rounded-full"
                        style="background: #A56920;
                    background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">
                        <svg class="w-[31px] h-[31px] text-white group-hover:translate-x-[10px] transition-all duration-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                        <span class="text-xs lg:text-sm font-bold text-white">{{ $header->btnText }}</span>
                    </a>
                </div>
            </div>
        @endif
        <!-- value bar -->
        <div class="w-11/12 mx-auto bg-white p-3 rounded-xl  mt-4">
            <div class="bg-[#faf5f0] p-2.5 rounded-lg grid grid-cols-1 lg:grid-cols-3">

                <div
                    class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 relative after:absolute after:content-[''] after:w-11/12 after:h-px after:bottom-0 after:left-1/2 after:-translate-x-1/2 lg:after:translate-x-0 py-3 lg:py-0 lg:after:w-0.5 lg:after:h-5 lg:after:rounded-full after:bg-[#e5b369] lg:after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.1 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">{{ number_format(26520000) }}</span>
                    <span class="text-gray-600 text-xs in-fa">طلای 18 عیار</span>
                    <img src="{{ asset('assets/img/gold-bar.webp') }}" class="w-8" alt="">
                </div>

                <div
                    class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 relative after:absolute after:content-[''] after:w-11/12 after:h-px after:bottom-0 after:left-1/2 after:-translate-x-1/2 lg:after:translate-x-0 py-3 lg:py-0 lg:after:w-0.5 lg:after:h-5 lg:after:rounded-full after:bg-[#e5b369] lg:after:left-0 lg:after:top-1/2 lg:after:-translate-y-1/2">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.16 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">{{ number_format(271590000) }}</span>
                    <span class="text-gray-600 text-xs in-fa">سکه امامی</span>
                    <img src="{{ asset('assets/img/coin.webp') }}" class="w-8" alt="">
                </div>

                <div class="w-full flex flex-row justify-between lg:justify-center items-center gap-3 py-3 lg:py-0">
                    <span class="text-xs text-emerald-400 font-bold in-fa flex items-center">
                        <svg class="w-[24px] h-[24px] text-emerald-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        % 1.1 +
                    </span>
                    <span class="text-gray-800 font-bold in-fa">{{ number_format(4151.94) }}</span>
                    <span class="text-gray-600 text-xs in-fa">انس طلا</span>
                    <img src="{{ asset('assets/img/gold.webp') }}" class="w-8" alt="">
                </div>

            </div>
        </div>
        <!-- value bar -->
    </section>
    <!-- hero -->

    <!-- why us? -->
    <section class="2xl:container mx-auto w-full bg-[#fbf7f3] py-5 lg:py-10 relative overflow-hidden">
        <div class="w-11/12 mx-auto">
            <img src="{{ asset('assets/img/why-us.png') }}" class="absolute w-1/4 h-full left-0 top-0 hidden lg:block"
                alt="">
            <h2 class="text-md lg:text-2xl font-bold text-gray-800 mb-2">چرا ستاری گلد؟</h2>
            <span class="block text-sm lg:text-base text-gray-500">انتخاب هوشمندانه برای سرمایه گذاری</span>
            <div class="w-full lg:w-3/4 mt-5 grid gap-3 grid-cols-3 lg:grid-cols-6">

                <!-- items -->

                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg viewBox="0 0 32 32" class="size-8 lg:size-11 fill-[#e1a84f]">
                            <path
                                d="M16,2C9.4,2,4,7.3,4,13.9v3.5c0,0.1,0,0.1,0,0.2c0,0.1,0,0.3,0,0.4c0,2.8,2.2,5,5,5c0.6,0,1-0.4,1-1v-8c0-0.6-0.4-1-1-1
                                                                                                                                                                                                                                                                    c-1.1,0-2.2,0.4-3,1v-0.2C6,8.4,10.5,4,16,4s10,4.4,10,9.9V14c-0.8-0.6-1.9-1-3-1c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1
                                                                                                                                                                                                                                                                    c0.7,0,1.4-0.2,2-0.4c-1,2.1-2.8,3.7-5,4.6c0-0.1,0-0.1,0-0.2c0-0.6-0.4-1-1-1h-3c-0.6,0-1,0.4-1,1v2c0,0.6,0.4,1,1,1
                                                                                                                                                                                                                                                                    c6.6,0,12-5.2,12-11.6v-1V15v-1.1C28,7.3,22.6,2,16,2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">پشتیبانی تخصصی</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">با کارشناسان مجرب</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="size-8 lg:size-11 fill-[#e1a84f]">
                            <path
                                d="M22,9H13V6a3,3,0,0,1,3-3,1,1,0,0,0,0-2,4.993,4.993,0,0,0-4.495,2.851,6.328,6.328,0,0,0-8.02-.708,1,1,0,0,0-.414,1.228,6.179,6.179,0,0,0,3.32,3.218,5.785,5.785,0,0,0,2.07.372A7.889,7.889,0,0,0,11,7.491V9H2a1,1,0,0,0-1,1V22a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V10A1,1,0,0,0,22,9ZM7.123,5.728A3.914,3.914,0,0,1,5.4,4.409,4.332,4.332,0,0,1,10.421,5.59,4.809,4.809,0,0,1,7.123,5.728ZM21,19.184A2.987,2.987,0,0,0,19.184,21H4.816A2.987,2.987,0,0,0,3,19.184V12.816A2.987,2.987,0,0,0,4.816,11H19.184A2.987,2.987,0,0,0,21,12.816ZM14,16a2,2,0,1,1-2-2A2,2,0,0,1,14,16Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">سرمایه‌گذاری مطمئن</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">با روش‌های معتبر</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg viewBox="-5 0 19 19" xmlns="http://www.w3.org/2000/svg"
                            class="size-8 lg:size-11 fill-[#e1a84f]">
                            <path
                                d="M8.699 11.907a3.005 3.005 0 0 1-1.503 2.578 4.903 4.903 0 0 1-1.651.663V16.3a1.03 1.03 0 1 1-2.059 0v-1.141l-.063-.011a5.199 5.199 0 0 1-1.064-.325 3.414 3.414 0 0 1-1.311-.962 1.029 1.029 0 1 1 1.556-1.347 1.39 1.39 0 0 0 .52.397l.002.001a3.367 3.367 0 0 0 .648.208h.002a4.964 4.964 0 0 0 .695.084 3.132 3.132 0 0 0 1.605-.445c.5-.325.564-.625.564-.851a1.005 1.005 0 0 0-.245-.65 2.06 2.06 0 0 0-.55-.44 2.705 2.705 0 0 0-.664-.24 3.107 3.107 0 0 0-.65-.066 6.046 6.046 0 0 1-1.008-.08 4.578 4.578 0 0 1-1.287-.415A3.708 3.708 0 0 1 1.02 9.04a3.115 3.115 0 0 1-.718-1.954 2.965 2.965 0 0 1 .321-1.333 3.407 3.407 0 0 1 1.253-1.335 4.872 4.872 0 0 1 1.611-.631V2.674a1.03 1.03 0 1 1 2.059 0v1.144l.063.014h.002a5.464 5.464 0 0 1 1.075.368 3.963 3.963 0 0 1 1.157.795A1.03 1.03 0 0 1 6.39 6.453a1.901 1.901 0 0 0-.549-.376 3.516 3.516 0 0 0-.669-.234l-.066-.014a3.183 3.183 0 0 0-.558-.093 3.062 3.062 0 0 0-1.572.422 1.102 1.102 0 0 0-.615.928 1.086 1.086 0 0 0 .256.654l.002.003a1.679 1.679 0 0 0 .537.43l.002.002a2.57 2.57 0 0 0 .703.225h.002a4.012 4.012 0 0 0 .668.053 5.165 5.165 0 0 1 1.087.112l.003.001a4.804 4.804 0 0 1 1.182.428l.004.002a4.115 4.115 0 0 1 1.138.906l.002.002a3.05 3.05 0 0 1 .753 2.003z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">کارمزد پایین</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">بازدهی حداکثر </span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg viewBox="0 0 490 490" class="size-8 lg:size-11 fill-[#e1a84f]">
                            <g id="Business_1_Bold_16_">
                                <path
                                    d="M338.564,35.65c-11.882-11.913-31.328-11.913-43.195,0l-6.324,6.339c-11.882,11.913-11.882,31.405,0,43.302l0.505,0.505
                                                                                                                                                                                                c-9.509,6.14-23.917,15.527-39.811,26.245c-14.546-17.93-32.354-34.529-40.638-41.909c2.113-9.846-0.582-20.533-8.161-28.143
                                                                                                                                                                                                l-6.324-6.339c-11.882-11.913-31.328-11.913-43.195,0L8.912,178.511c-11.882,11.913-11.882,31.405,0,43.303l6.324,6.339
                                                                                                                                                                                                c9.233,9.248,22.983,11.224,34.253,6.094c5.91,8.314,20.916,29.093,39.964,53.179c-10.489,10.764-27.271,31.068-27.975,51.647
                                                                                                                                                                                                c-0.337,10.167,3.231,19.339,10.32,26.49c21.957,22.187,87.6,87.815,87.6,87.815l1.96,1.654c0.873,0.612,12.005,8.253,30.042,8.253
                                                                                                                                                                                                c14.868,0,34.437-5.328,56.762-23.917c4.655,3.384,7.671,5.497,8.33,5.941c2.205,1.363,17.67,10.489,34.85,10.489
                                                                                                                                                                                                c5.512,0,11.208-0.949,16.705-3.399c7.334-3.277,16.43-10.274,21.529-25.204c12.801-4.593,28.434-14.883,34.973-33.794
                                                                                                                                                                                                c14.715-3.583,30.364-13.827,35.815-33.671c14.102-1.945,30.302-9.738,36.151-30.578c4.364-15.618,0-29.032-6.844-39.337
                                                                                                                                                                                                c10.244-11.162,23.55-29.797,26.168-52.995c6.906-0.597,13.658-3.399,18.926-8.682l6.324-6.339
                                                                                                                                                                                                c11.882-11.913,11.882-31.405,0-43.303L338.564,35.65z M424.878,221.462c3.399,19.37-7.962,36.596-16.813,46.564l-82.302-77.356
                                                                                                                                                                                                l-10.213,7.273c-20.824,14.792-47.605,1.807-47.819,1.715l-8.835-4.456l-7.717,6.155c-0.245,0.199-24.928,19.645-58.094,22.601
                                                                                                                                                                                                c-2.664,0.245-4.946,0.322-6.921,0.322c-8.299,0-10.902-1.654-10.856-1.485c-0.75-2.71,2.404-13.153,13.429-26.49
                                                                                                                                                                                                c12.495-15.098,80.005-60.835,122.94-88.32L424.878,221.462z M119.066,323.302l-22.172,24.101
                                                                                                                                                                                                c-1.179-1.194-2.343-2.358-3.338-3.369c-1.164-1.179-1.546-2.174-1.485-3.92c0.245-7.671,8.559-19.523,16.874-28.695
                                                                                                                                                                                                C112.283,315.401,115.652,319.351,119.066,323.302z M164.099,414.776c-3.231-3.246-6.768-6.768-10.535-10.55l21.743-23.642
                                                                                                                                                                                                c3.782,3.399,7.534,6.707,11.254,9.922L164.099,414.776z M131.898,382.544c-4.548-4.548-9.034-9.065-13.368-13.398l21.146-22.999
                                                                                                                                                                                                c2.971,3.139,5.956,6.217,8.911,9.187c1.439,1.455,2.925,2.863,4.379,4.303L131.898,382.544z M189.349,432.584l20.748-22.417
                                                                                                                                                                                                c4.486,3.629,8.758,6.997,12.801,10.167C208.228,430.945,196.867,432.982,189.349,432.584z M407.024,320.883
                                                                                                                                                                                                c-2.036,7.273-8.667,8.713-13.367,8.774l-85.411-81.246l-21.115,22.187l83.91,79.806c-1.991,8.712-8.024,12.066-13.551,13.26
                                                                                                                                                                                                l-84.277-80.174l-21.115,22.187l82.915,78.872c-3.047,7.212-9.034,11.055-13.781,13.015l-83.022-78.979l-21.115,22.187
                                                                                                                                                                                                l82.608,78.597c-0.995,2.22-2.327,4.18-4.15,5.007c-5.528,2.542-17.103-1.608-22.325-4.716
                                                                                                                                                                                                c-0.551-0.398-56.823-39.75-102.973-86.008c-43.149-43.256-91.198-110.66-97.645-119.771L191.094,95.107
                                                                                                                                                                                                c8.023,7.289,21.85,20.503,33.288,34.299c-25.847,18.114-50.407,36.642-59.258,47.345c-8.942,10.81-28.48,38.311-16.981,60.146
                                                                                                                                                                                                c7.243,13.781,23.244,19.676,47.651,17.517c30.762-2.725,55.215-16.154,67.005-23.856c12.495,4.272,36.121,9.463,59.38-1.271
                                                                                                                                                                                                l81.353,76.453C406.458,309.812,408.678,315.003,407.024,320.883z" />
                            </g>
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">خرید و فروش آنلاین</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">در هر ساعت از شبانه‌روز</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg width="800px" height="800px" viewBox="0 0 24 24"
                            class="size-8 lg:size-11 fill-none stroke-[#e1a84f]">
                            <path
                                d="M21 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V3M6 15L10 11L14 15L20 9M20 9V13M20 9H16"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">قیمت‌های لحظه‌ای</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500">به‌صورت آنی</span>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center gap-4">
                    <div class="size-12 lg:size-18 bg-white rounded-full flex justify-center items-center"
                        style="box-shadow: -1px 2px 3px 0px rgba(0, 0, 0, 0.2);">
                        <svg class="size-8 lg:size-11 fill-[#e1a84f]" viewBox="0 0 24 24">
                            <path
                                d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                        </svg>
                    </div>
                    <div class="flex flex-col items-center gap-2">
                        <h3 class="text-sm lg:text-base font-bold text-gray-800">امنیت بالا</h3>
                        <span class="text-xs lg:text-sm font-bold text-gray-500"> با بالاترین استانداردها</span>
                    </div>
                </div>

                <!-- items -->

            </div>
        </div>
    </section>
    <!-- why us? -->


    <!-- products -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto">
            <!-- title -->
            <div class="w-full flex flex-row items-end justify-between">
                <div class="flex flex-col gap-3">
                    <h2 class="text-md lg:text-2xl font-bold text-gray-800">محصولات ما</h2>
                    <span class="text-sm lg:text-base text-gray-500 font-bold">با اطمینان سرمایه گذاری کنید </span>
                </div>
                <div>
                    <a href="{{ route('product.index') }}" class="flex justify-end items-center gap-2 group">
                        <span
                            class="text-xs lg:text-sm font-bold text-gray-500 group-hover:text-[#e1a84f] transition-all duration-300">مشاهده
                            بیشتر</span>
                        <svg class="w-[31px] h-[31px] text-[#e1a84f] transition-all duration-300 group-hover:-translate-x-[10px]"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- title -->

            <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 mt-8">
                <!-- items -->
                @foreach ($products as $product)
                    <div class="w-full rounded-xl flex flex-col relative"
                        style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);">
                        @if ($product->percent)
                            <span
                                class="absolute top-4 right-4 bg-[#c3924d] text-white rounded-[5px] text-[10px] px-[7px] py-1 in-fa">{{ $product->percent }}
                                %</span>
                        @endif
                        <a href="{{ route('product.show', [$product]) }}" class="block w-full rounded-md">
                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block w-full h-40 object-cover rounded-md" alt="">
                        </a>
                        <div class="w-full flex flex-col gap-2 p-3">
                            <a href="{{ route('product.show', [$product]) }}" class="block">
                                <h3 class="text-gray-800 font-bold text-sm lg:text-base">{{ $product['title'] }}</h3>
                            </a>
                            {{-- @foreach ($product->categories as $category)
                                <span class="text-gray-500 text-xs font-bold">{{ $category->title }}</span>
                            @endforeach --}}
                            <div class="w-full flex flex-row items-center justify-between mt-2">
                                @if ($product->primary_price)
                                    @if ($product->secondary_price)
                                        <div class="space-y-2">
                                            <div class="line-through text-[#a1a1aa] text-xs in-fa">
                                                {{ $product->primary_price }}
                                                تومان</div>
                                            <div class="flex flex-row items-center gap-1 lg:text-base">
                                                <span
                                                    class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->secondary_price }}</span>
                                                <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex flex-row items-center gap-1 lg:text-base">
                                            <span
                                                class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                            <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-[10px] text-gray-500">برای استعلام قیمت تماس
                                        بگیرید</span>
                                @endif
                                <a href="{{ route('product.show', [$product]) }}"
                                    class="bg-[#efe7d8] rounded-full flex justify-center items-center px-2 py-1">
                                    <span class="text-[10px]">مشاهده محصول</span>
                                    <svg class="size-5 text-[#e1a84f]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full rounded-xl flex flex-col relative"
                        style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);">
                        @if ($product->percent)
                            <span
                                class="absolute top-4 right-4 bg-[#c3924d] text-white rounded-[5px] text-[10px] px-[7px] py-1 in-fa">{{ $product->percent }}
                                %</span>
                        @endif
                        <a href="{{ route('product.show', [$product]) }}" class="block w-full rounded-md">
                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block w-full h-40 object-cover rounded-md" alt="">
                        </a>
                        <div class="w-full flex flex-col gap-2 p-3">
                            <a href="{{ route('product.show', [$product]) }}" class="block">
                                <h3 class="text-gray-800 font-bold text-sm lg:text-base">{{ $product['title'] }}</h3>
                            </a>
                            {{-- @foreach ($product->categories as $category)
                                <span class="text-gray-500 text-xs font-bold">{{ $category->title }}</span>
                            @endforeach --}}
                            <div class="w-full flex flex-row items-center justify-between mt-2">
                                @if ($product->primary_price)
                                    @if ($product->secondary_price)
                                        <div class="space-y-2">
                                            <div class="line-through text-[#a1a1aa] text-xs in-fa">
                                                {{ $product->primary_price }}
                                                تومان</div>
                                            <div class="flex flex-row items-center gap-1 lg:text-base">
                                                <span
                                                    class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->secondary_price }}</span>
                                                <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex flex-row items-center gap-1 lg:text-base">
                                            <span
                                                class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                            <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-[10px] text-gray-500">برای استعلام قیمت تماس
                                        بگیرید</span>
                                @endif
                                <a href="{{ route('product.show', [$product]) }}"
                                    class="bg-[#efe7d8] rounded-full flex justify-center items-center px-2 py-1">
                                    <span class="text-[10px]">مشاهده محصول</span>
                                    <svg class="size-5 text-[#e1a84f]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full rounded-xl flex flex-col relative"
                        style="box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);">
                        @if ($product->percent)
                            <span
                                class="absolute top-4 right-4 bg-[#c3924d] text-white rounded-[5px] text-[10px] px-[7px] py-1 in-fa">{{ $product->percent }}
                                %</span>
                        @endif
                        <a href="{{ route('product.show', [$product]) }}" class="block w-full rounded-md">
                            <img src="{{ asset('storage/' . $product['mainImg']) }}"
                                class="block w-full h-40 object-cover rounded-md" alt="">
                        </a>
                        <div class="w-full flex flex-col gap-2 p-3">
                            <a href="{{ route('product.show', [$product]) }}" class="block">
                                <h3 class="text-gray-800 font-bold text-sm lg:text-base">{{ $product['title'] }}</h3>
                            </a>
                            {{-- @foreach ($product->categories as $category)
                                <span class="text-gray-500 text-xs font-bold">{{ $category->title }}</span>
                            @endforeach --}}
                            <div class="w-full flex flex-row items-center justify-between mt-2">
                                @if ($product->primary_price)
                                    @if ($product->secondary_price)
                                        <div class="space-y-2">
                                            <div class="line-through text-[#a1a1aa] text-xs in-fa">
                                                {{ $product->primary_price }}
                                                تومان</div>
                                            <div class="flex flex-row items-center gap-1 lg:text-base">
                                                <span
                                                    class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->secondary_price }}</span>
                                                <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex flex-row items-center gap-1 lg:text-base">
                                            <span
                                                class="text-sm lg:text-md font-bold text-gray-800 in-fa">{{ $product->primary_price }}</span>
                                            <span class="text-xs lg:text-sm font-bold text-[#e1a84f]">تومان</span>
                                        </div>
                                    @endif
                                @else
                                    <span class="text-[10px] text-gray-500">برای استعلام قیمت تماس
                                        بگیرید</span>
                                @endif
                                <a href="{{ route('product.show', [$product]) }}"
                                    class="bg-[#efe7d8] rounded-full flex justify-center items-center px-2 py-1">
                                    <span class="text-[10px]">مشاهده محصول</span>
                                    <svg class="size-5 text-[#e1a84f]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- items -->
            </div>
        </div>
    </section>
    <!-- products -->

    <!-- app -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto flex flex-col lg:flex-row gap-4 lg:gap-6">
            <div class="w-full lg:w-[30%] relative h-80 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="w-full flex flex-col gap-3 p-5">
                    <h3 class="text-sm lg:text-xl text-gray-800 font-bold">اپلیکیشن ستاری گلد</h3>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">همیشه و همه جا</span>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">کنار شما هستیم</span>
                </div>
                <div class="absolute size-56 bg-[#ffd28aaf] rounded-full backdrop-blur-xs -left-16 -bottom-20"
                    style="box-shadow: 0px 0px 20px 20px #ffd28aaf;"></div>
                <div class="absolute size-40 bg-[#e1a84f] rounded-full backdrop-blur-xs left-5 -bottom-20"
                    style="box-shadow: 0px 0px 15px 15px #e1a84f;"></div>
                <img src="{{ asset('assets/img/mobile.png') }}" class="absolute w-30 left-0 -bottom-6 rotate-[15deg]"
                    alt="">
                <div class="absolute flex flex-row items-center gap-2 bottom-14 right-4">
                    <a href="#" class="flex flex-row items-center bg-[#f4f0ea] gap-1 py-1.5 px-2 rounded-md">
                        <span class="text-xs text-gray-700">Play Store</span>
                        <img src="{{ asset('assets/img/play-store.png') }}" class="size-4" alt="">
                    </a>
                    <a href="#" class="flex flex-row items-center bg-[#f4f0ea] gap-1 py-1.5 px-2 rounded-md">
                        <span class="text-xs text-gray-700">Apple Store</span>
                        <img src="{{ asset('assets/img/apple-store.png') }}" class="size-4" alt="">
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-[24%] relative h-80 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <img src="{{ asset('assets/img/educate.webp') }}" class="absolute size-full object-cover top-0 right-0"
                    alt="">
                <div class="absolute w-full h-full bottom-0 pb-4 right-0"
                    style="background: #241C00;
                    background: radial-gradient(circle, rgba(36, 28, 0, 0.1) 0%, rgba(0, 0, 0, 1) 70%);">
                    <div class="relative w-full h-full">
                        <div class="absolute bottom-4 right-0 px-5 backdrop-blur-xs pt-3 w-full">
                            <h3 class="lg:text-lg font-bold text-white">
                                آموزش سرمایه گذاری در بازار طلا
                            </h3>
                            <div class="flex flex-col gap-1 mt-2">
                                <span class="text-xs lg:text-sm text-gray-200">آموزش های مفید</span>
                                <span class="text-xs lg:text-sm text-gray-200">آموزش های کامل و جامع</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="absolute size-14 rounded-full cursor-pointer border-1 border-white inset-1/2 -translate-y-1/2 translate-x-1/2 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-4" viewBox="0 0 384 512">
                        <path
                            d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" />
                    </svg>
                </div>
            </div>
            <div class="w-full lg:w-[44%] relative h-80 rounded-xl overflow-hidden">
                <img src="{{ asset('assets/img/gold-chart.jpg') }}" class="size-full object-cover" alt="">
                <div class="absolute w-full h-full top-0 right-0 bg-black/40"></div>
                <div class="absolute top-1/2 right-[6%] -translate-y-1/2">
                    <h3 class="lg:text-xl font-bold text-white">تحلیل بازار طلا</h3>
                    <p class="text-sm text-white font-bold w-2/3 mt-3 leading-[2]">
                        با جدید ترین تحلیل های بازار طلا سرمایه گذاری خود را شروع کنید
                    </p>
                    <div class="mt-8">
                        <a href="#"
                            class="group flex justify-center items-center w-2/3 gap-2 lg:gap-3 py-1.5 lg:py-2 rounded-full pl-6"
                            style="background: #A56920;
                                            background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">
                            <svg class="w-[31px] h-[31px] text-white group-hover:translate-x-[10px] transition-all duration-300"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.3" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                            <span class="text-xs lg:text-sm font-bold text-white">مشاهده تحلیل ها</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- app -->

    <!-- contacts -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div
            class="w-11/12 mx-auto bg-[linear-gradient(90deg,#d8c3a5_0%,#f5efe6_30%,#ffffff_100%)] rounded-xl py-3 lg:py-5 px-4">
            <div class="w-full mb-4 lg:mb-8">
                <h2 class="lg:text-xl text-gray-800 font-bold mb-3">نظرات کاربران</h2>
                <span class="text-gray-500 font-bold text-sm">اعتماد شما بزرگترین سرمایه ماست</span>
            </div>
            <div class="w-full flex items-center gap-3 lg:gap-5 overflow-x-auto px-3"
                style="scrollbar-color: #e1a84f #e5e7eb00; scrollbar-width: thin;">
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/mrolyafam.png') }}" class="size-12 rounded-full object-cover"
                                alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/mrolyafam.png') }}" class="size-12 rounded-full object-cover"
                                alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/mrolyafam.png') }}" class="size-12 rounded-full object-cover"
                                alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
                <div class="pb-3">
                    <div class="w-[200px] lg:w-[360px] bg-white rounded-lg p-4">
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/img/mrolyafam.png') }}" class="size-12 rounded-full object-cover"
                                alt="">
                            <div class="flex flex-col gap-2">
                                <span class="text-sm text-gray-700 font-bold">محمدرضا علیافام</span>
                                <div class="flex flex-row items-center gap-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-yellow-500 w-3"
                                        viewBox="0 0 576 512">
                                        <path
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 leading-[1.5] mt-6">
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                            است، چاپگرها و متون بلکه

                        </p>
                        <div class="w-full flex justify-between items-center mt-4">
                            <span class="text-xs text-gray-400 in-fa">14:22:53</span>
                            <span class="text-xs text-gray-400 in-fa">1404/05/21</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contacts -->

    <!-- co-worker -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto">
            <div class="w-full mb-4 lg:mb-8">
                <h2 class="lg:text-xl text-gray-800 font-bold mb-3">همکاران ما</h2>
                <span class="text-gray-500 font-bold text-sm">به همراه شما بزرگترین مسیر را ادامه میدهیم</span>
            </div>
            <div class="flex items-center justify-between gap-3 lg:gap-5 overflow-x-auto px-5"
                style="scrollbar-width: thin;">
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/goldab.png') }}" class="size-full rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/zarnid.png') }}" class="size-full object-cover rounded-lg"
                            alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/milligold.png') }}" class="size-full object-cover rounded-lg"
                            alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/goldab.png') }}" class="size-full rounded-lg" alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/zarnid.png') }}" class="size-full object-cover rounded-lg"
                            alt="">
                    </a>
                </div>
                <div class="py-3 rounded-lg">
                    <a href="#" class="block w-[120px] h-10 lg:w-[180px] lg:h-16 rounded-lg"
                        style="box-shadow:0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <img src="{{ asset('assets/img/milligold.png') }}" class="size-full object-cover rounded-lg"
                            alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- co-worker -->


    <!-- app -->
    <section class="2xl:container mx-auto w-full py-4 lg:py-10">
        <div class="w-11/12 mx-auto flex flex-col lg:flex-row gap-4 lg:gap-6">
            <div class="w-full lg:w-[34%] relative h-40 lg:h-44 rounded-xl overflow-hidden"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="w-full flex flex-col gap-3 p-5">
                    <h3 class="text-sm lg:text-xl text-gray-800 font-bold">خبرنامه ستاری گلد</h3>
                    <span class="text-xs lg:text-sm font-bold text-gray-500">جدید ترین اخبار طلای آبشده و سپرده</span>
                </div>
                <div class="flex items-center gap-4 px-5">
                    <a href="#" class="block bg-[#fbf7f3] px-3 py-1 text-xs text-gray-500">
                        اخبار ایران درمورد بازار ارز
                    </a>
                    <a href="#" class="block bg-[#fbf7f3] px-3 py-1 text-xs text-gray-500">
                        اخبار جهان انس جهانی طلا
                    </a>
                </div>
                <div class="w-full flex justify-end p-2">
                    <a href="#"
                        class="group flex justify-center items-center w-1/3 gap-2 lg:gap-3 py-1.5 lg:py-2 rounded-full"
                        style="background: #A56920;
                                background: linear-gradient(0deg, rgba(165, 105, 32, 1) 0%, rgba(227, 171, 90, 1) 100%);">

                        <span class="text-xs lg:text-sm font-bold text-white">عضویت</span>
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-[24%] relative h-40 lg:h-44 rounded-xl flex flex-col justify-between p-3"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[43px] h-[43px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">09123456789</span>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[36px] h-[36px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5"
                                d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">test@example.com</span>
                    </div>
                </div>
                <div class="flex flex-col justify-between items-end">
                    <div class="flex flex-row-reverse items-center gap-1">
                        <svg class="w-[43px] h-[43px] text-[#e1a84f]" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>
                        <span class="text-sm text-gray-600 font-bold in-fa">تهران، خیابان ولیعصر، پلاک 75</span>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-[40%] relative h-40 lg:h-44 rounded-xl overflow-hidden bg-[linear-gradient(90deg,#d8c3a5_0%,#f5efe6_30%,#ffffff_100%)]"
                style="box-shadow: 0px 0px 3px 1px rgba(0, 0, 0, 0.2);">
                <img src="{{ asset('assets/img/gold-bar.webp') }}" class="absolute -bottom-5 -left-5 w-1/3 object-cover"
                    alt="">
                <div class="absolute top-1/2 right-[6%] -translate-y-1/2">
                    <h3 class="lg:text-xl font-bold text-gray-800">ارتباط با ما</h3>
                    <p class="text-sm text-gray-600 font-bold w-2/3 mt-3 leading-[2]">
                        پاسخگوی سوالات شما هستیم
                    </p>
                    <p class="text-sm text-gray-600 font-bold w-2/3 mt-3 leading-[2]">
                        پشتیبانی، مشاوره و همکاری با سامانه همیشه آنلاین ستاری گلد
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- app -->

@endsection
