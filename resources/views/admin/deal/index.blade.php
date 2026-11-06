@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | لیست همه معاملات')
@section('content')
    @if (session('success'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-green-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa in-fa"> {{ session('success') }} </span>
        </div>
    @endif
    @if (session('failure'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-red-300 fixed top-10 right-0 sm:right-5 z-9999999999 flex justify-center items-center transition-all duration-300 in-fa">
            <span class="text-sm text-[var(--light-theme-text-color)] in-fa in-fa"> {{ session('failure') }} </span>
        </div>
    @endif

    <!-- آرشیو معاملات -->
    <div class="w-full flex flex-col gap-3 justify-start items-center">
        <!-- ارشیو معامله / هدر -->
        <section
            class="w-full mx-auto bg-(--secondary-dashboard) flex items-center justify-between border-1 border-(--color-border) p-2 2 rounded-md">
            <h2 class="text-sm sm:text-base md:text-xl font-bold text-nowrap">آرشیو معامله</h2>
            <div class="flex items-center gap-3">
                <a href="{{ route('deal.create') }}"
                    class="w-fit bg-(--info-dashboard) text-xs md:text-base text-(--color-surface-dashboard) rounded-md px-1 md:px-3 py-1 md:py-2 cursor-pointer flex items-center justify-center">
                    شروع معامله جدید
                </a>
            </div>
         
        </section>
        <!-- ارشیو معامله / لسیت -->
        <section class="w-full mx-auto rounded-md border-1 border-(--color-border) mt-5 pb-10 overflow-hidden">
            <div class="w-full">
                <div class="w-full pb-3 px-3 flex flex-row justify-end">
                        <button onclick="sort(this)" class="flex gap-5 items-center" data-sort="desc">
                            <span>مرتب سازی :</span>
                            <p>جدید به قدیمی</p>
                            <img src="{{ asset('assets/img/sort/desc.png') }}"
                                style="
                            max-width: 30px;
                            max-height: 30px;
                            margin-top: 10px;
                            margin-left: 5px;
                            cursor: pointer;
                        "
                            alt="">
                    </button>
                </div>
                <div class="w-full bg-white py-5 px-2 mb-2">
                    <div class="w-full grid grid-cols-2 md:grid-cols-4 justify-items-end gap-2">
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                نام و نام خانوادگی
                            </legend>
                            <input class="w-full outline-none text-[10px] md:text-base" type="text" name="fullName"
                                id="fullName" placeholder=" نام و نام خانوادگی">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                نوع معامله
                            </legend>
                            <select id="dealType" name="dealType[]" data-placeholder="انتخاب کنید" data-multi-select
                                data-select-all-default="true" multiple>
                                <option value="buy">خرید</option>
                                <option value="sell">فروش</option>
                            </select>
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                وضعیت
                            </legend>
                            <select id="dealState" name="dealState[]" data-placeholder="انتخاب کنید" data-multi-select
                                data-select-all-default="true" multiple>
                                <option value="0">در انتظار</option>
                                <option value="1">تایید شده</option>
                                <option value="01">رد شده</option>
                            </select>
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                از تاریخ
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                name="fromDate" id="fromDate" placeholder="از تاریخ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                تا تاریخ
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" dir="ltr" type="text"
                                name="toDate" id="toDate" placeholder="تا تاریخ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                وزن
                            </legend>
                            <input class="w-full outline-none text-xs md:text-base in-fa" type="number" dir="ltr"
                                name="" id="weight" placeholder="وزن">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                مبلغ
                            </legend>
                            <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                                name="" id="price" placeholder="مبلغ">
                        </fieldset>
                        <fieldset class="w-full border-1 border-(--color-border) rounded-md p-2">
                            <legend class="px-2 text-(--text-secondary-dashboard) text-[10px] md:text-sm">
                                شماره سند
                            </legend>
                            <input class="w-full outline-none text-xs  md:text-base in-fa" type="number" dir="ltr"
                                name="" id="dealId" placeholder=" شماره سند">
                        </fieldset>
                    </div>
                    <div class="w-full flex justify-end">
                        <button
                            class="w-fit flex items-center justify-center font-bold text-xs md:text-base py-2 md:px-6 mt-5 hover:bg-(--color-blue) hover:text-white transition-all duratoin-300 col-span-1 md:text-right border-1 border-(--color-blue) text-(--color-blue) rounded-md text-center cursor-pointer"
                            onclick="setDatas()">اعمال</button>
                    </div>
                </div>
                <div class="w-full h-5 bg-zinc-200"></div>
                <div class="w-full overflow-x-auto">
                    <div class="w-full flex items-center justify-start gap-2 px-2 py-3">
                        <div
                            class="w-full bg-zinc-100 rounded-md p-1 md:px-3 md:py-2 cursor-default text-xs md:text-sm text-(--text-secondary-dashboard) flex flex-col md:flex-row">
                            <span class="">تعداد 55 مشتری در لیست مشتریان یافت شد .</span>
                            <span class="hidden md:flex">|</span>
                            <span class="">ظرفیت باقیمانده 445 نفر</span>
                        </div>
                    </div>
                    <table class="w-full border-collapse border-1 border-(--color-border) text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-xs lg:text-base">
                                <th class="border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    ردیف
                                </th>
                                <th class="min-w-50 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    نام و نام خانوادگی
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    کالا
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    تعداد/وزن
                                </th>
                                <th class="min-w-25 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    مظنه
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    مبلغ
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    علت رد
                                </th>
                                <th class="min-w-24 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    شماره سند
                                </th>
                                <th class="min-w-50 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    تاریخ معامله
                                </th>
                                <th class="min-w-30 border-1 border-(--color-border) p-1 md:px-3 md:py-2">
                                    وضعیت
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($deals as $deal)
                                @php
                                    $counter++;
                                @endphp
                                <tr class="item_fayle text-xs lg:text-base">
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $counter }}
                                    </td>
                                    <td class="p-1 md:px-3 md:py-2 flex items-center justify-around">
                                        <div
                                            class="w-18 px-2 py-1 {{ $deal->transaction->type == 'buy' ? 'border-2 border-(--color-success) text-(--color-success)' : 'border-2 border-(--color-danger) text-(--color-danger)' }} text-center rounded-lg">
                                            {{ $deal->transaction->type == 'buy' ? 'خرید' : 'فروش' }}
                                        </div>
                                        <div class="w-fit">
                                            {{ $deal->user->name . ' ' . $deal->user->family }}
                                        </div>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        شمش نقره
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $deal->goldWeight }} گرم
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ number_format($deal->goldPrice) }}
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center in-fa">
                                        {{ $deal->buyPrice ? number_format($deal->buyPrice) : '-' }}
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center text-red-500 in-fa">
                                        {{ $deal->message ? $deal->message : '-' }}
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        <span
                                            class="px-3 py-1.5 text-(--color-warning) rounded-md border-1 border-(--color-warning) p-1 cursor-pointer in-fa">
                                            {{ '100' . $deal->id }}
                                        </span>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        <span class="w-5/12 text-right in-fa">{{ $deal->time }}</span>
                                        <span class="w-2/12 text-right mx-2">|</span>
                                        <span class="w-5/12 text-left in-fa">{{ $deal->date }}</span>
                                    </td>
                                    <td class="border-1 border-(--color-border) p-1 md:px-3 md:py-2 text-center">
                                        @if ($deal->state != 'تایید شده')
                                            @can('access', 'deal_confirm')
                                                <span href="{{ route('deal.confirm', $deal->id) }}" onclick="deal('open' , {{$deal}})"
                                                    class="px-3 py-1.5 bg-[{{ $deal->color }}]/20 text-[{{ $deal->color }}] rounded-md border-1 border-[[{{ $deal->color }}]] p-1 cursor-default cursor-pointer">
                                                    {{ $deal->state }}
                                                </span>
                                            @endcan
                                        @else
                                            <span
                                                class="px-3 py-1.5 bg-[{{ $deal->color }}]/20 text-[{{ $deal->color }}] rounded-md border-1 border-[[{{ $deal->color }}]] p-1 cursor-default">
                                                {{ $deal->state }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <div id="popup"
        class="fixed w-full h-dvh bg-black/50 top-0 right-0 z-999999 transition-all duration-300 flex opacity-0 invisible justify-center items-center">
        <div class="w-full h-full flex justify-center items-center lg:w-[calc(100%-265px)]">
            <div class="w-full flex flex-col gap-2 bg-zinc-100 p-4 rounded-2xl">
                <div class="w-full flex items-center justify-between">
                    <div class="text-center">
                        <span>خرید آبشده نقدی</span>
                    </div>
                    <div onclick="deal('clos')" class="cursor-pointer">
                        ✖
                    </div>
                </div>
                <table class="mt-2">
                    <thead class="border-1 border-(--color-border)">
                        <tr class="bg-gray-100 text-xs lg:text-base">
                            <th class="border-1 border-(--color-border) p-2 text-start">مشتری</th>
                            <th class="border-1 border-(--color-border) p-2 text-start">وزن(گرم)</th>
                            <th class="border-1 border-(--color-border) p-2 text-start">مظنه(ریال)</th>
                            <th class="border-1 border-(--color-border) p-2 text-start">مبلغه کل(ریال)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-1 border-(--color-border) p-2 text-start text-lg font-bold" id="name"></td>
                            <td class="border-1 border-(--color-border) p-2 text-start text-lg font-bold" id="goldweight"></td>
                            <td class="border-1 border-(--color-border) p-2 text-start text-lg font-bold" id="goldprice"></td>
                            <td class="border-1 border-(--color-border) p-2 text-start text-lg font-bold" id="fullprice"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="w-full px-2 mt-2 flex justify-between items-center gap-3">
                    <a href="" class="w-5/12 bg-green-500 text-white text-center py-3 rounded-2xl cursor-pointer" id="check">
                        تاًیید
                    </a>
                    <form class="w-7/12 flex justify-between items-center gap-3" action="{{route('deal.cancel')}}">
                        @csrf
                        <input type="hidden" name="id" id="deal_id">
                    <button class="w-8/12 bg-red-500 text-white text-center py-3 rounded-2xl cursor-pointer">
                        عدم تاًیید
                    </button>
                    <input class="border-1 border-red-500 w-4/12 py-3 px-2 rounded-2xl" type="text" name="message" placeholder="دلیل عدم تاًیید را بنویسید">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- آرشیو معاملات -->



    <script>
        // ارشیو معامله / گزارش معامله
        let openPopup_report = document.getElementById("openPopup_report");
        let closePopup_report = document.getElementById("closePopup_report");
        let closePopup_report2 = document.getElementById("closePopup_report2");
        let popup_report = document.getElementById("popup_report");

        openPopup_report.addEventListener("click", () => {
            popup_report.classList.remove("invisible");
            popup_report.classList.remove("opacity-0");
            popup_report.classList.add("opacity-100");
            popup_report.classList.add("visible");
        });
        closePopup_report.addEventListener("click", () => {
            popup_report.classList.add("invisible");
            popup_report.classList.add("opacity-0");
            popup_report.classList.remove("opacity-100");
            popup_report.classList.remove("visible");
        });
        closePopup_report2.addEventListener("click", () => {
            popup_report.classList.add("invisible");
            popup_report.classList.add("opacity-0");
            popup_report.classList.remove("opacity-100");
            popup_report.classList.remove("visible");
        });
        
        function deal(door , deal){
            let popup = document.getElementById("popup");
            let name = document.getElementById("name");            
            let goldweight = document.getElementById("goldweight");            
            let goldprice = document.getElementById("goldprice");            
            let fullprice = document.getElementById("fullprice");            
            let check = document.getElementById("check");            
            let deal_id = document.getElementById("deal_id");            
            if(door=="open"){
                popup.classList.remove('opacity-0')
                popup.classList.remove('invisible')
                // console.log(deal)
                // console.log(deal_id)
                deal_id.value=deal.id
                name.innerText=deal.user.name +' '+ deal.user.family
                goldweight.innerText=deal.goldWeight
                goldprice.innerText=deal.goldPrice
                fullprice.innerText=deal.buyPrice
                check.setAttribute('href' , '{{url('deal/confirm/deal.id')}}')
            }
            if(door=="clos"){
                popup.classList.add('opacity-0')
                popup.classList.add('invisible')
            }
        }
    </script>
    <script src="{{ asset('assets/js/adminDeal.js') }}"></script>


@endsection
