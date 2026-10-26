@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | تنضیمات جدید ')
@section('content')
<div class="w-full flex justify-center items-center">
    <div
        class="md:w-60/100 w-full sm:h-full bg-white rounded-xl flex flex-col gap-4 justify-start items-center p-4">
        <div class="w-full flex flex-col gap-4 justify-start items-center ">
            <form action="{{ route('Message.create') }}" method="POST"
                class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                @csrf
                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                    <div class="p-1 bg-(--active) rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </div>
                    <span class="font-bold  max-md:text-sm">افزودن پیام جدید</span>
                </div>
                <div
                    class="w-full flex justify-between items-start gap-10">
                    <div class="w-9/12 flex flex-col justify-start items-start gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیام</label>
                        <div
                            class="w-full border-2 border-(--border) py-6 px-3 bg-white flex justify-between items-center rounded-xl">
                            <textarea type="text" name="message" class="w-full outline-none font-bold rounded-xl max-lg:text-sm"></textarea>
                        </div>
                    </div>
                    <div class="w-3/12 flex flex-col gap-2">
                        <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">انتخاب بخش</label>
                        <select name="segment_id" id="" required>
                            <option value="">انتخاب کنید</option>
                            @foreach($segment as $seg)
                                <option value="{{$seg->id}}">{{$seg->en_name}} {{$seg->fa_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm">
                    افزودن پیام
                </button>
            </form>


            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border-1 border-(--border) text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-nowrap text-sm max-sm:text-xs">
                            <th class="border-1 border-(--border) px-3 py-2">
                                ردیف
                            </th>
                            <th class="border-1 border-(--border) px-3 py-2">
                                نام و نام خانوادگی
                            </th>
                            <th class="border-1 border-(--border) px-3 py-2">
                                 بخش  
                            </th>
                            <th class="border-1 border-(--border) px-3 py-2">
                                ابزار
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach($message as $mess)
                        <tr class="item text-nowrap font-bold max-sm:text-sm">
                            <td class="px-3 py-2 flex items-center justify-center">
                                {{$i}}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{$mess->message}}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{$mess->segment->fa_name}}
                            </td>


                            <td class="border-1 border-(--border) px-3 py-2 flex justify-center gap-2">
                                <div>
                                    <div onclick="popup('open' , '{{$mess->id}}')"
                                        class="popup_edit_cart text-(--primary-dashboard) border-1 border-(--active) rounded-md p-1.5 mx-auto cursor-pointer flex items-center justify-center">
                                        <svg class="size-4 fill-(--active)" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path
                                                d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                        </svg>
                                    </div>
                                </div>
                                <a href="{{route('Message.delete' , $mess->id)}}"
                                    class="open-popup-edit text-(--primary-dashboard) border-1 border-(--disactive) rounded-md p-1.5  cursor-pointer flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="size-4 fill-(--disactive)">
                                        <path
                                            d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                            @php
                                $i++
                            @endphp
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="fixed z-50 w-full h-dvh top-0 right-0 flex items-center justify-center invisible opacity-0 transition_normal" id="editPopup">
                <div class="popup_edit_cart w-full h-full bg-black/50 absolute top-0 right-0 -z-1 cursor-pointer" onclick="popup('close')">
                </div>
                <div class=" lg:w-1/2 w-10/12 bg-white rounded-md px-3 py-2">
                    <div
                        class="w-full flex items-center justify-between border-b-1 border-(--border) pb-2">
                        <div class="font-bold">ویرایش اطلاعات حساب</div>
                        <div onclick="popup('close')" class="popup_edit_cart cursor-pointer">
                            <svg class="size-6" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <form action="{{route('Message.update')}}" method="post" class="5 mt-5">
                        @csrf
                        <input type="hidden" name="id" id="message_id" value="">
                        <div
                            class="w-full flex gap-10 justify-between">
                            <div class="w-9/12 flex flex-col justify-start items-start gap-2">
                                <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">متن پیام</label>
                                <div
                                    class="w-full border-2 border-(--border) py-4 px-3 bg-white flex justify-between items-center rounded-xl">
                                    <textarea type="text" name="popupMessage" id="popupMessage" class="w-full outline-none font-bold  max-lg:text-sm"></textarea>
                                </div>
                            </div>
                            <div class="w-3/12 flex flex-col gap-2">
                                <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">انتخاب بخش</label>
                                <select name="segment_id" id="" required>
                                    <option value="">انتخاب کنید</option>
                                    @foreach($segment as $seg)
                                        <option class="option" value="{{$seg->id}}">{{$seg->en_name}} {{$seg->fa_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>    
                        <div
                            class="col-span-2 w-full flex gap-4 justify-between items-center">
                            <button
                                class="w-full border-1 border-(--active) bg-(--active) sm:text-lg font-bold text-white py-2 rounded-md">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let editPopup=document.getElementById('editPopup');
    function popup(door , id){
        let popupMessage=document.getElementById('popupMessage')
        let message_id=document.getElementById('message_id')
        let option = document.querySelectorAll('.option')
        popupMessage.value=""
        if(door=='open'){
            editPopup.classList.remove('invisible');
            editPopup.classList.remove('opacity-0');

            $.ajaxSetup({
                headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('Message.edit') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(response) {
                    message_id.value=response.id
                    popupMessage.value=response.message
                    
                    option.forEach((item) => {
                        console.log(response.segment_id)
                        console.log(item.value)
                        if(item.value==response.segment_id){
                            console.log('ok')
                            item.setAttribute('selected' , '')
                        }
                    })
                },
                error: function() {
                    console.log('خطا');
                   
                }
            });
        }
        if(door=="close"){
            editPopup.classList.add('invisible');
            editPopup.classList.add('opacity-0');
        }
    }
</script>
@endsection