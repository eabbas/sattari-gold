@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنظیمات لوگو')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full h-full pb-10">
        <h2 class="text-3xl text-center font-bold py-5 text-[#425A8B]">فرم ایجاد و ویرایش لوگو</h2>
        <div class="w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">
            <form action="{{ route('settings.logo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center gap-10">
                    <div class="w-full">
                        <div class="w-full flex flex-col">
                            <label for="link" class="mb-2 flex flex-row items-center">
                                <span>لینک لوگو:</span>
                                <span class="text-rose-500">*</span>
                            </label>
                            <input type="text"
                                class="outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                name="link" id="link" value="{{ old('link', $logo['link'] ?? '') }}"
                                placeholder="مثال : sattarigold.art">
                            @error('link')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex items-center gap-10">
                            <div class="w-1/3 mt-5">
                                <label for="logo" class="mb-2 flex flex-row items-center">
                                    <span>لوگو :</span>
                                    <span class="text-rose-500">*</span>
                                </label>
                                <input type="file"
                                    class="w-full outline-none pr-5 py-3 bg-[#F9F9F9] border border-slate-300 rounded-xl focus:bg-[#f1f1f4]"
                                    name="logo" id="logo">
                                @error('logo')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <img id="image" src="{{ old('logo', asset('storage/' . $logo?->logo)) }}" alt=""
                                class="h-70 w-2/3 mt-10 @if (!$logo) hidden @endif">
                        </div>
                    </div>
                    <button type="submit"
                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection
