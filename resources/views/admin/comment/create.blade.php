
<div class="flex items-center justify-center w-full">
    <div class="w-full max-w-md">
        <!-- کارت فرم دیدگاه -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <!-- عنوان -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">ثبت دیدگاه</h2>
            
            <!-- فرم -->
            <form class="space-y-4" method="post" action="{{ route('chapterComment.commentStore') }}">
               @csrf
                <div>
        
                    <input 
                        type="hidden"  
                        name="chapter_id"
                        value="{{$chapter->id}}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                       
                    >
                </div>

                <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">نام فصل </label>
                 <select name="lesson_id">
                    @foreach($chapters as $chapter)
                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
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

          

          
        </div>

    </div>
</div>
