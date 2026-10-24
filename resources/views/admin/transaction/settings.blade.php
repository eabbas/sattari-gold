@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنظیمات واریز و برداشت ها')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    <form action="{{ route('transactionSetting.updateOrCreate') }}" method="post"
        class="w-10/12 mx-auto flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
        @csrf
        <div class="w-full flex justify-start items-center md:gap-4 gap-2">
            <div class="p-1 bg-(--active) rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-white">
                    <path
                        d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z" />
                </svg>
            </div>
            <span class="font-bold  max-md:text-sm">تنظیمات تراکنش ها</span>
        </div>
        <div class="w-full grid grid-cols-1 sm:grid-cols-3 gap-3 gap-y-7 justify-start items-center">
            <div class="w-full flex flex-col justify-start items-start gap-2">
                <label for="minDepositAmount" class="md:text-sm text-xs font-bold text-[#8B929D]">حداقل مبلغ قابل
                    واریز:</label>
                <div class="w-full border-2 border-(--border) bg-white flex justify-between items-center rounded-xl">
                    <input type="number" name="minDepositAmount" id="minDepositAmount"
                        class="w-full outline-none font-bold rounded-xl max-lg:text-sm py-2 px-3 in-fa"
                        value="{{ old('minDepositAmount', $setting['minDepositAmount'] ?? '') }}">
                </div>
                @error('minDepositAmount')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-2">
                <label for="maxDepositAmount" class="md:text-sm text-xs font-bold text-[#8B929D]">حداکثر مبلغ قابل
                    واریز:</label>
                <div class="w-full border-2 border-(--border) bg-white flex justify-between items-center rounded-xl">
                    <input type="number" name="maxDepositAmount" id="maxDepositAmount"
                        class="w-full outline-none font-bold rounded-xl max-lg:text-sm py-2 px-3 in-fa"
                        value="{{ old('maxDepositAmount', $setting['maxDepositAmount'] ?? '') }}">
                </div>
                @error('maxDepositAmount')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center gap-4">
                <label for="depositIsActive">قابلیت واریز کردن : </label>
                <label for="depositIsActive" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                    <input type="checkbox" name="depositIsActive" value="1" id="depositIsActive" hidden class="peer"
                        @if ($setting && $setting['depositIsActive']) checked @endif @checked(old('depositIsActive') == '1')>
                    <span
                        class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                    <span
                        class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                </label>
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-2">
                <label for="minWithdrawAmount" class="md:text-sm text-xs font-bold text-[#8B929D]">حداقل مبلغ قابل
                    برداشت:</label>
                <div class="w-full border-2 border-(--border) bg-white flex justify-between items-center rounded-xl">
                    <input type="number" name="minWithdrawAmount" id="minWithdrawAmount"
                        class="w-full outline-none font-bold rounded-xl max-lg:text-sm py-2 px-3 in-fa"
                        value="{{ old('minWithdrawAmount', $setting['minWithdrawAmount'] ?? '') }}">
                </div>
                @error('minWithdrawAmount')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full flex flex-col justify-start items-start gap-2">
                <label for="maxWithdrawAmount" class="md:text-sm text-xs font-bold text-[#8B929D]">حداکثر مبلغ قابل
                    برداشت:</label>
                <div class="w-full border-2 border-(--border) bg-white flex justify-between items-center rounded-xl">
                    <input type="number" name="maxWithdrawAmount" id="maxWithdrawAmount"
                        class="w-full outline-none font-bold rounded-xl max-lg:text-sm py-2 px-3 in-fa"
                        value="{{ old('maxWithdrawAmount', $setting['maxWithdrawAmount'] ?? '') }}">
                </div>
                @error('maxWithdrawAmount')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-center gap-4">
                <label for="withdrawIsActive">قابلیت برداشت کردن : </label>
                <label for="withdrawIsActive" class="w-[50px] h-[28px] flex rounded-full cursor-pointer relative">
                    <input type="checkbox" name="withdrawIsActive" value="1" id="withdrawIsActive" hidden
                        class="peer" @if ($setting && $setting['withdrawIsActive']) checked @endif @checked(old('withdrawIsActive') == '1')>
                    <span
                        class="size-full bg-gray-300 shadow-inner rounded-full peer-checked:bg-[#1B84FF] transition-all duration-300"></span>
                    <span
                        class="size-[20px] rounded-full bg-white absolute top-1 left-1 peer-checked:translate-x-[22px] transition-all duration-300 shadow-md"></span>
                </label>
            </div>
        </div>
        <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm cursor-pointer">
            ذخیره تغییرات
        </button>
    </form>
@endsection
