@extends('welcome')
@section('title', 'ذخیره معنی')
@section('content')
    <h2> افزودن معانی کلمات</h2>
      <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('Text.texts') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base"> برگشت</a>
                </div>
    <form method="POST" action="{{ route('Text.saveMeanings') }}">
        @csrf
        @foreach($sentenseWithWords as $sentenceIndex => $item)
            <div style="margin-bottom: 30px; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                <b>جمله {{ $sentenceIndex + 1 }}: {{ $item['sentence'] }}</b>
                <br><br>
               
                @foreach($item['words'] as $wordIndex => $wordData)
                    <div style="margin-bottom: 15px;">
                        <strong>کلمه {{ $wordIndex + 1 }}:</strong> {{ $wordData['word'] }}
                        <br>
                        <input type="text" 
                               name="meanings[{{ $wordData['id'] }}]" 
                               placeholder="معنی کلمه «{{ $wordData['word'] }}» را وارد کنید" 
                               style="border: 1px solid #ccc; padding: 5px; border-radius: 4px; width: 300px; margin-top: 5px;">
                        <input type="hidden" name="word_ids[]" value="{{ $wordData['id'] }}">
                    </div>
                @endforeach
            </div>
        @endforeach
        
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            ذخیره معانی
        </button>
    </form>
@endsection