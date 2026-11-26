@extends('admin.app.dashboard')
@section('title', 'ستاری گلد |  تنظمات درباره ما')
@section('content')

<div class="bg-gray-50 text-gray-800">

<div class="max-w-6xl mx-auto px-4 py-10">

    <!-- Header -->
    <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold">تنظیمات صفحه درباره ما</h1>
            <p class="text-sm text-gray-500 mt-2">
                مدیریت محتوای صفحه درباره ما
            </p>
        </div>
    </div>

    <form id="aboutForm" action="{{route('aboutUs.store')}}" method="post" class="space-y-6" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="create" value="cerate">
        <!-- Main Information -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">اطلاعات اصلی</h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium mb-2">عنوان صفحه</label>
                    <input type="text" name="title" placeholder="عنوان درباره ما را وارد کنید"
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500" required>
                    @error('title')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">توضیحات</label>
                    <textarea rows="4" name="description" placeholder="توضیحات صفحه را وارد کنید..."
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500" required></textarea>
                        @error('description')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                </div>
            </div>
        </section>

        <!-- Our Story -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-5">ویدیوی معرفی</h2>

            <label class="block text-sm font-medium mb-2">آپلود ویدیو</label>
            <input type="file" name="video" accept="video/*"
                class="w-full border border-dashed rounded-xl p-4 bg-gray-50" required>
                @error('video')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <p class="text-xs text-gray-400 mt-2">فرمت‌های مجاز: MP4، WebM</p>
        </section>
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">تصاویر اصلی</h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block text-sm font-medium mb-3">تصویر اصلی اول</label>
                    <input type="file" name="image1" accept="image/*"
                        class="w-full border border-dashed rounded-xl p-4 bg-gray-50" required>
                        @error('image1')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-3">تصویر اصلی دوم</label>
                    <input type="file" name="image2" accept="image/*"
                        class="w-full border border-dashed rounded-xl p-4 bg-gray-50" required>
                        @error('image2')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                </div>

            </div>
        </section>
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">داستان ما</h2>

            <div class="space-y-2">

                <div>
                    <label class="block text-sm font-medium mb-2">متن داستان ما</label>
                    <textarea rows="6" name="ourStory" placeholder="داستان برند خود را بنویسید..."
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500" required></textarea>
                        @error('ourStory')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                </div>
            </div>
        </section>

        <!-- Video -->

        <!-- Main Images -->

        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

            <h2 class="font-bold text-lg mb-2">ارزش‌های پیشنهادی</h2>
            <p class="text-sm text-gray-400 mb-6">چهار ارزش اصلی برند خود را معرفی کنید.</p>

            <div class="grid md:grid-cols-2 gap-5">

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت اول</h3>
                    <input type="text" name="title1" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3" required>
                        @error('title1')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    <textarea rows="3" name="description1" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3" required></textarea>
                        @error('description1')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    <input type="file" name="imagecord1" accept="image/*" class="w-full text-sm" required>
                    @error('imagecord1')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت دوم</h3>
                    <input type="text" name="title2" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3" required>
                    @error('title2')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <textarea rows="3" name="description2" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3" required></textarea>
                    @error('description2')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="file" name="imagecord2" accept="image/*" class="w-full text-sm" required>
                    @error('imagecord2')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت سوم</h3>
                    <input type="text" name="title3" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3" required>
                    @error('title3')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <textarea rows="3" name="description3" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3" required></textarea>
                    @error('description3')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <input type="file" name="imagecord3" accept="image/*" class="w-full text-sm" required>
                    @error('imagecord3')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت چهارم</h3>
                    <input type="text" name="title4" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3" required>
                        @error('title4')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    <textarea rows="3" name="description4" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3" required></textarea>
                        @error('description4')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    <input type="file" name="imagecord4" accept="image/*" class="w-full text-sm" required>
                        @error('imagecord4')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                </div>

            </div>
        </section>
        <!-- Gallery -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="font-bold text-lg">گالری تصاویر</h2>
                    <p class="text-xs text-gray-400 mt-1">تصاویر دلخواه خود را اضافه کنید.</p>
                </div>

                <button type="button" onclick="addGallery()"
                    class="bg-amber-50 text-amber-700 px-4 py-2 rounded-xl text-sm">
                    + افزودن تصویر
                </button>
            </div>

            <div id="galleryContainer" class="grid md:grid-cols-3 gap-4">
                <div class="relative border border-dashed rounded-xl p-4 bg-gray-50">
                    <button type="button"
                        onclick="this.parentElement.remove()"
                        class="absolute top-2 left-2 text-red-500 hover:text-red-700">
                        ✕
                    </button>

                    <label class="block text-sm mb-3">
                        تصویر شماره ${galleryIndex}
                    </label>

                    <input type="file" name="gallery[]" accept="image/*"
                        class="w-full text-sm" required>
                </div>
            </div>
        </section>

        <!-- Value Cards -->

        <!-- Submit -->
        <div class="flex justify-end gap-3">

            <button type="submit"
                class="px-8 py-3 rounded-xl bg-amber-500 text-white hover:bg-amber-600">
                ذخیره صفحه درباره ما
            </button>
        </div>

    </form>
</div>

<script>
    let galleryIndex = 0;

    function addGallery() {
        galleryIndex++;

        const container = document.getElementById('galleryContainer');

        const item = document.createElement('div');
        item.className = 'relative border border-dashed rounded-xl p-4 bg-gray-50';

        item.innerHTML = `
            <button type="button"
                onclick="this.parentElement.remove()"
                class="absolute top-2 left-2 text-red-500 hover:text-red-700">
                ✕
            </button>

            <label class="block text-sm mb-3">
                تصویر شماره ${galleryIndex}
            </label>

            <input type="file" name="gallery[]" accept="image/*"
                class="w-full text-sm">
        `;

        container.appendChild(item);
    }

    // دو تصویر اولیه برای گالری
    addGallery();
</script>

</div>


@endsection