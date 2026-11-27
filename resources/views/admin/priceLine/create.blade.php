@extends('admin.app.dashboard')

@section('title', 'تعیین ارزش هر خط')

@section('content')
    @if (session('success'))
        <div
            class="modal py-4 px-6 rounded-xl shadow-lg bg-green-100 border border-green-200 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-green-700 in-fa">{{ session('success') }}</span>
        </div>
    @endif

    <div class="w-full space-y-5">
        <div>
            <h2 class="text-lg font-bold text-gray-800">ارزش هر خط</h2>
            <p class="text-xs text-gray-500 mt-2">مدیریت و تنظیم مبلغ ارزش هر خط طلا</p>
        </div>

        <form action="{{ route('line.store') }}" method="POST"
            class="w-full bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="line_value" class="block text-sm font-bold text-gray-700">
                    مبلغ هر خط
                </label>

                <div class="flex items-center gap-3">
                    <div class="flex-1">
                        <input type="text" inputmode="numeric" name="line_value" id="line_value"
                            value="{{ $priceLine?->line_value ? number_format($priceLine->line_value) : '' }}"
                            placeholder="مثلاً 100,000"
                            class="w-full h-12 px-4 rounded-xl border border-gray-200 bg-gray-50 outline-none focus:bg-white focus:border-[#b89b5e] focus:ring-2 focus:ring-[#b89b5e]/10 transition-all text-gray-700 text-sm font-bold">

                        <p id="line_value_preview" class="text-xs text-gray-400 mt-3 min-h-5"></p>

                        @error('line_value')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <span class="text-sm font-bold text-gray-500 whitespace-nowrap">
                        ریال
                    </span>
                </div>
            </div>

            <div class="flex items-start gap-3 bg-[#f8f6f1] border border-[#eee8da] rounded-xl p-4">
                <svg class="w-5 h-5 text-[#a88b4f] shrink-0 mt-0.5" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke-width="1.7" />
                    <path d="M12 11v5m0-8h.01" stroke-width="1.7" stroke-linecap="round" />
                </svg>

                <p class="text-xs text-gray-600 leading-6">
                    قیمت هر خط مشخص می‌کند که قیمت نهایی طلا به ازای هر خط، چه مقدار از قیمت سایت مرجع بالاتر یا پایین‌تر
                    باشد.
                </p>
            </div>

            <div class="flex justify-end pt-2 border-t border-gray-100">
                <button type="submit"
                    class="h-11 px-7 rounded-xl bg-[#a88b4f] hover:bg-[#927642] text-white text-sm font-bold transition-all">
                    ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>

    <script>
        let lineValue = document.getElementById('line_value')
        let lineValuePreview = document.getElementById('line_value_preview')

        function updateLineValuePreview() {
            let price = lineValue.value.replace(/,/g, '').replace(/\D/g, '')

            lineValue.value = price.replace(/\B(?=(\d{3})+(?!\d))/g, ',')

            lineValuePreview.innerText = ''

            if (price) {
                let finalPrice = Math.floor(parseInt(price) / 10)
                lineValuePreview.innerText = 'معادل ' + finalPrice.num2persian() + ' تومان'
            }
        }

        lineValue.addEventListener('input', function() {
            updateLineValuePreview()
        })

        updateLineValuePreview()

        lineValue.form.addEventListener('submit', function() {
            lineValue.value = lineValue.value.replace(/,/g, '')
        })
    </script>
@endsection
