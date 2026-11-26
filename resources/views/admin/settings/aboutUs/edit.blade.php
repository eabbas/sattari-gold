@extends('admin.app.dashboard')
@section('title', 'ستاری گلد |  ویرایش درباره ما')
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
        <!-- Main Information -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">اطلاعات اصلی</h2>

            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium mb-2">عنوان صفحه</label>
                    <input type="text" name="title" value="{{$aboutUs->title}}" placeholder="عنوان درباره ما را وارد کنید"
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">توضیحات</label>
                    <textarea rows="4" name="description" placeholder="توضیحات صفحه را وارد کنید..."
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500">{{$aboutUs->description}}</textarea>
                </div>
            </div>
        </section>

        <!-- Our Story -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-5">ویدیوی معرفی</h2>
            <input type="hidden" name="subvideo" value="{{$aboutUs->video}}">
            <label class="block text-sm font-medium mb-2">آپلود ویدیو</label>
            <input type="file" name="video" accept="video/*"
                class="w-full border border-dashed rounded-xl p-4 bg-gray-50">
                <p class="text-xs text-gray-400 mt-2">فرمت‌های مجاز: MP4، WebM</p>
        </section>
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">تصاویر اصلی</h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    @php 
                        foreach($aboutUs->gallery as $gallery){
                            if($gallery->flag==1){
                                $img[]=$gallery->image;
                            }
                        }
                    @endphp
                    <input type="hidden" name="subimage1" value="{{$img[0]}}">
                    <label class="block text-sm font-medium mb-3">تصویر اصلی اول</label>
                    <input type="file" name="image1" accept="image/*"
                        class="w-full border border-dashed rounded-xl p-4 bg-gray-50">
                </div>

                <div>
                    <input type="hidden" name="subimage2" value="{{$img[1]}}">
                    <label class="block text-sm font-medium mb-3">تصویر اصلی دوم</label>
                    <input type="file" name="image2" accept="image/*"
                        class="w-full border border-dashed rounded-xl p-4 bg-gray-50">
                </div>

            </div>
        </section>
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="font-bold text-lg mb-6">داستان ما</h2>

            <div class="space-y-2">

                <div>
                    <label class="block text-sm font-medium mb-2">متن داستان ما</label>
                    <textarea rows="6" name="ourStory" placeholder="داستان برند خود را بنویسید..."
                        class="w-full border rounded-xl p-3 outline-none focus:border-amber-500">{{$aboutUs->ourStory}}</textarea>
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
                    <input type="text" name="title1" value="{{$aboutUs->value[0]['title']}}" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3">
                    <textarea rows="3" name="description1" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3">{{$aboutUs->value[0]['description']}}</textarea>
                    <input type="hidden" name="subimagecord1" value="{{$aboutUs->value[0]['image']}}">
                    <input type="file" name="imagecord1" accept="image/*" class="w-full text-sm">
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت دوم</h3>
                    <input type="text" name="title2" value="{{$aboutUs->value[1]['title']}}" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3">
                    <textarea rows="3" name="description2" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3">{{$aboutUs->value[1]['description']}}</textarea>
                    <input type="hidden" name="subimagecord2" value="{{$aboutUs->value[1]['image']}}">
                    <input type="file" name="imagecord2" accept="image/*" class="w-full text-sm">
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت سوم</h3>
                    <input type="text" name="title3" value="{{$aboutUs->value[2]['title']}}" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3">
                    <textarea rows="3" name="description3" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3">{{$aboutUs->value[2]['description']}}</textarea>
                    <input type="hidden" name="subimagecord3" value="{{$aboutUs->value[2]['image']}}">
                    <input type="file" name="imagecord3" accept="image/*" class="w-full text-sm">
                </div>

                <div class="border rounded-2xl p-5 space-y-4">
                    <h3 class="font-semibold">کارت چهارم</h3>
                    <input type="text" name="title4" value="{{$aboutUs->value[3]['title']}}" placeholder="عنوان کارت"
                        class="w-full border rounded-xl p-3">
                    <textarea rows="3" name="description4" placeholder="توضیحات کارت"
                        class="w-full border rounded-xl p-3">{{$aboutUs->value[3]['description']}}</textarea>
                    <input type="hidden" name="subimagecord4" value="{{$aboutUs->value[3]['image']}}">
                    <input type="file" name="imagecord4" accept="image/*" class="w-full text-sm">
                </div>

            </div>
        </section>
        <!-- Gallery -->
        <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col">
            <div class="flex flex-col">
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
                
                </div>
            </div>
            <div class="w-full grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-2 justify-between mt-10">
                @foreach($aboutUs->gallery as $gallery)
                    @if($gallery->flag==0)
                    <div class="relative">
                        <img class="w-full h-65 object-cover rounded-2xl" src="{{asset('storage/' . $gallery->image)}}" alt="">
                        <div class="w-7 h-7 bg-red-600 text-white rounded-full flex items-center justify-center  cursor-pointer" onclick="delet(this , {{$gallery->id}})">✖</div>
                    </div>
                    @endif
                @endforeach
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
                class="w-full text-sm" >
        `;

        container.appendChild(item);
    }
    function delet(el , id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        })
        $.ajax({
            url: "{{ route('aboutUs.delete') }}",
            type: "POST",
            dataType: "json",
            data: {
                'id': id,
            },
            success: function(data) {
                if(data=='ok'){
                    el.parentElement.remove()
                }
            },
            error: function() {
                alert('error')
            }
        })
    }

    // دو تصویر اولیه برای گالری
    addGallery();
</script>

</div>


@endsection