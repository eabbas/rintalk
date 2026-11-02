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
        @php 
            $i=1;
        @endphp
        @foreach($sentenseWithWords as $sentenceIndex => $item)
            <div style="margin-bottom: 30px; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                <b>جمله {{ $i }}: {{ $item['sentence'] }}</b>
                <br><br>
                @foreach($item['words'] as $wordIndex => $wordData)
                    <div style="margin-bottom: 15px;" id="word{{$i.$wordIndex + 1}}" data-id="{{$wordData['id']}}">
                        <strong>کلمه {{ $wordIndex + 1 }}:</strong>
                        <span>{{ $wordData['word'] }}</span> 
                        <br>
                        <div class="w-75 flex flex-col items-end">
                            <div class="w-40 flex items-center gap-1" id="{{$i}}">
                                <label class="text-nowrap" for="">کلمه مشترک</label>
                                <input class="border-1 w-full text-center" type="number" id="wordconnect{{$wordIndex + 1 }}">
                                <div class="cursor-pointer" onclick="connect({{$i}} , {{$wordIndex + 1 }}, {{$wordData['id']}})">✅</div>
                            </div>
                            <input type="text"
                            name="meanings[{{ $wordData['id'] }}]" 
                            placeholder="معنی کلمه «{{ $wordData['word'] }}» را وارد کنید" 
                            style="border: 1px solid #ccc; padding: 5px; border-radius: 4px; width: 300px; margin-top: 5px;">
                            <input type="hidden" name="word_ids[]" value="{{ $wordData['id'] }}">
                        </div>
                    </div>
                @endforeach
            </div>
            @php
                $i++;
            @endphp
        @endforeach
        
        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            ذخیره معانی
        </button>
    </form>
    <script>
        function connect(sentencenumber ,wordnumber , wrod){
            let wordconnect=document.getElementById('wordconnect'+wordnumber)
            let connectword=document.getElementById('word'+sentencenumber+wordconnect.value)
            let thisword=document.getElementById('word'+sentencenumber+wordnumber)
            let word_id=connectword.getAttribute('data-id')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('Text.connectWords') }}",
                type: "POST",
                dataType: "json",
                data:{'word_id':word_id , 'wordin':wrod},
                success: function(data) {
                    thisword.children[1].innerText=""
                    thisword.children[1].innerText=data.word
                    connectword.remove()
                }
            });
        }
    </script>
@endsection