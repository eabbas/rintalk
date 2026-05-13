@extends('welcome')
    @section('title', 'فصل های دوره مربوطه')
    @section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
     
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">لیست دیدگاه‌ها</h3>
                @foreach($comments as $comment)
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center">
                                <span class="font-bold text-gray-800 ml-2">مهدیه</span>
                                <span class="text-gray-600 mx-2">-</span>
                                <span class="text-gray-600">{{$comment->chapter->title}}</span>
                            </div>
                            
                            <div>
                                <a href="{{ url('chapterComment/single/'.$comment->chapter->id) }}" class="bg-green-500 hover:bg-green-600 text-white text-sm py-1 px-3 rounded inline-flex items-center no-underline" title="نمایش دیدگاه ">
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div> 
                @endforeach
        </div>
    </div> 
</div> 
@endsection