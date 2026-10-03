@extends('admin.app.dashboard')
@section('title')
    طلای ستاری | خرید و فروش سپرده طلا
@endsection
@section('content')
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>

    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa"> {{ session('failure') }} </span>
        </div>
    @endif
    <div class="w-full bg-[#fdf5f6] min-h-screen relative shadow-2xl overflow-hidden flex flex-col">

        <div class="w-full overflow-y-auto pb-24 px-4">

            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col items-center justify-center text-center">
                <h3 class="text-sm font-semibold mb-6">معاملات من در برنامه</h3>
                @if (count(Auth::user()->deals))
                    <div class="border p-5 mb-10">
                        <table class="w-full max-h-20 overflow-auto">
                            <thead class="w-full">
                                <tr class="w-full mb-10 px-4 grid grid-cols-6">
                                    <th>نوع / زمان</th>
                                    <th class="col-span-2">وضعیت</th>
                                    <th>قیمت وقت طلا</th>
                                    <th>وزن</th>
                                    <th>مبلغ تراکنش</th>
                                </tr>
                            </thead>
                            <tbody class="w-full">
                                @foreach (Auth::user()->deals as $deal)
                                    <tr class="w-full mb-10 px-4 grid grid-cols-6">
                                        <td class="flex flex-col items-center gap-2">
                                            @if ($deal->transaction->type == 'buy')
                                                <span class="text-green-500">خرید</span>
                                            @elseif ($deal->transaction->type == 'sell')
                                                <span class="text-red-500">خرید</span>
                                            @endif
                                            <span class="text-xs text-gray-400 in-fa">{{ $deal->date . ' - ' .  $deal->time }}</span>
                                        </td>
                                        <td class="flex justify-center items-center col-span-2">
                                            @if ($deal->transaction->isApproved == 1)
                                                <span class="text-green-500">تایید شده</span>
                                            @elseif ($deal->transaction->isApproved == -1)
                                                <span class="text-red-500">رد شده</span>
                                            @elseif ($deal->transaction->isApproved == 0)
                                                <span class="text-gray-500">در انتظار تایید</span>
                                            @endif
                                        </td>
                                        <td class="flex justify-center items-center">
                                            <span class="text-gray-500 in-fa">{{ number_format($deal->goldPrice) }}</span>
                                        </td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="in-fa">{{ $deal->goldWeight }}</span>
                                            <span class="text-xs text-gray-400">گرم</span>
                                        </td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="in-fa">{{ number_format($deal->transaction->amount) }}</span>
                                            <span class="text-xs text-gray-400">تومان</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-gray-300 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500 mb-6">معامله‌ای یافت نشد</p>
                    <button
                        class="w-full border border-red-200 text-brand-red py-2 rounded-xl text-sm font-medium hover:bg-red-50 transition">
                        مشاهده گردش حساب
                    </button>
                @endif
            </div>

        </div>

    </div>

    
    
@endsection
