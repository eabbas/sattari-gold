@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | همه محصولات')
@section('content')
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
            <h2 class="text-base md:text-xl font-bold">لیست محصولات</h2>
            @can('access', 'product_create')
                <a href="{{ route('product.create') }}"
                    class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
                    <span class="">
                        <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512">
                            <path
                                d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                            </path>
                        </svg>
                    </span>
                    <div class="">محصول جدید</div>
                </a>
            @endcan
        </section>
        <!-- لیست مشتریان / لسیت -->
        <section class="w-full mx-auto rounded-md border-1 border-(--border-dashboard) mt-5 overflow-hidden">
            <div class="w-full">
                <form class="w-full " action="{{ route('product.deleteAll') }}" method="post">
                    @csrf
                    @can('access', 'product_delete')
                        <div class="w-full flex justify-between items-center px-4 py-3">
                            <div class="flex items-center justify-start gap-2">
                                <div class="min-w-23 md:min-w-28  flex items-center justify-center gap-2">
                                    <input
                                        class="appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer"
                                        type="checkbox" id="all" onchange="checkAll()">
                                    <label class="text-xs md:text-base" for="selectAll">
                                        انتخاب همه
                                    </label>
                                </div>
                            </div>
                            <button
                                class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-1 rounded-sm cursor-pointer"
                                title="حذف">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                    <path fill="white"
                                        d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                </svg>
                            </button>
                        </div>
                    @endcan

                    <div class="max-w-full w-full  overflow-x-auto">
                        <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm text-nowrap">
                            <thead class="w-full">
                                <tr class="w-full bg-gray-100 text-xs lg:text-base">
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        ردیف
                                    </th>
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        عنوان
                                    </th>
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        تصویر
                                    </th>
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        خلاصه
                                    </th>
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        دسته
                                    </th>
                                    <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                        عملیات
                                    </th>

                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr class=" text-xs lg:text-base">
                                        <td class="p-1 md:px-3 md:py-2 in-fa">
                                            <div class=" flex items-center justify-center gap-2">
                                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                                    class="check appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                                <span class="in-fa">{{ $i }}</span>
                                            </div>
                                        </td>
                                        <td class="p-1 md:px-3 md:py-2  in-fa">
                                            <div class="flex items-center justify-center gap-2 in-fa">
                                                {{ $product->title }}
                                            </div>
                                        </td>
                                        <td class="p-1 md:px-3 md:py-2  in-fa">
                                            <div class="flex items-center justify-center gap-2">
                                                <img class="max-w-[60px] max-h-[60px] mx-auto size-15 object-cover rounded-md"
                                                    src={{ asset('storage/' . $product['mainImg']) }}>

                                            </div>
                                        </td>
                                        <td class="p-1 md:px-3 md:py-2  in-fa">
                                            <div class="flex items-center justify-center gap-2 relative">
                                                {{ $product->summary }}
                                            </div>
                                        </td>
                                        <td class="p-1 md:px-3 md:py-2  in-fa">
                                            <div class="flex items-center justify-center gap-2 relative">
                                                @foreach ($product['categories'] as $category)
                                                    {{ $category['title'] }}-
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="p-1 md:px-3 md:py-2  in-fa">
                                            <div class="flex items-center justify-center gap-2">
                                                <ul
                                                    class="max-lg:text-sm max-sm:text-xs rounded-sm flex items-center gap-4">
                                                    @can('access', 'product_edit')
                                                        <li class="flex justify-center">
                                                            <span
                                                                class="font-bold text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-4 py-2 cursor-pointer"
                                                                title="ویرایش" onclick="editForm('open', {{ $product['id'] }})">
                                                                ویرایش
                                                            </span>
                                                        </li>
                                                    @endcan
                                                    @can('access', 'product_delete')
                                                        <li class="flex justify-center">
                                                            <span
                                                                class="font-bold text-red-500 border-1 border-red-500 rounded-md px-4 py-2 cursor-pointer"
                                                                title="حذف"
                                                                onclick="deleteProduct('open', {{ $product['id'] }}, '{{ $product['title'] }}')">
                                                                حذف
                                                            </span>
                                                        </li>
                                                    @endcan
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>





        </section>
    </div>



    {{-- start confirmDelete popup --}}
    <div id="confirmDeletePopup"
        class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="deleteProduct('close')"></div>
            <div
                class="w-11/12 md:w-1/2 xl:w-1/3 2xl:container 2xl:w-1/3 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="deleteProduct('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div class="">
                    <p>آیا از حذف محصول <span id="confirmDeleteProName" class="font-bold"> </span> اطمینان دارید؟ </p>
                    <div class="flex items-center justify-center gap-5 mt-10">
                        <a id="yes" class="py-2 px-4 bg-green-200 text-green-500 rounded-xl shadow-lg">بله</a>
                        <span class="py-2 px-4 bg-red-200 text-red-500 rounded-xl shadow-lg cursor-pointer"
                            onclick="deleteProduct('close')">خیر</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end confirmDelete popup --}}
    {{-- start editForm popup --}}
    @error('title')
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-red-500"> {{ $message }} </span>
        </div>
    @enderror
    @error('category_ids')
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-100 fixed top-30 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-red-500"> {{ $message }} </span>
        </div>
    @enderror
    <div id="editFormPopup" class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="editForm('close')"></div>
            <div
                class="w-9/12 2xl:container 2xl:w-9/12 max-h-160 overflow-auto mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2 max-h-[calc(100vh-100px)]">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="editForm('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <div id="popupContent">
                    <form action="{{ route('product.update') }}" method="post" id="editForm"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="flex flex-col md:flex-row gap-3 md:gap-5">
                            <div class="w-full md:w-2/3 space-y-8">
                                <div class="w-full flex flex-col">
                                    <label for="title" class="mb-2 flex flex-row items-center">
                                        <span>نام محصول:</span>
                                        <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="text"
                                        class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4] in-fa"
                                        name="title" id="title" placeholder="نام محصول را وارد کنید">
                                    @error('title')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full flex flex-col mt-5">
                                    <label for="description" class="mb-2">توضیحات محصول:</label>
                                    <textarea name="description" class="outline-none pr-5 py-3 bg-[#F9F9F9] in-fa rounded-xl focus:bg-[#f1f1f4]"
                                        rows="4" id="description" placeholder="توضیحات محصول را وارد کنید"></textarea>
                                    @error('description')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full flex flex-col mt-5">
                                    <label for="summary" class="mb-2">خلاصه محصول:</label>
                                    <textarea class="outline-none pr-5 py-3 bg-[#F9F9F9] in-fa rounded-xl focus:bg-[#f1f1f4]" rows="4"
                                        placeholder="خلاصه" name="summary" id="summary"></textarea>
                                    @error('summary')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full flex flex-col gap-3 mt-5">
                                    <label for="category_ids" class="mb-2 flex flex-row items-center">
                                        <span>دسته بندی :</span>
                                        <span class="text-rose-500">*</span>
                                    </label>
                                    <select name="category_ids[]" id="category_ids"
                                        class="w-full bg-[#F9F9F9] py-3 pr-5 rounded-[10px]" multiple size="1">
                                    </select>
                                    @error('category_ids')
                                        <span class="text-xs text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full flex flex-col gap-5 mt-5">
                                    <div class="" id="attributesContainer">

                                    </div>
                                    <button type="button" onclick="addAttribute(this,'edit')"
                                        class="w-30 mx-auto p-2 text-sm rounded-md bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">
                                        افزودن ویژگی +
                                    </button>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 space-y-8">
                                <div class="w-full flex flex-col gap-6 mt-5">
                                    <div class="flex items-center gap-4">
                                        <label for="show_in_home">نمایش در خانه :</label>
                                        <label for="show_in_home"
                                            class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                                            <input type="checkbox" name="show_in_home" value="1" id="show_in_home"
                                                hidden class="peer">
                                            <span
                                                class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                                            <span
                                                class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                                        </label>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <label class="mb-2"> تعداد :</label>
                                        <div class="flex">
                                            <div
                                                class="bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4] flex flex-row items-center">
                                                <button type="button"
                                                    class="inline-block size-7 rounded-lg bg-[#1B84FF] hover:bg-[#056EE9] cursor-pointer text-white"
                                                    onclick="calculate('+')">+</button>
                                                <input type="number" min="1"
                                                    class="outline-none w-14 text-center text-xs in-fa" name="count"
                                                    id="count" dir="ltr">
                                                <button type="button"
                                                    class="inline-block size-7 rounded-lg bg-[#1B84FF] hover:bg-[#056EE9] cursor-pointer text-white"
                                                    onclick="calculate('-')">-</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full mt-3 lg:mt-5 flex flex-col">
                                    <label for="mainImage" class="mb-2">عکس اصلی:</label>
                                    <input type="file"
                                        class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                        name="mainImage" id="mainImage">
                                    <div id="mainImgContainer" class="relative mt-2 p-2 "></div>
                                </div>
                                <div class="w-full mt-3 lg:mt-5 flex flex-col">
                                    <label for="gallery" class="mb-2">گالری تصاویر :</label>
                                    <input type="file"
                                        class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                        name="gallery[]" id="gallery" multiple>
                                    <span class="text-xs text-red-500">حجم کل فایل ها نباید بیشتر از 500 کیلوبایت
                                        باشد.</span>
                                    <div id="galleryContainer" class=" mt-2 p-2 flex items-center gap-3 overflow-auto">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 md:gap-5 mt-3 lg:mt-5">
                                    <div class="w-full flex flex-col gap-3">
                                        <label for="primary_price" class="flex items-center gap-2">
                                            <span>قیمت اصلی :</span>
                                            <div class="relative group">
                                                <span
                                                    class="size-4 text-xs bg-[#ededed] border border-[#6f6f6f] rounded-full p-2 flex justify-center items-center cursor-pointer">?</span>
                                                <span
                                                    class="w-70 py-4 text-center rounded-xl text-xs absolute bottom-5 left-5 bg-[#F9F9F9] border border-slate-300 invisible opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100">در
                                                    صورتی که مایلید برای استعلام قیمت تماس گرفته شود این فیلد را خالی
                                                    بگذارید.</span>
                                            </div>
                                        </label>
                                        <input type="number"
                                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                            name="primary_price" id="primary_price">
                                    </div>
                                    <div class="w-full flex flex-col gap-3">
                                        <label for="secondary_price"> قیمت ویژه :</label>
                                        <input type="number"
                                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                            name="secondary_price" id="secondary_price">
                                    </div>
                                </div>
                                <div class="mt-5 text-center">
                                    <button type="submit"
                                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                                </div>
                            </div>
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
                let product_id = document.getElementById('product_id')
                let title = document.getElementById('title')
                let description = document.getElementById('description')
                let summary = document.getElementById('summary')
                let show_in_home = document.getElementById('show_in_home')
                let count = document.getElementById('count')
                let mainImgContainer = document.getElementById('mainImgContainer')
                let galleryContainer = document.getElementById('galleryContainer')
                let primary_price = document.getElementById('primary_price')
                let secondary_price = document.getElementById('secondary_price')
                let category_ids = document.getElementById('category_ids')
                let attributesContainer = document.getElementById('attributesContainer')
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('product.edit') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'id': id,
                    },
                    success: function(data) {
                        product_id.value = data['product'].id
                        title.value = data['product'].title
                        description.value = data['product'].description
                        summary.value = data['product'].summary
                        count.value = data['product'].count
                        primary_price.value = data['product'].primary_price
                        secondary_price.value = data['product'].secondary_price
                        mainImgContainer.innerHTML = ''
                        galleryContainer.innerHTML = ''
                        data['product'].media.forEach(media => {
                            if (media.is_main) {
                                let div = document.createElement('div')
                                div.innerHTML = `
                                    <img src="${media['media_path']}" class="w-35 h-20 rounded-lg">
                                    <span class="absolute top-0 left-5 cursor-pointer" onclick="removeImg(this, '${media['media_path']}', 'mainImg')">❌</span>
                                    `
                                mainImgContainer.appendChild(div)
                            } else {
                                let div = document.createElement('div')
                                div.classList = 'relative'
                                div.innerHTML = `
                                    <img src="${media['media_path']}" class="min-w-35 h-20 rounded-lg">
                                    <span class="absolute top-0 left-0 cursor-pointer" onclick="removeImg(this, '${media['media_path']}', 'gallery')">❌</span>
                                    `
                                galleryContainer.appendChild(div)
                            }
                        })
                        if (data.product.show_in_home) {
                            show_in_home.setAttribute('checked', true)
                        }
                        category_ids.innerHTML = ''
                        data['cats'].forEach(category => {
                            let option = document.createElement('option')
                            option.value = category.id
                            option.innerText = category.title
                            if (data.catIds.includes(category.id)) {
                                option.setAttribute('selected', true)
                            }
                            category_ids.appendChild(option)
                        });
                        attributesContainer.innerHTML = ''
                        data['product'].attributes.forEach(attribute => {
                            let div = document.createElement('div');
                            div.classList =
                                'flex flex-row items-center justify-between gap-4 mt-4 border border-slate-300 rounded-xl p-2'
                            div.innerHTML = `
                                            <div class="w-full flex flex-col sm:flex-row items-center gap-4">
                                                <input type="text"
                                                    class="w-full in-fa outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                    placeholder="ویژگی" name="attributes[oldAttrs][attribute_key][${attribute.id}]" required value="${attribute.attribute_key}">
                                                <input type="text"
                                                    class="w-full in-fa outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                                                    placeholder="مقدار ویژگی" name="attributes[oldAttrs][attribute_value][${attribute.id}]" required value="${attribute.attribute_value}">
                                            </div>
                                            <button type="button"
                                                class="p-3 text-sm rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                                                onclick="remove(this, ${attribute.id})">حذف</button>
                                            `
                            attributesContainer.appendChild(div)
                        })
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

        function removeImg(el, file, type) {
            let editForm = document.getElementById('editForm')
            let index = file.indexOf('productImgs')
            let result = file.slice(index)
            if (type == 'mainImg') {
                let input = document.createElement('input')
                input.setAttribute("type", 'hidden')
                input.setAttribute("name", "removedImgs[mainImg]")
                input.setAttribute("value", result)
                editForm.appendChild(input)
            }
            if (type == 'gallery') {
                let input = document.createElement('input')
                input.setAttribute("type", 'hidden')
                input.setAttribute("name", "removedImgs[gallery][]")
                input.setAttribute("value", result)
                editForm.appendChild(input)
            }
            el.parentElement.remove()
        }

        function deleteProduct(state, id, proTitle) {
            let confirmDeletePopup = document.getElementById('confirmDeletePopup')
            if (state == 'open') {
                let yes = document.getElementById('yes')
                yes.setAttribute('href', `{{ url('product/delete') }}/${id}`)
                let confirmDeleteProName = document.getElementById('confirmDeleteProName')
                confirmDeleteProName.innerText = proTitle
                confirmDeletePopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                confirmDeletePopup.classList.add('invisible', 'opacity-0')
            }
        }
    </script>
    <script src="{{ url('assets/js/attribute.js') }}"></script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection
