@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | ایجاد کاربر جدید')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full h-full pb-10">
        <h2 class="text-3xl text-center font-bold py-10 text-[#425A8B]">فرم ایجاد کاربر جدید</h2>
        <div class="lg:w-2/3 w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">
            <form action="{{ route('user.adminStore') }}" method="post" enctype="multipart/form-data"
                class="w-full grid grid-cols-1 lg:grid-cols-2 gap-5">
                @csrf
                <div class="w-full flex flex-col">
                    <label for="name" class="mb-2 flex flex-row items-center">
                        <span>
                            نام :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="name" id="name" placeholder="نام را وارد کنید" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="family" class="mb-2 flex flex-row items-center">
                        <span>
                            نام خانوادگی :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="text" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="family" id="family" placeholder="نام خانوادگی را وارد کنید" value="{{ old('family') }}">
                    @error('family')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="phoneNumber" class="mb-2 flex flex-row items-center">
                        <span>
                            شماره تلفن :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="tel"
                        class="text-right outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="phoneNumber" id="phoneNumber" placeholder="0912345678" value="{{ old('phoneNumber') }}">
                    @error('phoneNumber')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="nationalCode" class="mb-2 flex flex-row items-center">
                        <span>
                            کد ملی :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="tel"
                        class="text-right outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="nationalCode" id="nationalCode" placeholder="0912345678" value="{{ old('nationalCode') }}">
                    @error('nationalCode')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="password" class="mb-2 flex flex-row items-center">
                        <span>
                            رمز عبور :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <input type="password" class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]"
                        name="password" id="password" value="{{ old('password') }}">
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label for="roles" class="mb-2 flex flex-row items-center">
                        <span>
                            تعیین نقش :
                            <span class="text-rose-500">*</span>
                        </span>
                    </label>
                    <select name="roles[]" id="roles" multiple size="1"
                        class="outline-none pr-5 py-3 bg-[#F9F9F9] rounded-[12px] focus:bg-[#f1f1f4]">
                        @foreach ($roles as $role)
                            <option value="{{ $role['id'] }}" @if (in_array($role->id, old('roles', []))) selected @endif>
                                {{ $role['name'] }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5 text-center lg:col-span-2">
                    <button type="submit"
                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection
