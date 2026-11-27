@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | همه دسته بندی ها')

@section('content')

    @if (session('message'))
        <div
            class="fixed top-5 right-5 z-[100] flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-700 shadow-lg">
            <span class="flex size-7 items-center justify-center rounded-full bg-emerald-100">✓</span>
            {{ session('message') }}
        </div>
    @endif

    <div class="w-full flex flex-col gap-5">

        {{-- Header --}}
        <section
            class="w-full flex flex-col sm:flex-row sm:items-center justify-between gap-4 rounded-xl border border-(--border-dashboard) bg-(--secondary-dashboard) p-4 md:p-5">
            <div class="flex items-center gap-3">
                <div
                    class="size-11 flex items-center justify-center rounded-xl bg-(--primary-dashboard)/10 text-(--primary-dashboard)">
                    <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h7v7H4V4zm9 0h7v7h-7V4zM4 13h7v7H4v-7zm9 0h7v7h-7v-7z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-base md:text-lg font-bold text-(--text-dashboard)">دسته‌بندی محصولات</h2>
                    <span class="text-xs text-(--muted-dashboard)">مدیریت و مشاهده دسته‌بندی‌های فروشگاه</span>
                </div>
            </div>

            @can('access', 'category_create')
                <a href="{{ route('category.create') }}"
                    class="w-full sm:w-fit flex items-center justify-center gap-2 rounded-lg bg-(--info-dashboard) px-4 py-2.5 text-sm font-bold text-(--color-surface-dashboard) transition-all hover:opacity-90">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z" />
                    </svg>
                    دسته‌بندی جدید
                </a>
            @endcan
        </section>

        {{-- Categories Table --}}
        <section class="w-full overflow-hidden rounded-xl border border-(--border-dashboard) bg-(--secondary-dashboard)">

            <form action="{{ route('category.deleteAll') }}" method="post">
                @csrf

                @can('access', 'category_delete')
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-(--border-dashboard) px-4 py-4">
                        <label for="all"
                            class="flex items-center gap-3 cursor-pointer text-sm font-bold text-(--text-dashboard)">
                            <input type="checkbox" id="all" onchange="checkAll()"
                                class="size-4 cursor-pointer accent-(--primary-dashboard)">
                            انتخاب همه دسته‌بندی‌ها
                        </label>

                        <button type="submit" onclick="return confirm('آیا از حذف دسته‌بندی‌های انتخاب شده اطمینان دارید؟')"
                            class="flex items-center justify-center gap-2 rounded-lg bg-red-50 px-4 py-2 text-xs font-bold text-red-600 transition-all hover:bg-red-100">
                            <svg class="size-4" fill="currentColor" viewBox="0 0 448 512">
                                <path
                                    d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z" />
                            </svg>
                            حذف انتخاب‌شده‌ها
                        </button>
                    </div>
                @endcan

                <div class="w-full overflow-x-auto">
                    <table class="w-full min-w-[750px] border-collapse text-sm text-nowrap">
                        <thead>
                            <tr class="bg-(--primary-dashboard)/5 text-xs font-bold text-(--text-dashboard)">
                                <th class="border-b border-(--border-dashboard) px-4 py-4">ردیف</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">تصویر</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">عنوان دسته‌بندی</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">زیر دسته‌ها</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">عملیات</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-(--border-dashboard)">
                            @php
                                $i = 1;
                            @endphp

                            @forelse ($categories as $category)
                                <tr class="text-xs lg:text-sm transition-colors hover:bg-(--primary-dashboard)/5">

                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            @can('access', 'category_delete')
                                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                                    class="check size-4 cursor-pointer accent-(--primary-dashboard)">
                                            @endcan
                                            <span class="font-bold text-(--muted-dashboard)">{{ $i }}</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center">
                                            @if ($category->image)
                                                <img class="size-12 rounded-lg border border-(--border-dashboard) object-cover"
                                                    src="{{ asset('storage/' . $category->image) }}"
                                                    alt="{{ $category->title }}">
                                            @else
                                                <div
                                                    class="flex size-12 items-center justify-center rounded-lg bg-(--primary-dashboard)/5 text-xs text-(--muted-dashboard)">
                                                    بدون تصویر
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-center font-bold text-(--text-dashboard)">
                                        {{ $category->title }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        @if (count($category->children))
                                            <div class="relative flex justify-center">
                                                <button type="button"
                                                    class="subCats flex items-center justify-center gap-2 rounded-lg bg-blue-50 px-4 py-2 font-bold text-blue-600 transition-all hover:bg-blue-100">
                                                    <span>مشاهده</span>
                                                    <svg class="size-3 transition-transform" fill="none"
                                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m6 9 6 6 6-6" />
                                                    </svg>
                                                </button>

                                                <ul
                                                    class="absolute right-1/2 top-full z-30 mt-2 hidden w-52 translate-x-1/2 overflow-hidden rounded-xl border border-(--border-dashboard) bg-(--secondary-dashboard) text-(--text-dashboard) shadow-xl">
                                                    <div
                                                        class="max-h-60 overflow-y-auto divide-y divide-(--border-dashboard)">
                                                        @foreach ($category->children as $child)
                                                            <li
                                                                class="px-4 py-3 text-center text-xs transition-colors hover:bg-(--primary-dashboard)/5">
                                                                {{ $child->title }}
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                </ul>
                                            </div>
                                        @else
                                            <span class="text-(--muted-dashboard)">—</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">

                                            @can('access', 'category_show')
                                                <button type="button" onclick="show('open', {{ $category->id }})"
                                                    class="rounded-lg border border-(--primary-dashboard)/30 bg-(--primary-dashboard)/5 px-3 py-2 text-xs font-bold text-(--primary-dashboard) transition-all hover:bg-(--primary-dashboard)/10">
                                                    مشاهده
                                                </button>
                                            @endcan

                                            @can('access', 'category_edit')
                                                <button type="button" onclick="editForm('open', {{ $category->id }})"
                                                    class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 transition-all hover:bg-blue-100">
                                                    ویرایش
                                                </button>
                                            @endcan

                                            @can('access', 'category_delete')
                                                <button type="button"
                                                    onclick="deleteCat('open', {{ $category->id }}, {{ Js::from($category->title) }})"
                                                    class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-bold text-red-500 transition-all hover:bg-red-100">
                                                    حذف
                                                </button>
                                            @endcan

                                        </div>
                                    </td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-16 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div
                                                class="flex size-14 items-center justify-center rounded-full bg-(--primary-dashboard)/5 text-(--muted-dashboard)">
                                                <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 5h16v14H4zM8 9h8M8 13h5" />
                                                </svg>
                                            </div>
                                            <p class="font-bold text-(--text-dashboard)">دسته‌بندی‌ای ثبت نشده است</p>
                                            <span class="text-xs text-(--muted-dashboard)">در حال حاضر دسته‌بندی‌ای برای
                                                نمایش وجود ندارد.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </form>
        </section>
    </div>

    {{-- Show Popup --}}
    <div id="showSinglePopup" class="fixed inset-0 z-[60] invisible opacity-0 transition-all duration-300">
        <div class="relative flex size-full items-center justify-center p-3 md:p-6">
            <div class="absolute inset-0 bg-slate-950/50" onclick="show('close')"></div>

            <div
                class="relative z-10 max-h-[90dvh] w-full max-w-3xl overflow-hidden rounded-2xl border border-(--border-dashboard) bg-(--secondary-dashboard) shadow-2xl">
                <div class="flex items-center justify-between border-b border-(--border-dashboard) px-5 py-4">
                    <div>
                        <h3 class="font-bold text-(--text-dashboard)">اطلاعات دسته‌بندی</h3>
                        <p class="mt-1 text-xs text-(--muted-dashboard)">مشاهده جزئیات دسته‌بندی انتخاب‌شده</p>
                    </div>
                    <button type="button" onclick="show('close')"
                        class="flex size-9 items-center justify-center rounded-lg bg-(--primary-dashboard)/5 text-(--muted-dashboard) hover:bg-red-50 hover:text-red-500">
                        ✕
                    </button>
                </div>

                <div class="max-h-[75dvh] overflow-y-auto p-5">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-4">
                            <h4 class="mb-3 text-xs font-bold text-(--muted-dashboard)">عنوان دسته‌بندی</h4>
                            <p id="singleTitle" class="font-bold text-(--text-dashboard)"></p>
                        </div>

                        <div class="rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-4">
                            <h4 class="mb-3 text-xs font-bold text-(--muted-dashboard)">دسته والد</h4>
                            <p id="singleParent" class="font-bold text-(--text-dashboard)"></p>
                        </div>

                        <div class="rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-4">
                            <h4 class="mb-3 text-xs font-bold text-(--muted-dashboard)">توضیحات</h4>
                            <div id="singleDesc"
                                class="max-h-32 overflow-y-auto text-sm leading-7 text-(--text-dashboard)"></div>
                        </div>

                        <div class="rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-4">
                            <h4 class="mb-3 text-xs font-bold text-(--muted-dashboard)">زیر دسته‌ها</h4>
                            <div id="singleChildren"
                                class="max-h-32 overflow-y-auto text-sm leading-7 text-(--text-dashboard)"></div>
                        </div>

                        <div
                            class="rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-4 sm:col-span-2">
                            <h4 class="mb-3 text-xs font-bold text-(--muted-dashboard)">تصویر دسته‌بندی</h4>
                            <div id="singleImg" class="flex justify-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Errors --}}
    @error('title')
        <div
            class="fixed right-5 top-5 z-[100] rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-600 shadow-lg">
            {{ $message }}
        </div>
    @enderror

    @error('image')
        <div
            class="fixed right-5 top-5 z-[100] rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-600 shadow-lg">
            {{ $message }}
        </div>
    @enderror

    {{-- Edit Popup --}}
    <div id="editFormPopup" class="fixed inset-0 z-[60] invisible opacity-0 transition-all duration-300">
        <div class="relative flex size-full items-center justify-center p-3 md:p-6">
            <div class="absolute inset-0 bg-slate-950/50" onclick="editForm('close')"></div>

            <div
                class="relative z-10 w-full max-w-3xl overflow-hidden rounded-2xl border border-(--border-dashboard) bg-(--secondary-dashboard) shadow-2xl">
                <div class="flex items-center justify-between border-b border-(--border-dashboard) px-5 py-4">
                    <div>
                        <h3 class="font-bold text-(--text-dashboard)">ویرایش دسته‌بندی</h3>
                        <p class="mt-1 text-xs text-(--muted-dashboard)">اطلاعات دسته‌بندی را ویرایش کنید</p>
                    </div>
                    <button type="button" onclick="editForm('close')"
                        class="flex size-9 items-center justify-center rounded-lg bg-(--primary-dashboard)/5 text-(--muted-dashboard) hover:bg-red-50 hover:text-red-500">
                        ✕
                    </button>
                </div>

                <div id="popupContent" class="max-h-[80dvh] overflow-y-auto">
                    <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data"
                        class="flex flex-col gap-5 p-5" id="editForm">
                        @csrf
                        <input type="hidden" name="cat_id" id="cat_id">

                        <div class="flex flex-col gap-2">
                            <label for="catTitle" class="text-sm font-bold text-(--text-dashboard)">
                                عنوان دسته‌بندی <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="catTitle" placeholder="نام دسته را وارد کنید"
                                class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/10">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="cat_desc" class="text-sm font-bold text-(--text-dashboard)">توضیحات
                                دسته‌بندی</label>
                            <input type="text" name="description" id="cat_desc" placeholder="توضیحات دسته‌بندی"
                                class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/10">
                        </div>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <div class="flex flex-col gap-2">
                                <label for="parent_id" class="text-sm font-bold text-(--text-dashboard)">دسته والد</label>
                                <select name="parent_id" id="parent_id"
                                    class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none focus:border-(--primary-dashboard)">
                                    <option value="0">بدون والد</option>
                                </select>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="image" class="text-sm font-bold text-(--text-dashboard)">تصویر
                                    دسته‌بندی</label>
                                <input type="file" name="image" id="image"
                                    class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-2 text-xs text-(--text-dashboard) file:ml-3 file:rounded-lg file:border-0 file:bg-(--primary-dashboard)/10 file:px-3 file:py-2 file:font-bold file:text-(--primary-dashboard)">
                            </div>
                        </div>

                        <div id="cat_img" class="relative w-fit max-w-full"></div>

                        <div class="flex justify-end border-t border-(--border-dashboard) pt-5">
                            <button type="submit"
                                class="rounded-xl bg-(--info-dashboard) px-8 py-3 text-sm font-bold text-(--color-surface-dashboard) transition-all hover:opacity-90">
                                ثبت تغییرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Popup --}}
    <div id="confirmDeletePopup" class="fixed inset-0 z-[70] invisible opacity-0 transition-all duration-300">
        <div class="relative flex size-full items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-950/50" onclick="deleteCat('close')"></div>

            <div
                class="relative z-10 w-full max-w-md rounded-2xl border border-(--border-dashboard) bg-(--secondary-dashboard) p-6 shadow-2xl">
                <div class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-red-50 text-red-500">
                    <svg class="size-7" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z" />
                    </svg>
                </div>

                <h3 class="text-center font-bold text-(--text-dashboard)">حذف دسته‌بندی</h3>
                <p class="mt-3 text-center text-sm leading-7 text-(--muted-dashboard)">
                    آیا از حذف دسته‌بندی
                    <span id="confirmDeleteCatName" class="font-bold text-red-500"></span>
                    اطمینان دارید؟
                </p>

                <div class="mt-7 flex items-center justify-center gap-3">
                    <a id="yes"
                        class="rounded-xl bg-red-500 px-8 py-2.5 text-sm font-bold text-white transition-all hover:bg-red-600">
                        بله، حذف شود
                    </a>
                    <button type="button" onclick="deleteCat('close')"
                        class="rounded-xl border border-(--border-dashboard) px-8 py-2.5 text-sm font-bold text-(--text-dashboard) transition-all hover:bg-(--primary-dashboard)/5">
                        انصراف
                    </button>
                </div>
            </div>
        </div>
    </div>

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
                        catTitle.value = data['cat'].title
                        cat_desc.value = data['cat'].description
                        cat_id.value = data['cat'].id

                        cat_img.innerHTML = ''

                        if (data['cat'].image) {
                            let img = document.createElement('img')
                            img.classList = 'size-32 rounded-xl border border-(--border-dashboard) object-cover'
                            img.setAttribute('src', data['cat'].image)
                            cat_img.appendChild(img)

                            let deleteImgBtn = document.createElement('button')
                            deleteImgBtn.setAttribute('type', 'button')
                            deleteImgBtn.setAttribute('onclick',
                                `removeImg(this, ${JSON.stringify(data['cat'].image)})`)
                            deleteImgBtn.classList =
                                "absolute -top-2 -right-2 flex size-7 items-center justify-center rounded-full bg-red-500 text-white shadow-lg"
                            deleteImgBtn.innerText = '×'
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

                                if (data['cat'].parent_id == 0 || data['cat'].parent_id == null) {
                                    withoutParent.setAttribute('selected', true)
                                }

                                parent_id.appendChild(option)
                            }
                        })

                        parent_id.prepend(withoutParent)
                    },
                    error: function() {
                        alert('خطا در دریافت اطلاعات دسته‌بندی')
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
            let oldInput = editForm.querySelector('input[name="removedImg"]')

            if (oldInput) {
                oldInput.remove()
            }

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
                        document.getElementById('singleDesc').innerText = data.description ||
                            'توضیحاتی ثبت نشده است'

                        if (data.parent) {
                            document.getElementById('singleParent').innerText = data.parent.title
                        } else {
                            document.getElementById('singleParent').innerText = 'بدون والد'
                        }

                        document.getElementById('singleChildren').innerHTML = data.subCats ||
                            'زیر دسته‌ای ثبت نشده است'

                        let singleImg = document.getElementById('singleImg')
                        singleImg.innerHTML = ''

                        if (data.image) {
                            let img = document.createElement('img')
                            img.classList = 'max-h-64 max-w-full rounded-xl object-contain'
                            img.setAttribute('src', data.image)
                            singleImg.appendChild(img)
                        } else {
                            singleImg.innerText = 'تصویری ثبت نشده است'
                        }
                    },
                    error: function() {
                        alert('خطا در دریافت اطلاعات دسته‌بندی')
                    }
                })

                showSinglePopup.classList.remove('opacity-0', 'invisible')
            }

            if (state == 'close') {
                showSinglePopup.classList.add('opacity-0', 'invisible')
            }
        }

        // Subcategories dropdown
        document.querySelectorAll('.subCats').forEach((item) => {
            item.addEventListener('click', () => {
                let menu = item.nextElementSibling
                let isOpen = !menu.classList.contains('hidden')

                document.querySelectorAll('.subCats').forEach((element) => {
                    element.nextElementSibling.classList.add('hidden')
                    element.querySelector('svg')?.classList.remove('rotate-180')
                })

                if (!isOpen) {
                    menu.classList.remove('hidden')
                    item.querySelector('svg')?.classList.add('rotate-180')
                }
            })
        })

        // Close popups with Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                show('close')
                editForm('close')
                deleteCat('close')
            }
        })
    </script>

    <script src="{{ asset('assets/js/checkAll.js') }}"></script>

@endsection
