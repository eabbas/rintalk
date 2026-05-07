@extends('welcome')
@section('title', 'ایجاد مدیا')
@section('content')
<div class="pt-3 my-4 lg:my-8">
    <form action="{{ route('chapterMedia.chapterMediaStore') }}" method="post"
        class="shadow__profaill__list_products rounded-lg pb-4 bg-white" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="chapter_id" value="{{$chapter->id}}">
        <div class="p-5 px-6">
            <div class="w-full">
                <div class="flex flex-col gap-3">
                    
                    <!-- نام جزوه -->
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4">نام فایل</div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="file" name="file_path" placeholder="نام فایل" required>
                        </div>
                    </div>
                    
                    <!-- توضیحات جزوه -->
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4">مدت زمان ویدیو</div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="duration" placeholder="مدت زمان ویدیو" required>
                        </div>
                    </div>
                     
                     <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> پیش نمایش</div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="preview" placeholder="پیش نمایش" required>
                        </div>
                    </div>
    
          
                </div>
            </div>
        </div>
        
        <!-- دکمه ذخیره - انتقال به خارج از divهای قبلی -->
        <div class="w-full flex justify-end px-6 pb-4">
            <button class="px-6 py-3 bg-[#1B84FF] hover:bg-blue-600 rounded-[7px] text-white cursor-pointer transition-colors" type="submit">
                ذخیره
            </button>
        </div>
        
    </form>
</div>

@endsection