@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | کاربران')
@section('content')
    <div class="absolute z-999 top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
        id="message">
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 absolute top-1/2 -translate-y-1/2 right-3 cursor-pointer"
                onclick="showMessage('close')" viewBox="0 0 384 512">
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
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif

    <!-- list_users_start -->
    <div class="w-full flex flex-col gap-3 justify-start items-center">
        <!-- لیست مشتریان / هدر -->
        <section
            class="w-full mx-auto bg-(--secondary-dashboard) flex items-center justify-between border-1 border-(--border-dashboard) p-2 2 rounded-md">
            <h2 class="text-base md:text-xl font-bold">لیست مشتریان</h2>
            <div onclick="createUser('open')"
                class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
                <span class="">
                    <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path
                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                        </path>
                    </svg>
                </span>
                <div class="">مشتری جدید</div>
            </div>
            <div id="userCreatePopup"
                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
                <div onclick="createUser('close')"
                    class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2"></div>
                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                    <div class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                        <div class="font-bold"> مشتری جدید</div>
                        <div onclick="createUser('close')" class="cursor-pointer">
                            <svg class="size-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <form action="{{ route('user.adminStore') }}" method="post"
                        class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                        @csrf
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="name">
                            نام :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="text" name="name" id="name" placeholder="مثال : علی"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="family">
                            نام خانوادگی :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="text" name="family" id="family" placeholder="مثال : علیزاده"
                                value="{{ old('family') }}">
                            @error('family')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="phoneNumber">
                            شماره تلفن :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="number" name="phoneNumber" id="phoneNumber" placeholder="مثال : 09146424294"
                                value="{{ old('phoneNumber') }}">
                            @error('phoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="nationalCode">
                            کد ملی :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="number" name="nationalCode" id="nationalCode" placeholder="مثال : 1680270710"
                                value="{{ old('nationalCode') }}">
                            @error('nationalCode')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="password">
                            رمز عبور :
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="password" name="password" id="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-3 text-xs md:text-sm lg:text-base" for="roles">
                            تعیین نقش :
                            <select name="roles[]" id="roles" multiple size="1"
                                class="w-full hover:shadow-sm transition-all mt-2 bg-zinc-50 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)">
                                @foreach ($roles as $role)
                                    <option value="{{ $role['id'] }}" @if (in_array($role->id, old('roles', []))) selected @endif>
                                        {{ $role['name'] }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </label>

                        <button type="submit"
                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md cursor-pointer">ثبت
                            مشتری</button>
                        <button type="reset"
                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md cursor-pointer">
                            بازنشانی اطلاعات</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- لیست مشتریان / لسیت -->
        <section id="confirmed_pending"
            class="w-full mx-auto rounded-md border-1 border-(--border-dashboard) mt-5 pb-10 overflow-hidden">
            <div class="w-full flex items-center bg-zinc-300">
                <div onclick="conpen('confirmed', this)"
                    class="w-6/12 bg-white text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers">
                    مشتریان تایید شده</div>
                <div onclick="conpen('pending', this)"
                    class="w-6/12 bg-zinc-200 text-xs md:text-base flex items-center justify-center rounded-t-md py-1 md:py-3 cursor-pointer customers">
                    مشتریان در انتظار تایید</div>
            </div>
            <div class="w-full my-10 px-5">
                <form action="{{ route('user.search') }}" method="post"
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                    @csrf
                    <div class="w-full flex flex-col">
                        <label for="name" class="mb-2">
                            <span>
                                نام :
                            </span>
                        </label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]" name="name"
                            id="name">
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="family" class="mb-2">
                            <span>
                                نام خانوادگی :
                            </span>
                        </label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]" name="family"
                            id="family">
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="phoneNumber" class="mb-2">
                            <span>
                                شماره تلفن :
                            </span>
                        </label>
                        <input type="tel"
                            class="text-right outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                            name="phoneNumber" id="phoneNumber">
                    </div>
                    <div class="w-full flex flex-col">
                        <label for="nationalCode" class="mb-2">
                            <span>
                                کد ملی :
                            </span>
                        </label>
                        <input type="number"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                            name="nationalCode" id="nationalCode">
                    </div>
                    <div class="w-full flex flex-col gap-3 mt-5">
                        <label for="approve" class="mb-2">
                            <span>وضعیت تایید : </span>
                        </label>
                        <select name="approve" id="approve" class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                            <option value="all">همه</option>
                            <option value="-1">رد شده</option>
                            <option value="0">در انتظار تایید</option>
                            <option value="1">تایید شده</option>
                        </select>
                    </div>
                    <div class="w-full flex flex-col gap-3 mt-5">
                        <label for="activity" class="mb-2">
                            <span>وضعیت فعالیت : </span>
                        </label>
                        <select name="activity" id="activity" class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                            <option value="all">همه</option>
                            <option value="1">فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>
                    <div class="w-full flex items-center justify-center mt-5 text-center">
                        <button type="submit"
                            class="py-3 px-10 rounded-[10px] text-gray-700 border-1 border-gray-700 cursor-pointer">اعمال</button>
                    </div>
                    <div class="w-full flex items-center justify-center mt-5 text-center">
                        <a href="{{ route('user.index') }}"
                            class="py-3 px-10 rounded-[10px] text-gray-700 border-1 border-gray-700 cursor-pointer">حذف
                            فیلتر</a>
                    </div>
                </form>
            </div>
            <div id="confirmed" class="w-full">
                <div class="w-full h-5 bg-zinc-200"></div>
                <div class="w-full overflow-x-auto">
                    <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                        <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                            <input
                                class="appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer"
                                type="checkbox" name="" id="selectAll">
                            <label class="text-xs md:text-base" for="selectAll">
                                انتخاب همه
                            </label>
                        </div>
                        <div
                            class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashboard)  hidden md:flex flex-col md:flex-row">
                            <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                            <span class="hidden md:flex">|</span>
                            <span class="">ظرفیت باقیمانده 445 نفر</span>
                        </div>
                    </div>
                    <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-xs lg:text-base">
                                <th class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    نام و نام خانوادگی
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    شماره موبایل
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    آخرین بازدید
                                </th>
                                <th class="min-w-25 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    آخرین معامله
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    کد ملی
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    کد حسابداری
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    وضعیت
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    دسته‌بندی
                                </th>
                                <th class="min-w-45 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->isApproved)
                                    <tr class="item_list text-xs lg:text-base">
                                        <td class="p-1 md:px-3 md:py-2 flex items-center justify-center gap-2 in-fa">
                                            <input type="checkbox" name=""
                                                class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                            {{ $user->id }}
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            {{ $user->name }} {{ $user->family }}
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                            {{ $user->phoneNumber }}
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            -
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            -
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa">
                                            {{ $user->nationalCode }}
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            -
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            @if ($user->isActive)
                                                <span
                                                    class="w-10 h-10 bg-(--primary-dashboard)/20 text-(--primary-dashboard) rounded-md border-1 border-(--primary-dashboard) p-1 cursor-default">
                                                    فعال
                                                </span>
                                            @else
                                                <span
                                                    class="w-10 h-10 bg-(--color-danger)/20 text-(--color-danger) rounded-md border-1 border-(--color-danger) p-1 cursor-default">
                                                    فعال
                                                </span>
                                            @endif
                                        </td>
                                        <td class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                            قلک طلا
                                        </td>
                                        <td class="relative p-1 md:px-3 md:py-2 flex items-center gap-3">
                                            <button onclick="wallet('open', {{ $user->id }})"
                                                class="w-3/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer">
                                                کیف پول
                                            </button>
                                            <div id="popup-wallet"
                                                class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center">
                                                <div onclick="wallet('close')"
                                                    class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2 cursour-pointer">
                                                </div>
                                                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                    <div
                                                        class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                        <div class="font-bold">کیف پول</div>
                                                        <div onclick="wallet('close')" class="cursor-pointer">
                                                            <svg class="size-6" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-6 gap-5 mt-5">
                                                        <div
                                                            class="col-span-6 flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                            <div class="w-6/12">
                                                                <span
                                                                    class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                                                                    :</span>
                                                                <span class="text-xs md:text-base font-bold"></span>
                                                            </div>
                                                            <div class="w-6/12">
                                                                <span
                                                                    class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                                                    :</span>
                                                                <span class="text-[10px] md:text-base font-bold"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                            <div
                                                                class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-3 pb-2">
                                                                        <span class="">
                                                                            <svg class="size-5 fill-(--primary-dashboard)"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                                                            </svg>
                                                                        </span>
                                                                        <span
                                                                            class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                            موجودی ریال
                                                                        </span>
                                                                    </div>
                                                                    <div class="font-bold pb-2"></div>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-3 pt-2">
                                                                        <span
                                                                            class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                            موجودی قابل برداشت
                                                                        </span>
                                                                    </div>
                                                                    <div class="font-bold pt-2">
                                                                        <span class="">
                                                                        </span>
                                                                        <span
                                                                            class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                            تومان
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-span-6 flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-2 py-3 gap-2">
                                                            <label for="plass"
                                                                class="w-6/12 flex items-center gap-1 md:gap-3">
                                                                <input
                                                                    class="accent-(--primary-dashboard) size-4 md:size-5"
                                                                    type="radio" name="yes" id="plass">
                                                                <span
                                                                    class="text-xs text-green-400 md:text-base font-bold">واریز</span>
                                                            </label>
                                                            <label for="maiez"
                                                                class="w-6/12 flex items-center gap-1 md:gap-3">
                                                                <input
                                                                    class="accent-(--primary-dashboard) size-4 md:size-5"
                                                                    type="radio" name="yes" id="maiez">
                                                                <span
                                                                    class="text-xs text-red-400 md:text-base font-bold">برداشت</span>
                                                            </label>
                                                        </div>
                                                        <label class="col-span-3" for="categoryName">
                                                            نوع تراکنش
                                                            <select
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="categoryName">
                                                                <option value="">طلا</option>
                                                                <option value="">نقره</option>
                                                                <option value="" selected>ریال</option>
                                                                <option value="">شمش</option>
                                                            </select>
                                                        </label>
                                                        <label class="col-span-3" for="welcome">
                                                            مبلغ
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id=""
                                                                placeholder="ریال">
                                                        </label>
                                                        <label class="col-span-6" for="text">
                                                            توضیحات
                                                            <textarea
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="text"></textarea>
                                                        </label>
                                                        <button
                                                            class="col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md">ثبت</button>
                                                        <button
                                                            class="col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md">
                                                            لغو</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="open-popup-look w-2/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-2 py-2 cursor-pointer">
                                                بیشتر
                                            </button>
                                            <div
                                                class="popup-look fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                <div
                                                    class="close-popup-look2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                                                </div>
                                                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                    <div
                                                        class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                        <div class="font-bold text-sm md:text-xl">اطلاعات بیشتر</div>
                                                        <div class="close-popup-look">
                                                            <svg class="size-4 md:size-6" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-6 gap-5 mt-5">
                                                        <div class="col-span-6 flex items-center justify-between">
                                                            <div class="font-bold text-sm md:text-lg">مشخصات کاربر</div>
                                                            <div
                                                                class="open-popup-look-edit w-fit text-(--primary-dashboard) font-bold border-1 border-(--primary-dashboard) rounded-md p-2 cursor-pointer">
                                                                ویرایش</div>
                                                        </div>
                                                        <div
                                                            class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                                            <span
                                                                class="text-xs md:text-base text-(--text-secondary-dashboard)">نام
                                                                :</span>
                                                            <span class="text-xs md:text-base font-bold">حسین
                                                                ستاره</span>
                                                        </div>
                                                        <div
                                                            class="col-span-3 bg-zinc-100 px-1 py-2 md:px-2 md:py-3 rounded-lg flex items-center gap-1 md:gap-2">
                                                            <span
                                                                class="text-[10px] md:text-base text-(--text-secondary-dashboard)">شماره
                                                                موبایل :</span>
                                                            <span class="text-xs md:text-base font-bold">09123456789</span>
                                                        </div>
                                                        <div
                                                            class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                            <span
                                                                class="text-[10px] md:text-base text-(--text-secondary-dashboard)">معرف
                                                                :</span>
                                                            <span class="text-xs md:text-base font-bold">محمد رضا
                                                                عولیافان</span>
                                                        </div>
                                                        <div
                                                            class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                            <span
                                                                class="text-[10px] md:text-base text-(--text-secondary-dashboard)">کد
                                                                حساب داری :</span>
                                                            <span class="text-xs md:text-base font-bold">-</span>
                                                        </div>
                                                        <div
                                                            class="col-span-3 md:col-span-2 bg-zinc-100 px-2 py-3 rounded-lg flex items-center gap-2">
                                                            <span
                                                                class="text-[10px] md:text-base text-(--text-secondary-dashboard)">نام
                                                                دستع بندی :</span>
                                                            <span class="text-xs md:text-base font-bold">-</span>
                                                        </div>
                                                        <div
                                                            class="col-span-6 bg-zinc-100 p-3 rounded-lg flex items-center justify-between gap-2">
                                                            <span
                                                                class="text-[10px] md:text-base text-(--text-secondary-dashboard)">ارسال
                                                                اطلاعات ورود از طریق پیامک به مشتری</span>
                                                            <button
                                                                class="bg-(--primary-dashboard) text-sm md:text-base text-white font-bold rounded-lg px-5 md:px-10 py-1 md:py-3 cursor-pointer">ارسال</button>
                                                        </div>
                                                        <div class="col-span-6 text-sm  md:text-lg font-bold">کیف پول</div>
                                                        <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                            <div
                                                                class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-3 pb-2">
                                                                        <span class="">
                                                                            <svg class="size-5 fill-(--primary-dashboard)"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                viewBox="0 0 576 512">
                                                                                <path
                                                                                    d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                                                            </svg>
                                                                        </span>
                                                                        <span
                                                                            class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                            موجودی ریال
                                                                        </span>
                                                                    </div>
                                                                    <div class="font-bold pb-2">95.478.555</div>
                                                                </div>
                                                                <div class="flex items-center justify-between">
                                                                    <div class="flex items-center gap-3 pt-2">
                                                                        <span
                                                                            class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                            موجودی قابل برداشت
                                                                        </span>
                                                                    </div>
                                                                    <div class="font-bold pt-2">
                                                                        <span class="">
                                                                            95.478.555
                                                                        </span>
                                                                        <span
                                                                            class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                            تومان
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                class="open-popup-edited w-1/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center">
                                                <svg class="size-5" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path
                                                        d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                                </svg>
                                            </button>
                                            <div
                                                class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                <div
                                                    class="close-popup-edit2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                                                </div>
                                                <div class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                    <div
                                                        class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                        <div class="font-bold">ویرایش اطلاعات</div>
                                                        <div class="close-popup-edit">
                                                            <svg class="size-6" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-6 gap-2 md:gap-5 mt-5">
                                                        <label class="col-span-3 text-xs md:text-sm lg:text-base"
                                                            for="name">
                                                            نام و نام خانوادگی
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="name">
                                                        </label>
                                                        <label class="col-span-3 text-xs md:text-sm lg:text-base"
                                                            for="number">
                                                            شماره موبایل
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="number">
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="numberMeli">
                                                            کدملی
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="numberMeli">
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="dey">
                                                            تاریخ تولد
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="dey">
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="user">
                                                            معرف
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="user">
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="user">
                                                            کد حسابداری
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="user">
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="categoryName">
                                                            نام دسته‌بندی
                                                            <select
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="categoryName">
                                                                <option value="">salam</option>
                                                                <option value="">salam</option>
                                                                <option value="" selected>boy</option>
                                                                <option value="">salam</option>
                                                            </select>
                                                        </label>
                                                        <label
                                                            class="col-span-3 sm:col-span-2 text-xs md:text-sm lg:text-base"
                                                            for="welcome">
                                                            تعداد ورودی همزنان
                                                            <select
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="welcome">
                                                                <option value="">salam</option>
                                                                <option value="">salam</option>
                                                                <option value="" selected>boy</option>
                                                                <option value="">salam</option>
                                                            </select>
                                                        </label>
                                                        <label class="col-span-6 text-xs md:text-sm lg:text-base"
                                                            for="text">
                                                            یاداشت
                                                            <textarea
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="text"></textarea>
                                                        </label>
                                                        <label
                                                            class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer"
                                                            for="onlyAvailableDesktop">
                                                            <div class="text-zinc-700 text-sm">
                                                                وضعیت مشتری (فعال)
                                                            </div>
                                                            <div class="relative inline-flex cursor-pointer items-center">
                                                                <input class="peer sr-only" id="onlyAvailableDesktop"
                                                                    type="checkbox">
                                                                <div
                                                                    class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashboard) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashboard-dark-dashboard)">
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label
                                                            class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-6 sm:col-span-3 text-xs md:text-sm lg:text-base flex items-center justify-between w-full py-4 px-4 cursor-pointer"
                                                            for="password">
                                                            <div class="text-zinc-700 text-sm">
                                                                ورود با رمز عبور
                                                            </div>
                                                            <div class="relative inline-flex cursor-pointer items-center">
                                                                <input class="peer sr-only" id="password"
                                                                    type="checkbox">
                                                                <div
                                                                    class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashboard) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashboard-dark-dashboard)">
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <button
                                                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md">ویرایش</button>
                                                        <button
                                                            class="col-span-3 text-xs md:text-sm lg:text-base border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md">
                                                            لغو</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="pending" class="w-full hidden">
                <div class="w-full h-5 bg-zinc-200"></div>
                <div class="w-full overflow-x-auto">
                    <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm mt-5">
                        <thead class="w-full">
                            <tr class="bg-gray-100 text-xs lg:text-base">
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    نام و نام خانوادگی
                                </th>
                                <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    شماره موبایل
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    کد ملی
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    زمان ثبت‌نام
                                </th>
                                <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                    ابزار
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if (!$user->isApproved)
                                    <tr class="item_2 text-xs lg:text-base">
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                            {{ $user->id }}
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap">
                                            {{ $user->name }} {{ $user->family }}
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                            {{ $user->phoneNumber }}
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                            {{ $user->nationalCode }}
                                        </td>
                                        <td
                                            class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center text-nowrap in-fa">
                                            {{ verta($user->created_at) }}
                                        </td>
                                        <td
                                            class="relative border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center flex items-center gap-3">
                                            <button
                                                class="open-look-cont w-3/6 bg-(--primary-dashboard) text-white rounded-md px-3 py-2 cursor-pointer text-nowrap">
                                                تایید و بازبینی
                                            </button>
                                            <div
                                                class="popup-look-cont fixed z-50 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                <div
                                                    class="close-popup-look-cont2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                                                </div>
                                                <form action=""
                                                    class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2">
                                                    <div
                                                        class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                        <div class="text-sm md:text-base font-bold text-nowrap">بازبینی
                                                            اطلاعات
                                                            مشتری و تایید</div>
                                                        <div class="close-popup-look-cont">
                                                            <svg class="size-6" fill="currentColor"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                                        <label class="col-span-1 md:col-span-2" for="">
                                                            کد ملی
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="">
                                                        </label>
                                                        <label class="col-span-1 md:col-span-2" for="">
                                                            تاریخ تولد
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="">
                                                        </label>
                                                        <label class="col-span-1 md:col-span-2" for="">
                                                            معرف
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="">
                                                        </label>
                                                        <label class="col-span-1 md:col-span-2" for="">
                                                            کد حسابداری
                                                            <input
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                type="text" name="" id="">
                                                        </label>
                                                        <label class="col-span-1 md:col-span-2" for="categoryNameS">
                                                            نام دسته‌بندی
                                                            <select
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="categoryNameS">
                                                                <option value="">salam</option>
                                                                <option value="">salam</option>
                                                                <option value="" selected>boy</option>
                                                                <option value="">salam</option>
                                                            </select>
                                                        </label>
                                                        <label class="col-span-1 md:col-span-2" for="welcomS">
                                                            تعداد ورودهای همزنان
                                                            <select
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="welcomS">
                                                                <option value="">salam</option>
                                                                <option value="">salam</option>
                                                                <option value="" selected>boy</option>
                                                                <option value="">salam</option>
                                                            </select>
                                                        </label>
                                                        <label class="col-span-2 md:col-span-6" for="text">
                                                            یادداشت
                                                            <textarea
                                                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                                                name="" id="text"></textarea>
                                                        </label>
                                                        <label
                                                            class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-3 flex items-center justify-between w-full py-4 px-4 cursor-pointer"
                                                            for="passwordd">
                                                            <div class="text-zinc-700 text-sm">
                                                                ورود با رمز عبور
                                                            </div>
                                                            <div class="relative inline-flex cursor-pointer items-center">
                                                                <input class="peer sr-only" id="passwordd"
                                                                    type="checkbox">
                                                                <div
                                                                    class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-(--primary-dashboard) peer-checked:after:translate-x-full peer-focus:ring-(--primary-dashboard-dark-dashboard)">
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <label for="massege"
                                                            class="col-span-2 md:col-span-6 flex items-center justify-start gap-3 text-black">
                                                            <input id="massege" type="checkbox" name=""
                                                                class="appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                            ارسال پیامک تایید ثبت نام در اپلیکیشن
                                                        </label>
                                                        <button
                                                            class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold">ثبت</button>
                                                        <button
                                                            class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold">
                                                            لغو</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <button
                                                class="w-3/6 bg-(--danger-dashboard) text-white rounded-md px-2 py-2 cursor-pointer text-nowrap">
                                                حذف درخواست
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- list_users_start -->
    <script>
        let message = document.getElementById('message')
        let element = document.createElement('div')
        element.classList = "text-sm font-bold flex flex-row items-center justify-center py-3 gap-2 lg:gap-3"

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

        function createUser(state) {
            let userCreatePopup = document.getElementById('userCreatePopup')
            if (state == 'open') {
                userCreatePopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                userCreatePopup.classList.add('invisible', 'opacity-0')
            }
        }

        function wallet(state, userId) {
            let wallet = document.getElementById('popup-wallet')
            if (state == 'open') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('wallet.popupWalletData') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'userId': userId,
                    },
                    success: function(data) {
                        console.log(data);
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
                wallet.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                wallet.classList.add('invisible', 'opacity-0')
            }
        }



        // لیست مشتری / لیست مشتری - مشتریان در انتظار تایید
        let confirmed = document.getElementById("confirmed");
        let pending = document.getElementById("pending");
        let confirmed_pending = document.getElementById("confirmed_pending");

        function conpen(state, el) {
            document.querySelectorAll('.customers').forEach(customer => {
                customer.classList.remove('bg-white')
                customer.classList.add('bg-zinc-200')
            })
            if (state == 'pending') {
                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                confirmed.classList.add("hidden")
                pending.classList.remove("hidden")
            }
            if (state == 'confirmed') {
                el.classList.add('bg-white')
                el.classList.remove('bg-zinc-200')
                confirmed.classList.remove("hidden")
                pending.classList.add("hidden")
            }
        }


        // لیست مشتری / انتخواب همه
        const selectAll = document.querySelector("#selectAll");
        const rowCheckboxes = document.querySelectorAll(".row-checkbox");

        // انتخاب یا لغو انتخاب همه
        selectAll.addEventListener("change", () => {

            rowCheckboxes.forEach((checkbox) => {
                checkbox.checked = selectAll.checked;
            });

        });


        // بررسی انتخاب دستی ردیف‌ها
        rowCheckboxes.forEach((checkbox) => {

            checkbox.addEventListener("change", () => {

                const allSelected = [...rowCheckboxes]
                    .every((checkbox) => checkbox.checked);

                selectAll.checked = allSelected;

            });

        });

        // لیست مشتریان / کیف پوا - بیشتر - ادیت
        const item_list = document.querySelectorAll(".item_list");

        // console.log(items)
        item_list.forEach((item_list) => {

            const openBtn_edited = item_list.querySelector(".open-popup-edited");
            console.log(openBtn_edited)
            const openBtn_look_edit = item_list.querySelector(".open-popup-look-edit");
            const popup_edit = item_list.querySelector(".popup-edit");
            const closeBtn_edit = item_list.querySelector(".close-popup-edit");
            const closeBtn_edit2 = item_list.querySelector(".close-popup-edit2");
            const openBtn_look = item_list.querySelector(".open-popup-look");
            const popup_look = item_list.querySelector(".popup-look");
            const closeBtn_look = item_list.querySelector(".close-popup-look");
            const closeBtn_look2 = item_list.querySelector(".close-popup-look2");

            openBtn_edited.addEventListener("click", () => {
                popup_edit.classList.remove("invisible");
                popup_edit.classList.remove("opacity-0");
                popup_edit.classList.add("opacity-100");
                popup_edit.classList.add("visible");
            });

            closeBtn_edit.addEventListener("click", () => {
                popup_edit.classList.add("invisible");
                popup_edit.classList.add("opacity-0");
                popup_edit.classList.remove("opacity-100");
                popup_edit.classList.remove("visible");
            });
            closeBtn_edit2.addEventListener("click", () => {
                popup_edit.classList.add("invisible");
                popup_edit.classList.add("opacity-0");
                popup_edit.classList.remove("opacity-100");
                popup_edit.classList.remove("visible");
            });


            openBtn_look_edit.addEventListener("click", () => {
                popup_edit.classList.remove("invisible");
                popup_edit.classList.remove("opacity-0");
                popup_edit.classList.add("visible");
                popup_edit.classList.add("opacity-100");
                popup_look.classList.remove("visible");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
            });


            openBtn_look.addEventListener("click", () => {
                popup_look.classList.remove("invisible");
                popup_look.classList.remove("opacity-0");
                popup_look.classList.add("opacity-100");
                popup_look.classList.add("visible");
            });
            closeBtn_look.addEventListener("click", () => {
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.remove("visible");
            });
            closeBtn_look2.addEventListener("click", () => {
                popup_look.classList.add("invisible");
                popup_look.classList.add("opacity-0");
                popup_look.classList.remove("opacity-100");
                popup_look.classList.remove("visible");
            });



        });


        // لیست مشتری / تایید و بازبینی
        const items_2 = document.querySelectorAll(".item_2");

        items_2.forEach((item_2) => {


            const openBtn_look_cont = item_2.querySelector(".open-look-cont");
            const popup_look_cont = item_2.querySelector(".popup-look-cont");
            const closeBtn_look_cont = item_2.querySelector(".close-popup-look-cont");
            const closeBtn_look_cont2 = item_2.querySelector(".close-popup-look-cont2");

            openBtn_look_cont.addEventListener("click", () => {
                popup_look_cont.classList.remove("invisible");
                popup_look_cont.classList.remove("opacity-0");
                popup_look_cont.classList.add("opacity-100");
                popup_look_cont.classList.add("visible");
            });
            closeBtn_look_cont.addEventListener("click", () => {
                popup_look_cont.classList.add("invisible");
                popup_look_cont.classList.add("opacity-0");
                popup_look_cont.classList.remove("opacity-100");
                popup_look_cont.classList.remove("visible");
            });
            closeBtn_look_cont2.addEventListener("click", () => {
                popup_look_cont.classList.add("invisible");
                popup_look_cont.classList.add("opacity-0");
                popup_look_cont.classList.remove("opacity-100");
                popup_look_cont.classList.remove("visible");
            });
        });
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
