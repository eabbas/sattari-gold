@extends('admin.app.dashboard')

@section('title', 'تعیین واحد پولی')

@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    <form action="{{ route('currencyUnit.store') }}" method="POST"
        class="w-full bg-white rounded-2xl border border-gray-100 p-5 space-y-4">
        @csrf
        <div>
            <h2 class="text-base font-semibold text-gray-800">واحد پولی</h2>
            <p class="text-sm text-gray-500 mt-1">
                واحد پولی موردنظر خود را انتخاب کنید.
            </p>
        </div>

        <div class="flex items-center gap-5">

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="currency" value="rial" @if ($currency?->unit == 'rial') checked @endif
                    class="size-4 accent-amber-600 cursor-pointer">
                <span class="text-sm text-gray-700">ریال</span>
            </label>

            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="currency" value="toman" @if ($currency?->unit == 'toman') checked @endif
                    class="size-4 accent-amber-600 cursor-pointer">
                <span class="text-sm text-gray-700">تومان</span>
            </label>

        </div>

        <button type="submit"
            class="h-11 px-6 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium transition-all">
            ذخیره تغییرات
        </button>

    </form>
@endsection
