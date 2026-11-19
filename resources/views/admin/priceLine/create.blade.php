@extends('admin.app.dashboard')

@section('title', 'تعیین ارزش هر خط')

@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    <form action="{{ route('line.store') }}" method="POST"
        class="w-full bg-white rounded-2xl border border-gray-100 p-5 space-y-4">
        @csrf
        <div>
            <h2 class="text-base font-semibold text-gray-800">تنظیم ارزش هر خط</h2>
            <p class="text-sm text-gray-500 mt-1">
                مبلغ هر خط.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <div class="flex-1">
                <input type="number" name="line_value" id="line_value" value="{{ $priceLine?->line_value }}"
                    placeholder="مثلاً 100000"
                    class="w-full h-12 px-4 rounded-xl border border-gray-200 outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 transition-all text-gray-700">
                <p class="text-gray-400 text-[10px] mt-5"></p>
                @error('line_value')
                    <span class="text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <span class="text-sm font-medium text-gray-600 whitespace-nowrap">
                ریال
            </span>
        </div>

        <div class="flex items-start gap-2 text-xs text-gray-500 bg-amber-50 rounded-xl p-3 leading-6">
            <svg class="w-4 h-4 text-amber-600 shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="1.8" />
                <path d="M12 11v5m0-8h.01" stroke-width="1.8" stroke-linecap="round" />
            </svg>
            <p>
                قیمت هر خط مشخص می‌کند که قیمت نهایی طلا به ازای هر خط، چه مقدار از قیمت سایت مرجع بالاتر یا پایین‌تر باشد.
            </p>
        </div>

        <button type="submit"
            class="h-11 px-6 rounded-xl bg-amber-600 hover:bg-amber-700 text-white text-sm font-medium transition-all">
            ذخیره تغییرات
        </button>

    </form>
    <script>
        let lineValue = document.getElementById('line_value')
        lineValue.addEventListener('input', function() {
            lineValue.nextElementSibling.innerText = ''
            let price = lineValue.value
            let finalPrice = parseInt(price) / 10
            lineValue.nextElementSibling.innerText = 'معادل ' + finalPrice
                .toLocaleString('fa-IR') + ' تومان'
        })
    </script>
@endsection
