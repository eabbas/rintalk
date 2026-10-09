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

    <section class="w-full flex justify-center mb-5">
        <img class="w-full min-h-40 max-h-40 lg:min-h-100 lg:max-h-100 object-cover rounded-xl" src="{{asset('assets/image/hero.webp')}}" alt="">
    </section>

    <div class="w-full bg-white p-3">
        <div class="w-full flex flex-row justify-between mt-3">
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
            <a href="{{ route('course.single', $course->id) }}" class="w-full flex gap-3">
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
                            </div>
                        </div>
                    </div>
                    <div class="min-w-16 max-w-16 h-16 flex items-center justify-center">
                        <img class="w-full h-full rounded-2xl object-cover" src="{{asset('storage/'.$course->image)}}" alt="">
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection