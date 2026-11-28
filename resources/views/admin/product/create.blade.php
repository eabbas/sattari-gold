@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | ایجاد محصول')

@section('content')

    @if (session('message'))
        <div
            class="fixed top-5 right-5 z-[100] flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-700 shadow-lg">
            <svg class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="w-full min-h-full pb-10" dir="rtl">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800">
                    ایجاد محصول جدید
                </h2>
                <p class="text-sm text-slate-500 mt-2">
                    اطلاعات، تصاویر و تنظیمات محصول جدید را وارد کنید.
                </p>
            </div>

            <a href="{{ route('product.adminIndex') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-all text-sm font-bold">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                بازگشت به محصولات
            </a>
        </div>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

                <div class="lg:col-span-2 flex flex-col gap-5">

                    {{-- اطلاعات محصول --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M3 7h18v13H3z" stroke-linejoin="round" />
                                    <path d="M3 7l2-4h14l2 4M8 11h8M8 15h5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">اطلاعات محصول</h3>
                                <p class="text-xs text-slate-500 mt-1">مشخصات اصلی محصول را وارد کنید.</p>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col gap-6">

                            <div class="flex flex-col gap-2">
                                <label for="title" class="text-sm font-bold text-slate-700">
                                    نام محصول
                                    <span class="text-rose-500">*</span>
                                </label>

                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    placeholder="نام محصول را وارد کنید"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all placeholder:text-slate-400 focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">

                                @error('title')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="description" class="text-sm font-bold text-slate-700">
                                    توضیحات محصول
                                </label>

                                <textarea name="description" id="description" rows="4" placeholder="توضیحات کامل محصول را وارد کنید..."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all placeholder:text-slate-400 focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="summary" class="text-sm font-bold text-slate-700">
                                    خلاصه محصول
                                </label>

                                <textarea name="summary" id="summary" rows="3" placeholder="خلاصه‌ای کوتاه از محصول..."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all placeholder:text-slate-400 focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">{{ old('summary') }}</textarea>

                                @error('summary')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="category_ids" class="text-sm font-bold text-slate-700">
                                    دسته‌بندی محصول
                                    <span class="text-rose-500">*</span>
                                </label>

                                <select name="category_ids[]" id="category_ids" multiple size="5"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(in_array($category->id, old('category_ids', [])))>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach

                                </select>

                                <span class="text-xs text-slate-400">
                                    برای انتخاب چند دسته‌بندی، کلید Ctrl را نگه دارید.
                                </span>

                                @error('category_ids')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- ویژگی های محصول --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div
                                class="w-11 h-11 flex items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">
                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path d="M12 3v18M3 12h18" stroke-linecap="round" />
                                    <path d="M5 5h4v4H5zM15 15h4v4h-4z" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">ویژگی‌های محصول</h3>
                                <p class="text-xs text-slate-500 mt-1">ویژگی‌های اختصاصی محصول را تعریف کنید.</p>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col gap-5">
                            <div id="attributesContainer" class="w-full flex flex-col gap-4"></div>

                            <button type="button" onclick="addAttribute(this, 'create')"
                                class="w-full sm:w-fit mx-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-[#425A8B]/20 bg-[#425A8B]/5 text-[#425A8B] hover:bg-[#425A8B] hover:text-white transition-all text-sm font-bold">
                                <span class="text-xl leading-none">+</span>
                                افزودن ویژگی
                            </button>
                        </div>
                    </div>

                    {{-- سوالات متداول --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-sky-100 text-sky-600">
                                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9" />
                                    <path d="M9.5 9a2.5 2.5 0 0 1 5 0c0 2-2.5 2-2.5 4" stroke-linecap="round" />
                                    <path d="M12 16.5v.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">سؤالات متداول</h3>
                                <p class="text-xs text-slate-500 mt-1">سؤالات و پاسخ‌های مربوط به محصول را اضافه کنید.</p>
                            </div>
                        </div>

                        <div class="p-6 flex flex-col gap-5">
                            <div id="faqsContainer" class="w-full flex flex-col gap-4"></div>

                            <button type="button" onclick="addFaq(this)"
                                class="w-full sm:w-fit mx-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-sky-200 bg-sky-50 text-sky-700 hover:bg-sky-600 hover:text-white transition-all text-sm font-bold">
                                <span class="text-xl leading-none">+</span>
                                افزودن سؤال
                            </button>
                        </div>
                    </div>

                </div>

                {{-- ستون تنظیمات --}}
                <div class="flex flex-col gap-5">

                    {{-- تنظیمات محصول --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <circle cx="12" cy="12" r="3" />
                                    <path
                                        d="m19.4 15 .1.1 1.4 1.1-1.4 2.4-1.7-.7a8 8 0 0 1-1.5.9l-.3 1.8h-2.8l-.3-1.8a8 8 0 0 1-1.5-.9l-1.7.7-1.4-2.4 1.4-1.1a7 7 0 0 1 0-1.8l-1.4-1.1 1.4-2.4 1.7.7a8 8 0 0 1 1.5-.9l.3-1.8h2.8l.3 1.8a8 8 0 0 1 1.5.9l1.7-.7 1.4 2.4-1.4 1.1a7 7 0 0 1 0 1.8Z"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">تنظیمات محصول</h3>
                                <p class="text-xs text-slate-500 mt-1">وضعیت و موجودی محصول</p>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col gap-6">

                            <div class="flex items-center justify-between gap-3">
                                <div>
                                    <label for="show_in_home" class="text-sm font-bold text-slate-700 cursor-pointer">
                                        نمایش در صفحه اصلی
                                    </label>
                                    <p class="text-xs text-slate-400 mt-1">نمایش محصول در صفحه خانه</p>
                                </div>

                                <label for="show_in_home" class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="show_in_home" value="1" id="show_in_home"
                                        class="peer sr-only" @checked(old('show_in_home'))>

                                    <span
                                        class="w-12 h-6 rounded-full bg-slate-300 peer-checked:bg-[#425A8B] transition-all"></span>
                                    <span
                                        class="absolute right-1 top-1 size-4 rounded-full bg-white shadow-sm transition-all peer-checked:-translate-x-6"></span>
                                </label>
                            </div>

                            <div class="border-t border-slate-100"></div>

                            <div class="flex flex-col gap-2">
                                <label for="count" class="text-sm font-bold text-slate-700">
                                    تعداد محصول
                                </label>

                                <div
                                    class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 p-2">

                                    <button type="button" onclick="calculate('+')"
                                        class="size-9 flex items-center justify-center rounded-lg bg-[#425A8B] hover:bg-[#344A76] text-white transition-all text-xl font-bold">
                                        +
                                    </button>

                                    <input type="number" min="1" value="{{ old('count', 1) }}" name="count"
                                        id="count" dir="ltr"
                                        class="w-20 bg-transparent text-center text-sm font-bold text-slate-700 outline-none">

                                    <button type="button" onclick="calculate('-')"
                                        class="size-9 flex items-center justify-center rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 transition-all text-xl font-bold">
                                        −
                                    </button>

                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- تصاویر محصول --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-sky-100 text-sky-600">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <rect x="3" y="3" width="18" height="18" rx="3" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <path d="m21 15-5-5L5 21" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">تصاویر محصول</h3>
                                <p class="text-xs text-slate-500 mt-1">تصاویر اصلی و گالری محصول</p>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col gap-6">

                            <div class="flex flex-col gap-2">
                                <label for="mainImage" class="text-sm font-bold text-slate-700">
                                    تصویر اصلی
                                </label>

                                <label for="mainImage"
                                    class="flex items-center gap-3 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4 cursor-pointer hover:border-[#425A8B] hover:bg-slate-100 transition-all">
                                    <span
                                        class="size-10 shrink-0 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-500">
                                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8">
                                            <path d="M12 16V4m-4 4 4-4 4 4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <span class="flex flex-col min-w-0">
                                        <span class="text-sm font-bold text-slate-700">انتخاب تصویر اصلی</span>
                                        <span id="mainImageName" class="text-xs text-slate-400 mt-1 truncate">فایلی انتخاب
                                            نشده است</span>
                                    </span>
                                    <input type="file" name="mainImage" id="mainImage" accept="image/*"
                                        class="hidden">
                                </label>

                                @error('mainImage')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="border-t border-slate-100"></div>

                            <div class="flex flex-col gap-2">
                                <label for="gallery" class="text-sm font-bold text-slate-700">
                                    گالری تصاویر
                                </label>

                                <label for="gallery"
                                    class="flex items-center gap-3 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4 cursor-pointer hover:border-[#425A8B] hover:bg-slate-100 transition-all">
                                    <span
                                        class="size-10 shrink-0 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-500">
                                        <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.8">
                                            <path d="M12 16V4m-4 4 4-4 4 4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                    <span class="flex flex-col min-w-0">
                                        <span class="text-sm font-bold text-slate-700">انتخاب تصاویر</span>
                                        <span id="galleryName" class="text-xs text-slate-400 mt-1">فایلی انتخاب نشده
                                            است</span>
                                    </span>
                                    <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                                        class="hidden">
                                </label>

                                <span class="text-xs text-amber-600">
                                    <span class="font-bold">!</span>
                                    حجم کل فایل‌ها نباید بیشتر از ۵۰۰ کیلوبایت باشد.
                                </span>

                                @error('gallery')
                                    <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- قیمت گذاری --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                        <div class="flex items-center gap-3 px-5 py-5 border-b border-slate-100 bg-slate-50/70">
                            <div
                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                                <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9" />
                                    <path
                                        d="M15 8.5c-.7-.7-1.7-1-3-1-1.7 0-2.8.8-2.8 2s1.1 2 2.8 2 2.8.8 2.8 2-1.1 2-2.8 2c-1.3 0-2.3-.3-3-1"
                                        stroke-linecap="round" />
                                    <path d="M12 6v12" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-800">قیمت‌گذاری</h3>
                                <p class="text-xs text-slate-500 mt-1">قیمت اصلی و ویژه محصول</p>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col gap-5">

                            <div class="flex flex-col gap-2">
                                <label for="primary_price"
                                    class="flex items-center gap-2 text-sm font-bold text-slate-700">
                                    قیمت اصلی

                                    <div class="relative group">
                                        <span
                                            class="size-5 flex items-center justify-center rounded-full bg-slate-100 border border-slate-300 text-xs text-slate-500 cursor-help">
                                            ?
                                        </span>

                                        <span
                                            class="w-64 p-3 text-center rounded-xl text-xs leading-6 absolute bottom-7 right-0 bg-slate-800 text-white invisible opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100 z-20 shadow-lg">
                                            در صورتی که مایلید برای استعلام قیمت تماس گرفته شود، این فیلد را خالی بگذارید.
                                        </span>
                                    </div>
                                </label>

                                <input type="number" name="primary_price" id="primary_price"
                                    value="{{ old('primary_price') }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="secondary_price" class="text-sm font-bold text-slate-700">
                                    قیمت ویژه
                                </label>

                                <input type="number" name="secondary_price" id="secondary_price"
                                    value="{{ old('secondary_price') }}"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">
                            </div>

                        </div>
                    </div>

                    {{-- دکمه ثبت --}}
                    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-5 flex flex-col gap-3">

                        <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-[#425A8B] hover:bg-[#344A76] text-white transition-all shadow-sm text-sm font-bold">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <path d="m5 12 4 4L19 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            ثبت محصول
                        </button>

                        <a href="{{ route('product.adminIndex') }}"
                            class="w-full text-center px-6 py-3 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all text-sm font-bold">
                            انصراف
                        </a>

                    </div>

                </div>

            </div>
        </form>

    </div>

    <script src="{{ url('assets/js/attribute.js') }}"></script>

    <script>
        document.getElementById('mainImage').addEventListener('change', function() {
            document.getElementById('mainImageName').textContent = this.files.length ?
                this.files[0].name :
                'فایلی انتخاب نشده است';
        });

        document.getElementById('gallery').addEventListener('change', function() {
            document.getElementById('galleryName').textContent = this.files.length ?
                `${this.files.length} تصویر انتخاب شده است` :
                'فایلی انتخاب نشده است';
        });
    </script>

@endsection
