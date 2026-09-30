@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنظیمات هدر')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full h-full pb-10">
        <h2 class="text-3xl text-center font-bold py-5 text-[#425A8B]">فرم ایجاد و ویرایش اطلاعات هدر</h2>
        <div class="w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">
            <form action="{{ route('settings.header.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center gap-10">
                    <div class="w-full">
                        <div class="w-full flex flex-col">
                            <label for="title" class="mb-2 flex flex-row items-center">
                                <span>عنوان اصلی:</span>
                                <span class="text-rose-500">*</span>
                                <div class="relative group">
                                    <span
                                        class="size-4 text-xs bg-[#ededed] border border-[#6f6f6f] rounded-full p-2 flex justify-center items-center mr-3 cursor-pointer">?</span>
                                    <span
                                        class="w-70 py-4 text-center rounded-xl text-xs absolute bottom-5 right-5 bg-[#F9F9F9] border border-slate-300 invisible opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100">عبارتی
                                        که میخواهید <span class="text-[]">رنگی</span> باشد
                                        را داخل | | بگذارید </span>
                                </div>
                            </label>
                            <textarea class="outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                name="title" id="title" placeholder="عنوان اصلی را وارد کنید">{{ old('title', $header['title'] ?? '') }}</textarea>
                            @error('title')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col mt-5">
                            <label for="subTitle" class="mb-2 flex flex-row items-center">
                                <span>توضیحات:</span>
                                <span class="text-rose-500">*</span>
                            </label>
                            <textarea name="subTitle"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]" rows="4"
                                id="subTitle" placeholder="توضیحات را وارد کنید">{{ old('subTitle', $header['subTitle'] ?? '') }}</textarea>
                            @error('subTitle')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col sm:flex-row items-center gap-10">
                            <div class="w-full sm:w-1/2 flex flex-col mt-3 lg:mt-5">
                                <label for="btnText" class="mb-2 flex flex-row items-center">
                                    <span>متن دکمه :</span>
                                    <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    class="outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="btnText" id="btnText" value="{{ old('btnText', $header['btnText'] ?? '') }}"
                                    placeholder="مثال : سفارش سریع">
                                @error('btnText')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full sm:w-1/2 flex flex-col mt-3 lg:mt-5">
                                <label for="btnLink" class="mb-2 flex flex-row items-center">
                                    <span>لینک دکمه :</span>
                                    <span class="text-rose-500">*</span>
                                </label>
                                <input type="text"
                                    class="outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="btnLink" id="btnLink" value="{{ old('btnLink', $header['btnLink'] ?? '') }}"
                                    placeholder="مثال : sattarigold.art/orders">
                                @error('btnLink')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full flex flex-col sm:flex-row items-center gap-10">
                            <div class="w-full sm:w-1/3 mt-5">
                                <label for="header_img" class="mb-2 flex flex-row items-center">
                                    <span>تصویر هدر :</span>
                                    <span class="text-rose-500">*</span>
                                </label>
                                <input type="file"
                                    class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="header_img" id="header_img">
                                @error('header_img')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($header)
                                <img id="image" src="{{ old('header_img', asset('storage/' . $header->header_img)) }}"
                                    alt="" class="h-70 w-full sm:w-2/3 mt-10">
                            @endif
                        </div>
                        <div class="w-full flex flex-col sm:flex-row items-center gap-10">
                            <div class="w-full sm:w-1/3 mt-5">
                                <label for="header_bg" class="mb-2 flex flex-row items-center">
                                    <span>تصویر پس زمینه هدر : </span>
                                    <span class="text-rose-500">*</span>
                                </label>
                                <input type="file"
                                    class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="header_bg" id="header_bg">
                                @error('header_bg')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($header)
                                <img id="image" src="{{ old('header_bg', asset('storage/' . $header->header_bg)) }}"
                                    alt="" class="h-70 w-full sm:w-2/3 mt-10">
                            @endif
                        </div>
                    </div>
                    <button type="submit"
                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection
