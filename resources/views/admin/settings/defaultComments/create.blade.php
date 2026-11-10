@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنظیمات نظرات پیش فرض')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    <div class="w-full h-full pb-10">
        <h2 class="text-3xl text-center font-bold py-5 text-[#425A8B]">فرم ایجاد و ویرایش نظرات پیش فرض در صفحه اول</h2>
        <div class="w-full mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white">
            <form action="{{ route('comment.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col items-center gap-10">
                    <div id="container" class="w-full flex flex-col gap-5">
                        @foreach ($defaultComments as $index => $defaultComment)
                            <div class="w-full border-2 border-gray-300 rounded-lg p-5 relative">
                                <span class="absolute -top-2 -left-2 bg-gray-300 p-1 rounded-full cursor-pointer text-xs"
                                    onclick="removeComment(this)">❌</span>
                                <div class="w-full grid grid-cols-2 gap-5">
                                    <div class="w-full flex flex-col">
                                        <label class="mb-2 flex flex-row items-center">
                                            <span>نام و نام خانوادگی کاربر :</span>
                                            <span class="text-rose-500">*</span>
                                        </label>
                                        <input type="text"
                                            class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                            name="comments[{{ $index }}][userName]" required
                                            value="{{ $defaultComment['userName'] }}">
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="mb-2 flex flex-row items-center">
                                            <span>تصویر کابر : </span>
                                        </label>
                                        <div class="flex flex-col md:flex-row items-center gap-5">
                                            <input type="file"
                                                class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                                name="comments[{{ $index }}][img]">
                                            @if ($defaultComment['img'])
                                                <img src="{{ asset('storage/' . $defaultComment['img']) }}" alt=""
                                                    class="w-20 h-15">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full grid grid-cols-2 gap-5 mt-5">
                                    <div class="w-full flex flex-col">
                                        <label class="mb-2 flex flex-row items-center">
                                            <span>تاریخ ایجاد نظر : </span>
                                        </label>
                                        <input type="text"
                                            class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                            name="comments[{{ $index }}][date]"
                                            value="{{ $defaultComment['date'] }}">
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <label class="mb-2 flex flex-row items-center">
                                            <span>ساعت ایجاد نظر :</span>
                                        </label>
                                        <input type="text"
                                            class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                            name="comments[{{ $index }}][time]"
                                            value="{{ $defaultComment['time'] }}">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col mt-5">
                                    <label class="mb-2 flex flex-row items-center">
                                        <span>کامنت کاربر :</span>
                                        <span class="text-rose-500">*</span>
                                    </label>
                                    <textarea name="comments[{{ $index }}][comment]"
                                        class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl" rows="4" required>{{ $defaultComment['comment'] }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" onclick="addComment(this)"
                        class="w-30 mx-auto p-2 text-sm rounded-md bg-green-100 text-green-500 cursor-pointer">کامنت جدید +
                    </button>
                    <button type="submit"
                        class="py-3 px-10 rounded-[10px] bg-[#1B84FF] hover:bg-[#056EE9] text-white cursor-pointer">ثبت</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function addComment(el) {
            let container = document.getElementById('container')
            let index = container.children.length
            let div = document.createElement('div')
            div.classList = 'w-full border-2 border-gray-300 rounded-lg p-5 relative'
            let element = `
                        <span class="absolute -top-2 -left-2 bg-gray-300 p-1 rounded-full cursor-pointer text-xs"
                           onclick="removeComment(this)">❌</span>
                        <div class="w-full grid grid-cols-2 gap-5">
                              <div class="w-full flex flex-col">
                                 <label class="mb-2 flex flex-row items-center">
                                       <span>نام و نام خانوادگی کاربر :</span>
                                       <span class="text-rose-500">*</span>
                                 </label>
                                 <input type="text"
                                       class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                       name="comments[${index}][userName]" required>
                              </div>
                              <div class="w-full flex flex-col">
                                 <label class="mb-2 flex flex-row items-center">
                                       <span>تصویر کابر : </span>
                                 </label>
                                 <input type="file"
                                       class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                       name="comments[${index}][img]">
                              </div>
                        </div>
                        <div class="w-full grid grid-cols-2 gap-5 mt-5">
                              <div class="w-full flex flex-col">
                                 <label class="mb-2 flex flex-row items-center">
                                       <span>تاریخ ایجاد نظر : </span>
                                 </label>
                                 <input type="text"
                                       class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                       name="comments[${index}][date]">
                              </div>
                              <div class="w-full flex flex-col">
                                 <label class="mb-2 flex flex-row items-center">
                                       <span>ساعت ایجاد نظر :</span>
                                 </label>
                                 <input type="text"
                                       class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                       name="comments[${index}][time]">
                           </div>
                        </div>
                        <div class="w-full flex flex-col mt-5">
                              <label class="mb-2 flex flex-row items-center">
                                 <span>کامنت کاربر :</span>
                                 <span class="text-rose-500">*</span>
                              </label>
                              <textarea name="comments[${index}][comment]" class="outline-none pr-5 py-3 bg-[#f1f1f4] border border-slate-300 rounded-xl"
                                 rows="4" required></textarea>
                        </div>
               `
            div.innerHTML = element
            container.appendChild(div)
        }

        function removeComment(el) {
            el.parentElement.remove()
        }
    </script>
@endsection
