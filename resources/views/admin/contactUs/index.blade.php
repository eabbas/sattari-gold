@extends('admin.app.dashboard')
@section('title')
    ستاری گلد | لیست تیکت ها
@endsection
@section('content')
    <div class="min-h-screen flex">
        <!-- Sidebar -->

        <!-- Main -->
        <main class="min-w-0 flex-1 w-full">


            <div class="p-4 sm:p-7 lg:p-10 max-w-[1600px] mx-auto">
                <!-- Title -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">
                    <div class="flex items-center gap-4">

                        <div>
                            <h1 class="sm:text-xl font-extrabold tracking-tight">تیکت‌های پشتیبانی</h1>
                        </div>
                    </div>
                </div>


                <!-- Desktop table -->
                <section class="hidden md:block bg-white border border-[#EEE5D9] rounded-2xl soft-shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[950px] text-sm">
                            <thead>
                                <tr class="bg-[#F6F1E9] text-[#786B5A]">
                                    <th class="px-5 py-4 font-semibold text-right w-14">#</th>
                                    <th class="px-5 py-4 font-semibold text-right">کاربر</th>
                                    <th class="px-5 py-4 font-semibold text-right">موضوع</th>
                                    <th class="px-5 py-4 font-semibold text-right">آخرین پیام</th>
                                    <th class="px-5 py-4 font-semibold text-right">تاریخ</th>
                                    <th class="px-5 py-4 font-semibold text-right">عملیات</th>
                                </tr>
                            </thead>
                            <tbody id="ticketTable" class="divide-y divide-[#F0E9DF]">

                                <!-- Ticket 1 -->
                                @foreach ($messages as $message)
                                    <tr class="hover:bg-[#FFFCF8] transition-colors">
                                        <td class="px-5 py-4 text-[#9B8E7E] font-medium">۱</td>

                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 shrink-0 rounded-xl bg-[#F6F1E9] flex items-center justify-center text-[#B88A3B]">
                                                    <i data-lucide="user-round" class="w-5 h-5"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-[#29251F]">{{ $message->fullName }}</p>
                                                    <p class="text-xs text-[#9B8E7E] mt-1">{{ $message->phoneNumber }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-5 py-4 font-medium text-[#29251F]">
                                           {{ $message->subject }}
                                        </td>

                                        <td class="px-5 py-4">
                                            <p class="text-[#786B5A] max-w-[240px] truncate">
                                               {{ $message->message }}
                                            </p>
                                        </td>

                                        <td class="px-5 py-4 whitespace-nowrap">
                                            <div class="text-[#786B5A] in-fa">{{ implode('/', explode('-', explode(' ', verta($message->created_at))[0])) }}</div>
                                            {{-- <div class="text-xs text-[#9B8E7E] mt-1">۲۰:۱۵</div> --}}
                                        </td>

                                    

                                        <td class="px-5 py-4">
                                            <button onclick="showTicket('{{ $message->message }}')"
                                                class="inline-flex cursor-pointer items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#29251F] text-white hover:bg-[#42372C] transition-colors whitespace-nowrap text-xs font-medium">
                                                مشاهده تیکت
                                               
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                   
                </section>

                <!-- Mobile cards -->
                <section id="mobileTickets" class="md:hidden space-y-3">

                    @foreach ($messages as $message)
                        <div class="bg-white border border-[#EEE5D9] rounded-2xl p-4 space-y-4">

                            <div class="flex items-start justify-between gap-3">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-11 h-11 rounded-xl bg-[#F6F1E9] flex items-center justify-center text-[#B88A3B] shrink-0">
                                        <i data-lucide="user-round" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                      
                                        <p class="font-bold text-[#29251F]">{{ $message->fullName }}</p>
                                        <p class="text-xs text-[#9B8E7E] mt-1">{{ $message->phoneNumber }}</p>
                                    </div>
                                </div>

                               
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-[#9B8E7E]">شماره تیکت</span>
                                    <span class="text-xs font-medium text-[#786B5A]">#{{ $message->id }}</span>
                                </div>

                                <p class="text-sm font-bold text-[#29251F]">{{ $message->subject }}</p>

                                <p class="text-xs text-[#786B5A] leading-6">
                                    {{ $message->message }}
                                </p>
                            </div>

                            <div
                                class="flex items-center justify-between text-xs text-[#9B8E7E] border-t border-[#F0E9DF] pt-3">
                                <span class="in-fa">{{ implode('/', explode('-', explode(' ', verta($message->created_at))[0])) }}</span>
                            
                            </div>

                            <button onclick="showTicket('{{ $message->message }}')"
                                class="flex items-center justify-center gap-2 cursor-pointer w-full px-4 py-3 rounded-xl bg-[#29251F] text-white text-sm font-medium">
                                مشاهده تیکت
                            </button>
                        </div>
                    @endforeach

                </section>
                <div id="mobileCount" class="md:hidden text-xs text-[#9B8E7E] text-center mt-4"></div>
                <div id="emptyState" class="hidden text-center py-16 bg-white rounded-2xl border border-[#EEE5D9]">
                    <div
                        class="w-14 h-14 mx-auto rounded-2xl bg-[#F6F1E9] flex items-center justify-center text-[#B88A3B] mb-3">
                        <i data-lucide="search-x" class="w-7 h-7"></i>
                    </div>
                    <p class="font-semibold">تیکتی با این مشخصات پیدا نشد</p>
                    <p class="text-sm text-[#9B8E7E] mt-1">عبارت جستجو یا فیلترها را تغییر دهید.</p>
                </div>
            </div>
        </main>
    </div>

    <div class="fixed w-full h-dvh bg-black/50 z-999 top-0 right-0 backdrop-blur transition-all duration-300 flex items-center justify-center invisible opacity-0" id="ticketPopup">
        <div class="w-11/12 lg:w-2/3 bg-white p-5 rounded-lg max-h-[calc(100vh-100px)] overflow-y-auto relative whiteBlock">
            <div class="absolute right-0 top-0 bg-white pr-3 pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 cursor-pointer" onclick="closePopup()" viewBox="0 0 384 512">
                    <path d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
                </svg>
            </div>
            <p class="text-center text-sm in-fa mt-6 px-4"></p>
        </div>
    </div>

    <script>
        let ticketPopup = document.getElementById('ticketPopup')

        function showTicket(message){
            ticketPopup.classList.remove('invisible', 'opacity-0')
            ticketPopup.querySelector('p').innerText = message
        }

        function closePopup(){
            ticketPopup.classList.add('invisible', 'opacity-0')
        }

        ticketPopup.addEventListener('click', (e)=>{
            if(!ticketPopup.querySelector('.whiteBlock').contains(e.target)){
                closePopup()
            }
        })
    </script>

@endsection
