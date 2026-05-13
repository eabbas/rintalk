@extends('welcome')
    @section('title', 'ایجادمدیا')
    @section('content')
     <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم ایجاد مدیا</h1>
        <form action="{{ route('courseMedia.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">فایل مدیا</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name='file_path' placeholder="  فایل مدیا را وارد کنید">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">پیش نمایش مدیا</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name="preview">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">مدت زمان فایل</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='duration' placeholder="مدت زمان(دقیقه) مدیا راوارد کنید">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">دوره</label>
                                <div
                                class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <select name="course_id" class="p-4 w-full focus:outline-none text-sm font-bold mr-2">
                                    @foreach ($courses as $oneCourse)
                                    <option value="">انتخاب دوره</option>
                                    <option value="{{$oneCourse->id}}" @if ($oneCourse->id == $course->id)
                                        {{'selected'}}
                                    @endif>{{$oneCourse->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">ترتیب نمایش</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="number" step="1"
                                        name='order' placeholder="عدد رو وارد کنید">
                                </div>
                            </div>
                            </div> 
                        </div>
                        <div class="w-full text-left">
                            <button type="submit"
                                class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium cursor-pointer">
                               ثبت
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    @endsection
