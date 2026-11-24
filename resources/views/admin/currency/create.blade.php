@extends('admin.app.dashboard')

@section('title', 'تعیین واحد پولی')

@section('content')
    @if (session('success'))
        <div
            class="modal py-4 px-6 rounded-xl shadow-lg bg-green-100 border border-green-200 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-green-700 in-fa">{{ session('success') }}</span>
        </div>
    @endif

    <div class="w-full space-y-5">
        <div>
            <h2 class="text-lg font-bold text-gray-800">واحد پولی</h2>
            <p class="text-xs text-gray-500 mt-2">مدیریت و انتخاب واحد پولی سیستم</p>
        </div>

        <form action="{{ route('currencyUnit.store') }}" method="POST"
            class="w-full bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
            @csrf

            <div class="space-y-3">
                <label class="block text-sm font-bold text-gray-700">
                    واحد پولی موردنظر
                </label>

                <div class="flex flex-wrap items-center gap-4">
                    <label
                        class="flex items-center gap-3 px-5 py-4 rounded-xl border border-gray-200 bg-gray-50 cursor-pointer hover:border-[#b89b5e] transition-all has-[:checked]:border-[#b89b5e] has-[:checked]:bg-[#f8f6f1]">
                        <input type="radio" name="currency" value="rial"
                            @if ($currency?->unit == 'rial') checked @endif class="size-4 accent-[#a88b4f] cursor-pointer">
                        <span class="text-sm font-semibold text-gray-700">ریال</span>
                    </label>

                    <label
                        class="flex items-center gap-3 px-5 py-4 rounded-xl border border-gray-200 bg-gray-50 cursor-pointer hover:border-[#b89b5e] transition-all has-[:checked]:border-[#b89b5e] has-[:checked]:bg-[#f8f6f1]">
                        <input type="radio" name="currency" value="toman"
                            @if ($currency?->unit == 'toman') checked @endif class="size-4 accent-[#a88b4f] cursor-pointer">
                        <span class="text-sm font-semibold text-gray-700">تومان</span>
                    </label>
                </div>

                @error('currency')
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
