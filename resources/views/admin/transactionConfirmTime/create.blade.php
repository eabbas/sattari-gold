@extends('admin.app.dashboard')

@section('title', 'تعیین واحد پولی')

@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa">
                {{ session('success') }}
            </span>
        </div>
    @endif

    <form action="{{ route('transactionConfirmTime.store') }}" method="POST"
        class="w-full bg-white rounded-2xl border border-gray-100 p-5 space-y-4">
        @csrf

        <div>
            <h2 class="text-base font-bold text-gray-800">مدت زمان تأیید معامله</h2>
            <p class="text-sm text-gray-500 mt-1">
                مدت زمان مجاز برای انجام و تأیید معامله را انتخاب کنید.
            </p>
        </div>

        <div class="grid grid-cols-3 gap-3">

            @foreach ([30, 60, 90, 120, 150, 180] as $t)
                <label class="cursor-pointer">
                    <input type="radio" name="time" value="{{ $t }}" class="peer sr-only"
                        @if ($t == $time?->time) checked @endif>

                    <div
                        class="h-11 flex items-center justify-center gap-2 rounded-xl border border-gray-200 text-sm text-gray-600 peer-checked:border-amber-600 peer-checked:bg-amber-100 peer-checked:text-amber-700 transition-all">

                        <span
                            class="size-4 rounded-full border border-gray-300 flex items-center justify-center peer-checked:border-amber-600">
                            <span
                                class="size-2 rounded-full bg-amber-800 scale-0 peer-checked:scale-100 transition-transform">
                            </span>
                        </span>

                        {{ $t }} ثانیه

                    </div>
                </label>
            @endforeach

        </div>

        <button type="submit"
            class="h-11 px-6 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium transition-all">
            ذخیره تغییرات
        </button>

    </form>
@endsection
