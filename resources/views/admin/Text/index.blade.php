@extends('welcome')
@section('title', 'لیست متون')
@section('content')
    <div class="w-full flex flex-col pb-4">
        <div class="bg-white rounded-lg">
            <div class="pb-4">
                <h2 class="text-lg font-bold text-gray-800 p-2.5">لیست متون </h2>
            </div>
             <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('Text.create') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base">افزودن +</a>
                </div>
            <div class="flex flex-col gap-5">
                <div class="w-full md:w-10/12 mx-auto shadow-md rounded mb-5 overflow-x-auto">
                    <div
                        class="w-full flex flex-row lg:grid lg:grid-cols-[0.5fr_2fr_1.5fr] items-center divide-x divide-gray-100 sticky -top-5">
                        <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                            <span class="block w-16 lg:w-full">ردیف</span>
                        </div>
                            <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                                <span class="block w-20 lg:w-full">متن</span>
                            </div>
                         <div class="px-1 lg:px-6 py-3 text-center text-xs font-medium text-gray-600 bg-gray-100">
                             <span class="block w-32 lg:w-full">عملیات</span>
                         </div>
                     </div>
                     <div class="bg-white divide-y divide-gray-100">
                         @php
                             $i = 1;
                         @endphp

                         @foreach ($texts as $text)
                             <div
                                 class="w-full flex flex-row lg:grid lg:grid-cols-[0.5fr_2fr_1.5fr] items-center divide-x divide-gray-100">
                                 <div
                                     class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                     <span class="block w-16 lg:w-full">{{ $i }}</span>
                                 </div>
                                 <div class="p-1 lg:p-3 text-xs lg:text-sm h-full flex items-center justify-center text-gray-900 text-center">
                                    <div class="block w-20 lg:w-full max-h-24 overflow-y-auto break-words scrolling-auto">
                                        {{ $text->text }}
                                    </div>
                                </div>
                                <ul class="text-sm mt-1 rounded-sm p-1 flex flex-row justify-center items-center gap-2 w-full">
                                <li>
                                    <a href="{{ route('Text.delete', [$text->id]) }}"
                                        class="w-fit flex flex-row items-center justify-center bg-red-500 hover:bg-red-600 p-2 rounded-sm"
                                        title="حذف">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 448 512">
                                            <path fill="white"
                                                d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Text.showMeaning', [$text->id]) }}"
                                        class="w-fit flex items-center justify-center bg-purple-300 hover:bg-purple-400 p-1.5 rounded-sm"
                                        title="مشاهده متن همراه ترجمه">
                                        مشاهده متن
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Text.setMeaning', [$text->id]) }}"
                                        class="w-fit flex items-center justify-center bg-pink-300 hover:bg-pink-400 p-1.5 rounded-sm"
                                        title="مشاهده">
                                         افزودن معنی کلمه
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Text.setSentenceMeaning', [$text->id]) }}"
                                        class="w-fit flex items-center justify-center bg-orange-300 hover:bg-orange-400 p-1.5 rounded-sm"
                                        title="مشاهده">
                                        افزودن معنی جمله
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Text.single', [$text->id]) }}"
                                        class="w-fit flex items-center justify-center bg-rose-300 hover:bg-rose-400 p-1.5 rounded-sm"
                                        title="مشاهده">
                                        تجزیه متن
                                    </a>
                                </li>
                            </ul>
                             </div>
                             @php
                                 $i++;
                             @endphp
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection