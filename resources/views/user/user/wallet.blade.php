@extends('admin.app.dashboard')
@section('title', 'کیف پول')
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
    <div class="w-2/3 mx-auto">
        <div class="py-10 shadow-md rounded-2xl flex flex-col items-center justify-center gap-5">
            <div class="flex items-center gap-2">
                <h2 class="font-bold">موجودی کیف پول شما</h2>
                <div onclick="showHideAsset(this, 'hide')" class="cursor-pointer">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="*:*:fill-icon-neutral-tertiary">
                        <g id="Outline/Eye">
                            <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9995 5.5C8.76836 5.49998 5.43684 7.42677 3.12146 11.49C2.94129 11.8062 2.94129 12.1936 3.12146 12.5098C5.43684 16.5731 8.76837 18.4999 11.9996 18.4999C15.2307 18.4999 18.5623 16.5732 20.8776 12.5099C21.0578 12.1937 21.0578 11.8063 20.8776 11.4901C18.5623 7.42687 15.2307 5.50002 11.9995 5.5ZM22.1809 10.7475L21.5293 11.1188L22.1809 10.7475C22.6234 11.524 22.6234 12.476 22.1809 13.2526C19.6574 17.681 15.8787 20 11.9995 19.9999C8.12044 19.9999 4.34167 17.6809 1.8182 13.2524C1.3757 12.4759 1.3757 11.5239 1.8182 10.7474C4.34167 6.31895 8.12044 3.99997 11.9996 4C15.8787 4.00003 19.6574 6.31907 22.1809 10.7475ZM11.9995 9.5C10.6188 9.5 9.49955 10.6193 9.49955 12C9.49955 13.3807 10.6188 14.5 11.9995 14.5C13.3803 14.5 14.4995 13.3807 14.4995 12C14.4995 10.6193 13.3803 9.5 11.9995 9.5ZM7.99955 12C7.99955 9.79086 9.79041 8 11.9995 8C14.2087 8 15.9995 9.79086 15.9995 12C15.9995 14.2091 14.2087 16 11.9995 16C9.79041 16 7.99955 14.2091 7.99955 12Z"
                                fill="url(#paint0_linear_4793_10908)"></path>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear_4793_10908" x1="11.9995" y1="4" x2="11.9995"
                                y2="19.9999" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#039982"></stop>
                                <stop offset="1" stop-color="#027368"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <p id="asset" class="text-lg font-bold">{{ $user->wallet['asset'] ?? 0 }}</p>
                <span class="text-xs text-gray-400">تومان</span>
            </div>
        </div>
        <div class="shadow-md rounded-2xl flex flex-col items-center justify-start gap-5 py-3 px-2">
            <div class="w-full grid grid-cols-3 gap-5 mb-10">
                <div onclick="changeTabContent('deposit')"
                    class="tab flex items-center justify-center gap-2 text-xl text-green-600 bg-green-100 py-1 rounded-xl cursor-pointer">
                    <span>واریز</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 21 20" fill="none"
                        class="size-8 *:fill-icon-neutral-secondary fill-gray-500">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.25 2.5C10.5952 2.5 10.875 2.77982 10.875 3.125V10.9911L12.7247 9.14139C12.9688 8.89731 13.3645 8.89731 13.6086 9.14139C13.8527 9.38547 13.8527 9.7812 13.6086 10.0253L10.6919 12.9419C10.5747 13.0592 10.4158 13.125 10.25 13.125C10.0842 13.125 9.92526 13.0592 9.80805 12.9419L6.89139 10.0253C6.64731 9.7812 6.64731 9.38547 6.89139 9.14139C7.13547 8.89731 7.5312 8.89731 7.77528 9.14139L9.62499 10.9911V3.125C9.62499 2.77982 9.90481 2.5 10.25 2.5ZM3.375 11.6667C3.72018 11.6667 4 11.9465 4 12.2917V15.2083C4 15.7836 4.46637 16.25 5.04167 16.25H15.4583C16.0336 16.25 16.5 15.7836 16.5 15.2083V12.2917C16.5 11.9465 16.7798 11.6667 17.125 11.6667C17.4702 11.6667 17.75 11.9465 17.75 12.2917V15.2083C17.75 16.474 16.724 17.5 15.4583 17.5H5.04167C3.77601 17.5 2.75 16.474 2.75 15.2083V12.2917C2.75 11.9465 3.02982 11.6667 3.375 11.6667Z">
                        </path>
                    </svg>
                </div>
                <div onclick="changeTabContent('withdraw')"
                    class="tab flex items-center justify-center gap-2 text-xl text-red-600 bg-red-100 py-1 rounded-xl cursor-pointer">
                    <span>برداشت</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 21 20" fill="none"
                        class="size-8 *:fill-icon-neutral-secondary fill-gray-500">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.375 11.6665C3.72018 11.6665 4 11.9463 4 12.2915V15.2082C4 15.7835 4.46637 16.2498 5.04167 16.2498H15.4583C16.0336 16.2498 16.5 15.7835 16.5 15.2082V12.2915C16.5 11.9463 16.7798 11.6665 17.125 11.6665C17.4702 11.6665 17.75 11.9463 17.75 12.2915V15.2082C17.75 16.4738 16.724 17.4998 15.4583 17.4998H5.04167C3.77601 17.4998 2.75 16.4738 2.75 15.2082V12.2915C2.75 11.9463 3.02982 11.6665 3.375 11.6665Z">
                        </path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10.2503 13.3335C9.90516 13.3335 9.62533 13.0537 9.62533 12.7085L9.62533 4.84238L7.7756 6.69211C7.53152 6.93618 7.13579 6.93618 6.89172 6.6921C6.64764 6.44803 6.64764 6.0523 6.89172 5.80822L9.80839 2.89155C9.9256 2.77434 10.0846 2.7085 10.2503 2.7085C10.4161 2.7085 10.5751 2.77435 10.6923 2.89156L13.6089 5.80822C13.853 6.0523 13.853 6.44803 13.6089 6.69211C13.3649 6.93618 12.9691 6.93618 12.725 6.6921L10.8753 4.84238L10.8753 12.7085C10.8753 13.0537 10.5955 13.3335 10.2503 13.3335Z">
                        </path>
                    </svg>
                </div>
                <div onclick="changeTabContent('history', {{ $user['id'] }})"
                    class="tab flex items-center justify-center gap-2 text-xl text-blue-600 bg-blue-100 py-1 rounded-xl cursor-pointer">
                    <span>تاریخچه</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 29 24" fill="none"
                        class="size-7 *:fill-icon-neutral-secondary fill-gray-500">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.7829 3.37787C17.623 2.47138 16.7586 1.86609 15.8521 2.02593L3.37787 4.22548C2.47138 4.38532 1.86609 5.24975 2.02593 6.15624L2.31535 7.79758L18.0723 5.01921L17.7829 3.37787ZM12.7206 7.99371L2.66264 9.7672L3.99395 17.3174C4.15378 18.2239 5.01822 18.8292 5.92471 18.6693L10.8813 17.7953C10.4571 16.7287 10.2239 15.5654 10.2239 14.3476C10.2239 11.8931 11.1714 9.65985 12.7206 7.99371ZM11.8759 19.6508L6.27201 20.6389C4.27773 20.9906 2.37598 19.659 2.02433 17.6647L0.056318 6.50353C-0.295327 4.50926 1.03629 2.60751 3.03057 2.25586L15.5048 0.056318C17.4991 -0.295327 19.4008 1.03629 19.7525 3.03057L20.105 5.03011C25.0047 5.31369 28.8906 9.37687 28.8906 14.3476C28.8906 19.5023 24.7119 23.681 19.5572 23.681C16.3724 23.681 13.5602 22.0858 11.8759 19.6508ZM19.5572 7.0143C15.5071 7.0143 12.2239 10.2975 12.2239 14.3476C12.2239 18.3977 15.5071 21.681 19.5572 21.681C23.6073 21.681 26.8906 18.3977 26.8906 14.3476C26.8906 10.2975 23.6073 7.0143 19.5572 7.0143ZM19.5572 10.3476C20.1095 10.3476 20.5572 10.7953 20.5572 11.3476V13.9334L22.931 16.3072C23.3215 16.6977 23.3215 17.3309 22.931 17.7214C22.5405 18.1119 21.9073 18.1119 21.5168 17.7214L18.8501 15.0547C18.6626 14.8672 18.5572 14.6128 18.5572 14.3476V11.3476C18.5572 10.7953 19.0049 10.3476 19.5572 10.3476Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div id="tabContent" class="w-full max-h-120 overflow-auto">
                <form action="{{ route('wallet.deposit') }}" method="POST" enctype="multipart/form-data"
                    class="w-full flex flex-col gap-10">
                    @csrf
                    <div class="w-full flex flex-col gap-4">
                        <div class="w-full flex items-center justify-between">
                            <label for="depositPrice">مبلغ واریزی</label>
                            <span class="text-[11px] cursor-pointer" onclick="minDepositable()">حداقل مبلغ قابل واریز</span>
                        </div>
                        <div class="w-full flex items-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            <div class="w-full">
                                <input type="number" name="depositPrice" id="depositPrice" class="outline-none p-2 w-full"
                                    value="{{ old('depositPrice') }}">
                                @error('depositPrice')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <span>تومان</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <span>شماره کارت مبدا</span>
                        <p class="text-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            6037-9915-4277-6038
                        </p>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="receipt">تصویر رسید تراکنش : </label>
                        <input type="file" name="receipt" id="receipt"
                            class="text-center shadow-md py-2 px-2 border border-gray-400 rounded-xl"></input>
                        @error('receipt')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full ">
                        <button type="submit"
                            class="bg-green-100 text-green-600 w-full py-2 rounded-xl cursor-pointer">واریز</button>
                    </div>
                </form>
                {{--  --}}
                {{-- <table class="w-full">
                    <thead class="w-full">
                        <tr class="w-full flex justify-between mb-10 px-4">
                            <th>نوع / زمان</th>
                            <th>مبلغ تراکنش</th>
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        @foreach ($user->walletTransactions as $transaction)
                            @if ($transaction['type'] == 'withdraw')
                                <tr class="w-full flex justify-between mb-10 px-4">
                                    <td class="flex flex-col items-center gap-2">
                                        <span class="text-red-500">برداشت</span>
                                        <span class="text-xs text-gray-400">{{ $transaction['created_at'] }}</span>
                                    </td>
                                    <td class="flex flex-col items-center gap-2">
                                        <span>{{ $transaction['amount'] }}</span>
                                        <span class="text-xs text-gray-400">تومان</span>
                                    </td>
                                </tr>
                            @endif
                            @if ($transaction['type'] == 'deposit')
                                <tr class="w-full flex justify-between mb-10 px-4">
                                    <td class="flex flex-col items-center gap-2">
                                        <span class="text-green-500">واریز</span>
                                        <span class="text-xs text-gray-400">{{ $transaction['created_at'] }}</span>
                                    </td>
                                    <td class="flex flex-col items-center gap-2">
                                        <span>{{ $transaction['amount'] }}</span>
                                        <span class="text-xs text-gray-400">تومان</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
    <script>
        let asset = document.getElementById('asset')
        let price = asset.innerText

        function showHideAsset(el, state) {
            if (state == 'hide') {
                el.innerHTML = `
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="*:*:fill-icon-neutral-tertiary"><g id="Outline/Hide"><path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M2.21975 2.21967C2.51265 1.92678 2.98752 1.92678 3.28041 2.21967L21.7804 20.7197C22.0733 21.0126 22.0733 21.4874 21.7804 21.7803C21.4875 22.0732 21.0126 22.0732 20.7198 21.7803L17.3708 18.4313C14.8476 19.9862 12.0017 20.3926 9.29542 19.6173C6.40554 18.7894 3.74776 16.6368 1.81978 13.2543C1.37764 12.4786 1.37569 11.5249 1.81865 10.7475C2.83111 8.97073 4.0441 7.53359 5.38803 6.44861L2.21975 3.28033C1.92686 2.98744 1.92686 2.51256 2.21975 2.21967ZM6.45554 7.51611C5.22422 8.48095 4.08443 9.801 3.12192 11.4901C2.94222 11.8055 2.9423 12.1946 3.12295 12.5115C4.89352 15.6178 7.26078 17.4741 9.70852 18.1753C11.8818 18.7979 14.1761 18.528 16.276 17.3365L14.2482 15.3088C13.6077 15.7447 12.8333 16 12.0001 16C9.79095 16 8.00008 14.2091 8.00008 12C8.00008 11.1668 8.2554 10.3924 8.69129 9.75186L6.45554 7.51611ZM9.7829 10.8435C9.60208 11.1893 9.50008 11.5825 9.50008 12C9.50008 13.3807 10.6194 14.5 12.0001 14.5C12.4176 14.5 12.8108 14.398 13.1566 14.2172L9.7829 10.8435ZM20.8775 11.489C17.994 6.42962 13.5395 4.67067 9.59781 5.85706C9.20117 5.97645 8.78285 5.75169 8.66347 5.35505C8.54409 4.95841 8.76885 4.5401 9.16548 4.42071C13.9175 2.99041 19.0296 5.21732 22.1807 10.7462C22.623 11.5222 22.6243 12.4754 22.1815 13.2524C21.6044 14.2652 20.9623 15.1674 20.2678 15.9571C19.9943 16.2682 19.5204 16.2986 19.2093 16.0251C18.8983 15.7515 18.8679 15.2776 19.1414 14.9666C19.7645 14.258 20.3483 13.4398 20.8782 12.5098C21.0581 12.1942 21.058 11.8057 20.8775 11.489Z" fill="url(#paint0_linear_4794_12220)"></path></g><defs><linearGradient id="paint0_linear_4794_12220" x1="12.0002" y1="2" x2="12.0002" y2="22" gradientUnits="userSpaceOnUse"><stop stop-color="#039982"></stop><stop offset="1" stop-color="#027368"></stop></linearGradient></defs></svg>
               `
                asset.innerText = "******"
                el.setAttribute('onclick', "showHideAsset(this, 'show')")
            }
            if (state == 'show') {
                el.innerHTML = `
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="*:*:fill-icon-neutral-tertiary">
                        <g id="Outline/Eye">
                            <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.9995 5.5C8.76836 5.49998 5.43684 7.42677 3.12146 11.49C2.94129 11.8062 2.94129 12.1936 3.12146 12.5098C5.43684 16.5731 8.76837 18.4999 11.9996 18.4999C15.2307 18.4999 18.5623 16.5732 20.8776 12.5099C21.0578 12.1937 21.0578 11.8063 20.8776 11.4901C18.5623 7.42687 15.2307 5.50002 11.9995 5.5ZM22.1809 10.7475L21.5293 11.1188L22.1809 10.7475C22.6234 11.524 22.6234 12.476 22.1809 13.2526C19.6574 17.681 15.8787 20 11.9995 19.9999C8.12044 19.9999 4.34167 17.6809 1.8182 13.2524C1.3757 12.4759 1.3757 11.5239 1.8182 10.7474C4.34167 6.31895 8.12044 3.99997 11.9996 4C15.8787 4.00003 19.6574 6.31907 22.1809 10.7475ZM11.9995 9.5C10.6188 9.5 9.49955 10.6193 9.49955 12C9.49955 13.3807 10.6188 14.5 11.9995 14.5C13.3803 14.5 14.4995 13.3807 14.4995 12C14.4995 10.6193 13.3803 9.5 11.9995 9.5ZM7.99955 12C7.99955 9.79086 9.79041 8 11.9995 8C14.2087 8 15.9995 9.79086 15.9995 12C15.9995 14.2091 14.2087 16 11.9995 16C9.79041 16 7.99955 14.2091 7.99955 12Z"
                                fill="url(#paint0_linear_4793_10908)"></path>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear_4793_10908" x1="11.9995" y1="4" x2="11.9995"
                                y2="19.9999" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#039982"></stop>
                                <stop offset="1" stop-color="#027368"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
               `
                asset.innerText = price
                el.setAttribute('onclick', "showHideAsset(this, 'hide')")
            }
        }

        function changeTabContent(tabName, user_id) {
            let tabContent = document.getElementById('tabContent')
            if (tabName == 'deposit') {
                tabContent.innerHTML = `
                <form action="{{ route('wallet.deposit') }}" method="POST" enctype="multipart/form-data"
                    class="w-full flex flex-col gap-10">
                    @csrf
                    <div class="w-full flex flex-col gap-4">
                        <div class="w-full flex items-center justify-between">
                            <label for="depositPrice">مبلغ واریزی</label>
                            <span class="text-[11px] cursor-pointer" onclick="minDepositable()">حداقل مبلغ قابل واریز</span>
                        </div>
                        <div class="w-full flex items-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            <div class="w-full">
                                <input type="number" name="depositPrice" id="depositPrice" class="outline-none p-2 w-full"
                                    value="{{ old('depositPrice') }}">
                                @error('depositPrice')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <span>تومان</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <span>شماره کارت مبدا</span>
                        <p class="text-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            6037-9915-4277-6038
                        </p>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <label for="receipt">تصویر رسید تراکنش : </label>
                        <input type="file" name="receipt" id="receipt"
                            class="text-center shadow-md py-2 px-2 border border-gray-400 rounded-xl"></input>
                    </div>
                    <div class="w-full ">
                        <button type="submit"
                            class="bg-green-100 text-green-600 w-full py-2 rounded-xl cursor-pointer">واریز</button>
                    </div>
                </form>
               `
            }
            if (tabName == 'withdraw') {
                tabContent.innerHTML = `
                <form action="{{ route('wallet.withdraw') }}" method="POST" class="w-full flex flex-col gap-10">
                    @csrf
                    <div class="w-full flex flex-col gap-4">
                        <div class="w-full flex items-center justify-between">
                            <label for="withdrawPrice">مبلغ برداشتی</label>
                            <span class="text-[11px] cursor-pointer" onclick="maxWithdrawable()">حداکثر مبلغ قابل
                                برداشت</span>
                        </div>
                        <div class="w-full flex items-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            <div class="w-full">
                                <input type="number" name="withdrawPrice" id="withdrawPrice"
                                    class="outline-none p-2 w-full" value="{{ old('withdrawPrice') }}">
                                @error('withdrawPrice')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <span>تومان</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-4">
                        <span>شماره کارت مقصد</span>
                        <p class="text-center shadow-md py-2 px-2 border border-gray-400 rounded-xl">
                            6037-9915-4277-6038
                        </p>
                    </div>
                    <div class="w-full ">
                        <button type="submit"
                            class="bg-red-100 text-red-600 w-full py-2 rounded-xl cursor-pointer">برداشت</button>
                    </div>
                </form>
               `
            }
            if (tabName == 'history') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                })
                $.ajax({
                    url: "{{ route('wallet.transactions') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'user_id': user_id,
                    },
                    success: function(data) {
                        let isApproved
                        let imgLink = "{{ asset('storage/') }}"
                        element = `
                            <table class="w-full">
                                <thead class="w-full">
                                    <tr class="w-full mb-10 px-4 grid grid-cols-4">
                                        <th>نوع / زمان</th>
                                        <th>وضعیت</th>
                                        <th>فیش واریزی</th>
                                        <th>مبلغ تراکنش</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                            `
                        data.wallet_transactions.forEach(transaction => {
                            switch (transaction.isApproved) {
                                case 1:
                                    isApproved = 'تایید شده'
                                    break;
                                case -1:
                                    isApproved = 'رد شده'
                                    break;
                                case 0:
                                    isApproved = 'در انتظار تایید'
                                    break;
                            }
                            if (transaction.type == 'deposit') {
                                element +=
                                    `
                                    <tr class="w-full mb-10 px-4 grid grid-cols-4">
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="text-green-500">واریز</span>
                                            <span class="text-xs text-gray-400">${transaction.created_at}</span>
                                        </td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="text-gray-500">${isApproved}</span>
                                        </td>
                                        <td class="flex justify-center items-center">
                                            <img src="${imgLink}/${transaction.receipt}" class="size-15">
                                        </td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span>${transaction.amount}</span>
                                            <span class="text-xs text-gray-400">تومان</span>
                                        </td>
                                    </tr>
                                `
                            }
                            if (transaction.type == 'withdraw') {
                                element +=
                                    `
                                    <tr class="w-full mb-10 px-4 grid grid-cols-4">
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="text-red-500">برداشت</span>
                                            <span class="text-xs text-gray-400">${transaction.created_at}</span>
                                        </td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span class="text-gray-500">${isApproved}</span>
                                        </td>
                                        <td></td>
                                        <td class="flex flex-col items-center gap-2">
                                            <span>${transaction.amount}</span>
                                            <span class="text-xs text-gray-400">تومان</span>
                                        </td>
                                    </tr>
                                `
                            }
                        });
                        element += `</tbody></table>`
                        tabContent.innerHTML = element
                    },
                    error: function() {
                        alert('error')
                    }
                })
            }
        }

        function maxWithdrawable() {
            document.getElementById('withdrawPrice').value = asset.innerText
        }

        function minDepositable() {
            document.getElementById('depositPrice').value = 1000000
        }

        //   let tabs = document.querySelectorAll('.tab')
        //   tabs.forEach(tab => {
        //       tab.addEventListener('click', function() {
        //           console.log(tab);
        //       })
        //   });
    </script>
@endsection
