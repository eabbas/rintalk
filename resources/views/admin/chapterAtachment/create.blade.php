@extends('welcome')
@section('title', 'ایجاد جزوه')
@section('content')
<div class="pt-3 my-4 lg:my-8">
    <form action="{{ route('chapterAtachment.chapterAtachmentStore') }}" method="post"
        class="shadow__profaill__list_products rounded-lg pb-4 bg-white" enctype="multipart/form-data">
        @csrf
        <input type="hidden"  name="chapter_id" value="{{$chapter->id}}">
        <div class="p-5 px-6">
            <div class="w-full">
                <div class="flex flex-col gap-3">
                    
                    <!-- نام جزوه -->
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4">عنوان </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="title" placeholder="عنوان " required>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4">مدت زمان  </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="duration" placeholder="مدت زمان " required>
                        </div>
                    </div>
                    
                    <!-- توضیحات جزوه -->
                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4">نوضیح  </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="description" placeholder=" توضیح " required>
                        </div>
                    </div>
                     
                     <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> خلاصه توضیح</div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="summary" placeholder="خلاصه توضیح" required>
                        </div>
                    </div>
    
                       <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> قیمت</div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="price" placeholder=" قیمت" required>
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> تخفیف  </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="text" name="discount" placeholder="تخفیف " required>
                        </div>
                    </div>

                     <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> فایل  </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="file" name="file_path" placeholder="فایل " required>
                        </div>
                    </div>

                       <div class="flex flex-col lg:flex-row">
                        <div class="w-full lg:w-2/12 text-sm py-4"> تصویر  </div>
                        <div class="w-full lg:w-10/12 text-sm">
                            <input
                                class="w-full lg:w-1/2 p-4 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9]"
                                type="file" name="image" placeholder="تصویر  " required>
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