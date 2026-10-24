@extends('admin.app.dashboard')
@section('title', 'ستاری گلد | سایت های مرجع ')
@section('content')
    @if (session('message'))
        <div
            class="modal py-5 px-8 rounded-lg shadow-lg bg-slate-100 fixed top-10 right-10 z-5 flex justify-center items-center transition-all duration-300">
            <span class="font-bold text-sm text-slate-500"> {{ session('message') }} </span>
        </div>
    @endif
    {{-- reference site --}}
    <div class="w-full sm:w-10/12 mx-auto flex flex-col gap-4 justify-start items-center ">
        <form action="{{ route('referenceSite.store') }}" method="POST"
            class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
            @csrf
            <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                <div class="p-1 bg-(--active) rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-3 fill-white">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                </div>
                <span class="font-bold  max-md:text-sm">افزودن سایت مرجع برای قیمت طلا</span>
            </div>
            <div class="w-full grid sm:grid-cols-2 grid-cols-1  gap-3 gap-y-7 justify-start items-center">
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">عنوان سایت : </label>
                    <div
                        class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                        <input type="text" name="title" class="w-full outline-none font-bold rounded-xl max-lg:text-sm"
                            value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full flex flex-col justify-start items-start gap-2">
                    <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">آدرس دامنه : </label>
                    <div
                        class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                        <input type="text" name="address" class="w-full outline-none font-bold rounded-xl max-lg:text-sm"
                            value="{{ old('address') }}">
                    </div>
                    @error('address')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button
                class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm cursor-pointer">
                افزودن به لیست
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
                            عنوان سایت
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            آدرس دامنه
                        </th>
                        <th class="border-1 border-(--border) px-3 py-2">
                            ابزار
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($referenceSites as $site)
                        <tr class="item text-nowrap font-bold max-sm:text-sm">
                            <td class="px-3 py-2 flex items-center justify-center">
                                {{ $i }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{ $site->title }}
                            </td>
                            <td class="border-1 border-(--border) px-3 py-2 text-center">
                                {{ $site->address }}
                            </td>
                            <td class="px-3 py-2">
                                <div class="flex items-center justify-between">
                                    <svg onclick="editSite('open', {{ $site }})"
                                        class="size-4 fill-(--active) cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path
                                            d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                                    </svg>
                                    <a href="{{ route('referenceSite.delete', [$site]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            class="size-4 fill-(--disactive) cursor-pointer">
                                            <path
                                                d="M164.2 39.5L148.9 64H299.1L283.8 39.5c-2.9-4.7-8.1-7.5-13.6-7.5H177.7c-5.5 0-10.6 2.8-13.6 7.5zM311 22.6L336.9 64H384h32 16c8.8 0 16 7.2 16 16s-7.2 16-16 16H416V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V96H16C7.2 96 0 88.8 0 80s7.2-16 16-16H32 64h47.1L137 22.6C145.8 8.5 161.2 0 177.7 0h92.5c16.6 0 31.9 8.5 40.7 22.6zM64 96V432c0 26.5 21.5 48 48 48H336c26.5 0 48-21.5 48-48V96H64zm80 80V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16zm96 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V176c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div id="editPopup" class="w-full h-dvh fixed top-0 left-0 z-5 invisible opacity-0 transition-all duration-400">
        <div class="size-full relative">
            <div class="size-full bg-black/40 absolute top-0 left-0" onclick="editSite('close')"></div>
            <div
                class="w-11/12 md:w-1/2 xl:w-1/3 2xl:container 2xl:w-1/3 mx-auto border border-[#D5DFE4] rounded-[10px] text-[#425A8B] p-5 bg-white absolute right-1/2 translate-x-1/2 top-1/2 -translate-y-1/2">
                <div class="relative">
                    <button class="absolute -top-4 -left-4 size-6 flex flex-col justify-center items-center cursor-pointer"
                        onclick="editSite('close')">
                        <span class="w-full h-0.5 rounded-full bg-slate-500 rotate-45 translate-y-1/2"></span>
                        <span class="w-full h-0.5 rounded-full bg-slate-500 -rotate-45 -translate-y-1/2"></span>
                    </button>
                </div>
                <form action="{{ route('referenceSite.update') }}" method="POST"
                    class="w-full flex flex-col gap-4 justify-start items-start p-4 bg-[#FAFBFD] border-2 border-(--border) rounded-xl">
                    @csrf
                    <input type="hidden" name="site_id" id="editSiteId">
                    <div class="w-full flex justify-start items-center md:gap-4 gap-2">
                        <div class="p-1 bg-(--active) rounded-full">
                            <svg class="size-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M395.8 39.6c9.4-9.4 24.6-9.4 33.9 0l42.6 42.6c9.4 9.4 9.4 24.6 0 33.9L417.6 171 341 94.4l54.8-54.8zM318.4 117L395 193.6 159.6 428.9c-7.6 7.6-16.9 13.1-27.2 16.1L39.6 472.4l27.3-92.8c3-10.3 8.6-19.6 16.1-27.2L318.4 117zM452.4 17c-21.9-21.9-57.3-21.9-79.2 0L60.4 329.7c-11.4 11.4-19.7 25.4-24.2 40.8L.7 491.5c-1.7 5.6-.1 11.7 4 15.8s10.2 5.7 15.8 4l121-35.6c15.4-4.5 29.4-12.9 40.8-24.2L495 138.8c21.9-21.9 21.9-57.3 0-79.2L452.4 17z" />
                            </svg>
                        </div>
                        <span class="font-bold  max-md:text-sm">ویرایش سایت مرجع</span>
                    </div>
                    <div class="w-full grid sm:grid-cols-2 grid-cols-1  gap-3 gap-y-7 justify-start items-center">
                        <div class="w-full flex flex-col justify-start items-start gap-2">
                            <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">عنوان سایت : </label>
                            <div
                                class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                <input type="text" name="editTitle" id="editTitle"
                                    class="w-full outline-none font-bold rounded-xl max-lg:text-sm"
                                    value="{{ old('editTitle') }}">
                            </div>
                            @error('editTitle')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full flex flex-col justify-start items-start gap-2">
                            <label for="" class="md:text-sm text-xs font-bold text-[#8B929D]">آدرس دامنه : </label>
                            <div
                                class="w-full border-2 border-(--border) py-2 px-3 bg-white flex justify-between items-center rounded-xl">
                                <input type="text" name="editAddress" id="editAddress"
                                    class="w-full outline-none font-bold rounded-xl max-lg:text-sm"
                                    value="{{ old('editAddress') }}">
                            </div>
                            @error('editAddress')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button
                        class="self-end px-8 py-2.5 font-bold text-white bg-(--active) rounded-xl  max-md:text-sm cursor-pointer">
                        ذخیره تغییرات
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- reference site --}}
    <script>
        function editSite(state, site) {
            let editPopup = document.getElementById('editPopup')
            let editSiteId = document.getElementById('editSiteId')
            let editAddress = document.getElementById('editAddress')
            let editTitle = document.getElementById('editTitle')
            if (state == 'open') {
                editSiteId.value = site.id
                editAddress.value = site.address
                editTitle.value = site.title
                editPopup.classList.remove('invisible', 'opacity-0')
            }
            if (state == 'close') {
                editPopup.classList.add('invisible', 'opacity-0')
            }
        }
    </script>
@endsection
