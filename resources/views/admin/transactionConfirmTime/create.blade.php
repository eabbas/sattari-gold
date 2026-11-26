@extends('admin.app.dashboard')

@section('title', 'مدت زمان تأیید معامله')

@section('content')
    @if (session('success'))
        <div
            class="modal py-4 px-6 rounded-xl shadow-lg bg-green-100 border border-green-200 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-green-700 in-fa">{{ session('success') }}</span>
        </div>
    @endif

    <div class="w-full space-y-5">
        <div>
            <h2 class="text-lg font-bold text-gray-800">مدت زمان تأیید معامله</h2>
            <p class="text-xs text-gray-500 mt-2">تنظیم زمان مجاز برای انجام و تأیید معاملات</p>
        </div>

        <form action="{{ route('transactionConfirmTime.store') }}" method="POST"
            class="w-full bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
            @csrf

            <div class="space-y-3">
                <label class="block text-sm font-bold text-gray-700">
                    انتخاب مدت زمان تأیید
                </label>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach ([30, 60, 90, 120, 150, 180] as $t)
                        <label class="cursor-pointer">
                            <input type="radio" name="time" value="{{ $t }}" class="peer sr-only"
                                @if ($t == $time?->time) checked @endif>

                            <div
                                class="h-12 flex items-center justify-center gap-2 rounded-xl border border-gray-200 bg-gray-50 text-sm font-semibold text-gray-600 peer-checked:border-[#b89b5e] peer-checked:bg-[#f8f6f1] peer-checked:text-[#927642] hover:border-[#b89b5e] transition-all">
                                <span
                                    class="size-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-[#a88b4f]">
                                    <span
                                        class="size-2 rounded-full bg-[#a88b4f] scale-0 peer-checked:scale-100 transition-transform"></span>
                                </span>
                                {{ $t }} ثانیه
                            </div>
                        </label>
                    @endforeach
                </div>

                @error('time')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-100">
                <button type="submit"
                    class="h-11 px-7 rounded-xl bg-[#a88b4f] hover:bg-[#927642] text-white text-sm font-bold transition-all">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
@endsection
