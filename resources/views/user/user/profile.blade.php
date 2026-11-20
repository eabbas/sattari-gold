@extends('admin.app.dashboard')

@section('title', 'پروفایل کاربری')

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

                    <div class="flex flex-col gap-3 min-w-0 md:w-64">

                        <button onclick="editForm('open', {{ $user->id }})"
                            class="gold-button rounded-xl px-5 py-3 text-sm font-bold flex items-center justify-center gap-2">

                            <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z" />
                            </svg>

                            ویرایش پروفایل

                        </button>

                    </div>

                </div>

            </div>

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

            {{-- Quick Actions --}}
            <div class="mb-4">
                <h3 class="font-bold text-base">
                    دسترسی سریع
                </h3>
            </div>

            <div class="gold-card p-5 sm:p-6 mb-8">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">

                    <a href="{{ route('wallet.wallet', [$user]) }}" class="gold-action">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="2" y="5" width="20" height="15" rx="2" />
                            <path d="M16 14h.01M2 10h20" />
                        </svg>

                        کیف پول من

                    </a>

                    <a href="{{ route('deal.create') }}" class="gold-action">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>

                        شروع معامله

                    </a>

                    <a href="{{ route('deal.list') }}" class="gold-action">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M3 3v18h18" />
                            <path d="m19 9-5 5-4-4-4 4" />
                        </svg>

                        تاریخچه معاملات

                    </a>

                    <a href="{{ route('creditCard.create') }}" class="gold-action">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="2" y="5" width="20" height="14" rx="2" />
                            <path d="M2 10h20M6 15h4" />
                        </svg>

                        مدیریت کارت‌های بانکی

                    </a>

                    <button onclick="editForm('open', {{ $user->id }})" class="gold-action">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z" />
                        </svg>

                        ویرایش اطلاعات

                    </button>

                    @if ($user->id == Auth::id())
                        <a href="{{ route('user.logout') }}"
                            class="gold-action !text-red-500 hover:!text-red-600 hover:!border-red-200 hover:!bg-red-50">

                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.8">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <path d="M16 17l5-5-5-5M21 12H9" />
                            </svg>

                            خروج از حساب

                        </a>
                    @endif

                </div>

            </div>

        </div>
    </div>

    {{-- Edit Profile Modal --}}
    <div id="editFormPopup" class="fixed inset-0 z-[100] invisible opacity-0 transition-all duration-300">

        <div class="size-full relative flex items-center justify-center p-3 sm:p-6">

            <div class="gold-modal absolute inset-0" onclick="editForm('close')">
            </div>

            <div id="editModalBox"
                class="relative w-full max-w-3xl max-h-[92dvh] overflow-y-auto rounded-2xl bg-white shadow-2xl transition-all duration-300 scale-95">

                {{-- Modal Header --}}
                <div class="sticky top-0 z-10 bg-white border-b p-5 sm:px-7 flex items-center justify-between"
                    style="border-color:var(--gold-border)">

                    <div>
                        <h3 class="font-bold text-base sm:text-lg">
                            ویرایش پروفایل
                        </h3>
                        <p class="text-xs mt-1" style="color:var(--gold-muted)">
                            اطلاعات حساب کاربری خود را به‌روزرسانی کنید
                        </p>
                    </div>

                    <button onclick="editForm('close')" type="button"
                        class="size-9 rounded-xl flex items-center justify-center hover:bg-stone-100 transition">

                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m18 6-12 12M6 6l12 12" />
                        </svg>

                    </button>

                </div>

                <div class="p-5 sm:p-7">

                    <form id="editForm" action="{{ route('user.updateProfile') }}" method="post"
                        enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        @csrf

                        <input type="hidden" name="user_id" id="user_id">

                        {{-- Name --}}
                        <div>
                            <label for="name" class="gold-label block">
                                نام <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" id="name" class="gold-input"
                                placeholder="نام خود را وارد کنید" disabled>
                            @error('name')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Family --}}
                        <div>
                            <label for="family" class="gold-label block">
                                نام خانوادگی <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="family" id="family" class="gold-input"
                                placeholder="نام خانوادگی" disabled>
                            @error('family')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phoneNumber" class="gold-label block">
                                شماره تلفن <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phoneNumber" id="phoneNumber" class="gold-input" dir="ltr"
                                placeholder="09123456789" disabled>
                            @error('phoneNumber')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- National Code --}}
                        <div>
                            <label for="nationalCode" class="gold-label block">
                                کد ملی <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nationalCode" id="nationalCode" class="gold-input"
                                dir="ltr" placeholder="کد ملی" disabled>
                            @error('nationalCode')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Address --}}
                        <div>
                            <label for="address" class="gold-label block">
                                آدرس
                            </label>
                            <input type="text" name="address" id="address" class="gold-input"
                                placeholder="آدرس محل سکونت">
                            @error('address')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Birth Date --}}
                        <div>
                            <label for="birthDate" class="gold-label block">
                                تاریخ تولد
                            </label>
                            <input type="text" name="birthDate" id="birthDate" class="gold-input"
                                placeholder="تاریخ تولد">
                            @error('birthDate')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="gold-label block">
                                رمز عبور جدید
                            </label>
                            <input type="password" name="password" id="password" class="gold-input"
                                autocomplete="new-password" placeholder="در صورت عدم تغییر خالی بگذارید">
                            @error('password')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Image --}}
                        <div>
                            <label for="image" class="gold-label block">
                                تصویر پروفایل
                            </label>

                            <input type="file" name="mainImage" id="image" accept="image/*"
                                class="gold-input text-xs">

                            @error('mainImage')
                                <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                            @enderror

                            <div id="imgContainer" class="mt-3 flex items-center justify-center"></div>
                        </div>

                        {{-- Submit --}}
                        <div class="sm:col-span-2 pt-4 border-t flex flex-col-reverse sm:flex-row justify-end gap-3"
                            style="border-color:var(--gold-border)">

                            <button type="button" onclick="editForm('close')"
                                class="gold-outline-button rounded-xl px-7 py-3 text-sm">
                                انصراف
                            </button>

                            <button type="submit" class="gold-button rounded-xl px-9 py-3 text-sm font-bold">
                                ذخیره تغییرات
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

    <script>
        // Edit Profile
        function editForm(state, id) {

            const popup = document.getElementById('editFormPopup');
            const modalBox = document.getElementById('editModalBox');

            if (state === 'open') {

                const user_id = document.getElementById('user_id');
                const name = document.getElementById('name');
                const family = document.getElementById('family');
                const phoneNumber = document.getElementById('phoneNumber');
                const nationalCode = document.getElementById('nationalCode');
                const imgContainer = document.getElementById('imgContainer');
                const birthDate = document.getElementById('birthDate');
                const address = document.getElementById('address');

                // Reset old data
                document.getElementById('editForm').querySelectorAll('[name="removedImg"]').forEach(el => el.remove());
                document.getElementById('editForm').reset();
                imgContainer.innerHTML = '';

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('user.profileEdit') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        id: id
                    },

                    success: function(data) {

                        user_id.value = data.id;
                        name.value = data.name ?? '';
                        family.value = data.family ?? '';
                        phoneNumber.value = data.phoneNumber ?? '';
                        nationalCode.value = data.nationalCode ?? '';
                        address.value = data.address ?? '';
                        birthDate.value = data.birthDate ?? '';

                        imgContainer.innerHTML = '';

                        if (data.mainImage) {

                            const wrapper = document.createElement('div');
                            wrapper.className = 'relative inline-flex';

                            const img = document.createElement('img');
                            img.src = data.mainImage;
                            img.className = 'w-28 h-28 object-cover rounded-xl border';
                            img.style.borderColor = '#E7E2D9';

                            const deleteBtn = document.createElement('button');
                            deleteBtn.type = 'button';
                            deleteBtn.innerHTML = '×';
                            deleteBtn.className =
                                'absolute -top-2 -left-2 size-7 rounded-full bg-red-500 text-white text-lg flex items-center justify-center shadow';
                            deleteBtn.onclick = function() {
                                removeImg(this, data.mainImage);
                            };

                            wrapper.appendChild(img);
                            wrapper.appendChild(deleteBtn);
                            imgContainer.appendChild(wrapper);
                        }
                    },

                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('دریافت اطلاعات کاربر با خطا مواجه شد.');
                        editForm('close');
                    }
                });

                popup.classList.remove('invisible', 'opacity-0');
                modalBox.classList.remove('scale-95');
                modalBox.classList.add('scale-100');

                document.body.style.overflow = 'hidden';
            }

            if (state === 'close') {

                popup.classList.add('invisible', 'opacity-0');
                modalBox.classList.remove('scale-100');
                modalBox.classList.add('scale-95');

                document.body.style.overflow = '';
            }
        }


        // Remove Profile Image
        function removeImg(el, file) {

            const index = file.indexOf('userImgs');

            if (index === -1) {
                alert('مسیر تصویر قابل شناسایی نیست.');
                return;
            }

            const result = file.slice(index);
            const form = document.getElementById('editForm');

            form.querySelectorAll('[name="removedImg"]').forEach(el => el.remove());

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'removedImg';
            input.value = result;

            form.appendChild(input);

            el.parentElement.remove();
        }


        // Copy Referral Code
        async function copyCode() {

            const codeInput = document.getElementById('referralCode');
            const code = codeInput.value;

            try {

                await navigator.clipboard.writeText(code);

            } catch (error) {

                codeInput.select();
                codeInput.setSelectionRange(0, 99999);

                if (!document.execCommand('copy')) {
                    alert('کپی کد با مشکل مواجه شد.');
                    return;
                }

            }

            showFeedback();
        }


        // Copy Feedback
        function showFeedback() {

            const copyIcon = document.getElementById('copyIcon');
            const checkIcon = document.getElementById('checkIcon');
            const btnText = document.getElementById('btnText');
            const toast = document.getElementById('toast');

            copyIcon.classList.add('hidden');
            checkIcon.classList.remove('hidden');

            btnText.textContent = 'کپی شد';

            toast.classList.remove('opacity-0');
            toast.classList.add('opacity-100');

            setTimeout(() => {

                copyIcon.classList.remove('hidden');
                checkIcon.classList.add('hidden');

                btnText.textContent = 'کپی';

                toast.classList.remove('opacity-100');
                toast.classList.add('opacity-0');

            }, 2000);
        }


        // Close modal with Escape
        document.addEventListener('keydown', function(event) {

            if (event.key === 'Escape') {
                editForm('close');
            }

        });


        // Auto dismiss notification
        const profileMessage = document.getElementById('profileMessage');

        if (profileMessage) {
            setTimeout(() => {
                profileMessage.style.opacity = '0';

                setTimeout(() => {
                    profileMessage.remove();
                }, 300);
            }, 4000);
        }
    </script>

@endsection
