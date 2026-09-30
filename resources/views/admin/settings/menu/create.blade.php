@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنظیمات منو')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full h-full pb-10">
        <h2 class="text-3xl text-center font-bold py-10 text-[#425A8B]">فرم ایجاد منو</h2>
        <div class="lg:w-2/3 w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">
            <form action="{{ route('settings.menu.store') }}" method="post" class="space-y-10">
                @csrf
                <div class="w-full flex flex-col">
                    <label for="title" class="mb-2 flex flex-row items-center">
                        <span>
                            عنوان منو:
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="title" id="title" placeholder="عنوان منو را وارد کنید" value="{{ old('title') }}">
                    @error('title')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="link" class="mb-2 flex flex-row items-center">
                        <span>
                            آدرس منو:
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="link" id="link" placeholder="آدرس منو را وارد کنید" value="{{ old('link') }}">
                    @error('link')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-10 sm:gap-4">
                    <div class="w-full flex flex-col">
                        <label for="parent_id">منوی والد:</label>
                        <select name="parent_id" id="parent_id" class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                            <option value="0">بدون والد</option>
                            @foreach ($menu as $item)
                                <option value="{{ $item->id }}" @if (old('parent_id') == $item->id) selected @endif>
                                    {{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full flex items-center justify-center gap-4">
                        <label for="status">فعال :</label>
                        <label for="status" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                            <input type="checkbox" name="status" value="1" id="status" hidden class="peer"
                                @if (old('status')) checked @endif>
                            <span
                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                            <span
                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                        </label>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button type="submit"
                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </form>
        </div>
    </div>

    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <h2 class="text-lg font-bold text-gray-800 p-4 text-center">لیست آیتم های منو</h2>
            <form class="flex flex-col gap-5 w-10/12 mx-auto" action="{{ route('settings.menu.deleteAll') }}"
                method="post">
                @csrf
                <div class="w-full flex flex-row justify-between items-center mb-5">
                    <div class="flex flex-row items-center gap-3">
                        <input type="checkbox" id="all" onchange="checkAll()">
                        <label for="all" class="text-gray-700 text-xs">انتخاب همه</label>
                    </div>
                    <div class="flex justify-center">
                        <button
                            class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                            title="حذف">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                <path fill="white"
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="w-full shadow-md [&::-webkit-scrollbar]:hidden lg:overflow-visible overflow-x-auto">
                    <div class="w-full min-w-[550px] h-120 max-h-120 overflow-auto">
                        <div class="w-full grid grid-cols-10 divide-x divide-slate-400 sticky top-0 z-1">
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="w-10 lg:w-full">ردیف</span>
                            </div>
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span class="w-20 lg:w-full">عنوان</span>
                            </div>
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span class="w-20 lg:w-full">لینک</span>
                            </div>
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span class="w-30 lg:w-full">منوی والد</span>
                            </div>
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="w-30 lg:w-full">وضعیت</span>
                            </div>
                            <div class="py-3 text-center text-xs font-medium text-gray-600 bg-gray-100 col-span-2">
                                <span class="w-[180px] lg:w-full">عملیات</span>
                            </div>
                        </div>
                        <div class="bg-white divide-y divide-[#f1f1f4]">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($menu as $item)
                                <div class="w-full grid grid-cols-10 divide-x divide-slate-400 py-4">
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center  text-center text-gray-900">
                                        <div class="w-10 lg:w-full flex items-center justify-center gap-2">
                                            <input type="checkbox" class="check" name="items[]"
                                                value="{{ $item->id }}">
                                            {{-- <span>{{ $i }}</span> --}}
                                            <span>{{ $item->id }}</span>
                                        </div>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                        <span class="block w-20 lg:w-full">{{ $item->title }}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                        <span class="block w-20 lg:w-full">{{ $item->link }}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-2">
                                        <span
                                            class="block w-20 lg:w-full">{{ $item->parent['title'] ?? 'بدون والد' }}</span>
                                    </div>
                                    <div
                                        class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center col-span-1">
                                        <span
                                            class="block w-20 lg:w-full">{{ $item['status'] ? 'فعال' : 'غیر فعال' }}</span>
                                    </div>
                                    <div class="col-span-2 flex items-center">
                                        <ul class="w-[180px] lg:w-full text-sm rounded-sm p-1 grid grid-cols-3">
                                            <li class="flex justify-center">
                                                <span
                                                    class="w-fit flex flex-row items-center justify-center bg-sky-500 hover:bg-sky-600 p-1 rounded-sm cursor-pointer"
                                                    title="مشاهده" onclick="show('open', {{ $item['id'] }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 576 512">
                                                        <path fill="white"
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="flex justify-center">
                                                <span
                                                    class="w-fit flex flex-row items-center justify-center bg-green-500 hover:bg-green-600 p-1 rounded-sm cursor-pointer"
                                                    title="ویرایش" onclick="editForm('open', {{ $item['id'] }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 512 512">
                                                        <path fill="white"
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                    </svg>
                                                </span>
                                            </li>
                                            <li class="flex justify-center">
                                                <span
                                                    onclick="deleteMenu('open', {{ $item['id'] }}, '{{ $item['title'] }}')"
                                                    class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                                    title="حذف">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4"
                                                        viewBox="0 0 448 512">
                                                        <path fill="white"
                                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                    </svg>
                                                </span>
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
            </form>
        </div>
    </div>
    {{-- start confirmDelete popup --}}
    <div id="confirmDeletePopup"
        class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="deleteMenu('close')"></div>
            <div
                class="w-11/12 md:w-1/2 xl:w-1/3 2xl:container 2xl:w-1/3 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="deleteMenu('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div class="">
                    <p>آیا از حذف منوی <span id="confirmDeleteItemName" class="font-bold"> </span> و زیر منو های آن
                        اطمینان دارید؟
                    </p>
                    <div class="flex items-center justify-center gap-5 mt-10">
                        <a id="yes" class="py-2 px-4 bg-green-200 text-green-500 rounded-xl shadow-lg">بله</a>
                        <span class="py-2 px-4 bg-red-200 text-red-500 rounded-xl shadow-lg cursor-pointer"
                            onclick="deleteMenu('close')">خیر</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end confirmDelete popup --}}
    {{-- start editForm popup --}}
    @error('menuTitle')
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-red-500"> {{ $message }} </span>
        </div>
    @enderror
    @error('menuLink')
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-red-500"> {{ $message }} </span>
        </div>
    @enderror
    <div id="editFormPopup" class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="editForm('close')"></div>
            <div
                class="w-8/12 2xl:container 2xl:w-8/12 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="editForm('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div id="popupContent" class="max-h-130 overflow-auto">
                    <form action="{{ route('settings.menu.update') }}" method="post" class="space-y-10">
                        @csrf
                        <input type="hidden" name="menu_id" id="menu_id">
                        <div class="w-full flex flex-col">
                            <label for="menuTitle" class="mb-2 flex flex-row items-center">
                                <span>
                                    عنوان منو:
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="menuTitle" id="menuTitle" placeholder="عنوان منو را وارد کنید">
                            @error('menuTitle')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="menuLink" class="mb-2 flex flex-row items-center">
                                <span>
                                    آدرس منو:
                                    <span class="text-rose-500">*</span>
                                </span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="menuLink" id="menuLink" placeholder="آدرس منو را وارد کنید">
                            @error('menuLink')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-10 sm:gap-4">
                            <div class="w-full flex flex-col">
                                <label for="menuParent_id">منوی والد:</label>
                                <select name="menuParent_id" id="menuParent_id"
                                    class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                                </select>
                            </div>
                            <div class="w-full flex items-center justify-center gap-4">
                                <label for="menuStatus">فعال :</label>
                                <label for="menuStatus"
                                    class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                    <input type="checkbox" name="menuStatus" value="1" id="menuStatus" hidden
                                        class="peer">
                                    <span
                                        class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                    <span
                                        class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
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
        function deleteMenu(state, id, menuTitle) {
            let confirmDeletePopup = document.getElementById('confirmDeletePopup')
            if (state == 'open') {
                let yes = document.getElementById('yes')
                yes.setAttribute('href', `{{ url('settings/menu/delete') }}/${id}`)
                let confirmDeleteItemName = document.getElementById('confirmDeleteItemName')
                confirmDeleteItemName.innerText = menuTitle
                confirmDeletePopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                confirmDeletePopup.classList.add('invisible', 'opacity-0')
            }
        }

        function editForm(state, id) {
            let editFormPopup = document.getElementById('editFormPopup')
            if (state == 'open') {
                let menuTitle = document.getElementById('menuTitle')
                let menuLink = document.getElementById('menuLink')
                let menuParent_id = document.getElementById('menuParent_id')
                let menuStatus = document.getElementById('menuStatus')
                let menu_id = document.getElementById('menu_id')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('settings.menu.edit') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        menuTitle.value = data['menu'].title
                        menuLink.value = data['menu'].link
                        menu_id.value = data['menu'].id
                        if (data['menu']['status']) {
                            menuStatus.setAttribute('checked', true)
                        } else {
                            menuStatus.removeAttribute('checked')
                        }
                        menuParent_id.innerHTML = ''
                        let withoutParent = document.createElement('option')
                        withoutParent.value = 0
                        withoutParent.innerText = 'بدون والد'
                        data['menus'].forEach(item => {
                            if (data['menu'].id != item.id) {
                                let option = document.createElement('option')
                                option.value = item.id
                                option.innerText = item.title
                                if (item.id == data['menu'].parent_id) {
                                    option.setAttribute('selected', true)
                                }
                                if (data['menu'].parent_id == 0) {
                                    withoutParent.setAttribute('selected', true)
                                }
                                menuParent_id.prepend(withoutParent)
                                menuParent_id.appendChild(option)
                            }
                        });
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

        function show(state, id) {
            let showSinglePopup = document.getElementById('showSinglePopup')
            if (state == 'open') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('settings.menu.show') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        document.getElementById('singleTitle').innerText = data.title
                        document.getElementById('singleDesc').innerText = data.description
                        if (data.parent) {
                            document.getElementById('singleParent').innerText = data.parent.title
                        } else {
                            document.getElementById('singleParent').innerText = 'بدون والد'
                        }
                        document.getElementById('singleChildren').innerHTML = data.subCats
                        let singleImg = document.getElementById('singleImg')
                        singleImg.innerHTML = ''
                        if (data.image) {
                            let img = document.createElement('img')
                            img.classList = 'w-full h-50'
                            img.setAttribute('src', data.image)
                            singleImg.appendChild(img)
                        }
                    },
                    error: function() {
                        alert('error')
                    }
                })
                showSinglePopup.classList.remove('opacity-0', 'invisible')
            }
            if (state == 'close') {
                showSinglePopup.classList.add('opacity-0', 'invisible')
            }
        }
    </script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
