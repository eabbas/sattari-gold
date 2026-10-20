@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | همه دسته بندی ها')
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
        <h2 class="text-base md:text-xl font-bold"> لیست دسته بندی ها</h2>
        <a href="{{ route('category.create') }}"
            class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-3 py-2 cursor-pointer flex items-center justify-center">
            <span class="">
                <svg class="size-3 md:size-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z">
                    </path>
                </svg>
            </span>
            <div class="">دسته بندی جدید</div>
        </a>

    </section>
    <!-- لیست مشتریان / لسیت -->
    <section id="confirmed_pending"
        class="w-full mx-auto rounded-md border-1 border-(--border-dashboard) mt-5 overflow-hidden">



        <div id="confirmed" class="w-full">
        
            <form class="w-full " action="{{ route('category.deleteAll') }}" method="post">
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
                        <div
                            class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashboard)  hidden md:flex flex-col md:flex-row">
                            <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                            <span class="hidden md:flex">|</span>
                            <span class="">ظرفیت باقیمانده 445 نفر</span>
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
                <div class="max-w-full w-full  overflow-x-auto">
                    <table class="w-full border-collapse border-1 border-(--border-dashboard) text-sm text-nowrap">
                        <thead class="w-full">
                            <tr class="w-full bg-gray-100 text-xs lg:text-base">
                                <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                    تصویر
                                </th>
                                <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                    عنوان
                                </th>
                                <th class="border-1 border-(--border-dashboard) p-3 md:px-3 md:py-2">
                                    زیر دسته ها
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
                            @foreach ($categories as $category)
                            <tr class=" text-xs lg:text-base">
                                <td class="p-1 md:px-3 md:py-2 in-fa">
                                    <div class=" flex items-center justify-center gap-2">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="check appearance-none size-5 rounded-md border-1 border-(--border-dashboard) checked:bg-(--primary-dark-dashboard) checked:after:content-['✓'] text-white flex items-center justify-center text-sm cursor-pointer">
                                        <span>{{ $i }}</span>
                                    </div>
                                </td>
                                <td class="p-1 md:px-3 md:py-2  in-fa">
                                    <div class="flex items-center justify-center gap-2">
                                        @if (isset($category['image']))
                                        <img class="max-w-[60px] max-h-[60px] mx-auto size-15 object-cover rounded-md"
                                            src={{ asset('storage/' . $category->image) }}>
                                        @else
                                        <p class=" text-center">بدون تصویر</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-1 md:px-3 md:py-2  in-fa">
                                    <div class="flex items-center justify-center gap-2">
                                        {{ $category->title }}
                                    </div>
                                </td>
                                <td class="p-1 md:px-3 md:py-2  in-fa">
                                    <div class="flex items-center justify-center gap-2 relative">
                                        @if (count($category->children))
                                        <span
                                            class="block w-30 lg:w-full font-bold text-blue-500 hover:text-blue-600 cursor-pointer subCats">مشاهده</span>
                                        <ul
                                            class="absolute w-full top-0 bg-white right-0 max-h-0 transition-all duration-300 flex flex-col items-center divide-y divide-gray-300 opacity-0 invisible border border-gray-300 rounded-sm z-555">
                                            <div class="w-full overflow-auto max-h-60">
                                                @foreach ($category->children as $child)
                                                <li class="w-full py-2">{{ $child->title }}</li>
                                                @endforeach
                                            </div>
                                        </ul>
                                        @else
                                        <span
                                            class="block w-30 lg:w-full font-bold text-blue-500 hover:text-blue-600 cursor-pointer">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-1 md:px-3 md:py-2  in-fa">
                                    <div class="flex items-center justify-center gap-2">
                                        <ul class="max-lg:text-sm max-sm:text-xs rounded-sm flex items-center gap-4">
                                            <li class="flex justify-center">
                                                <span
                                                    class="font-bold text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-4 py-2 cursor-pointer walletBtn"
                                                    title="مشاهده" onclick="show('open', {{ $category['id'] }})">
                                                    مشاهده
                                                </span>
    
                                            </li>
                                            <li class="flex justify-center">
                                              
                                                <span
                                                    class="font-bold text-(--primary-dashboard) border-1 border-(--primary-dashboard) rounded-md px-4 py-2 cursor-pointer walletBtn"
                                                    title="ویرایش" onclick="editForm('open', {{ $category['id'] }})">
                                                    ویرایش
                                                </span>
                                            </li>
                                            <li class="flex justify-center">
                                                 <span
                                                    class="font-bold text-red-500 border-1 border-red-500 rounded-md px-4 py-2 cursor-pointer walletBtn"
                                                  title="حذف" onclick="deleteCat('open', {{ $category['id'] }}, '{{ $category['title'] }}')">
                                                    حذف
                                                </span>
                                            </li>
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


{{-- start showSingle popup --}}
<div id="showSinglePopup" class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
    <div class="size-full relative">
        <div class="size-full bg-black/40 absolute top-0 left-0" onclick="show('close')"></div>
        <div
            class="w-10/12 2xl:container 2xl:w-10/12 sm:w-8/12 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
            <div class="relative">
                <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                    onclick="show('close')">
                    <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                    <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                </button>
            </div>
            <div class="w-full flex flex-col items-start gap-10 p-5 max-h-130 overflow-auto">
                <div class="w-full flex flex-col sm:flex-row items-center gap-10">
                    <div class="w-full sm:w-1/2 bg-slate-100 rounded-xl px-5 py-2">
                        <h2 class="font-bold text-slate-700 mb-4">عنوان : </h2>
                        <p id="singleTitle"></p>
                    </div>
                    <div class="w-full sm:w-1/2 bg-slate-100 rounded-xl px-5 py-2">
                        <h2 class="font-bold text-slate-700 mb-4">دسته والد : </h2>
                        <p id="singleParent"></p>
                    </div>
                </div>
                <div class="w-full flex flex-col sm:flex-row items-center gap-10">
                    <div class="w-full sm:w-1/2 bg-slate-100 rounded-xl px-5 py-2">
                        <h2 class="font-bold text-slate-700 mb-4">توضیحات : </h2>
                        <div id="singleDesc" class="h-30 overflow-auto"></div>
                    </div>
                    <div class="w-full sm:w-1/2 bg-slate-100 rounded-xl px-5 py-2">
                        <h2 class="font-bold text-slate-700 mb-4">زیر دسته ها : </h2>
                        <p id="singleChildren" class="h-30 overflow-auto"></p>
                    </div>
                </div>
                <div class="w-full bg-slate-100 rounded-xl px-5 py-2">
                    <h2 class="font-bold text-slate-700 mb-4">تصویر : </h2>
                    <div id="singleImg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end showSingle popup --}}
{{-- start editForm popup --}}
@error('title')
<div
    class="modal py-5 px-8 rounded-lg shadow-lg bg-red-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
    <span class="font-bold text-sm text-red-500"> {{ $message }} </span>
</div>
@enderror
@error('image')
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
                <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data"
                    class="p-5 flex flex-col gap-10" id="editForm">
                    @csrf
                    <input type="hidden" name="cat_id" id="cat_id">
                    <div class="w-full flex flex-col">
                        <label for="catTitle" class="mb-2 flex flex-row items-center">
                            <span>
                                عنوان دسته بندی:
                                <span class="text-rose-500">*</span>
                            </span>
                        </label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                            name="title" id="catTitle" placeholder="نام دسته را وارد کنید">
                        @error('title')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full flex flex-col mt-5">
                        <label for="cat_desc" class="mb-2">توضیحات دسته بندی:</label>
                        <input type="text"
                            class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                            placeholder="توضیحات" name="description" id="cat_desc">
                    </div>
                    <div class="flex flex-col md:flex-row gap-5 md:gap-10 mt-5">
                        <div class="md:w-1/3 flex flex-col">
                            <label for="parent_id" class="mb-2">دسته والد:</label>
                            <select name="parent_id" id="parent_id" class="bg-[#F9F9F9] py-3 pr-5 rounded-[10px]">
                                <option value="0">بدون والد</option>
                            </select>
                        </div>
                        <div class="md:w-1/3 flex flex-col">
                            <label for="image" class="mb-2">عکس دسته بندی:</label>
                            <input type="file"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                                name="image" id="image">
                            @error('image')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:w-1/3 relative" id="cat_img">
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
{{-- start confirmDelete popup --}}
<div id="confirmDeletePopup"
    class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
    <div class="size-full relative">
        <div class="size-full bg-black/40 absolute top-0 left-0" onclick="deleteCat('close')"></div>
        <div
            class="w-11/12 md:w-1/2 xl:w-1/3 2xl:container 2xl:w-1/3 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
            <div class="relative">
                <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                    onclick="deleteCat('close')">
                    <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                    <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                </button>
            </div>
            <div class="">
                <p>آیا از حذف دسته بندی <span id="confirmDeleteCatName" class="font-bold"> </span> اطمینان دارید؟ </p>
                <div class="flex items-center justify-center gap-5 mt-10">
                    <a id="yes" class="py-2 px-4 bg-green-200 text-green-500 rounded-xl shadow-lg">بله</a>
                    <span class="py-2 px-4 bg-red-200 text-red-500 rounded-xl shadow-lg cursor-pointer"
                        onclick="deleteCat('close')">خیر</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end confirmDelete popup --}}
<script>
    function deleteCat(state, id, catTitle) {
        let confirmDeletePopup = document.getElementById('confirmDeletePopup')
        if (state == 'open') {
            let yes = document.getElementById('yes')
            yes.setAttribute('href', `{{ url('category/delete') }}/${id}`)
            let confirmDeleteCatName = document.getElementById('confirmDeleteCatName')
            confirmDeleteCatName.innerText = catTitle
            confirmDeletePopup.classList.remove('invisible', 'opacity-0')
        }
        if (state == 'close') {
            confirmDeletePopup.classList.add('invisible', 'opacity-0')
        }
    }

    function editForm(state, id) {
        let editFormPopup = document.getElementById('editFormPopup')
        if (state == 'open') {
            let catTitle = document.getElementById('catTitle')
            let cat_desc = document.getElementById('cat_desc')
            let parent_id = document.getElementById('parent_id')
            let cat_img = document.getElementById('cat_img')
            let cat_id = document.getElementById('cat_id')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('category.edit') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'id': id,
                },
                success: function(data) {
                    console.log(data);
                    catTitle.value = data['cat'].title
                    cat_desc.value = data['cat'].description
                    cat_id.value = data['cat'].id
                    cat_img.innerHTML = ''
                    if (data['cat'].image) {
                        let img = document.createElement('img')
                        img.classList = 'w-full h-30'
                        img.setAttribute('src', data['cat'].image)
                        cat_img.appendChild(img)
                        let deleteImgBtn = document.createElement('span')
                        deleteImgBtn.setAttribute('onclick', `removeImg(this, "${data['cat'].image}")`)
                        deleteImgBtn.classList = "absolute top-0 left-0 cursor-pointer"
                        deleteImgBtn.innerText = '❌'
                        cat_img.appendChild(deleteImgBtn)
                    }
                    parent_id.innerHTML = ''
                    let withoutParent = document.createElement('option')
                    withoutParent.value = 0
                    withoutParent.innerText = 'بدون والد'
                    data['cats'].forEach(category => {
                        if (data['cat'].id != category.id) {
                            let option = document.createElement('option')
                            option.value = category.id
                            option.innerText = category.title
                            if (category.id == data['cat'].parent_id) {
                                option.setAttribute('selected', true)
                            }
                            if (data['cat'].parent_id == 0) {
                                withoutParent.setAttribute('selected', true)
                            }
                            parent_id.prepend(withoutParent)
                            parent_id.appendChild(option)
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

    function removeImg(el, file) {
        let index = file.indexOf('categoryImgs')
        let result = file.slice(index)
        let editForm = document.getElementById('editForm')
        let input = document.createElement('input')
        input.setAttribute("type", 'hidden')
        input.setAttribute("name", "removedImg")
        input.setAttribute("value", result)
        editForm.appendChild(input)
        el.parentElement.remove()
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
                url: "{{ route('category.adminShow') }}",
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

    let subCats = document.querySelectorAll('.subCats')
    subCats.forEach((item) => {
        item.addEventListener('click', () => {
            if (item.nextElementSibling.classList.contains('max-h-0')) {
                subCats.forEach((element) => {
                    element.nextElementSibling.classList.remove('max-h-100')
                    element.nextElementSibling.classList.add('max-h-0')
                    element.nextElementSibling.classList.add('opacity-0')
                    element.nextElementSibling.classList.add('invisible')
                })
                item.nextElementSibling.classList.remove('max-h-0')
                item.nextElementSibling.classList.remove('opacity-0')
                item.nextElementSibling.classList.remove('invisible')
                item.nextElementSibling.classList.add('max-h-100')
            } else {
                item.nextElementSibling.classList.remove('max-h-100')
                item.nextElementSibling.classList.add('max-h-0')
                item.nextElementSibling.classList.add('opacity-0')
                item.nextElementSibling.classList.add('invisible')
            }
        })
    })
</script>
<script src="{{ asset('assets/js/checkAll.js') }}"></script>
@endsection