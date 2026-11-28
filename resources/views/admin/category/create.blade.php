
@extends('admin.app.dashboard')

@section('title', 'ستاری گلد | ایجاد دسته')

@section('content')

    @if (session('message'))
        <div class="modal fixed top-5 right-5 z-[100] flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-bold text-emerald-700 shadow-lg">
            <svg class="size-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            {{ session('message') }}
        </div>
    @endif

    <div class="w-full min-h-full pb-10" dir="rtl">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800">
                    ایجاد دسته‌بندی جدید
                </h2>
                <p class="text-sm text-slate-500 mt-2">
                    اطلاعات دسته‌بندی جدید را وارد و ثبت کنید.
                </p>
            </div>

            <a href="{{ route('category.adminIndex') }}"
                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 hover:text-slate-800 transition-all text-sm font-bold">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m15 18-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                بازگشت به دسته‌بندی‌ها
            </a>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100 bg-slate-50/70">
                    <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                            <path d="M3 7h18v13H3z" stroke-linejoin="round"/>
                            <path d="M3 7l2-4h14l2 4M12 10v7m-3.5-3.5h7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800">اطلاعات دسته‌بندی</h3>
                        <p class="text-xs text-slate-500 mt-1">مشخصات و جزئیات دسته جدید</p>
                    </div>
                </div>

                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2 flex flex-col gap-2">
                            <label for="catTitle" class="text-sm font-bold text-slate-700">
                                عنوان دسته‌بندی
                                <span class="text-rose-500">*</span>
                            </label>

                            <input type="text" name="title" id="catTitle" value="{{ old('title') }}"
                                placeholder="مثلاً: زیورآلات طلا"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all placeholder:text-slate-400 focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">

                            @error('title')
                                <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="md:col-span-2 flex flex-col gap-2">
                            <label for="cat_desc" class="text-sm font-bold text-slate-700">
                                توضیحات دسته‌بندی
                                <span class="text-xs font-normal text-slate-400">(اختیاری)</span>
                            </label>

                            <textarea name="description" id="cat_desc" rows="3"
                                placeholder="توضیحات مربوط به این دسته‌بندی را وارد کنید..."
                                class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all placeholder:text-slate-400 focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">{{ old('description') }}</textarea>

                            @error('description')
                                <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="parent_id" class="text-sm font-bold text-slate-700">
                                دسته‌بندی والد
                            </label>

                            <select name="parent_id" id="parent_id"
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:bg-white focus:ring-2 focus:ring-[#425A8B]/10">

                                <option value="0" @selected(old('parent_id', '0') == '0')>
                                    بدون والد (دسته اصلی)
                                </option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('parent_id') == $category->id)>
                                        {{ $category->title }}
                                    </option>
                                @endforeach

                            </select>

                            <span class="text-xs text-slate-400">
                                در صورت انتخاب والد، این دسته به‌عنوان زیرمجموعه آن ثبت می‌شود.
                            </span>

                            @error('parent_id')
                                <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="image" class="text-sm font-bold text-slate-700">
                                تصویر دسته‌بندی
                                <span class="text-xs font-normal text-slate-400">(اختیاری)</span>
                            </label>

                            <label for="image"
                                class="flex items-center gap-3 w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 cursor-pointer transition-all hover:border-[#425A8B] hover:bg-slate-100">

                                <span class="size-10 shrink-0 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-500">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M12 16V4m-4 4 4-4 4 4" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 16v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3" stroke-linecap="round"/>
                                    </svg>
                                </span>

                                <span class="flex flex-col min-w-0">
                                    <span class="text-sm font-bold text-slate-700">انتخاب تصویر</span>
                                    <span class="text-xs text-slate-400 mt-1 truncate" id="imageName">
                                        فایلی انتخاب نشده است
                                    </span>
                                </span>

                                <input type="file" name="image" id="image" accept="image/*" class="hidden">
                            </label>

                            @error('image')
                                <span class="text-xs font-medium text-rose-500">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 mt-10 pt-6 border-t border-slate-100">

                        <a href="{{ route('category.adminIndex') }}"
                            class="w-full sm:w-auto text-center px-7 py-3 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition-all text-sm font-bold">
                            انصراف
                        </a>

                        <button type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-9 py-3 rounded-xl bg-[#425A8B] hover:bg-[#344A76] text-white transition-all shadow-sm text-sm font-bold">
                            <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m5 12 4 4L19 6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            ثبت دسته‌بندی
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const imageInput = document.getElementById('image');
        const imageName = document.getElementById('imageName');

        imageInput.addEventListener('change', function () {
            imageName.textContent = this.files.length
                ? this.files[0].name
                : 'فایلی انتخاب نشده است';
        });
    </script>

@endsection
