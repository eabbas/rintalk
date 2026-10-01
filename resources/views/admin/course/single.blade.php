@extends('welcome')
@section('title', "سینگل دوره")
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full flex items-center justify-between">
            <h1 class="text-xl text-center lg:text-start text-nowrap">{{ $course->title }}</h1>
            <div class="w-full flex justify-end" >
                <div class="p-3 rounded-2xl bg-[#011a42] text-white cursor-pointer" onclick="logincourse('open')">
                    شرکت در دوره
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <img class="rounded-2xl" src="{{asset('storage/'.$course->image)}}" alt="">
        </div>
        <div class="mt-4 lg:mt-5 bg-white">
            <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                <div class="flex flex-row justify-between items-center border-b border-gray-200">
                    <h1 class="lg:text-xl mt-5 font-bold pb-3">
                        جزئیات دوره
                    </h1>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            عنوان درس 
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->title }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                             خلاصه 
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->summary }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                             مدت دوره (ساعت) 
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->duration }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            قیمت (تومان)
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->price }}
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                             قیمت بعداز تخفیف 
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->discount }}
                        </div>
                    </div>
                    
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                         وضعیت  نمایش در صفحه اصلی  
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            @if($course->show_in_home)
                            <span class="text-green-500">نمایش داده می‌شود</span>
                            @else
                            <span class="text-red-500">عدم نمایش</span>
                            @endif
                        </div>
                    </div>
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                               وضعیت 
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            @if($course->active)
                            <span class="text-green-500"> فعال</span>
                            @else
                            <span class="text-red-500">غیرفعال </span>
                            @endif
                        </div>
                    </div>  
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            توضیحات
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $course->description ?? 'توضیحاتی وارد نشده است' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full h-dvh fixed top-0 right-0 invisible opacity-0 " id='popupcourse'>
        <div class="w-full h-full flex items-center justify-center">
            <div class="w-full h-full bg-black/40 cursor-pointer" onclick="logincourse('close')"></div>
            <div class="absolute z-1 bg-white md:w-190 w-full rounded-2xl flex flex-col p-4 px-7 overflow-hidden overflow-y-auto">
                <div class="flex justify-end cursor-pointer" onclick="logincourse('close')">✖</div>
                <div class="flex sm:px-3 w-full">
                    <div class="flex sm:flex-row flex-col items-center gap-5 w-full">
                        <div class="flex flex-col items-center sm:items-start w-full gap-2">
                            <span class="text-2xl text-nowrap">{{ $course->title }}</span>
                            <div class=" lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base text-gray-400">
                            {{ $course->summary }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full items-center justify-between gap-3 sm:mt-8 mt-4" id="pricebox">
                    <div class="w-6/12 py-4 shadow-md text-center bg-gray-200 cursor-pointer" onclick="price(this , 'cash')">ثبت نام نقدی</div>
                    <div class="w-6/12 py-4 shadow-md text-center bg-white cursor-pointer" onclick="price(this , 'instalments')">ثبت نام قسطی</div>
                </div>
                <div class="w-full flex flex-col sm:mt-5 mt-3 gap-2">
                    <span class="sm:text-md text-sm">قبل از پرداخت حتما vpn خود را خاموش فرمایید🙏</span>
                    <span class="text-gray-500 text-xs sm:text-md" id="description">ثبت نام نقد ۱۰ ملیون یکجا</span>
                </div>
                <div class="w-full flex flex-col gap-5 sm:mt-5 mt-3">
                    <div class="w-full flex items-center justify-center gap-2">
                        <span class="text-xl text-gray-500"> قابل پرداخت:</span>
                        <div class="flex items-center gap-1">
                            <span class="text-lg" id="discount">5900000</span>
                            <span class="text-gray-500">تومان</span>
                        </div>
                    </div>
                    <a href="{{route('course.registrationCourse' , $course->id)}}"  class="w-full text-center py-5 bg-[#011a42] text-white rounded-2xl cursor-pointer">
                        ثبت نام در دوره
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        {{--function registration(course_id){--}}
        {{--    @if(!Auth::check())--}}
        {{--        location.assign("{{url('login')}}")--}}
        {{--    @endif--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $.ajax({--}}
        {{--        url:"{{route('course.registrationCourse')}}",--}}
        {{--        type: "POST",--}}
        {{--        dataType: "json",--}}
        {{--        data:{'course_id':course_id},--}}
        {{--        success: function(data) {--}}
        {{--            console.log(data)--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}
        let popupcourse=document.getElementById('popupcourse')
        function logincourse(door){
            if(door=='open'){
                popupcourse.classList.remove('invisible')
                popupcourse.classList.remove('opacity-0')
            }
            if(door=="close"){
                popupcourse.classList.add('invisible')
                popupcourse.classList.add('opacity-0')
            }
        }
        // console.log(instalments)
        let instalments=document.getElementById('instalments')
        let description=document.getElementById('description')
        function price(element , price){
            let pricebox=document.getElementById('pricebox')
            pricebox.children[0].classList.add('bg-white')
            pricebox.children[1].classList.add('bg-white')
            element.classList.remove('bg-white')
            element.classList.add('bg-gray-200')
            if(price=='instalments'){
                description.innerText=""
                description.innerText='ثبت نام قسطی ۶۰۰ هزار تومان ماهانه'
                discount.innerText=""
                discount.innerText="600"
            }
            if(price=='cash'){
                description.innerText=""
                description.innerText='ثبت نام نقد ۱۰ ملیون یک جا'
                discount.innerText=""
                discount.innerText="10000000"
            }
        }
    </script>
@endsection