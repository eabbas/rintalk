@extends('welcome')
@section('title', 'ذخیره معنی جمله')
@section('content')
    <h2>افزودن معانی جملات</h2>
     <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('Text.texts') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base"> برگشت</a>
                </div>
     <br>
    <form method="POST" action="{{ route('Text.saveSentenceMeanings') }}">
        @csrf
        @foreach($sentenseWithIds as $index => $item)
            <div>
                <b>جمله {{ $index + 1 }}: {{ trim($item['sentence']) }}</b>
                <br>
                <input type="text" 
                       name="meaning[{{ $index }}]" 
                       placeholder="معنی جمله را وارد کنید" 
                       style="border: 1px solid #ccc; padding: 5px; border-radius: 4px; width: 500px;">
                
                <input type="hidden" name="sentence_ids[{{ $index }}]" value="{{ $item['id'] }}">   
                <br><br>
            </div>
        @endforeach
        
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            ذخیره معانی
        </button>
    </form>
@endsection