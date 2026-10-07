@extends('admin.app.dashboard')
@section('title', 'پروفایل کاربری')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="px-4 sm:px-14 py-5">
        <div class="flex flex-col items-center">
            <div class="size-25 sm:size-32 rounded-full shadow-xl flex items-center justify-center mb-10">
                @if ($user->mainImage)
                    <img src="{{ asset('/storage/' . $user->mainImage) }}" alt="" class="size-full rounded-full">
                @else
                    <img src="{{ asset('/assets/img/user.png') }}" alt="" class="size-full rounded-full">
                @endif
            </div>
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
                @foreach ($user['persianRoles'] as $index => $role)
                    @if ($index == count($user['persianRoles']) - 1)
                        {{ $role }}
                    @else
                        {{ $role }} -
                    @endif
                @endforeach
            </p>
        </div>
        <div class="flex flex-col lg:flex-row gap-6 lg:gap-2 mt-14">
            <div class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 hover:shadow-lg transition duration-300">
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
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg">{{ $user->phoneNumber }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 hover:shadow-lg transition duration-300">
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
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg">{{ $user->nationalCode }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full bg-slate-50 border border-slate-200 rounded-2xl p-4 hover:shadow-lg transition duration-300">
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
                        <p class="text-slate-800 font-bold mt-1 text-sm sm:text-lg">{{ $user->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-12 h-px bg-slate-200"></div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <span onclick="editForm('open', {{ $user->id }})"
                class="text-sm py-3 px-5 text-center mx-auto w-60 sm:w-40 rounded-xl border border-slate-300 bg-slate-100 text-slate-700 transition-all duration-300 cursor-pointer">ویرایش
                پروفایل</span>
            <a href="{{ route('wallet.wallet', [$user]) }}"
                class="text-sm py-3 px-5 text-center mx-auto w-60 sm:w-40 rounded-xl border border-slate-300 bg-slate-100 text-slate-700 transition-all duration-300 cursor-pointer">کیف
                پول</a>
            @if ($user->id == Auth::id())
                <a href="{{ route('user.logout') }}"
                    class="text-sm py-3 px-5 text-center mx-auto w-60 sm:w-40 rounded-xl border border-red-200 bg-red-50 text-red-500 hover:bg-red-100 transition-all duration-300">خروج</a>
            @endif
        </div>
    </div>
    {{-- start editForm popup --}}
    <div id="editFormPopup" class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="editForm('close')"></div>
            <div
                class="w-9/12 2xl:container 2xl:w-9/12 max-h-160 overflow-auto mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="editForm('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div id="popupContent">
                    <form id="editForm" action="{{ route('user.updateProfile') }}" method="post"
                        enctype="multipart/form-data" class="w-full grid grid-cols-1 lg:grid-cols-2 gap-5">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="w-full flex flex-col">
                            <label for="name" class="mb-2 flex flex-row items-center">
                                <span>
                                    نام :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]" name="name"
                                id="name" placeholder="نام را وارد کنید">
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="family" class="mb-2 flex flex-row items-center">
                                <span>
                                    نام خانوادگی :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="family" id="family" placeholder="نام خانوادگی را وارد کنید">
                            @error('family')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="phoneNumber" class="mb-2 flex flex-row items-center">
                                <span>
                                    شماره تلفن :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="tel"
                                class="text-right outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="phoneNumber" id="phoneNumber" placeholder="0912345678">
                            @error('phoneNumber')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="nationalCode" class="mb-2 flex flex-row items-center">
                                <span>
                                    کد ملی :
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="nationalCode" id="nationalCode" placeholder="1234567890">
                            @error('nationalCode')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="password" class="mb-2">
                                <span>
                                    رمز عبور :
                                </span>
                            </label>
                            <input type="password"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="password" id="password">
                            @error('password')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="image" class="mb-2 cursor-pointer">
                                <span>انتخاب عکس</span>
                            </label>
                            <div class="flex items-start">
                                <div class="w-1/2">
                                    <input type="file" name="mainImage"
                                        class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                        id="image">
                                    @error('mainImage')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div id="imgContainer" class="w-1/2 h-30 flex items-center justify-center relative">
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center lg:col-span-2">
                            <button type="submit"
                                class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end editForm popup --}}
    <script>
        function editForm(state, id) {
            let editFormPopup = document.getElementById('editFormPopup')
            if (state == 'open') {
                let user_id = document.getElementById('user_id')
                let name = document.getElementById('name')
                let family = document.getElementById('family')
                let phoneNumber = document.getElementById('phoneNumber')
                let nationalCode = document.getElementById('nationalCode')
                let imgContainer = document.getElementById('imgContainer')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('user.profileEdit') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        user_id.value = data.id
                        name.value = data.name
                        family.value = data.family
                        phoneNumber.value = data.phoneNumber
                        nationalCode.value = data.nationalCode
                        imgContainer.innerHTML = ''
                        if (data.mainImage) {
                            let div = document.createElement('div')
                            let img = document.createElement('img')
                            img.classList = 'h-full w-30'
                            img.setAttribute('src', data.mainImage)
                            div.appendChild(img)
                            let deleteImgBtn = document.createElement('span')
                            deleteImgBtn.setAttribute('onclick', `removeImg(this, "${data.mainImage}")`)
                            deleteImgBtn.classList = "absolute top-0 left-10 cursor-pointer"
                            deleteImgBtn.innerText = '❌'
                            div.appendChild(deleteImgBtn)
                            imgContainer.appendChild(div)
                        }
                    },
                    error: function() {
                        alert('error')
                    }
                })
                editFormPopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                editFormPopup.classList.add('invisible', 'opacity-0')
            }
        }

        function removeImg(el, file) {
            let index = file.indexOf('userImgs')
            let result = file.slice(index)
            let editForm = document.getElementById('editForm')
            let input = document.createElement('input')
            input.setAttribute("type", 'hidden')
            input.setAttribute("name", "removedImg")
            input.setAttribute("value", result)
            editForm.appendChild(input)
            el.parentElement.remove()
        }
    </script>
@endsection
