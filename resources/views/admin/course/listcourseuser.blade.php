@extends('welcome')
@section('title', 'لیست دوره ها')
@section('content')
    <style>
        .box-shadow{
            box-shadow: 0 0 1px 1px #ebebeb;
        }
        .circle-shadow{
            box-shadow: 0 0 1px 1px #fe780b;
        }

        .borderAbs::after{
            content: '';
            position: absolute;
            width: 4px;
            height: 80%;
            border-radius: 90%;
            background-color: white;
            top: 12%;
            right: 3px;
        }
    </style>
    <div class="w-full bg-white p-3">
        <div class="w-11/12 mx-auto flex flex-row justify-between mt-3">
            <div class="flex bg-white rounded-md box-shadow px-3 py-1">
                <svg xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none" class="size-4">
                    <path d="M4 7H20"
                        stroke="#1D2433"
                        stroke-width="2"
                        stroke-linecap="round"/>
                    <path d="M4 17H20"
                        stroke="#1D2433"
                        stroke-width="2"
                        stroke-linecap="round"/>
                    <circle cx="9" cy="7" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                    <circle cx="15" cy="17" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                </svg>
                <span class="text-[12px] font-bold">فیلتر</span>
            </div>
            <div class="font-bold">لیست دوره ها</div>
        </div>
        @foreach ($courses as $course)
            <a href="{{ route('course.single', $course->id) }}" class="w-11/12 mx-auto flex gap-3">
                <div class="w-full bg-white box-shadow rounded-lg mt-3 flex flex-row-reverse items-center gap-2 relative p-2">
                    <div class="w-3/24 h-full flex items-center justify-center">
                        <div class="w-5 h-5 rounded-full flex items-center justify-center box-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-3 rotate-y-180" viewBox="0 0 320 512">
                                <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="w-9/12 h-full">
                        <div class="flex flex-col py-1">
                            <span class="font-bold text-[14px]">{{ $course->title }}</span>
                            <span class="text-[10px] text-[#848aa4] font-bold">{{ $course->summary }}</span>
                            <div class="flex flex-row items-center gap-1 mt-2">
                                <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap-1 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                        <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                                    </svg>
                                    <span>سطح {{ $course->level->title }}</span>
                                </div>
                                <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                        <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                                    </svg>
                                    <span class="in-fa">{{ $course->master_name }}</span>
                                </div>
                                <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                        <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                    </svg>
                                    <span class="in-fa">{{ $course->duration }} ساعت</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="min-w-14 max-w-14 h-14 flex items-center justify-center">
                        <img class="w-full h-full rounded-2xl object-cover" src="{{asset('storage/'.$course->image)}}" alt="">
                    </div>
                </div>
            </a>
        @endforeach
        {{-- <div class="w-11/12 mx-auto flex gap-3">
            <div class="w-full bg-white box-shadow rounded-lg mt-3 flex items-center gap-2 relative px-1">
                <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                    <div class="relative borderAbs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-3/24 h-full flex items-center justify-center">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center box-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-3" viewBox="0 0 320 512">
                            <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-9/12 h-full">
                    <div class="flex flex-col py-2 gap-1">
                        <span class="font-bold text-[14px] text-end">CSS،HTML میانی</span>
                        <span class="text-[10px] text-[#848aa4] text-end font-bold">ساختار صفحات وب و طراحی ظاهری</span>
                        <div class="flex flex-row items-center justify-end gap-1 ">
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap-1 justify-center items-center">
                                <span>To-Do List</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                    <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="in-fa">8موضوع</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                    <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="text-nowrap in-fa">4تا5 ساعت</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="min-w-13 max-w-13 h-13 flex items-center justify-center">
                    <img class="w-full h-full rounded-2xl" src="{{asset('storage/home/file_0000000068a071f4b4abc9e3fcc298aa.png')}}" alt="">
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                    <span class="flex items-center justify-center">2</span>
                </div>
                <span class="w-[1px] h-13 bg-[#fc6600] mt-2"></span>
                <!-- <div class="text-sm text-[#fc6600]">.</div> -->
            </div>
        </div>
        <div class="w-11/12 mx-auto flex gap-3">
            <div class="w-full bg-white box-shadow rounded-lg mt-3 flex items-center gap-2 relative px-1">
                <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                    <div class="relative borderAbs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-3/24 h-full flex items-center justify-center">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center box-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-3" viewBox="0 0 320 512">
                            <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-9/12 h-full">
                    <div class="flex flex-col py-2 gap-1">
                        <span class="font-bold text-[14px] text-end">برنامه نویسی وjavaScript</span>
                        <span class="text-[10px] text-[#848aa4] text-end font-bold">منطق برنامه نویسی و تعامل با صفحات</span>
                        <div class="flex flex-row items-center justify-end gap-2 ">
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex p-1 text-nowrap gap- justify-center items-center">
                                <span>To-Do List</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                    <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="in-fa">10موضوع</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                    <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="in-fa text-nowrap">5تا6 ساعت</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="min-w-13 max-w-13 h-13 flex items-center justify-center">
                    <img class="w-full h-full rounded-2xl" src="{{asset('storage/home/file_0000000068a071f4b4abc9e3fcc298aa.png')}}" alt="">
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                    <span class="flex items-center justify-center">3</span>
                </div>
                <span class="w-[1px] h-13 bg-[#fc6600] mt-2"></span>
                <!-- <div class="text-sm text-[#fc6600]">.</div> -->
            </div>
        </div>
        <div class="w-11/12 mx-auto flex gap-3">
            <div class="w-full bg-white box-shadow rounded-lg mt-3 flex items-center gap-2 relative px-1">
                <div class="absolute w-4 h-3 rounded-full -left-2.5 top-2">
                    <div class="relative borderAbs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 fill-gray-200" viewBox="0 0 320 512"><path d="M30.1 256l17-17L207 79l17-17L257.9 96l-17 17L97.9 256 241 399l17 17L224 449.9l-17-17L47 273l-17-17z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-3/24 h-full flex items-center justify-center">
                    <div class="w-5 h-5 rounded-full flex items-center justify-center box-shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#fe5d07] size-3" viewBox="0 0 320 512">
                            <path d="M273 239c9.4 9.4 9.4 24.6 0 33.9L113 433c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l143-143L79 113c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L273 239z"/>
                        </svg>
                    </div>
                </div>
                <div class="w-9/12 h-full">
                    <div class="flex flex-col py-2 gap-1">
                        <span class="font-bold text-[14px] text-end">Reactو کتابخانه های فرانت اند</span>
                        <span class="text-[10px] text-[#848aa4] text-end font-bold">ساخت رابط های کاربری مدرن و تعاملی</span>
                        <div class="flex flex-row items-center justify-end gap-2 ">
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 text-nowrap p1-1 justify-center items-center">
                                <span>To-Do List</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 512 512">
                                    <path d="M64 64C46.3 64 32 78.3 32 96V416c0 17.7 14.3 32 32 32H448c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H291.9c-17 0-33.3-6.7-45.3-18.7L210.7 73.4c-6-6-14.1-9.4-22.6-9.4H64zM0 96C0 60.7 28.7 32 64 32H188.1c17 0 33.3 6.7 45.3 18.7l35.9 35.9c6 6 14.1 9.4 22.6 9.4H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="in-fa">9موضوع</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" viewBox="0 0 384 512">
                                    <path d="M352 448V192H240c-26.5 0-48-21.5-48-48V32H64C46.3 32 32 46.3 32 64V448c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32zm-.5-288c-.7-2.8-2.1-5.4-4.2-7.4L231.4 36.7c-2.1-2.1-4.6-3.5-7.4-4.2V144c0 8.8 7.2 16 16 16H351.5zM0 64C0 28.7 28.7 0 64 0H220.1c12.7 0 24.9 5.1 33.9 14.1L369.9 129.9c9 9 14.1 21.2 14.1 33.9V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64z"/>
                                </svg>
                            </div>
                            <div class="bg-gray-100 text-[9px] text-[#484a65] rounded-md flex gap-1 p-1 justify-center items-center">
                                <span class="text-nowrap in-fa">5تا15 ساعت</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-[#484a65] size-2" stroke-width="2" viewBox="0 0 512 512">
                                    <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="min-w-13 max-w-13 h-13 flex items-center justify-center">
                    <img class="w-full h-full rounded-2xl" src="{{asset('storage/home/file_0000000068a071f4b4abc9e3fcc298aa.png')}}" alt="">
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="rounded-full bg-[#fc6600] text-white w-6 h-6 mt-4">
                    <span class="flex items-center justify-center">4</span>
                </div>
                <span class="w-[1px] h-13 border-1 border-dashed border-[#fe9449] border-[1px] mt-2"></span>
                <!-- <div class="text-sm text-[#fc6600]">.</div> -->
            </div>
        </div> --}}
    </div>
@endsection