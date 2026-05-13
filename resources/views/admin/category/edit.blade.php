@extends('welcome')
@section('title', 'ویرایش دسته بندی')
@section('content')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">ویرایش دسته بندی</h1>
    
    <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex justify-start">عنوان دسته بندی</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="text"
                                    name='title' value="{{ $category->title }}" placeholder="عنوان دسته بندی را وارد کنید" required>
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex justify-start">دسته والد</label>
                            <div class="p-3 rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex pl-3">
                                <select name="parent_id" class="w-full font-bold px-2 py-1 md:px-2 outline-none text-gray-500 cursor-pointer">
                                    <option value="0" @if(!$category->parent) selected @endif>بدون والد (دسته اصلی)</option>
                                    @foreach($categories as $cat)
                                        @if($cat->id != $category->id)
                                            <option value="{{ $cat->id }}" @if($cat->id == $category->parent_id) selected @endif>
                                                {{ $cat->title }}
                                                @if($cat->parent)
                                                    (زیرمجموعه {{ $cat->parent->title }})
                                                @endif
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex justify-start">انتخاب عکس جدید</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <input class="p-4 w-full focus:outline-none text-sm font-bold mr-2" type="file"
                                    name='image' title="عکس دسته بندی">
                            </div>
                            @if($category->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $category->image) }}" 
                                         class="w-20 h-20 object-cover rounded-lg border border-gray-200" alt="{{ $category->title }}">
                                    <span class="text-xs text-gray-500">عکس فعلی</span>
                                </div>
                            @endif
                        </div>
                        <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex justify-start">توضیحات دسته بندی</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <textarea rows="5" class="p-4 w-full focus:outline-none text-sm font-bold mr-2" 
                                    name='description' placeholder="توضیحات دسته بندی">{{ $category->description }}</textarea>
                            </div>
                        </div>
                    <div class="w-full text-left mt-4">
                        <button type="submit" class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                            ویرایش دسته بندی
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection