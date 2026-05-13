@extends('welcome')
    @section('title', 'ایجاد پیوست')
    @section('content')
     <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">فرم ایجاد پیوست</h1>
        <form action="{{ route('LessonAttachment.store') }}" method="post" enctype='multipart/form-data'>
            @csrf
            <div class="min-h-screen flex items-start justify-center">
                <div class="bg-white rounded-2xl shadow-md p-3 w-full md:w-9/12">
                    <div class="text-center mb-4">
                        <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                             <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">عنوان پیوست</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='title' placeholder="نام  پیوست خود را وارد کنید" required>
                                </div>
                                </div>
                                <div class="w-full flex flex-col gap-3 itmes-center max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">انتخاب درس</label>
                                <div
                                    class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                    <select name="lesson_id"
                                        class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer"required>
                                        @foreach ($lessons as $lesson)
                                            <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">فایل پیوست</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name='file_path' placeholder="  فایل پیوست را وارد کنید" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">عکس پیوست</label>

                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                        name="image" title="عکس" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">خلاصه</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='summary' placeholder="خلاصه پیوست راوارد کنید">
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">قیمت</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='price' placeholder="قیمت پیوست(تومان) راوارد کنید" required>
                                </div>
                            </div>
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">تخفیف</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    
                                    <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='discount' placeholder=" قیمت پس ازکسر تخفیف (تومان) راوارد کنید">
                                </div>
                            </div>
                            </div> 
                            <div class="w-full flex flex-col gap-3 max-md:flex-col max-md:gap-1 lg:col-span-2">
                                <label class="w-30 text-sm mb-1 mt-2.5 flex">توضیحات</label>
                                <div
                                    class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                    <textarea class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                        name='description' placeholder="توضیحات پیوست "
                                        class="w-full px-3 py-1 md:px-2 outline-none text-gray-500"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="w-full text-left ">
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
