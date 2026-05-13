@extends('welcome')
@section('title', 'سینگل دسته‌ها')
@section('content')
    <div class="w-full">
        <div class="pb-5 w-full">
            <h1 class="text-xl text-center lg:text-start">{{ $category->title }}</h1>
        </div>

        <div class="flex flex-row border-none rounded-[7px]">
            <div class="block lg:flex flex-row justify-between gap-8">
                <div class="flex flex-col xm:flex-row lg:flex-row gap-5 py-3">
                    @if (!$category->image)
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0" src="{{ asset('assets/img/user.png') }}"
                            alt="category image" />
                    @else
                        <img class="size-27 lg:size-41 rounded-lg mx-auto lg:m-0"
                            src="{{ asset('storage/' . $category->image) }}" alt="category image" />
                    @endif
                </div>
            </div>
        </div>

        <div class="w-full flex flex-row justify-end">
            <a href="{{ route('category.list') }}" class="text-xs px-2 py-0.5 rounded-sm bg-gray-800 text-white">بازگشت</a>
        </div>
        
        <div class="mt-4 lg:mt-5 bg-white">
            <div class="shadow__profaill__karbary rounded-md lg:p-5 p-2 mb-3 lg:mb-5">
                <div class="flex flex-row justify-between items-center border-b border-gray-200">
                    <h1 class="lg:text-xl mt-5 font-bold pb-3">
                        جزئیات دسته بندی
                    </h1>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col gap-y-3 lg:gap-y-5 mt-5">
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            عنوان دسته بندی
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $category->title }}
                        </div>
                    </div>
                    
                  <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            دسته والد
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            @if($category->parent)
                                {{ $category->parent->title }}
                            @else
                                دسته اصلی (بدون والد)
                            @endif
                        </div>
                    </div>

                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            وضعیت نمایش در صفحه اصلی
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            @if($category->not_show_home)
                                <span class="text-red-500">عدم نمایش</span>
                            @else
                                <span class="text-green-500">نمایش داده می‌شود</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                            توضیحات
                        </div>
                        <div class="w-full lg:w-1/2 font-medium pr-3 lg:pr-0 text-sm lg:text-base">
                            {{ $category->description ?? 'توضیحاتی وارد نشده است' }}
                        </div>
                    </div>

                    @if($category->adsAttributes && count($category->adsAttributes) > 0)
                        <div class="w-full lg:py-3 flex flex-col gap-2 lg:gap-0 lg:flex-row lg:items-start">
                            <div class="w-full lg:w-1/2 text-xs lg:text-sm text-gray-400">
                                ویژگی‌های دسته بندی
                            </div>
                            <div class="w-full lg:w-1/2 flex flex-col gap-2 pr-3 lg:pr-0">
                                @foreach($category->adsAttributes as $attribute)
                                    <div class="flex flex-row gap-2">
                                        <span class="font-medium text-sm">{{ $attribute->attribute_key }}</span>
                                        @if($attribute->attribute_value)
                                            <span class="text-gray-500 text-sm">: {{ $attribute->attribute_value }}</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection