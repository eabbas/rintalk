@extends('welcome')
@section('title', ' تجزیه متن')
@section('content')
    <h2>نتایج تجزیه متن</h2>
     <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('Text.texts') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base"> برگشت</a>
                </div>
    @foreach($sentenseWithWords as $index => $item)
        <div>
            <b>جمله {{ $index + 1 }}: {{ $item['sentence'] }}</b>
            <br>
           
            @foreach($item['words'] as $i => $word)
              کلمه{{ $i + 1 }}: {{ $word }} <br>
            @endforeach
            <br><br>
        </div>
    @endforeach
@endsection
