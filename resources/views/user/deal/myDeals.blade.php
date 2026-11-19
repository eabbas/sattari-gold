@extends('admin.app.dashboard')

@section('title')
    طلای ستاری | تاریخچه معاملات
@endsection

@section('content')

    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .deal-history {
            --gold: #b68b43;
            --gold-dark: #8e672b;
            --gold-soft: #f5eddf;
            --navy: #252d3b;
            --border: #eae3d5;
            --muted: #978b78;
            background: #faf8f3;
            color: #34302a;
        }

        .deal-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(40, 32, 20, .035);
        }

        .deal-table th {
            padding: 16px 14px;
            color: #8c7b61;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .deal-table td {
            padding: 17px 14px;
            border-top: 1px solid #f0ece4;
            font-size: 13px;
            white-space: nowrap;
        }

        .deal-table tbody tr {
            transition: background .2s ease;
        }

        .deal-table tbody tr:hover {
            background: #fcfaf6;
        }

        .deal-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .deal-status::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .deal-status-approved {
            color: #438365;
            background: #edf6f0;
        }

        .deal-status-rejected {
            color: #bb5c52;
            background: #fbefed;
        }

        .deal-status-pending {
            color: #a47a35;
            background: #faf4e7;
        }

        .deal-mobile-card {
            border: 1px solid #eee7da;
            background: white;
            border-radius: 15px;
            padding: 15px;
            transition: .2s ease;
        }

        .deal-mobile-card:hover {
            border-color: #d9c49e;
        }
    </style>

    @if (session('success'))
        <div
            class="modal fixed top-5 right-4 z-[999999] rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-800 shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('failure'))
        <div
            class="modal fixed top-5 right-4 z-[999999] rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800 shadow-lg">
            {{ session('failure') }}
        </div>
    @endif

    <div class="deal-history min-h-screen w-full px-3 py-5 sm:px-5 lg:px-7">

        <div class="mx-auto max-w-7xl">

            {{-- سربرگ --}}
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">

                <div>
                    <div class="mb-2 flex items-center gap-2">
                        <span class="h-2 w-2 rounded-full bg-[#b68b43]"></span>
                        <span class="text-xs font-medium text-[#9b702d]">
                            گزارش حساب کاربری
                        </span>
                    </div>

                    <h1 class="text-xl font-bold text-[#292f3b] sm:text-2xl">
                        تاریخچه معاملات من
                    </h1>

                    <p class="mt-2 text-xs leading-6 text-[#978b78] sm:text-sm">
                        تمام معاملات خرید و فروش طلای خود را در این بخش مشاهده کنید.
                    </p>
                </div>
            </div>

            {{-- محتوای معاملات --}}
            <div class="deal-card overflow-hidden">

                <div class="flex flex-wrap items-center justify-between gap-3 border-b border-[#eee8dc] px-4 py-5 sm:px-6">

                    <div>
                        <h2 class="text-sm font-bold text-[#34302a]">
                            معاملات من
                        </h2>

                        <p class="mt-1 text-[11px] text-[#978b78]">
                            سوابق ثبت‌شده در حساب کاربری شما
                        </p>
                    </div>
                </div>

                @if (count(Auth::user()->deals))
                    {{-- نسخه دسکتاپ --}}
                    <div class="hidden overflow-x-auto md:block">

                        <table class="deal-table w-full border-collapse text-right">

                            <thead class="bg-[#faf8f3]">
                                <tr>
                                    <th>نوع / زمان</th>
                                    <th>وضعیت</th>
                                    <th>علت رد</th>
                                    <th>قیمت طلا</th>
                                    <th>وزن</th>
                                    <th>مبلغ تراکنش</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach (Auth::user()->deals as $deal)
                                    <tr>

                                        <td>
                                            <div class="flex flex-col gap-2">

                                                @if ($deal->transaction->type == 'buy')
                                                    <span class="font-bold text-[#a47b3b]">خرید طلا</span>
                                                @elseif ($deal->transaction->type == 'sell')
                                                    <span class="font-bold text-[#596579]">فروش طلا</span>
                                                @endif

                                                <span class="text-[11px] text-[#a39783] in-fa">
                                                    {{ $deal->date . ' - ' . $deal->time }}
                                                </span>

                                            </div>
                                        </td>

                                        <td>
                                            @if ($deal->transaction->isApproved == 1)
                                                <span class="deal-status deal-status-approved">
                                                    تایید شده
                                                </span>
                                            @elseif ($deal->transaction->isApproved == -1)
                                                <span class="deal-status deal-status-rejected">
                                                    رد شده
                                                </span>
                                            @elseif ($deal->transaction->isApproved == 0)
                                                <span class="deal-status deal-status-pending">
                                                    در انتظار تایید
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($deal->message)
                                                <span class="text-xs text-[#bb5c52]">
                                                    {{ $deal->message }}
                                                </span>
                                            @else
                                                <span class="text-[#b4aa99]">-</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="font-medium text-[#65563f] in-fa">
                                                {{ number_format($deal->goldPrice) }}
                                            </span>
                                            <span class="mr-1 text-[10px] text-[#a39783]">ریال</span>
                                        </td>

                                        <td>
                                            <span class="font-bold text-[#65563f] in-fa">
                                                {{ $deal->goldWeight }}
                                            </span>
                                            <span class="mr-1 text-[10px] text-[#a39783]">گرم</span>
                                        </td>

                                        <td>
                                            <span class="font-bold text-[#8e672b] in-fa">
                                                {{ number_format($deal->transaction->amount) }}
                                            </span>
                                            <span class="mr-1 text-[10px] text-[#a39783]">ریال</span>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    {{-- نسخه موبایل --}}
                    <div class="space-y-3 p-3 md:hidden">

                        @foreach (Auth::user()->deals as $deal)
                            <div class="deal-mobile-card">

                                <div class="mb-4 flex items-center justify-between gap-3">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 items-center justify-center rounded-xl
                                        {{ $deal->transaction->type == 'buy' ? 'bg-[#f5eddf] text-[#a47b3b]' : 'bg-[#edf0f5] text-[#596579]' }}">

                                            @if ($deal->transaction->type == 'buy')
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                        d="M12 5v14m-7-7h14" />
                                                </svg>
                                            @elseif ($deal->transaction->type == 'sell')
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                        d="M5 12h14" />
                                                </svg>
                                            @endif

                                        </div>

                                        <div>
                                            @if ($deal->transaction->type == 'buy')
                                                <h3 class="text-sm font-bold text-[#a47b3b]">خرید طلا</h3>
                                            @elseif ($deal->transaction->type == 'sell')
                                                <h3 class="text-sm font-bold text-[#596579]">فروش طلا</h3>
                                            @endif

                                            <p class="mt-1 text-[10px] text-[#a39783] in-fa">
                                                {{ $deal->date . ' - ' . $deal->time }}
                                            </p>
                                        </div>

                                    </div>

                                    @if ($deal->transaction->isApproved == 1)
                                        <span class="deal-status deal-status-approved">تایید شده</span>
                                    @elseif ($deal->transaction->isApproved == -1)
                                        <span class="deal-status deal-status-rejected">رد شده</span>
                                    @elseif ($deal->transaction->isApproved == 0)
                                        <span class="deal-status deal-status-pending">در انتظار تایید</span>
                                    @endif

                                </div>

                                <div class="grid grid-cols-2 gap-3 border-t border-[#f0ece4] pt-3">

                                    <div>
                                        <span class="block text-[10px] text-[#a39783]">قیمت هر گرم</span>
                                        <span class="mt-1 block text-xs font-bold text-[#65563f] in-fa">
                                            {{ number_format($deal->goldPrice) }}
                                            <span class="text-[10px] font-normal text-[#a39783]">ریال</span>
                                        </span>
                                    </div>

                                    <div>
                                        <span class="block text-[10px] text-[#a39783]">وزن معامله</span>
                                        <span class="mt-1 block text-xs font-bold text-[#65563f] in-fa">
                                            {{ $deal->goldWeight }}
                                            <span class="text-[10px] font-normal text-[#a39783]">گرم</span>
                                        </span>
                                    </div>

                                    <div class="col-span-2 rounded-xl bg-[#faf8f3] p-3">
                                        <span class="block text-[10px] text-[#a39783]">مبلغ تراکنش</span>
                                        <span class="mt-1 block text-sm font-bold text-[#8e672b] in-fa">
                                            {{ number_format($deal->transaction->amount) }}
                                            <span class="text-[10px] font-normal text-[#a39783]">ریال</span>
                                        </span>
                                    </div>

                                </div>

                                @if ($deal->message)
                                    <div class="mt-3 rounded-xl border border-red-100 bg-red-50/70 p-3">
                                        <span class="mb-1 block text-[10px] font-bold text-red-700">
                                            علت رد معامله
                                        </span>
                                        <p class="text-xs leading-6 text-red-600">
                                            {{ $deal->message }}
                                        </p>
                                    </div>
                                @endif

                            </div>
                        @endforeach

                    </div>
                @else
                    {{-- حالت بدون معامله --}}
                    <div class="flex flex-col items-center px-5 py-14 text-center">

                        <div
                            class="mb-5 flex h-20 w-20 items-center justify-center rounded-3xl border border-[#eae3d5] bg-[#faf8f3] text-[#b68b43]">

                            <svg class="h-9 w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
                            </svg>

                        </div>

                        <h3 class="mb-2 text-sm font-bold text-[#34302a]">
                            هنوز معامله‌ای ثبت نکرده‌اید
                        </h3>

                        <p class="max-w-xs text-xs leading-7 text-[#978b78]">
                            پس از انجام اولین خرید یا فروش، جزئیات معاملات شما در این بخش نمایش داده می‌شود.
                        </p>

                    </div>
                @endif

            </div>

            {{-- توضیحات پایین صفحه --}}
            <div class="mt-4 flex items-start gap-2 px-2 text-[11px] leading-6 text-[#a39783]">
                <svg class="mt-1 h-4 w-4 shrink-0 text-[#b68b43]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                        d="M12 9v3m0 4h.01M10.3 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.7 3.86a2 2 0 0 0-3.4 0Z" />
                </svg>

                اطلاعات این بخش بر اساس وضعیت ثبت‌شده معاملات حساب کاربری شما نمایش داده می‌شود.
            </div>

        </div>

    </div>

@endsection
