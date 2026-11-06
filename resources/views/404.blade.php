

 
@extends('app.document')
@section('title')
    طلای ستاری | صفحه یافت نشد    
@endsection
@section('content')

    <style>

        body {
            background: #faf8f3;
        }

        .gold-text {
            background: linear-gradient(
                135deg,
                #9b702d,
                #e8c77d,
                #b68b43,
                #f2d99c
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gold-border {
            border: 1px solid #d9bd80;
        }

        .gold-glow {
            box-shadow: 0 20px 80px rgba(173, 132, 57, .09);
        }

        .gold-circle {
            background: linear-gradient(
                145deg,
                #f8eed5,
                #e4c47e,
                #f8ebc9
            );
        }

        .floating {
            animation: floating 4s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
    </style>


<div class="min-h-screen flex flex-col text-[#34302a]">



    <!-- Main -->
    <main class="flex-1 flex items-center justify-center px-5 py-14 bg-[url('{{ asset('assets/img/404bg.jpg') }}')] bg-cover bg-no-repeat bg-left">

        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-12 items-center">

            <!-- Illustration -->
            <div class="relative flex items-center justify-center order-1 md:order-2">

                <div class="absolute w-64 h-64 md:w-80 md:h-80 rounded-full bg-[#f1e6cb]/50 blur-3xl"></div>

                <div class="relative w-full max-w-md aspect-square flex items-center justify-center">

                    <div class="absolute w-64 h-64 md:w-80 md:h-80 rounded-full border border-[#dfc999]"></div>

                    <div class="absolute w-52 h-52 md:w-64 md:h-64 rounded-full border border-dashed border-[#d5bd8d]"></div>

                    <!-- Decorative stars -->
                    <span class="absolute top-10 right-14 text-[#c5a35e] text-2xl">✦</span>
                    <span class="absolute bottom-16 left-10 text-[#c5a35e] text-xl">✧</span>
                    <span class="absolute top-24 left-8 text-[#d7bd87]">✧</span>

                    <!-- Main diamond -->
                    <div class="relative floating z-10">
                        <svg viewBox="0 0 240 260"
                             class="w-56 md:w-72 drop-shadow-[0_20px_25px_rgba(160,120,45,0.2)]"
                             fill="none">

                            <defs>
                                <linearGradient id="gold" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#fff0c2"/>
                                    <stop offset="45%" stop-color="#c89a43"/>
                                    <stop offset="100%" stop-color="#f2d58e"/>
                                </linearGradient>
                            </defs>

                            <path d="M120 20 L205 105 L120 240 L35 105 Z"
                                  fill="url(#gold)" opacity=".2"/>

                            <path d="M35 105 L75 45 L165 45 L205 105 L120 240 Z"
                                  stroke="#b58b43" stroke-width="3"/>

                            <path d="M75 45 L120 105 L165 45"
                                  stroke="#d1a956" stroke-width="2"/>

                            <path d="M35 105 L205 105"
                                  stroke="#d1a956" stroke-width="2"/>

                            <path d="M75 45 L120 240 L165 45"
                                  stroke="#d1a956" stroke-width="2"/>

                            <path d="M35 105 L120 105 L120 240"
                                  stroke="#d1a956" stroke-width="2"/>

                            <path d="M205 105 L120 105"
                                  stroke="#d1a956" stroke-width="2"/>

                            <path d="M120 20 L205 105 L120 240 L35 105 Z"
                                  stroke="#a77c35" stroke-width="2"/>
                        </svg>
                    </div>

                    <div class="absolute bottom-5 right-1/2 translate-x-1/2 text-[10px] tracking-[5px] text-[#ad905d]">
                        SATARI • GOLD
                    </div>

                </div>
            </div>


            <!-- Text -->
            <div class="order-2 md:order-1 text-center md:text-right">

                <h2 class="text-8xl sm:text-9xl font-extrabold gold-text leading-none mb-5">
                    404
                </h2>

                <h3 class="text-xl md:text-2xl font-bold mb-4">
                    صفحه مورد نظر پیدا نشد!
                </h3>

                <p class="text-sm md:text-base text-[#8d8679] leading-8 max-w-md mx-auto md:mx-0">
                    صفحه‌ای که دنبالش هستید وجود ندارد،
                    ممکن است آدرس آن تغییر کرده باشد یا
                    به اشتباه وارد شده باشد.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-3 mt-9">

                    <a href="{{ route('home') }}"
                       class="w-full sm:w-auto px-8 py-4 rounded-xl bg-[#a9823e] text-white text-sm font-medium hover:bg-[#89662e] transition shadow-lg shadow-[#a9823e]/20 flex items-center justify-center gap-3">
                        <span>بازگشت به صفحه اصلی</span>
                        <span>←</span>
                    </a>

                </div>

                <div class="mt-12 pt-6 border-t border-[#e9e1d3] flex items-center justify-center md:justify-start gap-3 text-xs text-[#a39a89]">
                    <span>✦</span>
                    <span>درخشش زیبایی، ماندگار است.</span>
                    <span>✦</span>
                </div>

            </div>

        </div>

    </main>
</div>
@endsection
