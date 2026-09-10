@extends('welcome')
@section('title', "سینگل دوره")
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full flex items-center justify-between">
            <h1 class="text-xl text-center lg:text-start text-nowrap">{{ $course->title }}</h1>
            <div class="w-full flex justify-end" >
                <div class="p-3 rounded-2xl bg-[#006ce7] text-white cursor-pointer" onclick="logincourse('open')">
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
    <div class="w-full h-dvh fixed top-0 right-0  " id='popupcourse'>
        <div class="w-full h-full flex items-center justify-center">
            <div class="w-full h-full bg-black/40 cursor-pointer" onclick="logincourse('close')"></div>
            <div class="absolute z-1 bg-white md:w-190 w-full h-11/12 rounded-2xl justify-between flex flex-col p-3 px-7 overflow-hidden overflow-y-auto">
                <div class="flex justify-end cursor-pointer" onclick="logincourse('close')">✖</div>
                <div class="flex px-3 w-full">
                    <div class="flex sm:flex-row flex-col items-center gap-5 w-full">
                        <img class="sm:min-w-40 sm:max-w-40 sm:min-h-40 sm:max-h-40 w-5/12" src="{{asset('storage/'.$course->image)}}" alt="">
                        <div class="flex flex-col items-center sm:items-start w-full gap-2">
                            <span class="text-2xl text-nowrap">{{ $course->title }}</span>
                            <div class=" lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base text-gray-400">
                            {{ $course->summary }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full items-center justify-between gap-3 mt-8" id="pricebox">
                    <div class="w-6/12 py-4 shadow-md text-center bg-gray-200 cursor-pointer" onclick="price(this , 'cash')">ثبت نام نقدی</div>
                    <div class="w-6/12 py-4 shadow-md text-center bg-white cursor-pointer" onclick="price(this , 'instalments')">ثبت نام قسطی</div>
                </div>
                <div class="w-full flex flex-col mt-5 gap-2">
                    <span>قبل از پرداخت حتما vpn خود را خاموش فرمایید🙏</span>
                    <span class="text-gray-500">پس از ثبت نام، دسترسی به تمام جلسات برای شما فعال شده و میتوانید از طریق گزینه شروع یادگیری در همین صفحه به ویدئوهای جلسات دوره وفایل‌های آن دسترسی داشته و مشاهده فرمایید.</span>
                </div>
                <div class="w-full flex flex-col mt-6 gap-2">
                    <div class="w-full flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 fill-gray-400">
                            <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                        </svg>
                        <span>اطلاعات ثبت نام کننده</span>
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <span>نام ونام خوانوارگی</span>
                        <div class="w-full bg-gray-300 p-3 rounded-xl">
                        {{ trim((Auth::user()->name ?? '') . ' ' . (Auth::user()->family ?? '')) }}
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-1">
                        <span>شماره مبایل</span>
                        <div class="w-full bg-gray-300 p-3 rounded-xl">
                        {{ Auth::user()->phoneNumber }}
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center justify-evenly mt-5 hidden flex-wrap gap-2" id="instalments">
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-xl">2</span>
                        <span class="text-gray-600">مجموع اقساط</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-gray-600">دوره پرداخت</span>
                        <div class="flex">
                            <div class="text-gray-600">
                                هر <span class="text-black text-xl">30</span> زوز
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <div class="flex items-center">
                            <span class="text-xl">2950000</span>
                            <span class="text-gray-600">تومان</span>
                        </div>
                        <span class="text-gray-600">مبلغ هر قسط</span>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-5 mt-5">
                    <div class="w-full flex items-center justify-center gap-2">
                        <span class="text-xl text-gray-500">هزینه ثبت نام:</span>
                        <div class="flex items-center gap-1">
                            <span class="text-lg">5900000</span>
                            <span class="text-gray-500">تومان</span>
                        </div>
                    </div>
                    <div class="w-full text-center py-5 bg-[#006ce7] text-white rounded-2xl">
                        ثبت نام در دوره
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
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
        function price(element , price){
            let pricebox=document.getElementById('pricebox')
            pricebox.children[0].classList.add('bg-white')
            pricebox.children[1].classList.add('bg-white')
            element.classList.remove('bg-white')
            element.classList.add('bg-gray-200')
            if(price=='instalments'){
                instalments.classList.remove('hidden')
            }
            if(price=='cash'){
                instalments.classList.add('hidden')
            }
        }
    </script>
@endsection