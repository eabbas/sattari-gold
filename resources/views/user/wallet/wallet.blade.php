@extends('admin.app.dashboard')
@section('title', 'کیف پول')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 z-5 flex justify-center items-center transition-all duration-300">
            <span class="text-sm text-[var(--light-theme-text-color)]"> {{ session('failure') }} </span>
        </div>
    @endif
    <div class="w-full sm:w-2/3 mx-auto">
        {{--  --}}
        <div class="w-full bg-white rounded-md px-3 py-2">
            <form action="{{ route('wallet.transactionRequest') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-6 gap-5 mt-5">
                    <div
                        class="col-span-6 flex flex-col md:flex-row items-center border-1 border-(--border-dashboard) rounded-lg md:divide-x-1 divide-(--border-dashboard) px-1 md:px-2 py-2 md:py-3 gap-2">
                        <div class="w-full md:w-6/12">
                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">نام
                                :</span>
                            <span class="text-xs md:text-base font-bold">{{ $user['name'] }}
                                {{ $user['family'] }}</span>
                        </div>
                        <div class="w-full md:w-6/12">
                            <span class="text-xs md:text-base text-(--text-secondary-dashboard) ml-1">شماره
                                :</span>
                            <span class="text-[10px] md:text-base font-bold in-fa">{{ $user['phoneNumber'] }}</span>
                        </div>
                    </div>
                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                        <div class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 pb-2">
                                    <span class="">
                                        <svg class="size-5 fill-(--primary-dashboard)" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 576 512">
                                            <path
                                                d="M276.1 405.2l5.6-1.4 0 0c55.2-14.1 117.5-30 182.8-28.1c4.1-31.4 30.9-55.7 63.5-55.7V144c-35.3 0-63.9-28.6-64-63.9c-49.9-1.8-103.1 11.1-164.1 26.6l-5.6 1.4c-55.2 14.1-117.5 30-182.8 28.1C107.4 167.7 80.5 192 48 192V368c35.3 0 63.9 28.6 64 63.9c49.9 1.8 103.1-11.1 164.1-26.6zM0 60.3c16 8.2 32 14.3 48 18.7c80 22.1 160 1.7 240-18.7c96-24.5 192-48.9 288 0V398.9v52.8c-16-8.2-32-14.3-48-18.7c-80-22.1-160-1.7-240 18.7c-96 24.5-192 48.9-288 0V113.1 60.3zM384 256c0 61.9-43 112-96 112s-96-50.1-96-112s43-112 96-112s96 50.1 96 112zM256 192v32h16v64h-8H248v32h16 8 32 8 16V288H312h-8V208 192H288 272 256z" />
                                        </svg>
                                    </span>
                                    <span class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                        موجودی ریال
                                    </span>
                                </div>
                                <div class="font-bold pb-2 in-fa">{{ number_format($user->wallet['asset'] ?? 0) }}</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 pt-2">
                                    <span class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                        موجودی قابل برداشت
                                    </span>
                                </div>
                                <div class="font-bold pt-2">
                                    <span id="withdrawableBalance" data-balance="{{ $user->wallet['asset'] ?? 0 }}"
                                        class="in-fa">{{ number_format($user->wallet['asset'] ?? 0) }}</span>
                                    <span class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                        تومان
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 bg-zinc-200 p-2 rounded-lg">
                        <div class="w-full bg-white divide-y-1 divide-(--border-dashboard) p-2 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2 pb-2">
                                    <span class="">

                                        <svg height="30px" width="30px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0 0 511.882 511.882" xml:space="preserve">
                                            <polygon style="fill:#F6BB42;"
                                                points="350.216,176.572 278.374,158.615 37.038,264.123 0,338.207 125.753,374.324 386.13,258.531 " />
                                            <polygon style="fill:#FFCE54;"
                                                points="350.216,176.572 107.756,284.345 125.753,374.324 386.13,258.531 " />
                                            <polygon style="fill:#E8AA3D;"
                                                points="107.756,284.345 37.038,264.123 0.015,338.207 125.753,374.324 " />
                                            <polygon style="fill:#F6BB42;"
                                                points="475.969,212.682 404.127,194.717 162.791,300.232 125.753,374.324 251.504,410.41 511.882,294.625 " />
                                            <polygon style="fill:#FFCE54;"
                                                points="475.969,212.682 233.508,320.431 251.504,410.41 511.882,294.625 " />
                                            <polygon style="fill:#E8AA3D;"
                                                points="233.508,320.431 162.791,300.232 125.753,374.324 251.504,410.41 " />
                                            <polygon style="fill:#F6BB42;"
                                                points="396.316,119.429 324.488,101.473 103.867,198.435 66.843,272.519 192.596,308.621 432.245,201.379 " />
                                            <polygon style="fill:#FFCE54;"
                                                points="396.316,119.429 174.6,218.641 192.596,308.621 432.245,201.379 " />
                                            <polygon style="fill:#E8AA3D;"
                                                points="174.6,218.641 103.867,198.435 66.843,272.519 192.596,308.621 " />
                                        </svg>
                                    </span>
                                    <span class="text-xs md:text-base text-(--text-secondary-dashboard) font-bold">
                                        موجودی طلا
                                    </span>
                                </div>
                                <div class="font-bold pb-2 in-fa">{{ $user->wallet->goldWeight ?? 0 }} گرم</div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 pt-2">
                                    <span class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                        موجودی قابل برداشت
                                    </span>
                                </div>
                                <div class="font-bold pt-2">
                                    <span class="in-fa">{{ $user->wallet->goldWeight ?? 0 }}</span>
                                    <span class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                        گرم
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 pt-2">
                                    <span class="text-(--text-secondary-dashboard) text-xs md:text-sm">
                                        ارزش دارایی شما
                                    </span>
                                </div>
                                <div class="font-bold pt-2">
                                    <span
                                        class="in-fa">{{ number_format(($user->wallet->goldWeight ?? 0) * 25000000) }}</span>
                                    <span class="text-(--text-secondary-dashboard) text-[6px] md:text-xs">
                                        تومان
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6">
                        <div
                            class="flex items-center border-1 border-(--border-dashboard) rounded-lg divide-x-1 divide-(--border-dashboard) px-2 py-3 gap-2">
                            @if ($setting && $setting['depositIsActive'])
                                <label for="deposit" class="w-6/12 flex items-center gap-1 md:gap-3">
                                    <input class="accent-(--primary-dashboard) size-4 md:size-5" type="radio"
                                        name="transactionType" value="deposit" id="deposit"
                                        onchange="sendReceipt('deposit')">
                                    <span class="text-xs text-green-400 md:text-base font-bold">واریز</span>
                                </label>
                            @else
                                <span class="w-1/2 text-xs text-[var(--color-warning)] font-bold">در حال حاضر امکان واریز
                                    کردن غیر
                                    فعال میباشد.</span>
                            @endif
                            @if ($setting && $setting['withdrawIsActive'])
                                <label for="withdraw" class="w-6/12 flex items-center gap-1 md:gap-3">
                                    <input class="accent-(--primary-dashboard) size-4 md:size-5" type="radio"
                                        name="transactionType" value="withdraw" id="withdraw"
                                        onchange="sendReceipt('withdraw')">
                                    <span class="text-xs text-red-400 md:text-base font-bold">برداشت</span>
                                </label>
                            @else
                                <span class="w-1/2 text-xs text-[var(--color-warning)] font-bold">در حال حاضر امکان برداشت
                                    کردن غیر
                                    فعال میباشد.</span>
                            @endif
                        </div>
                        @error('transactionType')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div id="transactionMethod" class="col-span-6 grid grid-cols-6 gap-4 ">
                        <div id="percents" class="col-span-6 p-4 hidden">
                            <span class="mb-5 block">برداشت از کیف پول به مقدار:</span>
                            <div class="w-full flex items-center justify-between gap-2">
                                <div class="">
                                    <label for="withdrawPercent10" class="in-fa">10%</label>
                                    <input type="radio" name="withdrawPercent" id="withdrawPercent10" value="10">
                                </div>
                                <div class="">
                                    <label for="withdrawPercent25" class="in-fa">25%</label>
                                    <input type="radio" name="withdrawPercent" id="withdrawPercent25" value="25">
                                </div>
                                <div class="">
                                    <label for="withdrawPercent50" class="in-fa">50%</label>
                                    <input type="radio" name="withdrawPercent" id="withdrawPercent50" value="50">
                                </div>
                                <div class="">
                                    <label for="withdrawPercent75" class="in-fa">75%</label>
                                    <input type="radio" name="withdrawPercent" id="withdrawPercent75" value="75">
                                </div>
                                <div class="">
                                    <label for="withdrawPercent100" class="in-fa">100%</label>
                                    <input type="radio" name="withdrawPercent" id="withdrawPercent100" value="100">
                                </div>
                            </div>
                        </div>
                        <label class="col-span-6 md:col-span-3" for="fee">
                            مبلغ
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard) in-fa"
                                type="number" name="fee" id="fee" placeholder="ریال"
                                value="{{ old('fee') }}">
                            @error('fee')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-6 md:col-span-3 @if (!$errors->hasAny(['receipt'])) hidden @endif"
                            for="receipt">
                            تصویر فیش واریزی
                            <input
                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                type="file" name="receipt" id="receipt">
                            @error('receipt')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </label>
                        <label class="col-span-6" for="description">
                            توضیحات
                            <textarea
                                class="w-full hover:shadow-sm transition-all mt-2 border-1 border-(--border-dashboard) rounded-md p-2 outline-(--border-dashboard)"
                                name="description" id="description"></textarea>
                        </label>
                    </div>
                    <button type="submit"
                        class="col-span-3 border-1 border-(--primary-dashboard) text-(--primary-dashboard) py-4 rounded-md font-bold cursor-pointer">ثبت</button>
                    <button type="reset"
                        class="col-span-3 border-1 border-(--danger-dashboard) text-(--danger-dashboard) py-4 rounded-md font-bold cursor-pointer">
                        لغو</button>
                </div>
            </form>
        </div>
        {{--  --}}
    </div>
    <script>
        let setting = "{{ $setting }}"
        let settingArr = setting.split(',')
        console.log(settingArr);
        // settingArr.forEach(item => {
        //     console.log(item);
        //     let newItem = JSON.parse(item)
        //     console.log(newItem);
        // });

        // let radioInputs = document.querySelectorAll('input[name="transactionType"]')
        // let transactionMethod = document.getElementById('transactionMethod')
        // radioInputs.forEach(radio => {
        //     radio.addEventListener('change', function() {
        //         radioInputs.forEach(item => {
        //             // if (item.checked) {
        //                 if (transactionMethod.classList.contains('hidden')) {
        //                     transactionMethod.classList.remove('hidden')
        //                 } else {
        //                     transactionMethod.classList.add('hidden')
        //                 }
        //             // }
        //         })
        //     })
        // })

        function sendReceipt(state) {
            let receipt = document.getElementById('receipt').parentElement
            let percents = document.getElementById('percents')
            if (state == 'deposit') {
                receipt.classList.remove('hidden')
                percents.classList.add('hidden')
            }
            if (state == 'withdraw') {
                receipt.classList.add('hidden')
                percents.classList.remove('hidden')
            }
        }

        let withdrawPercents = document.querySelectorAll('input[name="withdrawPercent"]')
        let withdrawableBalance = document.getElementById('withdrawableBalance').dataset.balance
        let feeInput = document.getElementById('fee')
        withdrawPercents.forEach(percent => {
            percent.addEventListener('change', function() {
                let result = (parseInt(percent.value) / 100) * parseInt(withdrawableBalance)
                let value = Math.round(result)
                feeInput.value = value
            })
        });
    </script>
@endsection
