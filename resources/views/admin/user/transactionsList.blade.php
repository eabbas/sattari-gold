@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | واریز و برداشت ها')
@section('content')
    @foreach ($users as $user)
        <div class="border p-5 mb-10">
            <h3 class="mb-10">{{ $user->name }} {{ $user->family }} : </h3>
            <table class="w-full max-h-20 overflow-auto">
                <thead class="w-full">
                    <tr class="w-full mb-10 px-4 grid grid-cols-4">
                        <th>نوع / زمان</th>
                        <th>وضعیت</th>
                        <th>فیش واریز</th>
                        <th>مبلغ تراکنش</th>
                    </tr>
                </thead>
                <tbody class="w-full">
                    @foreach ($user->walletTransactions as $transaction)
                        <tr class="w-full mb-10 px-4 grid grid-cols-4">
                            <td class="flex flex-col items-center gap-2">
                                @if ($transaction['type'] == 'deposit')
                                    <span class="text-green-500">واریز</span>
                                @endif
                                @if ($transaction['type'] == 'withdraw')
                                    <span class="text-red-500">برداشت</span>
                                @endif
                                <span class="text-xs text-gray-400">{{ $transaction['created_at'] }}</span>
                            </td>
                            <td class="flex justify-center items-center">
                                @if ($transaction['isApproved'] == 0)
                                    <select name="isApproved" id="isApproved"
                                        onchange="alterStatus({{ $transaction->wallet_id }}, {{ $transaction->id }}, this)">
                                        <option value="0">در انتظار تایید
                                        </option>
                                        <option value="1">تایید شده
                                        </option>
                                        <option value="-1">رد شده
                                        </option>
                                    </select>
                                @endif
                                @if ($transaction['isApproved'] == 1)
                                    <span class="text-gray-500">تایید شده</span>
                                @endif
                                @if ($transaction['isApproved'] == -1)
                                    <span class="text-gray-500">رد شده</span>
                                @endif
                            </td>
                            <td class="flex justify-center items-center">
                                @if ($transaction['type'] == 'deposit')
                                    <img src="{{ asset('storage/' . $transaction->receipt) }}" alt=""
                                        class="size-20">
                                @endif
                            </td>
                            <td class="flex flex-col items-center gap-2">
                                <span>{{ $transaction['amount'] }}</span>
                                <span class="text-xs text-gray-400">تومان</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    <div class="w-full flex justify-center">
        <button class="py-2 px-4 rounded-xl border border-gray-500 bg-gray-100 text-gray-900 cursor-pointer"
            onclick="submitChangeStatusAlternations()">ثبت
            تغییرات</button>
    </div>
    <script>
        let data = []

        function alterStatus(wallet_id, transaction_id, el) {
            let info = {}
            info.wallet_id = wallet_id
            info.transaction_id = transaction_id
            info.isApproved = parseInt(el.value)
            data.push(info)
        }

        function submitChangeStatusAlternations() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: "{{ route('wallet.submitChanges') }}",
                type: "POST",
                dataType: "json",
                data: {
                    'data': data,
                },
                success: function() {
                    location.reload()
                },
                error: function() {
                    alert('error')
                }
            })
        }
    </script>
@endsection
