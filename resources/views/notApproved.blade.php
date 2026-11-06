@extends('admin.app.dashboard')
@section('title', 'در انتظار تایید')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-11/12 mx-auto">
        <div class="flex flex-col items-center">
            <div class="size-25 sm:size-32 rounded-full shadow-xl flex items-center justify-center mb-10">
                @if ($user->mainImage)
                    <img src="{{ asset('/storage/' . $user->mainImage) }}" alt="" class="size-full rounded-full">
                @else
                    <img src="{{ asset('/assets/img/user.png') }}" alt="" class="size-full rounded-full">
                @endif
            </div>
            <h2 class="text-sm font-bold text-red-400 text-center mb-10">کاربر گرامی پس از تایید حساب کاربری تان توسط مدیریت
                میتوانید از امکانات سایت استفاده کنید.</h2>
            <div class="flex items-center gap-5">
                @switch($user->isApproved)
                    @case(0)
                        <span
                            class="text-xs text-yellow-500 bg-yellow-50 border border-yellow-300 hover:bg-yellow-100 py-1 px-3 rounded-full">در
                            انتظار تایید</span>
                    @break

                    @case(1)
                        <span
                            class="text-xs text-green-500 bg-green-50 border border-green-300 hover:bg-green-100 py-1 px-3 rounded-full">تایید
                            شده </span>
                    @break

                    @case(-1)
                        <span
                            class="text-xs text-red-500 bg-red-50 border border-red-300 hover:bg-red-100 py-1 px-3 rounded-full">رد
                            شده</span>
                    @break
                @endswitch
                @if ($user->isActive)
                    <span class="text-xs text-gray-50 bg-gray-400 border border-gray-300 py-1 px-3 rounded-md">فعال</span>
                @else
                    <span class="text-xs text-gray-400 bg-gray-50 border border-gray-300 py-1 px-3 rounded-md">غیر
                        فعال</span>
                @endif
            </div>
            <h1 class="mt-6 text-xl sm:text-4xl font-bold text-slate-800">{{ $user->name }} {{ $user->family }}</h1>
            <p class="mt-2 text-sm sm:text-lg text-slate-500">
                @if (count($user->roles) > 0)
                    {{ $user->roles[0]['name'] }}
                @else
                    بدون نقش
                @endif
            </p>
        </div>
        <div class="flex flex-col lg:grid grid-cols-3 gap-6 lg:gap-2 mt-5">
            <div class="w-full bg-white border-2 border-slate-300 rounded-2xl p-4 hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="rounded-xl bg-green-100 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M22 16.92V20a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 2 4.18A2 2 0 0 1 4 2h3.09a2 2 0 0 1 2 1.72l.42 2.52a2 2 0 0 1-.57 1.77l-1.2 1.2a16 16 0 0 0 6.36 6.36l1.2-1.2a2 2 0 0 1 1.77-.57l2.52.42A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-400">تلفن</span>
                    </div>
                    <div>
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg in-fa">{{ $user->phoneNumber }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white border-2 border-slate-300 rounded-2xl p-4 hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="rounded-xl bg-indigo-100 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="5" width="18" height="14" rx="2" />
                                <path d="M3 7l9 6 9-6" />
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm text-slate-400">کد ملی</span>
                    </div>
                    <div>
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg in-fa">{{ $user->nationalCode }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white border-2 border-slate-300 rounded-2xl p-4 hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="rounded-xl bg-yellow-100 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="5" width="18" height="16" rx="2" />
                                <path d="M16 3v4M8 3v4M3 10h18" />
                            </svg>
                        </div>
                        <span class="texttext-xs sm:-sm text-slate-400">تاریخ عضویت</span>
                    </div>
                    <div>
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg in-fa">
                            {{ $user->time . ' - ' . $user->date }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white border-2 border-slate-300 rounded-2xl p-4 hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="rounded-xl bg-red-100 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-6 fill-red-600">
                                <path
                                    d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                            </svg>
                        </div>
                        <span class="texttext-xs sm:-sm text-slate-400">تاریخ تولد</span>
                    </div>
                    <div>
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg in-fa">
                            @if (isset($user->birthDate))
                                {{ $user->birthDate }}
                            @else
                                ثبت نشده
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-white border-2 border-slate-300 rounded-2xl p-4 hover:shadow-lg transition duration-300">
                <div class="flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="rounded-xl bg-pink-100 p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6 fill-pink-600">
                                <path
                                    d="M298.6 4c-6-5.3-15.1-5.3-21.2 0L5.4 244c-6.6 5.8-7.3 16-1.4 22.6s16 7.3 22.6 1.4L64 235V432c0 44.2 35.8 80 80 80H432c44.2 0 80-35.8 80-80V235l37.4 33c6.6 5.8 16.7 5.2 22.6-1.4s5.2-16.7-1.4-22.6L298.6 4zM96 432V206.7L288 37.3 480 206.7V432c0 26.5-21.5 48-48 48H368V320c0-17.7-14.3-32-32-32H240c-17.7 0-32 14.3-32 32V480H144c-26.5 0-48-21.5-48-48zm144 48V320h96V480H240z" />
                            </svg>
                        </div>
                        <span class="texttext-xs sm:-sm text-slate-400">آدرس</span>
                    </div>
                    <div>
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg in-fa">
                            @if (isset($user->address))
                                {{ $user->address }}
                            @else
                                ثبت نشده
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
