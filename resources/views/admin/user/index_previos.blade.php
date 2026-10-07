@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | کاربران')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full mb-20">
        <form action="{{ route('user.search') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-4 gap-5">
            @csrf
            <div class="w-full flex flex-col">
                <label for="name" class="mb-2">
                    <span>
                        نام :
                    </span>
                </label>
                <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                    name="name" id="name">
            </div>
            <div class="w-full flex flex-col">
                <label for="family" class="mb-2">
                    <span>
                        نام خانوادگی :
                    </span>
                </label>
                <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                    name="family" id="family">
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
                <input type="number" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
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
                    class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">اعمال</button>
            </div>
        </form>
    </div>
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست مشتریان</h2>
            <div class="w-full shadow-md [&::-webkit-scrollbar]:hidden lg:overflow-visible overflow-x-auto">
                <div class="w-full min-w-[620px] h-120 max-h-120 overflow-auto">
                    <div class="w-full grid grid-cols-11 divide-x divide-slate-400 sticky top-0 z-1">
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="w-10 lg:w-full">ردیف</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="w-30 lg:w-full">نام و نام خانوادگی</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-1">
                            <span class="w-20 lg:w-full">شماره تلفن</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-1">
                            <span class="w-20 lg:w-full">کد ملی</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="w-20 lg:w-full">زمان ثبت نام</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="w-20 lg:w-full">وضعیت</span>
                        </div>
                        <div class="py-5 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                            <span class="w-[220px] lg:w-full">عملیات</span>
                        </div>
                    </div>
                    <div class="bg-white divide-y divide-[#f1f1f4]">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <div class="w-full grid grid-cols-11 divide-x divide-slate-400 py-4">
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="w-10 lg:w-full flex items-center justify-center gap-2">
                                        <span class="">{{ $i }}</span>
                                    </div>
                                </div>
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-30 lg:w-full">{{ $user->name }}
                                        {{ $user->family }}</span>
                                </div>
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-1">
                                    <span class="block w-20 lg:w-full">{{ $user->phoneNumber }}</span>
                                </div>
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-1">
                                    <span class="block w-20 lg:w-full">{{ $user->nationalCode }}</span>
                                </div>
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                    <span class="block w-20 lg:w-full">{{ $user->created_at }}</span>
                                </div>
                                <div
                                    class="p-1 text-xs lg:text-sm h-full flex items-center justify-center gap-4 text-gray-900 text-center col-span-2">
                                    @switch($user->isApproved)
                                        @case(0)
                                            <span
                                                class="text-xs text-yellow-500 bg-yellow-50 border border-yellow-300 hover:bg-yellow-100 py-1 px-2 rounded-md">در
                                                انتظار تایید</span>
                                        @break

                                        @case(1)
                                            <span
                                                class="text-xs text-green-500 bg-green-50 border border-green-300 hover:bg-green-100 py-1 px-2 rounded-md">تایید
                                                شده </span>
                                        @break

                                        @case(-1)
                                            <span
                                                class="text-xs text-red-500 bg-red-50 border border-red-300 hover:bg-red-100 py-1 px-2 rounded-md">رد
                                                شده</span>
                                        @break
                                    @endswitch
                                    @if ($user->isActive)
                                        <span
                                            class="text-xs text-gray-50 bg-gray-400 border border-gray-300 py-1 px-3 rounded-md">فعال</span>
                                    @else
                                        <span
                                            class="text-xs text-gray-400 bg-gray-50 border border-gray-300 py-1 px-3 rounded-md">غیر
                                            فعال</span>
                                    @endif
                                </div>
                                <div class="col-span-2 flex items-center justify-center">
                                    <ul class="w-[220px] lg:w-full flex flex-col items-center gap-4">
                                        <li class="flex justify-center">
                                            <span
                                                onclick="controlUser('open',{{ $user }}, {{ $user->roles->pluck('id') }})"
                                                class="py-1 px-2 bg-blue-50 text-blue-600 border border-blue-300 text-xs rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300">بازبینی
                                                و اصلاح</span>
                                        </li>
                                        <li class="flex justify-center">
                                            <a href="{{ route('wallet.wallet', [$user]) }}"
                                                class="py-1 px-2 bg-blue-50 text-blue-600 border border-blue-300 text-xs rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300">کیف
                                                پول</a>
                                        </li>
                                        <li class="flex justify-center">
                                            <a href="{{ route('wallet.transactionsListSingle', [$user]) }}"
                                                class="py-1 px-2 bg-blue-50 text-blue-600 border border-blue-300 text-xs rounded-md hover:bg-blue-100 cursor-pointer transition-all duration-300">واریز
                                                و برداشت</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $users->links() }}
    {{-- start editForm popup --}}
    <div id="controlUserPopup"
        class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="controlUser('close')"></div>
            <div
                class="w-7/12 2xl:container max-h-160 overflow-auto mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="controlUser('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div id="popupContent">
                    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data"
                        class="w-full grid grid-cols-1 lg:grid-cols-2 gap-5">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="w-full flex flex-col">
                            <label for="popupName" class="mb-2 flex flex-row items-center">
                                <span>
                                    نام :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="popupName" id="popupName">
                            @error('popupName')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="popupFamily" class="mb-2 flex flex-row items-center">
                                <span>
                                    نام خانوادگی :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="popupFamily" id="popupFamily">
                            @error('popupFamily')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="popupPhoneNumber" class="mb-2 flex flex-row items-center">
                                <span>
                                    شماره تلفن :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="tel"
                                class="text-right outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="popupPhoneNumber" id="popupPhoneNumber">
                            @error('popupPhoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="popupNationalCode" class="mb-2 flex flex-row items-center">
                                <span>
                                    کد ملی :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="number"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="popupNationalCode" id="popupNationalCode">
                            @error('popupNationalCode')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2 flex flex-col gap-3 mt-5">
                            <label for="roles" class="mb-2">
                                <span>تعیین نقش : </span>
                            </label>
                            <select name="roles[]" id="roles" multiple size="1"
                                class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/2 flex flex-col gap-3 mt-5">
                            <label for="approvingStatus" class="mb-2">
                                <span>وضعیت تایید : </span>
                            </label>
                            <select name="approvingStatus" id="approvingStatus"
                                class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                                <option value="-1">رد شده</option>
                                <option value="0">در انتظار تایید</option>
                                <option value="1">تایید شده</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-4">
                            <label for="isActive">فعال : </label>
                            <label for="isActive" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                <input type="checkbox" name="isActive" value="1" id="isActive" hidden
                                    class="peer">
                                <span
                                    class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                <span
                                    class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                            </label>
                        </div>
                        <div class="mt-5 text-center lg:col-span-2">
                            <button type="submit"
                                class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">تایید</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end editForm popup --}}
    <script>
        function controlUser(state, user, roleIds) {
            let controlUserPopup = document.getElementById('controlUserPopup')
            if (state == 'open') {
                controlUserPopup.classList.remove('invisible', 'opacity-0')
                document.getElementById('user_id').value = user.id
                document.getElementById('popupName').value = user.name
                document.getElementById('popupFamily').value = user.family
                document.getElementById('popupPhoneNumber').value = user.phoneNumber
                document.getElementById('popupNationalCode').value = user.nationalCode
                let isActive = document.getElementById('isActive')
                if (user.isActive) {
                    isActive.checked = true
                }
                if (!user.isActive) {
                    isActive.checked = false
                }
                let options = document.getElementById('approvingStatus').options
                for (let i = 0; i < options.length; i++) {
                    if (options[i].value == user.isApproved) {
                        options[i].selected = true
                    }
                }
                let roles = document.getElementById('roles').options
                for (let i = 0; i < roles.length; i++) {
                    if (roleIds.includes(parseInt(roles[i].value))) {
                        roles[i].selected = true
                    } else {
                        roles[i].selected = false
                    }
                }
            }
            if (state == 'close') {
                controlUserPopup.classList.add('invisible', 'opacity-0')
            }
        }



        
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
