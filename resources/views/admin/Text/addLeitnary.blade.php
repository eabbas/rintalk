@extends('welcome')
@section('title', 'تجزیه متن')
@section('content')
    <h2 class="text-[24px] mb-8"> متن</h2>
     <div class="flex justify-end w-10/12 mx-auto">
                    <a href="{{ route('Text.texts') }}"
                        class="px-5 py-1 mb-4 rounded-sm bg-[#eb3254] hover:bg-rose-600 text-white text-xs lg:text-base"> برگشت</a>
                </div>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<div dir="ltr">
   @foreach($sentenseWithWords as $index => $item)
         
            @foreach($item['words'] as $wordData)
                <span class="word-span font-bold" 
                      data-word="{{ $wordData['text'] }}" 
                      data-sentence="{{ $item['sentence'] }}"  
                      data-word-id="{{ $wordData['id'] }}"
                      data-in-leitner="{{ $wordData['in_leitner'] ? 'true' : 'false' }}"
                      style="cursor: pointer;">
                    {{ $wordData['text'] }} 
                </span>
                
            @endforeach
            .
            @endforeach
        </div>

    <div id="wordPopup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: 1px solid black; padding: 20px; z-index: 1000;">
        <p>کلمه:<span id="popupWord"></span></p>
        <p>جمله:<span id="popupSentence"></span></p>
        <input type="hidden" id="wordId">
        <input type="hidden" id="wordInLeitner">
        <button onclick="addOrRemoveWordToLeitnary('')" id="leitnerButton" style="cursor: pointer;">افزودن به لایتنر</button>
     
        <button id="closeModal" style="cursor: pointer;">بستن</button>
    </div>

    <script>
        let modal = document.getElementById('wordPopup');
        let closeBtn = document.getElementById('closeModal');
        let spans = document.querySelectorAll('.word-span');
        
        
        spans.forEach(span => {
            span.addEventListener('click', function() {
                document.getElementById('popupWord').innerHTML  = this.getAttribute('data-word');
                document.getElementById('popupSentence').innerHTML  = this.getAttribute('data-sentence');
                let inLeitner = this.getAttribute('data-in-leitner');
                document.getElementById("wordInLeitner").value = inLeitner;
                document.getElementById("wordId").value = this.getAttribute('data-word-id');
                modal.style.display = 'block';
                // console.log(inLeitner)
                let leitnerButton = document.getElementById('leitnerButton');
                let isInLeitner = inLeitner === 'true';
                document.getElementById("wordInLeitner").value = inLeitner; 
                if (isInLeitner) {
                    leitnerButton.innerHTML  ='حذف از لایتنر';
                } else {
                    leitnerButton.innerHTML  ='افزودن به لایتنر';
                }
            });
        });
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        function addOrRemoveWordToLeitnary(){
            let wordId = document.getElementById("wordId").value
             let wordInLeitner = document.getElementById("wordInLeitner").value === 'true';
            // console.log(wordId.value)
             let route = wordInLeitner ? "{{ route('leitnary.delete') }}" : "{{ route('leitnary.store') }}";
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            })
            $.ajax({
                url: route,
                type: "POST",
                dataType: "json",
                data: {
                    'word_id': wordId
                },
                success: function(datas) {
               let newInLeitner = !wordInLeitner;
               console.log(newInLeitner)
                document.getElementById("wordInLeitner").value = newInLeitner ? 'true' : 'false';
                let leitnerButton = document.getElementById('leitnerButton');
                
                if (newInLeitner) {
                    leitnerButton.innerHTML  ='حذف از لایتنر';
                } else {
                    leitnerButton.innerHTML  ='افزودن به لایتنر';
                }

                    let wordSpans = document.querySelectorAll('.word-span');
                    wordSpans.forEach(span => {
                        if (span.getAttribute('data-word-id') == wordId) {
                             span.setAttribute('data-in-leitner', newInLeitner ? 'true' : 'false');
                        }
                    });
                    // console.log(datas)
                },
                error: function() {
                    alert('خطا در بارگیری اطلاعات')
                }
            })


        }
    </script>
    
    <!-- <script>
    let spans=document.querySelectorAll('.word-span')
    spans.forEach(span => {
        span.addEventListener('click', function() {
            let word = this.getAttribute('data-word');
            let sentence = this.getAttribute('data-sentence');
            alert('کلمه: ' + word + '\nجمله: ' + sentence);
        });
    });
</script> -->
@endsection




























































