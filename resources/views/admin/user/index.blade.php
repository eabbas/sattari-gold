@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | کاربران')
@section('content')
    <div class="absolute z-999 top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-11/12 sm:w-2/3 lg:w-1/3 bg-white rounded-lg shadow-md transition-all duration-500"
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
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif

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
                                        {{ $role['faTitle'] }}</option>
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
            <div>
                {{-- filters --}}
                <div class="w-full my-10 px-5">





                    {{-- <form action="{{ route('user.search') }}" method="post"
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
                    </form> --}}





                    <div class="w-full bg-white py-5 px-2 mb-2">
                        <div class="w-full grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2">
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    نام
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base" type="text" name="name"
                                    id="filter-name" placeholder=" نام">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    نام خانوادگی
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base" type="text" name="family"
                                    id="filter-family" placeholder=" نام خانوادگی">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    شماره تلفن
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base in-fa" dir="ltr"
                                    type="text" name="phoneNumber" id="filter-phoneNumber" placeholder="09123456789">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    کد ملی
                                </legend>
                                <input class="w-full outline-none text-[10px] md:text-base in-fa" dir="ltr"
                                    type="text" name="nationalCode" id="filter-nationalCode"
                                    placeholder="168*****31">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    وضعیت فعال
                                </legend>
                                <select id="filter-activity" name="activity[]" data-placeholder="انتخاب کنید"
                                    data-multi-select data-select-all-default="true" multiple>
                                    <option value="1">فعال</option>
                                    <option value="0">غیرفعال</option>
                                </select>
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    وضعیت تایید
                                </legend>
                                <select id="filter-approve" name="approve[]" data-placeholder="انتخاب کنید"
                                    data-multi-select data-select-all-default="true" multiple>
                                    <option value="0">در انتظار</option>
                                    <option value="1">تایید شده</option>
                                    <option value="01">رد شده</option>
                                </select>
                            </fieldset>
                            {{-- <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    از تاریخ
                                </legend>
                                <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                    name="fromDate" id="fromDate" placeholder="از تاریخ">
                            </fieldset>
                            <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                                <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                    تا تاریخ
                                </legend>
                                <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                    name="toDate" id="toDate" placeholder="تا تاریخ">
                            </fieldset> --}}
                        </div>
                        <div class="w-full flex justify-end">
                            <button
                                class="w-fit flex items-center justify-center font-bold text-xs md:text-base py-2 md:px-6 mt-5 hover:bg-(--color-blue) hover:text-white transition-all duratoin-300 col-span-1 md:text-right border-1 border-(--color-blue) text-(--color-blue) rounded-md text-center cursor-pointer"
                                onclick="setDatas()">اعمال</button>
                        </div>
                    </div>
                </div>
                {{-- filters --}}
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
                                    <th class="min-w-40 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        نام و نام خانوادگی
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        شماره موبایل
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        آخرین بازدید
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        آخرین معامله
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        کد ملی
                                    </th>
                                    <th class="min-w-30 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        کد حسابداری
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        وضعیت
                                    </th>
                                    <th class="min-w-20 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        دسته‌بندی
                                    </th>
                                    <th class="min-w-60 border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2">
                                        ابزار
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->isApproved)
                                        <tr class="item_list text-xs lg:text-base approvedUsers"
                                            data-user-id="{{ $user->id }}">
                                            <td class="p-1 md:px-3 md:py-2 flex items-center justify-center gap-2 in-fa">
                                                <input type="checkbox" name=""
                                                    class="row-checkbox appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                {{ $user->id }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center fullNameList">
                                                {{ $user->name }} {{ $user->family }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa phoneNumberList">
                                                {{ $user->phoneNumber }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center in-fa nationalCodeList">
                                                {{ $user->nationalCode }}
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                -
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center isActiveList">
                                                @if ($user->isActive)
                                                    <span
                                                        class="w-10 h-10 bg-(--primary-dashboard)/20 text-(--primary-dashboard) rounded-md border-1 border-(--primary-dashboard) p-1 cursor-default">
                                                        فعال
                                                    </span>
                                                @else
                                                    <span
                                                        class="w-10 h-10 bg-(--color-danger)/20 text-(--color-danger) rounded-md border-1 border-(--color-danger) p-1 cursor-default">
                                                        غیرفعال
                                                    </span>
                                                @endif
                                            </td>
                                            <td
                                                class="border-1 border-(--border-dashboard) p-1 md:px-3 md:py-2 text-center">
                                                قلک طلا
                                            </td>
                                            <td class="relative p-1 md:px-3 md:py-2 grid grid-cols-2 gap-3">
                                                <button onclick="wallet(this, 'open', {{ $user->id }})"
                                                    class="w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer walletBtn">
                                                    کیف پول
                                                </button>
                                                {{-- <a href="{{ route('wallet.wallet', $user->id) }}" 
                                                    class="w-3/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-3 py-2 cursor-pointer walletBtn">
                                                    کیف پول
                                                </a> --}}
                                                <div id=""
                                                    class="fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2 invisible opacity-0 transition-all flex items-center justify-center popup-wallet">
                                                    <div onclick="wallet(this, 'close')"
                                                        class="absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2 cursour-pointer">
                                                    </div>
                                                    <div class="w-2/3 mx-auto bg-white relative z-51 rounded-md">
                                                        <div
                                                            class="w-full bg-white p-3 border-b-1 border-b-gray-300 rounded-t-md">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-5 fill-gray-500 transition-all duration-300 hover:fill-red-600 cursor-pointer closeWalletBtn"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z" />
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="w-full px-3 py-2 lg:max-h-[calc(100vh-100px)] overflow-y-auto">
                                                            <div>
                                                                <div class="grid grid-cols-6 gap-5 mt-5">
                                                                    <div
                                                                        class="col-span-6 flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                                                                        <div class="w-6/12">
                                                                            <span
                                                                                class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                                                                                :</span>
                                                                            <span
                                                                                class="text-xs md:text-base font-bold fullName"></span>
                                                                        </div>
                                                                        <div class="w-6/12">
                                                                            <span
                                                                                class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                                                                :</span>
                                                                            <span
                                                                                class="text-[10px] md:text-base font-bold in-fa phoneNumber"></span>
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
                                                                                                d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <span
                                                                                        class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                                        موجودی ریال
                                                                                    </span>
                                                                                </div>
                                                                                <div
                                                                                    class="font-bold pb-2 in-fa moneyAsset">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center justify-between">
                                                                                <div class="flex items-center gap-3 pt-2">
                                                                                    <span
                                                                                        class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                                        موجودی قابل برداشت
                                                                                    </span>
                                                                                </div>
                                                                                <div class="font-bold pt-2">
                                                                                    <span
                                                                                        class="in-fa takebleMoneyAsset"></span>
                                                                                    <span
                                                                                        class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                                        تومان
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                                                                        <div
                                                                            class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                                                                            <div class="flex items-center justify-between">
                                                                                <div class="flex items-center gap-2 pb-2">
                                                                                    <span class="">

                                                                                        <svg height="30px" width="30px"
                                                                                            version="1.1" id="Layer_1"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            viewBox="0 0 511.882 511.882"
                                                                                            xml:space="preserve">
                                                                                            <polygon style="fill:#F6BB42;"
                                                                                                points="350.216,176.572 278.374,158.615 37.038,264.123 0,338.207 125.753,374.324 386.13,258.531 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#FFCE54;"
                                                                                                points="350.216,176.572 107.756,284.345 125.753,374.324 386.13,258.531 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#E8AA3D;"
                                                                                                points="107.756,284.345 37.038,264.123 0.015,338.207 125.753,374.324 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#F6BB42;"
                                                                                                points="475.969,212.682 404.127,194.717 162.791,300.232 125.753,374.324 251.504,410.41 511.882,294.625 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#FFCE54;"
                                                                                                points="475.969,212.682 233.508,320.431 251.504,410.41 511.882,294.625 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#E8AA3D;"
                                                                                                points="233.508,320.431 162.791,300.232 125.753,374.324 251.504,410.41 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#F6BB42;"
                                                                                                points="396.316,119.429 324.488,101.473 103.867,198.435 66.843,272.519 192.596,308.621 432.245,201.379 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#FFCE54;"
                                                                                                points="396.316,119.429 174.6,218.641 192.596,308.621 432.245,201.379 ">
                                                                                            </polygon>
                                                                                            <polygon style="fill:#E8AA3D;"
                                                                                                points="174.6,218.641 103.867,198.435 66.843,272.519 192.596,308.621 ">
                                                                                            </polygon>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <span
                                                                                        class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                                                                        موجودی طلا
                                                                                    </span>
                                                                                </div>
                                                                                <div
                                                                                    class="font-bold pb-2 in-fa goldAsset">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center justify-between">
                                                                                <div class="flex items-center gap-3 pt-2">
                                                                                    <span
                                                                                        class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                                                                        موجودی قابل برداشت
                                                                                    </span>
                                                                                </div>
                                                                                <div class="font-bold pt-2">
                                                                                    <span
                                                                                        class="in-fa takebleGoldAsset"></span>
                                                                                    <span
                                                                                        class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                                                                        گرم
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-span-6">
                                                                        <div
                                                                            class="flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-2 py-3 gap-2">
                                                                            <label for="deposit{{ $user->id }}"
                                                                                class="w-6/12 flex items-center gap-1 md:gap-3">
                                                                                <input
                                                                                    class="accent-(--primary-dashboard) size-4 md:size-5 deposit"
                                                                                    type="radio"
                                                                                    name="transactionType{{ $user->id }}"
                                                                                    checked value="deposit"
                                                                                    id="deposit{{ $user->id }}"
                                                                                    onchange="sendReceipt(this, 'deposit', {{ $user->id }})">
                                                                                <span
                                                                                    class="text-xs text-green-400 md:text-base font-bold">واریز</span>
                                                                            </label>
                                                                            <label for="withdraw{{ $user->id }}"
                                                                                class="w-6/12 flex items-center gap-1 md:gap-3">
                                                                                <input
                                                                                    class="accent-(--primary-dashboard) size-4 md:size-5 withdraw"
                                                                                    type="radio"
                                                                                    name="transactionType{{ $user->id }}"
                                                                                    value="withdraw"
                                                                                    id="withdraw{{ $user->id }}"
                                                                                    onchange="sendReceipt(this, 'withdraw', {{ $user->id }})">
                                                                                <span
                                                                                    class="text-xs text-red-400 md:text-base font-bold">برداشت</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                    <label class="col-span-3"
                                                                        for="fee{{ $user->id }}">
                                                                        مبلغ
                                                                        <input
                                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa fee"
                                                                            type="number" name="fee{{ $user->id }}"
                                                                            id="fee{{ $user->id }}"
                                                                            placeholder="ریال" value="">
                                                                    </label>
                                                                    <label class="col-span-3"
                                                                        for="receipt{{ $user->id }}">
                                                                        تصویر فیش واریزی
                                                                        <input
                                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) receipt"
                                                                            type="file"
                                                                            name="receipt{{ $user->id }}"
                                                                            id="receipt{{ $user->id }}">
                                                                    </label>
                                                                    <label class="col-span-6"
                                                                        for="description{{ $user->id }}">
                                                                        توضیحات
                                                                        <textarea
                                                                            class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) description"
                                                                            name="description{{ $user->id }}" id="description{{ $user->id }}"></textarea>
                                                                    </label>
                                                                    <button type="submit"
                                                                        class="col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold cursor-pointer transition-all duratoin-300 hover:text-white hover:bg-(--primary-dashboard) submitWallet">ثبت</button>
                                                                    <button type="reset"
                                                                        class="col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) transition-all duration-300 hover:text-white hover:bg-(--danger-dashboard) py-4 rounded-md font-bold cursor-pointer closeWalletBtn">
                                                                        لغو</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- <button
                                                    class="open-popup-look w-2/6 text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-2 py-2 cursor-pointer">
                                                    بیشتر
                                                </button>
                                                <div
                                                    class="popup-look fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                    <div
                                                        class="close-popup-look2 absolute z-49 w-full h-[100dvh] bg-black/30 left-1/2 -translate-x-1/2">
                                                    </div>
                                                    <div
                                                        class="relative z-51 w-[80%] lg:w-200 bg-white rounded-md px-3 py-2">
                                                        <div
                                                            class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                            <div class="font-bold text-sm md:text-xl">اطلاعات بیشتر</div>
                                                            <div class="close-popup-look">
                                                                <svg class="size-4 md:size-6" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 384 512">
                                                                    <path
                                                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-6 gap-5 mt-5">
                                                            <div class="col-span-6 flex items-center justify-between">
                                                                <div class="font-bold text-sm md:text-lg">مشخصات کاربر
                                                                </div>
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
                                                                <span
                                                                    class="text-xs md:text-base font-bold">09123456789</span>
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
                                                            <div class="col-span-6 text-sm  md:text-lg font-bold">کیف پول
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
                                                </div> --}}
                                                <button
                                                    class="open-popup-edited w-full text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-1 py-2 cursor-pointer flex items-center justify-center">
                                                    <svg class="size-5" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <path
                                                            d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                                    </svg>
                                                </button>
                                                <div
                                                    class="popup-edit fixed z-50 bg-black/30 w-full h-[100dvh] top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">
                                                    <div
                                                        class="close-popup-edit2 absolute z-9 w-full h-[100dvh] left-1/2 -translate-x-1/2">
                                                    </div>
                                                    <div
                                                        class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 transition-all duration-300 detailBox">
                                                        <div
                                                            class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                            <div class="text-sm md:text-base font-bold text-nowrap">ویرایش
                                                                اطلاعات مشتری</div>
                                                            <svg class="size-6 cursor-pointer close-popup-look-cont"
                                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 384 512">
                                                                <path
                                                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                نام
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name"
                                                                    type="text" name="" id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                نام خانوادگی
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family"
                                                                    type="text" style="font-family: 'IRANSansX';"
                                                                    name="" id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                کد ملی
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode"
                                                                    type="text" name="" dir="ltr"
                                                                    id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                شماره تلفن
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumber"
                                                                    type="text" name="" dir="ltr"
                                                                    id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-2 text-start">
                                                                وضعیت تایید
                                                                <select
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved"
                                                                    name="" id="">
                                                                    <option value="0">در انتظار</option>
                                                                    <option value="1">تایید</option>
                                                                    <option value="-1">رد</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1 md:col-span-2 text-start">
                                                                نقش
                                                                <select
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles"
                                                                    name="" id="" multiple
                                                                    size="1">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}"
                                                                            @if (in_array($role->id, $user->roleIds)) selected @endif>
                                                                            {{ $role->faTitle }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div
                                                                class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                                                <div class="w-full flex justify-between items-center">
                                                                    <label for="AisActive{{ $user->id }}"
                                                                        class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                                        : </label>
                                                                    <label for="AisActive{{ $user->id }}"
                                                                        class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                        <input type="checkbox" name="isActive"
                                                                            value="1"
                                                                            id="AisActive{{ $user->id }}"
                                                                            hidden="" class="peer cursor-pointer">
                                                                        <span
                                                                            class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                        <span
                                                                            class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <button
                                                                class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white">ثبت</button>
                                                            <button
                                                                class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white">لغو</button>
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
                                        <tr class="item_2 text-xs lg:text-base" data-user-id="{{ $user->id }}">
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
                                                <button onclick="popupLookCont(this)"
                                                    class="open-look-cont w-3/6 bg-(--primary-dashboard) text-white rounded-md px-3 py-2 cursor-pointer text-nowrap">
                                                    تایید و بازبینی
                                                </button>
                                                <div
                                                    class="popup-look-cont fixed z-50 w-full h-dvh top-0 left-1/2 -translate-x-1/2  invisible opacity-0 transition-all flex items-center justify-center">

                                                    <div onclick="closePopupLookCont2(this)"
                                                        class="close-popup-look-cont2 absolute z-49 w-full h-dvh bg-black/50 left-1/2 -translate-x-1/2">
                                                    </div>
                                                    <div
                                                        class="relative z-51 w-[80%] md:w-200 bg-white rounded-md px-3 py-2 invisible opacity-0 transition-all duration-300 detailBox">
                                                        <div
                                                            class="w-full flex items-center justify-between border-b-1 border-(--border-dashboard) pb-2">
                                                            <div class="text-sm md:text-base font-bold text-nowrap">بازبینی
                                                                اطلاعات
                                                                مشتری و تایید</div>
                                                            <div onclick="closePopupLookCont(this)"
                                                                class="close-popup-look-cont">
                                                                <svg class="size-6 cursor-pointer" fill="currentColor"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 384 512">
                                                                    <path
                                                                        d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="grid grid-cols-2 md:grid-cols-6 gap-5 mt-5">
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                نام
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) name"
                                                                    type="text" name="" id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                نام خانوادگی
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) family"
                                                                    type="text" style="font-family: 'IRANSansX';"
                                                                    name="" id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                کد ملی
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa nationalCode"
                                                                    type="text" name="" dir="ltr"
                                                                    id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-3 text-start">
                                                                شماره تلفن
                                                                <input
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa phoneNumber"
                                                                    type="text" name="" dir="ltr"
                                                                    id="">
                                                            </div>
                                                            <div class="col-span-1 md:col-span-2 text-start">
                                                                وضعیت تایید
                                                                <select
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) isApproved"
                                                                    name="" id="">
                                                                    <option value="0">در انتظار</option>
                                                                    <option value="1">تایید</option>
                                                                    <option value="-1">رد</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-span-1 md:col-span-2 text-start">
                                                                نقش
                                                                <select
                                                                    class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) roles"
                                                                    name="" id="" multiple
                                                                    size="1">
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->id }}"
                                                                            @if (in_array($role->id, $user->roleIds)) selected @endif>
                                                                            {{ $role->faTitle }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div
                                                                class="border-1 border-(--border-dashboard) h-fit rounded-md hover:shadow-sm transition-all col-span-2 md:col-span-2 flex items-center justify-between w-full py-2 px-4 mt-[30px]">
                                                                <div class="w-full flex justify-between items-center">
                                                                    <label for="isActive{{ $user->id }}"
                                                                        class="w-[calc(100%-50px)] text-start cursor-pointer">فعال
                                                                        : </label>
                                                                    <label for="isActive{{ $user->id }}"
                                                                        class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                                                        <input type="checkbox" name="isActive"
                                                                            value="1"
                                                                            id="isActive{{ $user->id }}" hidden
                                                                            class="peer cursor-pointer">
                                                                        <span
                                                                            class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                                                        <span
                                                                            class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <button
                                                                class="col-span-1 md:col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold submitBtn cursor-pointer transition-all duration-300 hover:bg-(--primary-dashboard) hover:text-white">ثبت</button>
                                                            <button
                                                                class="col-span-1 md:col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold closeBtn cursor-pointer transition-all duration-300 hover:bg-(--danger-dashboard) hover:text-white">لغو</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button onclick="deleteUser(this)"
                                                    class="w-3/6 bg-(--danger-dashboard) text-white rounded-md px-2 py-2 cursor-pointer text-nowrap deleteUser">
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
            </div>



        </section>
    </div>

    {{-- loader --}}
    <div id="loader"
        class="w-full h-full fixed top-0 right-0 z-999 flex items-center justify-center transition-all bg-black/50 duration-300 invisible opacity-0">
        <div class="p-10 bg-white shadow-xl rounded-lg flex flex-col items-center gap-10">
            <span class="w-20 h-20 animate-spin rounded-full border-4 border-yellow-100 border-t-yellow-600"></span>
            <p class="text-gray-600 font-bold text-xl">در حال بارگذاری لطفا
                شکیبا باشید....</p>
        </div>
    </div>
    {{-- loader --}}

    <script src="{{ asset('assets/js/user.js') }}"></script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
    <script src="{{ asset('assets/js/userFilter.js') }}"></script>
@endsection
