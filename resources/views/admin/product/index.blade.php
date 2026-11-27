@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | همه محصولات')

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
                    <svg class="size-6" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 7h16M4 7l2-3h12l2 3M5 7v12h14V7M9 11h6" />
                    </svg>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="text-base md:text-lg font-bold text-(--text-dashboard)">لیست محصولات</h2>
                    <span class="text-xs text-(--muted-dashboard)">مدیریت و مشاهده محصولات فروشگاه</span>
                </div>
            </div>

            @can('access', 'product_create')
                <a href="{{ route('product.create') }}"
                    class="w-full sm:w-fit flex items-center justify-center gap-2 rounded-lg bg-(--info-dashboard) px-4 py-2.5 text-sm font-bold text-(--color-surface-dashboard) transition-all hover:opacity-90">
                    <svg class="size-4" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M248 72c0-13.3-10.7-24-24-24s-24 10.7-24 24V232H40c-13.3 0-24 10.7-24 24s10.7 24 24 24H200V440c0 13.3 10.7 24 24 24s24-10.7 24-24V280H408c13.3 0 24-10.7 24-24s-10.7-24-24-24H248V72z" />
                    </svg>
                    محصول جدید
                </a>
            @endcan
        </section>

        {{-- Products Table --}}
        <section class="w-full overflow-hidden rounded-xl border border-(--border-dashboard) bg-(--secondary-dashboard)">

            <form action="{{ route('product.deleteAll') }}" method="post">
                @csrf

                @can('access', 'product_delete')
                    <div
                        class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-(--border-dashboard) px-4 py-4">
                        <label for="all"
                            class="flex items-center gap-3 cursor-pointer text-sm font-medium text-(--text-dashboard)">
                            <input type="checkbox" id="all" onchange="checkAll()"
                                class="size-4 cursor-pointer accent-(--primary-dashboard)">
                            انتخاب همه محصولات
                        </label>

                        <button type="submit" onclick="return confirm('آیا از حذف محصولات انتخاب شده اطمینان دارید؟')"
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
                    <table class="w-full min-w-[850px] border-collapse text-sm text-nowrap">
                        <thead>
                            <tr class="bg-(--primary-dashboard)/5 text-xs font-bold text-(--text-dashboard)">
                                <th class="border-b border-(--border-dashboard) px-4 py-4">ردیف</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">عنوان محصول</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">تصویر</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">خلاصه</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">دسته‌بندی</th>
                                <th class="border-b border-(--border-dashboard) px-4 py-4">عملیات</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-(--border-dashboard)">
                            @php
                                $i = 1;
                            @endphp

                            @forelse ($products as $product)
                                <tr class="text-xs lg:text-sm transition-colors hover:bg-(--primary-dashboard)/5">

                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center gap-3">
                                            @can('access', 'product_delete')
                                                <input type="checkbox" name="products[]" value="{{ $product->id }}"
                                                    class="check size-4 cursor-pointer accent-(--primary-dashboard)">
                                            @endcan
                                            <span class="font-medium text-(--muted-dashboard)">{{ $i }}</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <span class="font-bold text-(--text-dashboard)">
                                            {{ $product->title }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center">
                                            @if ($product->mainImg)
                                                <img class="size-14 rounded-xl border border-(--border-dashboard) object-cover"
                                                    src="{{ asset('storage/' . $product->mainImg) }}"
                                                    alt="{{ $product->title }}">
                                            @else
                                                <div
                                                    class="flex size-14 items-center justify-center rounded-xl bg-(--primary-dashboard)/5 text-xs text-(--muted-dashboard)">
                                                    بدون تصویر
                                                </div>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div
                                            class="mx-auto max-w-64 whitespace-normal text-center text-xs leading-6 text-(--muted-dashboard)">
                                            {{ $product->summary ?: 'خلاصه‌ای ثبت نشده است' }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex max-w-64 flex-wrap items-center justify-center gap-1.5">
                                            @forelse ($product['categories'] as $category)
                                                <span
                                                    class="rounded-lg bg-(--primary-dashboard)/5 px-2.5 py-1.5 text-xs font-medium text-(--text-dashboard)">
                                                    {{ $category['title'] }}
                                                </span>
                                            @empty
                                                <span class="text-xs text-(--muted-dashboard)">بدون دسته‌بندی</span>
                                            @endforelse
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">

                                            @can('access', 'product_edit')
                                                <button type="button" onclick="editForm('open', {{ $product->id }})"
                                                    class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-bold text-blue-600 transition-all hover:bg-blue-100">
                                                    ویرایش
                                                </button>
                                            @endcan

                                            @can('access', 'product_delete')
                                                <button type="button"
                                                    onclick="deleteProduct('open', {{ $product->id }}, {{ Js::from($product->title) }})"
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
                                    <td colspan="6" class="px-4 py-16 text-center">
                                        <div class="flex flex-col items-center gap-3">
                                            <div
                                                class="flex size-14 items-center justify-center rounded-full bg-(--primary-dashboard)/5 text-(--muted-dashboard)">
                                                <svg class="size-7" fill="none" stroke="currentColor" stroke-width="1.5"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4 7h16M4 7l2-3h12l2 3M5 7v12h14V7" />
                                                </svg>
                                            </div>
                                            <p class="font-bold text-(--text-dashboard)">محصولی ثبت نشده است</p>
                                            <span class="text-xs text-(--muted-dashboard)">در حال حاضر محصولی برای نمایش
                                                وجود ندارد.</span>
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

    {{-- Delete Popup --}}
    <div id="confirmDeletePopup" class="fixed inset-0 z-[70] invisible opacity-0 transition-all duration-300">
        <div class="relative flex size-full items-center justify-center p-4">
            <div class="absolute inset-0 bg-slate-950/50" onclick="deleteProduct('close')"></div>

            <div
                class="relative z-10 w-full max-w-md rounded-2xl border border-(--border-dashboard) bg-(--secondary-dashboard) p-6 shadow-2xl">

                <div class="mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-red-50 text-red-500">
                    <svg class="size-7" fill="currentColor" viewBox="0 0 448 512">
                        <path
                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80z" />
                    </svg>
                </div>

                <h3 class="text-center font-bold text-(--text-dashboard)">حذف محصول</h3>

                <p class="mt-3 text-center text-sm leading-7 text-(--muted-dashboard)">
                    آیا از حذف محصول
                    <span id="confirmDeleteProName" class="font-bold text-red-500"></span>
                    اطمینان دارید؟
                </p>

                <div class="mt-7 flex items-center justify-center gap-3">
                    <a id="yes"
                        class="rounded-xl bg-red-500 px-8 py-2.5 text-sm font-bold text-white transition-all hover:bg-red-600">
                        بله، حذف شود
                    </a>

                    <button type="button" onclick="deleteProduct('close')"
                        class="rounded-xl border border-(--border-dashboard) px-8 py-2.5 text-sm font-bold text-(--text-dashboard) transition-all hover:bg-(--primary-dashboard)/5">
                        انصراف
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Validation Errors --}}
    @error('title')
        <div
            class="fixed right-5 top-5 z-[100] rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-600 shadow-lg">
            {{ $message }}
        </div>
    @enderror

    @error('category_ids')
        <div
            class="fixed right-5 top-24 z-[100] rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-bold text-red-600 shadow-lg">
            {{ $message }}
        </div>
    @enderror

    {{-- Edit Popup --}}
    <div id="editFormPopup" class="fixed inset-0 z-[60] invisible opacity-0 transition-all duration-300">
        <div class="relative flex size-full items-center justify-center p-3 md:p-6">

            <div class="absolute inset-0 bg-slate-950/50" onclick="editForm('close')"></div>

            <div
                class="relative z-10 flex max-h-[92dvh] w-full max-w-6xl flex-col overflow-hidden rounded-2xl border border-(--border-dashboard) bg-(--secondary-dashboard) shadow-2xl">

                <div class="flex shrink-0 items-center justify-between border-b border-(--border-dashboard) px-5 py-4">
                    <div>
                        <h3 class="font-bold text-(--text-dashboard)">ویرایش محصول</h3>
                        <p class="mt-1 text-xs text-(--muted-dashboard)">اطلاعات و مشخصات محصول را ویرایش کنید</p>
                    </div>

                    <button type="button" onclick="editForm('close')"
                        class="flex size-9 items-center justify-center rounded-lg bg-(--primary-dashboard)/5 text-(--muted-dashboard) transition-all hover:bg-red-50 hover:text-red-500">
                        ✕
                    </button>
                </div>

                <div id="popupContent" class="overflow-y-auto">
                    <form action="{{ route('product.update') }}" method="post" id="editForm"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="product_id" id="product_id">

                        <div class="grid grid-cols-1 gap-6 p-5 lg:grid-cols-3">

                            {{-- Main Information --}}
                            <div class="flex flex-col gap-5 lg:col-span-2">

                                <div class="flex flex-col gap-2">
                                    <label for="title" class="text-sm font-bold text-(--text-dashboard)">
                                        نام محصول <span class="text-red-500">*</span>
                                    </label>

                                    <input type="text" name="title" id="title"
                                        placeholder="نام محصول را وارد کنید"
                                        class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/10">
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label for="description" class="text-sm font-bold text-(--text-dashboard)">توضیحات
                                        محصول</label>

                                    <textarea name="description" id="description" rows="4" placeholder="توضیحات محصول را وارد کنید"
                                        class="w-full resize-y rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/10"></textarea>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label for="summary" class="text-sm font-bold text-(--text-dashboard)">خلاصه
                                        محصول</label>

                                    <textarea name="summary" id="summary" rows="3" placeholder="خلاصه محصول را وارد کنید"
                                        class="w-full resize-y rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard) focus:ring-2 focus:ring-(--primary-dashboard)/10"></textarea>
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label for="category_ids" class="text-sm font-bold text-(--text-dashboard)">
                                        دسته‌بندی‌ها <span class="text-red-500">*</span>
                                    </label>

                                    <select name="category_ids[]" id="category_ids" multiple size="4"
                                        class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard)">
                                    </select>

                                    <span class="text-xs text-(--muted-dashboard)">برای انتخاب چند دسته‌بندی، کلید Ctrl را
                                        نگه دارید.</span>
                                </div>

                                {{-- Attributes --}}
                                <div class="flex flex-col gap-4 rounded-xl border border-(--border-dashboard) p-4">
                                    <div class="flex items-center justify-between">
                                        <h4 class="text-sm font-bold text-(--text-dashboard)">ویژگی‌های محصول</h4>
                                        <span
                                            class="rounded-lg bg-(--primary-dashboard)/5 px-3 py-1 text-xs text-(--muted-dashboard)">مشخصات</span>
                                    </div>

                                    <div id="attributesContainer" class="flex flex-col gap-3"></div>

                                    <button type="button" onclick="addAttribute(this,'edit')"
                                        class="mx-auto flex w-fit items-center justify-center gap-2 rounded-lg bg-(--primary-dashboard)/10 px-5 py-2.5 text-xs font-bold text-(--primary-dashboard) transition-all hover:bg-(--primary-dashboard)/20">
                                        <span class="text-base">+</span>
                                        افزودن ویژگی
                                    </button>
                                </div>
                            </div>

                            {{-- Sidebar Information --}}
                            <div class="flex flex-col gap-5">

                                {{-- Home and Count --}}
                                <div class="flex flex-col gap-5 rounded-xl border border-(--border-dashboard) p-4">

                                    <div class="flex items-center justify-between gap-3">
                                        <label for="show_in_home" class="text-sm font-bold text-(--text-dashboard)">
                                            نمایش در صفحه اصلی
                                        </label>

                                        <label for="show_in_home"
                                            class="relative flex h-7 w-12 cursor-pointer items-center">
                                            <input type="checkbox" name="show_in_home" value="1" id="show_in_home"
                                                class="peer sr-only">

                                            <span
                                                class="absolute inset-0 rounded-full bg-gray-300 transition-all peer-checked:bg-(--primary-dashboard)"></span>

                                            <span
                                                class="absolute left-1 size-5 rounded-full bg-white shadow-md transition-all peer-checked:translate-x-5"></span>
                                        </label>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <label for="count" class="text-sm font-bold text-(--text-dashboard)">تعداد
                                            موجودی</label>

                                        <div class="flex items-center gap-2">
                                            <button type="button"
                                                class="flex size-9 items-center justify-center rounded-lg bg-(--primary-dashboard) text-white transition-all hover:opacity-80"
                                                onclick="calculate('+')">
                                                +
                                            </button>

                                            <input type="number" min="1" name="count" id="count"
                                                dir="ltr"
                                                class="min-w-0 flex-1 rounded-lg border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-3 py-2 text-center text-sm text-(--text-dashboard) outline-none focus:border-(--primary-dashboard)">

                                            <button type="button"
                                                class="flex size-9 items-center justify-center rounded-lg bg-(--primary-dashboard) text-white transition-all hover:opacity-80"
                                                onclick="calculate('-')">
                                                −
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Main Image --}}
                                <div class="flex flex-col gap-3 rounded-xl border border-(--border-dashboard) p-4">
                                    <label for="mainImage" class="text-sm font-bold text-(--text-dashboard)">تصویر اصلی
                                        محصول</label>

                                    <input type="file" name="mainImage" id="mainImage" accept="image/*"
                                        class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-2 text-xs text-(--text-dashboard) file:ml-2 file:rounded-lg file:border-0 file:bg-(--primary-dashboard)/10 file:px-3 file:py-2 file:font-bold file:text-(--primary-dashboard)">

                                    <div id="mainImgContainer" class="relative flex flex-wrap items-center gap-3"></div>
                                </div>

                                {{-- Gallery --}}
                                <div class="flex flex-col gap-3 rounded-xl border border-(--border-dashboard) p-4">
                                    <label for="gallery" class="text-sm font-bold text-(--text-dashboard)">گالری
                                        تصاویر</label>

                                    <input type="file" name="gallery[]" id="gallery" multiple accept="image/*"
                                        class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-2 text-xs text-(--text-dashboard) file:ml-2 file:rounded-lg file:border-0 file:bg-(--primary-dashboard)/10 file:px-3 file:py-2 file:font-bold file:text-(--primary-dashboard)">

                                    <span class="text-xs leading-5 text-rose-500">
                                        حجم کل فایل‌ها نباید بیشتر از 500 کیلوبایت باشد.
                                    </span>

                                    <div id="galleryContainer" class="flex items-center gap-3 overflow-x-auto pb-2"></div>
                                </div>

                                {{-- Prices --}}
                                <div class="flex flex-col gap-4 rounded-xl border border-(--border-dashboard) p-4">

                                    <div class="flex flex-col gap-2">
                                        <label for="primary_price"
                                            class="flex items-center gap-2 text-sm font-bold text-(--text-dashboard)">
                                            قیمت اصلی
                                            <div class="relative group">
                                                <span
                                                    class="flex size-5 cursor-pointer items-center justify-center rounded-full border border-(--border-dashboard) bg-(--primary-dashboard)/5 text-xs text-(--muted-dashboard)">؟</span>

                                                <span
                                                    class="invisible absolute bottom-7 left-0 z-30 w-56 rounded-xl border border-(--border-dashboard) bg-(--secondary-dashboard) p-3 text-center text-xs leading-6 text-(--text-dashboard) opacity-0 shadow-xl transition-all group-hover:visible group-hover:opacity-100">
                                                    در صورتی که مایلید برای استعلام قیمت تماس گرفته شود این فیلد را خالی
                                                    بگذارید.
                                                </span>
                                            </div>
                                        </label>

                                        <input type="number" name="primary_price" id="primary_price"
                                            class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard)">
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <label for="secondary_price"
                                            class="text-sm font-bold text-(--text-dashboard)">قیمت ویژه</label>

                                        <input type="number" name="secondary_price" id="secondary_price"
                                            class="w-full rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 px-4 py-3 text-sm text-(--text-dashboard) outline-none transition-all focus:border-(--primary-dashboard)">
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Submit --}}
                        <div
                            class="sticky bottom-0 flex justify-end border-t border-(--border-dashboard) bg-(--secondary-dashboard) px-5 py-4">
                            <button type="submit"
                                class="rounded-xl bg-(--info-dashboard) px-10 py-3 text-sm font-bold text-(--color-surface-dashboard) transition-all hover:opacity-90">
                                ثبت تغییرات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
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

                // Reset previous product data
                product_id.value = ''
                title.value = ''
                description.value = ''
                summary.value = ''
                show_in_home.checked = false
                count.value = ''
                primary_price.value = ''
                secondary_price.value = ''
                mainImgContainer.innerHTML = ''
                galleryContainer.innerHTML = ''
                category_ids.innerHTML = ''
                attributesContainer.innerHTML = ''

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
                        description.value = data['product'].description || ''
                        summary.value = data['product'].summary || ''
                        count.value = data['product'].count
                        primary_price.value = data['product'].primary_price
                        secondary_price.value = data['product'].secondary_price

                        // Home page status
                        show_in_home.checked = Boolean(data.product.show_in_home)

                        // Images
                        data['product'].media.forEach(media => {
                            if (media.is_main) {
                                let div = document.createElement('div')
                                div.classList = 'relative'

                                let img = document.createElement('img')
                                img.src = media.media_path
                                img.className =
                                    'size-24 rounded-xl border border-(--border-dashboard) object-cover'

                                let removeBtn = document.createElement('button')
                                removeBtn.type = 'button'
                                removeBtn.className =
                                    'absolute -top-2 -right-2 flex size-7 items-center justify-center rounded-full bg-red-500 text-white shadow-lg'
                                removeBtn.innerText = '×'
                                removeBtn.onclick = function() {
                                    removeImg(removeBtn, media.media_path, 'mainImg')
                                }

                                div.appendChild(img)
                                div.appendChild(removeBtn)
                                mainImgContainer.appendChild(div)

                            } else {
                                let div = document.createElement('div')
                                div.classList = 'relative shrink-0'

                                let img = document.createElement('img')
                                img.src = media.media_path
                                img.className =
                                    'size-24 rounded-xl border border-(--border-dashboard) object-cover'

                                let removeBtn = document.createElement('button')
                                removeBtn.type = 'button'
                                removeBtn.className =
                                    'absolute -top-2 -right-2 flex size-7 items-center justify-center rounded-full bg-red-500 text-white shadow-lg'
                                removeBtn.innerText = '×'
                                removeBtn.onclick = function() {
                                    removeImg(removeBtn, media.media_path, 'gallery')
                                }

                                div.appendChild(img)
                                div.appendChild(removeBtn)
                                galleryContainer.appendChild(div)
                            }
                        })

                        // Categories
                        data['cats'].forEach(category => {
                            let option = document.createElement('option')
                            option.value = category.id
                            option.innerText = category.title

                            if (data.catIds.includes(category.id)) {
                                option.selected = true
                            }

                            category_ids.appendChild(option)
                        })

                        // Attributes
                        data['product'].attributes.forEach(attribute => {
                            let div = document.createElement('div')

                            div.className =
                                'flex flex-col sm:flex-row items-center gap-3 rounded-xl border border-(--border-dashboard) bg-(--primary-dashboard)/5 p-3'

                            let fields = document.createElement('div')
                            fields.className = 'flex w-full flex-col sm:flex-row gap-3'

                            let keyInput = document.createElement('input')
                            keyInput.type = 'text'
                            keyInput.name = `attributes[oldAttrs][attribute_key][${attribute.id}]`
                            keyInput.value = attribute.attribute_key
                            keyInput.placeholder = 'ویژگی'
                            keyInput.required = true
                            keyInput.className =
                                'w-full min-w-0 rounded-lg border border-(--border-dashboard) bg-(--secondary-dashboard) px-3 py-3 text-sm text-(--text-dashboard) outline-none focus:border-(--primary-dashboard)'

                            let valueInput = document.createElement('input')
                            valueInput.type = 'text'
                            valueInput.name = `attributes[oldAttrs][attribute_value][${attribute.id}]`
                            valueInput.value = attribute.attribute_value
                            valueInput.placeholder = 'مقدار ویژگی'
                            valueInput.required = true
                            valueInput.className =
                                'w-full min-w-0 rounded-lg border border-(--border-dashboard) bg-(--secondary-dashboard) px-3 py-3 text-sm text-(--text-dashboard) outline-none focus:border-(--primary-dashboard)'

                            fields.appendChild(keyInput)
                            fields.appendChild(valueInput)

                            let removeBtn = document.createElement('button')
                            removeBtn.type = 'button'
                            removeBtn.className =
                                'shrink-0 rounded-lg bg-red-50 px-4 py-2.5 text-xs font-bold text-red-500 transition-all hover:bg-red-100'
                            removeBtn.innerText = 'حذف'
                            removeBtn.onclick = function() {
                                remove(removeBtn, attribute.id)
                            }

                            div.appendChild(fields)
                            div.appendChild(removeBtn)

                            attributesContainer.appendChild(div)
                        })
                    },
                    error: function() {
                        alert('خطا در دریافت اطلاعات محصول')
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

        // Close popups with Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                editForm('close')
                deleteProduct('close')
            }
        })
    </script>

    <script src="{{ url('assets/js/attribute.js') }}"></script>
    <script src="{{ asset('assets/js/checkAll.js') }}"></script>

@endsection
