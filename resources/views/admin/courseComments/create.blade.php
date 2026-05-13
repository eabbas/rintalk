@extends('admin.app.panel')
@section('title')
     ایجاد دیدگاه
@endsection

@section('content')
<div class="flex items-center justify-center w-full">
    <div class="w-full max-w-md">
        <!-- کارت فرم دیدگاه -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- عنوان -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">ثبت دیدگاه</h2>
            
            <!-- فرم -->
            <form class="space-y-4" method="post" action="{{ route('CourseComment.create') }}">
               @csrf
                <div>
        
                    <input 
                        type="hidden"  
                        name="user_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                       
                    >
                </div>

                <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">نام دوره </label>
                 <select name="lesson_id">
                    @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
                  @endforeach
                <select>
              </div>

                <div>
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">دیدگاه شما</label>
                    <textarea 
                    
                        name="comment"
                        rows="4"
                        placeholder="دیدگاه خود را بنویسید..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                        required
                    ></textarea>
                </div>

                <!-- دکمه ارسال -->
                <button 
                    type="submit"
                    class="w-full bg-blue-600  text-white font-medium py-2.5 rounded-lg transition duration-200 ease-in-out transform ]"
                >
                    ارسال دیدگاه
                </button>
            </form>

          

            <!-- پیغام موفقیت (نمونه) -->
            <div class="mt-4 hidden">
                <div class="bg-green-50 text-green-600 p-3 rounded-lg text-sm">
                    دیدگاه شما با موفقیت ثبت شد.
                </div>
            </div>
        </div>

    </div>
</div>
@endsection