@extends('welcome')
@section('title', 'لیست لایتنر من')
@section('content')
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<!-- <h2>کلمات ذخیره شده در لایتنر</h2> -->
<br>
<button onclick="showLeitnerPopup()" style="cursor: pointer; padding: 8px 16px; background: #f87224; color: white; border: none; border-radius: 4px;">مرور لایتنر</button>
<div id="leitnerPopup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: 4px solid black; padding: 20px; z-index: 1000; min-width: 300px; text-align: center;">
    <button id="closeLeitnerPopup" style="cursor: pointer;border: 2px solid black;">❌بستن</button>
    <br>
    <br>
    <p id="popupWord"></p>
    <p id="popupWordMeaning" style="display: none; color: green;"></p>
    <p id="popupSentence"></p>
    <p id="popupSentenceMeaning" style="display: none; color: blue;"></p>

    <br>
    <br>
    <button id="showMeaning" onclick="showMeaning()" style="cursor: pointer; background: orange;">نمایش معنی</button>
    <button id="knowBtn" style="cursor: pointer;background: #40f58b; display: inline-block;" onclick="next(1)">بلدم</button>
    <button id="unknowBtn" style="cursor: pointer; background: #eb3254; display: inline-block;" onclick="next(0)">بلد نیستم</button>
</div>

    <script>
            let leitnerPopup = document.getElementById('leitnerPopup');
            let closeLeitnerPopup = document.getElementById('closeLeitnerPopup');
            let words = [];
            let index = 0;

            function showLeitnerPopup() {
                leitnerPopup.style.display = 'block';
                document.getElementById('knowBtn').style.display = 'inline-block';
                document.getElementById('unknowBtn').style.display = 'inline-block';
                document.getElementById('showMeaning').style.display = 'inline-block';
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
                $.ajax({
                    url: "{{ route('leitnary.getWords') }}",
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        words = data;
                        index = 0;
                        showWord();
                    },
                    error: function() {
                        alert('خطا در بارگیری اطلاعات');
                    }
                });
            }

            function showWord() {
                if (index < words.length) {
                    document.getElementById('popupWord').innerHTML = words[index].word;
                    document.getElementById('popupSentence').innerHTML = words[index].sentence;
                    document.getElementById('popupWordMeaning').style.display = 'none';
                    document.getElementById('popupSentenceMeaning').style.display = 'none';

                    document.getElementById('knowBtn').style.display = 'inline-block';
                    document.getElementById('unknowBtn').style.display = 'inline-block';
                    document.getElementById('showMeaning').style.display = 'inline-block';
                } else {
                    document.getElementById('popupWord').innerHTML = 'مرور به پایان رسید';
                    document.getElementById('popupSentence').innerHTML ='';
                    
                    document.getElementById('knowBtn').style.display = 'none';
                    document.getElementById('unknowBtn').style.display = 'none';
                    document.getElementById('showMeaning').style.display = 'none';
                }
            }

            function next(flag) {
                // console.log(words[index].id)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                
                $.ajax({
                    url: "{{ route('leitnary.review') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        'word_id': words[index].id,
                        'flag': flag
                    },
                    success: function(datas) {
                        console.log(datas)
                        index++;
                        showWord();
                    },
                    error: function() {
                        alert('خطا در ذخیره نتیجه');
                    }
                });
            }
            function showMeaning() {
            let wordMeaning = document.getElementById('popupWordMeaning');
            let sentenceMeaning = document.getElementById('popupSentenceMeaning');
            let btn = document.getElementById('showMeaning');
            
            if (wordMeaning.style.display === 'none') {
                wordMeaning.innerHTML = 'معنی کلمه: ' + words[index].wordMeaning;
                wordMeaning.style.display = 'block';
                sentenceMeaning.innerHTML = 'معنی جمله: ' + words[index].sentenceMeaning;
                sentenceMeaning.style.display = 'block';
                btn.innerHTML = 'پنهان کردن معنی';
            } else {
                wordMeaning.style.display = 'none';
                sentenceMeaning.style.display = 'none';
                btn.innerHTML = 'نمایش معنی';
            }
        }
            if (closeLeitnerPopup) {
                closeLeitnerPopup.addEventListener('click', function() {
                    leitnerPopup.style.display = 'none';
                });
            }
    </script>

@endsection