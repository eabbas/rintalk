
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">

        <!-- کارت نمایش دیدگاه -->
        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-2xl font-bold mb-6">نمایش دیدگاه</h1>
            
            <span class="text-lg font-bold">مهدیه </span>
       
           @if($chapter->chapterComments->chapter_id==$chapter->id)
           <div class="mb-4">
               <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded mr-2">{{$chapter->title}}</span>
            </div>
            @endif
           

            <!-- متن دیدگاه -->
            <p class="text-gray-700 leading-relaxed">
                    <div class="bg-gray-50 p-4 rounded mb-4">
                    {{$chapterComment->comment}}
                </p>
            </div>
            
            
            
    
         
        </div>
    </div>
</div>
