@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | دسترسی و مجوز ها ')
@section('content')
    <div class="absolute z-999 top-0 opacity-0 invisible right-1/2 translate-x-1/2 w-2/3 lg:w-1/3 rounded-lg shadow-md transition-all duration-500 bg-white"
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
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('failure') }} </span>
        </div>
    @endif
    <div class="max-w-6xl mx-auto w-full grid grid-cols-1 lg:grid-cols-3 gap-3">

        <!-- ستون سمت راست: ایجاد نقش جدید -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-6">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">ایجاد نقش جدید</h2>
                </div>

                <form action="{{ route('role.roleStore') }}" class="space-y-4" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5" for="name">عنوان نقش</label>
                        <input type="text" id="name" name="name" placeholder="مثلاً: مدیر فروش"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-slate-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm">
                        @error('name')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-400 text-white font-medium py-2.5 rounded-xl transition-colors shadow-sm shadow-primary/30 flex justify-center items-center gap-2 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        ثبت نقش
                    </button>
                </form>
            </div>
        </div>
        <!-- ستون سمت چپ: تخصیص دسترسی‌ها -->
        <div class="lg:col-span-2 space-y-6">
            <!-- انتخاب نقش‌ها -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-100 pb-3">انتخاب نقش برای تنظیم
                    دسترسی</h2>
                <p class="text-sm text-slate-500 mb-4">می‌توانید یک یا چند نقش را انتخاب کنید تا دسترسی‌های آن‌ها را
                    مدیریت کنید.</p>

                <!-- سلکت باکس مالتی (Multi-Select) با چک‌باکس‌های شیک -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach ($roles as $role)
                        <div class="bg-slate-100 p-3 rounded-xl flex justify-between">
                            <label class="flex items-center cursor-pointer" onchange="addRoles({{ $role->id }}, this)">
                                <input type="checkbox" value="1"
                                    class="w-4 h-4 text-primary bg-gray-100 border-gray-300 cursor-pointer ml-3">
                                <span class="text-sm text-slate-700">{{ $role->name }}</span>
                            </label>
                            @if ($role->name != 'مالک')
                                <a href="{{ route('role.roleDelete', [$role]) }}"
                                    class="w-5 h-5 flex flex-row items-center justify-center bg-red-400 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                    title="حذف">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-3.5" viewBox="0 0 448 512">
                                        <path fill="white"
                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z">
                                        </path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- لیست دسترسی‌ها (Permissions) -->
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex justify-between items-center mb-4 border-b border-slate-100 pb-3">
                <h2 class="text-lg font-bold text-slate-800">مجوزها </h2>
            </div>

            <div id="permissionsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                @foreach ($permissions as $permission)
                    <label
                        class="flex items-center p-3 rounded-xl border border-slate-200 bg-slate-50 hover:bg-slate-100 cursor-pointer transition-colors"
                        onchange="addPermission({{ $permission->id }}, this)">
                        <input type="checkbox" value="p1"
                            class="w-4 h-4 text-primary bg-white border-slate-300 cursor-pointer ml-3">
                        <span class="text-sm text-slate-700">{{ $permission->fa_title }}</span>
                    </label>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" onclick="setPermissions()"
                    class="bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-2.5 px-8 rounded-xl transition-colors shadow-sm shadow-emerald-500/30 flex items-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                        </path>
                    </svg>
                    ذخیره تغییرات
                </button>
            </div>
        </div>

        {{-- دسترسی های درحال حاضر --}}
        <div class="lg:col-span-3 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <h2 class="text-lg font-bold text-slate-800 mb-2 border-b border-slate-100 pb-3">نقش ها و دسترسی هایشان</h2>
                <p class="text-sm text-slate-500 mb-10">در صورت تمایل به تغییر هر یک از نقش ها و دسترسی ها کافیست تغییرات
                    مورد نظر را دوباره اعمال کنید.</p>
                <div class="grid grid-cols-1 gap-3">
                    @foreach ($roles as $role)
                        <p>
                            <span class="font-bold">{{ $role->name }} : </span>
                            <span class="text-xs text-gray-400">
                                @foreach ($role->permissions as $permission)
                                    {{ $permission->fa_title }} -
                                @endforeach
                            </span>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    {{-- loader --}}
    <div id="loader"
        class="w-full h-full bg-black/50 fixed top-0 right-0 z-999 flex items-center justify-center transition-all duration-300 invisible opacity-0">
        <div class="p-5 bg-white shadow-xl rounded-lg flex flex-col items-center gap-10">
            <span
                class="w-15 md:w-20 h-15 md:h-20 animate-spin rounded-full border-4 border-yellow-100 border-t-yellow-600"></span>
            <p class="text-gray-600 font-bold text-sm md:text-xl">در حال بارگذاری لطفا شکیبا باشید....</p>
        </div>
    </div>
    {{-- loader --}}
    <script>
        function loader(state) {
            let loader = document.getElementById('loader')
            if (state == 'open') {
                loader.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                loader.classList.add('invisible', 'opacity-0')
            }
        }

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
        let data = {
            'roles': [],
            'permissions': []
        }

        function addRoles(roleId, el) {
            if (el.children[0].checked) {
                if (!data.roles.includes(roleId)) {
                    data.roles.push(roleId)
                }
            } else {
                if (data.roles.includes(roleId)) {
                    data.roles = data.roles.filter(role => role != roleId)
                }
            }
        }

        function addPermission(permissionId, el) {
            if (el.children[0].checked) {
                if (!data.permissions.includes(permissionId)) {
                    data.permissions.push(permissionId)
                }
            } else {
                if (data.permissions.includes(permissionId)) {
                    data.permissions = data.permissions.filter(permission => permission != permissionId)
                }
            }
        }

        function setPermissions() {
            loader('open')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('role.setPermissions') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'data': data,
                },
                success: function(result) {
                    loader('close')
                    if (result) {
                        showMessage('open')
                        element.innerHTML = `
                        <span class="text-shadow-lg">تغییرات با موفقیت ذخیره شد.</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                            location.reload()
                        }, 2000)
                    } else {
                        showMessage('open')
                        element.innerHTML = `
                        <span class="text-shadow-lg">نقش ها و دسترسی ها را باهم انتخاب کنید.</span>
                        `
                        message.children[0].appendChild(element)
                        setTimeout(() => {
                            showMessage('close')
                        }, 4000)
                    }
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
                    }, 5000)
                }
            })
        }
    </script>
@endsection
