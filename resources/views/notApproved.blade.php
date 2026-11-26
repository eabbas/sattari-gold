@extends('admin.app.dashboard')

@section('title', 'در انتظار تایید')

@section('content')

    <style>
        :root {

            --gold-bg: #F8F5EF;

            --gold-white: #FFFFFF;

            --gold-primary: #D6AD60;

            --gold-dark: #B88A3B;

            --gold-text: #29251F;

            --gold-muted: #78716C;

            --gold-border: #E7E2D9;

        }

        .gold-profile {

            color: var(--gold-text);

        }

        .gold-card {

            background: var(--gold-white);

            border: 1px solid var(--gold-border);

            border-radius: 18px;

            transition: .25s ease;

        }

        .gold-card:hover {

            border-color: #D6AD60;

            box-shadow: 0 10px 30px rgba(41, 37, 31, .045);

            transform: translateY(-2px);

        }

        .gold-icon {

            width: 42px;

            height: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 13px;

            background: #F8F5EF;

            color: var(--gold-dark);

            flex-shrink: 0;

        }

        .gold-button {

            background: var(--gold-dark);

            color: white;

            transition: .25s ease;

        }

        .gold-button:hover {

            background: #A97B32;

            box-shadow: 0 6px 16px rgba(184, 138, 59, .2);

        }

        .gold-outline-button {

            background: white;

            border: 1px solid var(--gold-border);

            color: var(--gold-text);

            transition: .25s ease;

        }

        .gold-outline-button:hover {

            background: var(--gold-bg);

            border-color: var(--gold-primary);

        }

        .gold-input {

            width: 100%;

            background: #FAF9F6;

            border: 1px solid var(--gold-border);

            border-radius: 11px;

            padding: 12px 14px;

            outline: none;

            transition: .2s ease;

            color: var(--gold-text);

        }

        .gold-input:focus {

            background: white;

            border-color: var(--gold-primary);

            box-shadow: 0 0 0 3px rgba(214, 173, 96, .12);

        }

        .gold-label {

            font-size: 12px;

            color: var(--gold-muted);

            margin-bottom: 8px;

        }

        .gold-status {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 11px;

            border-radius: 30px;

            font-size: 11px;

            font-weight: 600;

        }

        .gold-action {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 9px;

            padding: 14px 12px;

            border-radius: 13px;

            border: 1px solid var(--gold-border);

            background: white;

            color: var(--gold-text);

            font-size: 13px;

            transition: .25s ease;

            text-align: center;

        }

        .gold-action:hover {

            background: #F8F5EF;

            border-color: var(--gold-primary);

            color: var(--gold-dark);

            transform: translateY(-2px);

        }

        .gold-modal {

            backdrop-filter: blur(5px);

            background: rgba(41, 37, 31, .48);

        }

        .gold-divider {

            height: 1px;

            background: var(--gold-border);

        }

        @media(max-width:640px) {

            .gold-profile-container {

                width: 94%;

            }

        }
    </style>

    <div class="gold-profile min-h-screen py-6 sm:py-9 w-full">

        <div class="gold-profile-container w-11/12 mx-auto max-w-[1500px]">

            {{-- Notification --}}

            @if (session('message'))
                <div id="profileMessage" class="mb-5 p-4 rounded-xl border flex items-center gap-3"
                    style="background:white;border-color:var(--gold-border)">

                    <span class="text-lg" style="color:var(--gold-dark)">✓</span>

                    <span class="text-sm" style="color:var(--gold-text)">

                        {{ session('message') }}

                    </span>

                </div>
            @endif

            {{-- Page Heading --}}

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">

                <div>

                    <h1 class="text-xl sm:text-2xl font-bold">

                        پروفایل کاربری

                    </h1>

                </div>

            </div>

            {{-- Profile Header --}}

            <div class="gold-card p-5 sm:p-8 mb-6">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-7">

                    <div class="flex flex-col sm:flex-row items-center sm:items-center gap-5">

                        <div class="relative">

                            <div class="size-24 sm:size-28 rounded-full p-1" style="border:2px solid var(--gold-primary)">

                                @if ($user->mainImage)
                                    <img src="{{ asset('/storage/' . $user->mainImage) }}" alt="تصویر پروفایل"
                                        class="size-full rounded-full object-cover">
                                @else
                                    <img src="{{ asset('/assets/img/user.png') }}" alt="تصویر کاربر"
                                        class="size-full rounded-full object-cover">
                                @endif

                            </div>

                            <span class="absolute bottom-1 right-1 size-4 rounded-full border-2 border-white"
                                style="background:{{ $user->isActive ? '#16A34A' : '#A8A29E' }}">

                            </span>

                        </div>

                        <div class="text-center sm:text-right">

                            <p class="text-xs mb-2" style="color:var(--gold-muted)">

                                خوش آمدید

                            </p>

                            <h2 class="text-xl sm:text-2xl font-bold">

                                {{ $user->name }} {{ $user->family }}

                            </h2>

                            <p class="text-sm mt-2" style="color:var(--gold-muted)">

                                @if (count($user->roles) > 0)
                                    {{ $user->roles[0]['name'] }}
                                @else
                                    بدون نقش
                                @endif

                            </p>

                            <div class="flex flex-wrap justify-center sm:justify-start gap-2 mt-4">

                                @switch($user->isApproved)
                                    @case(0)
                                        <span class="gold-status bg-amber-50 text-amber-700 border border-amber-200">

                                            <span class="size-1.5 rounded-full bg-amber-500"></span>

                                            در انتظار تأیید

                                        </span>
                                    @break

                                    @case(1)
                                        <span class="gold-status bg-green-50 text-green-700 border border-green-200">

                                            <span class="size-1.5 rounded-full bg-green-500"></span>

                                            تأیید شده

                                        </span>
                                    @break

                                    @case(-1)
                                        <span class="gold-status bg-red-50 text-red-600 border border-red-200">

                                            <span class="size-1.5 rounded-full bg-red-500"></span>

                                            رد شده

                                        </span>
                                    @break
                                @endswitch

                                @if ($user->isActive)
                                    <span class="gold-status bg-green-50 text-green-700 border border-green-200">

                                        حساب فعال

                                    </span>
                                @else
                                    <span class="gold-status bg-stone-100 text-stone-500 border border-stone-200">

                                        حساب غیرفعال

                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            @if ($user->isApproved == 0)
                <div class="gold-card p-5 sm:p-6 mb-6 border-amber-200" style="background:#FFFBEB">
                    <div class="flex items-start gap-3">
                        <div class="gold-icon !bg-amber-100 !text-amber-700 shrink-0">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 8v4m0 4h.01" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-amber-800">حساب کاربری شما در انتظار تأیید است</h3>
                            <p class="text-xs sm:text-sm leading-7 mt-2 text-amber-700">
                                اطلاعات حساب شما با موفقیت ثبت شده است. پس از بررسی و تأیید حساب توسط مدیریت،
                                امکان استفاده از امکانات سایت برای شما فعال خواهد شد.
                            </p>
                        </div>
                    </div>
                </div>
            @elseif ($user->isApproved == -1)
                <div class="gold-card p-5 sm:p-6 mb-6 border-red-200" style="background:#FEF2F2">
                    <div class="flex items-start gap-3">
                        <div class="gold-icon !bg-red-100 !text-red-600 shrink-0">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9" />
                                <path d="m9 9 6 6m0-6-6 6" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-red-700">حساب کاربری شما تأیید نشده است</h3>
                            <p class="text-xs sm:text-sm leading-7 mt-2 text-red-600">
                                متأسفانه حساب کاربری شما توسط مدیریت تأیید نشده است. برای پیگیری موضوع
                                می‌توانید با پشتیبانی سایت تماس بگیرید.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($user->isApproved == 1)
                {{-- Referral Code --}}

                <div class="gold-card p-5 sm:p-6 mb-6">

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-5">

                        <div>

                            <div class="flex items-center gap-2 mb-2">

                                <div class="gold-icon">

                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.8">

                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />

                                        <circle cx="9" cy="7" r="4" />

                                        <path d="M19 8v6m3-3h-6" />

                                    </svg>

                                </div>

                                <h3 class="font-bold text-sm">

                                    کد معرف شما

                                </h3>

                            </div>

                            <p class="text-xs" style="color:var(--gold-muted)">

                                کد اختصاصی خود را برای اشتراک‌گذاری در اختیار دیگران قرار دهید.

                            </p>

                        </div>

                        <div class="flex items-center gap-2 w-full sm:w-auto">

                            <input id="referralCode" type="text" value="REF-2024-XYZ789" readonly dir="ltr"
                                class="gold-input text-center font-mono tracking-widest text-sm sm:w-64">

                            <button id="copyBtn" onclick="copyCode()"
                                class="gold-button px-4 py-3 rounded-xl flex items-center justify-center gap-2 text-sm shrink-0">

                                <svg id="copyIcon" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">

                                    <rect x="8" y="8" width="13" height="13" rx="2" />

                                    <path d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3" />

                                </svg>

                                <svg id="checkIcon" class="size-4 hidden" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">

                                    <path d="m5 12 4 4L19 6" />

                                </svg>

                                <span id="btnText">کپی</span>

                            </button>

                        </div>

                    </div>

                    <p id="toast" class="text-xs mt-3 text-left opacity-0 transition-opacity" style="color:#16A34A">

                        کد با موفقیت کپی شد.

                    </p>

                </div>
            @endif

            {{-- Information --}}

            <div class="mb-4">

                <h3 class="font-bold text-base">

                    اطلاعات حساب

                </h3>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

                {{-- Phone --}}

                <div class="gold-card p-5">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="gold-icon">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <path
                                    d="M22 16.92V20a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 2 4.18 2 2 0 0 1 4 2h3.09a2 2 0 0 1 2 1.72l.42 2.52a2 2 0 0 1-.57 1.77l-1.2 1.2a16 16 0 0 0 6.36 6.36l1.2-1.2a2 2 0 0 1 1.77-.57l2.52.42A2 2 0 0 1 22 16.92z" />

                            </svg>

                        </div>

                        <span class="text-xs" style="color:var(--gold-muted)">شماره تلفن</span>

                    </div>

                    <p class="font-bold text-base in-fa">

                        {{ $user->phoneNumber ?? 'ثبت نشده' }}

                    </p>

                </div>

                {{-- National Code --}}

                <div class="gold-card p-5">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="gold-icon">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <rect x="3" y="5" width="18" height="14" rx="2" />

                                <path d="M3 9h18M7 14h4" />

                            </svg>

                        </div>

                        <span class="text-xs" style="color:var(--gold-muted)">کد ملی</span>

                    </div>

                    <p class="font-bold text-base in-fa">

                        {{ $user->nationalCode ?? 'ثبت نشده' }}

                    </p>

                </div>

                {{-- Register Date --}}

                <div class="gold-card p-5">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="gold-icon">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <rect x="3" y="5" width="18" height="16" rx="2" />

                                <path d="M16 3v4M8 3v4M3 10h18" />

                            </svg>

                        </div>

                        <span class="text-xs" style="color:var(--gold-muted)">تاریخ عضویت</span>

                    </div>

                    <p class="font-bold text-base in-fa">

                        {{ $user->time . ' - ' . $user->date }}

                    </p>

                </div>

                {{-- Birth Date --}}

                <div class="gold-card p-5">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="gold-icon">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <circle cx="12" cy="8" r="5" />

                                <path d="M20 21a8 8 0 0 0-16 0" />

                            </svg>

                        </div>

                        <span class="text-xs" style="color:var(--gold-muted)">تاریخ تولد</span>

                    </div>

                    <p class="font-bold text-base in-fa">

                        {{ $user->birthDate ?? 'ثبت نشده' }}

                    </p>

                </div>

                {{-- Address --}}

                <div class="gold-card p-5 sm:col-span-2">

                    <div class="flex items-center gap-3 mb-5">

                        <div class="gold-icon">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">

                                <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />

                                <circle cx="12" cy="10" r="2.5" />

                            </svg>

                        </div>

                        <span class="text-xs" style="color:var(--gold-muted)">آدرس محل سکونت</span>

                    </div>

                    <p class="font-bold text-sm leading-7">

                        {{ $user->address ?? 'آدرسی ثبت نشده است' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection
