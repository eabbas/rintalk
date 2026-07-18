@extends('welcome')
@section('title', 'لیست لایتنر من')
@section('content')
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<style>
        .box_shado{
            box-shadow: 0px 15px 10px #ebebeb;
        }
        .box_shado4{
            box-shadow: 0px 2px 4px #ebebeb;
        }
        .box_shado2{
            box-shadow: 0px 5px 10px #ebebeb;
        }
        .box_shado3{
            box-shadow: 0px 3px 8px #ebebeb;
        }
    </style>





<section class="bg-[#fcfcfc]">
<div class="w-full flex justify-center items-center py-2">
    <section class="w-11/12 flex justify-center items-center mt-10">
        <div class="w-full flex justify-between">
            <div class="box_shado2 w-10 h-10 p-1 rounded-xl flex justify-center items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4">
                    <path d="M240 48c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H208c-17.7 0-32-14.3-32-32V80c0-17.7 14.3-32 32-32h32zM208 32c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H208zM80 240c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V272c0-17.7 14.3-32 32-32H80zM48 224c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48H48zM368 112h32c17.7 0 32 14.3 32 32V432c0 17.7-14.3 32-32 32H368c-17.7 0-32-14.3-32-32V144c0-17.7 14.3-32 32-32zm-48 32V432c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H368c-26.5 0-48 21.5-48 48z"/>
                </svg>
            </div>
            <div class="flex flex-col items-center">
                <span class="text-[.73rem] font-bold">جعبه فعلی</span>
                <span class="text-[#f46400] text-[1.6rem] font-bold">0</span>
                <span class="text-[.7rem] font-bold">تثبیت</span>
            </div>
            <div class="box_shado2 w-10 h-10 p-1 rounded-xl flex justify-center items-center mt-2">
                <svg xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24"
                     viewBox="0 0 24 24"
                     fill="none" class="size-5">
                    <path d="M4 7H20"
                          stroke="#1D2433"
                          stroke-width="2"
                          stroke-linecap="round"/>
                    <path d="M4 17H20"
                          stroke="#1D2433"
                          stroke-width="2"
                          stroke-linecap="round"/>
                    <circle cx="9" cy="7" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                    <circle cx="15" cy="17" r="2"
                            stroke="#1D2433"
                            stroke-width="2"/>
                </svg>
            </div>
        </div>
    </section>
</div>
<main class="w-full flex justify-center items-center mt-7 flex-col">
    <section class="w-11/12 flex justify-center items-center flex-col relative">
        <div class="w-[280px] h-[52px] bg-[#fff2ea] rounded-full absolute -z-1 -top-[.73rem] border-[4px] border-white box_shado3"></div>
        <div class="w-[265px] h-[41px] bg-[#fff2ea] rounded-full absolute -z-2 -top-[1.3rem] border-[3px] border-white box_shado3"></div>
        <div class="w-[250px] h-[42px] bg-[#fff2ea] rounded-full absolute -z-3 -top-[1.67rem] box_shado3"></div>
        <div class="w-19/24 rounded-3xl flex flex-col items-center p-3 py-4 box_shado bg-white gap-2">
            <div class="flex w-11/12 flex items-center justify-between">
                <div>
                    <svg version="1.1" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-unmute fill-[#777a88] size-5" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.563 2.069A.75.75 0 018 2.75v10.5a.75.75 0 01-1.238.57L3.472 11H1.75A1.75 1.75 0 010 9.25v-2.5C0 5.784.784 5 1.75 5h1.723l3.289-2.82a.75.75 0 01.801-.111zM6.5 4.38L4.238 6.319a.75.75 0 01-.488.181h-2a.25.25 0 00-.25.25v2.5c0 .138.112.25.25.25h2a.75.75 0 01.488.18L6.5 11.62V4.38zm6.096-2.038a.75.75 0 011.06 0 8 8 0 010 11.314.75.75 0 01-1.06-1.06 6.5 6.5 0 000-9.193.75.75 0 010-1.06v-.001zm-1.06 2.121a.75.75 0 10-1.061 1.061 3.5 3.5 0 010 4.95.75.75 0 101.06 1.06 5 5 0 000-7.07l.001-.001z"></path>
                    </svg>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-5 fill-[#777a88]">
                        <path d="M226.5 168.8L287.9 42.3l61.4 126.5c4.6 9.5 13.6 16.1 24.1 17.7l137.4 20.3-99.8 98.8c-7.4 7.3-10.8 17.8-9 28.1l23.5 139.5L303 407.7c-9.4-5-20.7-5-30.2 0L150.2 473.2l23.5-139.5c1.7-10.3-1.6-20.7-9-28.1L65 206.8l137.4-20.3c10.5-1.5 19.5-8.2 24.1-17.7zM424.9 509.1c8.1 4.3 17.9 3.7 25.3-1.7s11.2-14.5 9.7-23.5L433.6 328.4 544.8 218.2c6.5-6.4 8.7-15.9 5.9-24.5s-10.3-14.9-19.3-16.3L378.1 154.8 309.5 13.5C305.5 5.2 297.1 0 287.9 0s-17.6 5.2-21.6 13.5L197.7 154.8 44.5 177.5c-9 1.3-16.5 7.6-19.3 16.3s-.5 18.1 5.9 24.5L142.2 328.4 116 483.9c-1.5 9 2.2 18.1 9.7 23.5s17.3 6 25.3 1.7l137-73.2 137 73.2z"/>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <span class="text-[#fa6832] text-center text-[.9rem]" id="beforword"></span>
                <span class="text-[2rem] font-bold" id="wordTitle"></span>
                <span class="text-center text-[#9d9ea7] text-sm" id="wordFontek"></span>
                <span class="text-[#fa6832] text-center text-[.95rem]" id="wordAdjectiv"></span>
            </div>
            <div class="flex flex-col items-center gap-1">
                <span class="font-bold" id="wordMean"></span>
                <span class="text-[.9rem] text-[#898d97]" id="wordSentence"></span>
                <span class="text-[.8rem] text-[#93949f]" id="wordSentenceMean"></span>
            </div>
            <div class="flex gap-4 items-center">
                <div class="min-w-15 max-w-15 box_shado2 bg-white rounded-2xl cursor-pointer" id="next">
                    <img class="scale-135" src="{{asset('storage/hossein/on.png')}}" alt="">
                </div>
                <div class="min-w-15 max-w-15 box_shado2 bg-white rounded-2xl cursor-pointer">
                    <img class="scale-132" src="{{asset('storage/hossein/off.png')}}" alt="" id="befor">
                </div>
            </div>
        </div>
    </section>
    @php 
        $step=0;
        $beforeday=[];
        
        for($i=0;$i<count($words);$i++){
            if($words[$i]['step']>=$step){
                $step=$words[$i]['step'];
            }

            if($words[$i]['dataTime']<$today){
                $beforeday[$words[$i]['step']]=$words[$i]['step'];
            }
        }
    @endphp
    <section class="w-11/12 flex items-center mt-7 gap-1 flex-row-reverse justify-center" id="box-leitnary">
        <div class="borderbox flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(1>$step) blur-[2px] @endif" onclick="boxWordes(1)" >
            <span class="text-lg text-center font-bold text-[#fb5302]">1</span>
            <img src="{{asset('storage/hossein/ad7612b6-6ce0-4d38-b694-45c56696b2cf (2).png')}}" alt="" >
            <span class="text-[#8f95a5] text-center text-[.85rem]">استاد</span>
            <span class="text-center font-bold text-[#fb5302]">1</span>
            <div class="@if(in_array(1,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-red-600 -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[50px] max-w-[50px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(2>$step) blur-[2px] @endif" onclick="boxWordes(2)" @if(2>$step) @endif>
            <span class="text-lg text-center font-bold text-[#fb5302]">2</span>
            <img src="{{asset('storage/hossein/b9676c60-fca2-480f-abb6-6d590b1efbe9 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem] text-nowrap">رشد</span>
            <span class="text-center font-bold text-[#fb5302]">2</span>
            <div class="@if(in_array(2,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-[#fb5302] -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[49px] max-w-[49px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(3>$step) blur-[2px] @endif" onclick="boxWordes(3)" >
            <span class="text-lg text-center font-bold text-[#5bd64e]">3</span>
            <img src="{{asset('storage/hossein/1eb5f1d8-a1c8-4000-93c4-f4926daf0820 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">رشد</span>
            <span class="text-center font-bold text-[#5bd64e]">4</span>
            <div class="@if(in_array(3,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-[#5bd64e] -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[49px] max-w-[49px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(4>$step) blur-[2px] @endif" onclick="boxWordes(4)">
            <span class="text-lg text-center font-bold text-[#0296fe]">4</span>
            <img src="{{asset('storage/hossein/c2c34bcf-c5c2-4e0c-84de-a1885fb36775 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">تثبیت</span>
            <span class="text-center font-bold text-[#0296fe]">8</span>
            <div class="@if(in_array(4,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-[#0296fe] -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[48px] max-w-[48px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(5>$step) blur-[2px] @endif" onclick="boxWordes(5)">
            <span class="text-lg text-center font-bold text-[#0296fe]">5</span>
            <img src="{{asset('storage/hossein/47b6f6fd-6783-4781-960d-3f856e5bfc27 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">تمرین</span>
            <span class="text-center font-bold text-[#0296fe]">16</span>
            <div class="@if(in_array(5,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-[#0296fe] -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[46px] max-w-[46px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(6>$step) blur-[2px] @endif" onclick="boxWordes(6)">
            <span class="text-lg text-center font-bold text-[#5c27e4]">6</span>
            <img src="{{asset('storage/hossein/13555134-fd82-4e94-92eb-7dd04ce35271 (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.9rem]">اشنا </span>
            <span class="text-center font-bold text-[#5c27e4]">32</span>
            <div class="@if(in_array(6,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-[#5c27e4] -top-1.5 -left-1"></div>
        </div>
        <div class="borderbox flex flex-col items-center min-w-[49px] max-w-[49px] gap-1 box_shado4 rounded-2xl bg-white border-[#f6911e] cursor-pointer relative @if(7>$step) blur-[2px] @endif" onclick="boxWordes(7)">
            <span class="text-lg text-center font-bold">7</span>
            <img src="{{asset('storage/hossein/64f5c2ec-a59a-4b68-8c70-fc4d3357362f (2).png')}}" alt="">
            <span class="text-[#8f95a5] text-center text-[.85rem]">جدید</span>
            <span class="text-center font-bold">64</span>
            <div class="@if(in_array(6,$beforeday)) absolute @else hidden @endif w-2 h-2 rounded-full bg-black -top-1.5 -left-1"></div>
        </div>
    </section>
</main>














    <!-- خانم خدا قلی پور -->

    <!-- <h2>کلمات ذخیره شده در لایتنر</h2>
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
    <button id="unknowBtn" style="cursor: pointer; background: #eb3254; display: inline-block;" onclick="next(0)">بلد نیستم</button> -->
</div>

    <script>
        function boxWordes(number){
            let i=0
            let before='yse'
            let beforword=document.getElementById('beforword')
            let wordTitle=document.getElementById('wordTitle')
            let wordFontek=document.getElementById('wordFontek')
            let wordAdjectiv=document.getElementById('wordAdjectiv')
            let wordMean=document.getElementById('wordMean')
            let wordSentence=document.getElementById('wordSentence')
            let wordSentenceMean=document.getElementById('wordSentenceMean')
            let next=document.getElementById('next')
            let befor=document.getElementById('befor')
            let borderbox = document.querySelectorAll('.borderbox')
            beforword.innerText=""
            wordTitle.innerText=""
            wordFontek.innerText=""
            wordAdjectiv.innerText=""
            wordMean.innerText=""
            wordSentence.innerText=""
            wordSentenceMean.innerText=""
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                url: "{{ route('leitnary.getWords') }}",
                type: "POST",
                dataType: "json",
                data:{'step':number},
                success: function(data) {
                    if(data==number+1){
                        boxWordes(data)
                    }else{
                        for(const key in data.words){
                            if(data.words[key].dataTime==data.today){
                                befor.setAttribute('onclick' , 'next(0,'+data.words[key].id+','+ number +')')
                                next.setAttribute('onclick' , 'next(1,'+data.words[key].id+','+ number +')')
                                beforword.innerText=''
                                wordTitle.innerText=data.words[key].word
                                wordFontek.innerText='فونوتیک'
                                wordAdjectiv.innerText="گرامر"
                                wordMean.innerText=data.words[key].wordMeaning
                                wordSentence.innerText=data.words[key].sentence
                                wordSentenceMean.innerText="معنی جمله"
                                before='no'
                                
                            }
                        }
                        number--
                        borderbox.forEach((item, index)=>{
                            if(index==number){
                                item.classList.add('border-1')
                            }else{
                                item.classList.remove('border-1')
                            }
                        }) 
                        // console.log(before)
                        // console.log(data.words)
                        for(const key in data.words){
                            if(before=="yse"){
                                befor.setAttribute('onclick' , 'next(0,'+data.words[key].id+','+ number +')')
                                next.setAttribute('onclick' , 'next(1,'+data.words[key].id+','+ number +')')
                                beforword.innerText='فراموش شده ها'
                                wordTitle.innerText=data.words[key].word
                                wordFontek.innerText='فونوتیک'
                                wordAdjectiv.innerText="گرامر"
                                wordMean.innerText=data.words[key].wordMeaning
                                wordSentence.innerText=data.words[key].sentence
                                wordSentenceMean.innerText="معنی جمله"
                            }
                        }
                    }
                }
            });
        }
        boxWordes(1)

        function next(flag , wore_id , boxnumber) {
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
                    'word_id': wore_id,
                    'flag': flag
                },
                success: function(datas) {
                    boxWordes(boxnumber);
                },
                error: function() {
                    alert('خطا در ذخیره نتیجه');
                }
            });
        }











                    // for(const key in data.words){
                    //     // console.log(key , number)
                    //     // console.log(data.words)  
                    //     if(key==number){
                    //         box="null"
                    //         for(const ar in data.words[key]){
                    //             data.words[key][ar].forEach((item , index)=>{
                    //                 // console.log(item.dataTime , data.today)
                    //                 if(item.dataTime>data.today){
                    //                     console.log('dd')
                    //                     box='ok'
                    //                 }else{
                    //                     console.log('d')
                    //                     box='null'
                    //                 }
                    //             })
                                
                    //             i=0
                    //             data.words[key][ar].forEach((item , index)=>{
                    //                 // console.log(index , i)
                    //                 // console.log(item.dataTime , data.today , number)
                    //                 // console.log('/////////')
                                    
                    //                 // console.log(item , 2)
                    //                 if(item.dataTime<data.today && index==i){
                    //                     before='no'
                    //                 }else{
                    //                     if(item.dataTime>data.today && before=="no"){
                    //                         }else{
                    //                             before='yes'
                    //                         }
                                                
                    //                     }
                    //                     if(item.dataTime==data.today && index==i){
                    //                             befor.setAttribute('onclick' , 'next(0,'+item.id+','+ ar +')')
                                                // next.setAttribute('onclick' , 'next(1,'+item.id+','+ ar +')')
                    //                             beforword.innerText=''
                    //                             wordTitle.innerText=item.word
                    //                             wordFontek.innerText='فونوتیک'
                    //                             wordAdjectiv.innerText="گرامر"
                    //                             wordMean.innerText=item.wordMeaning
                    //                             wordSentence.innerText=item.sentence
                    //                             wordSentenceMean.innerText="معنی جمله"
                    //                             number--
                    //                             borderbox.forEach((item, index)=>{
                    //                                 if(index==number){
                    //                                     item.classList.add('border-1')
                    //                                 }
                    //                             })
                    //                 }else{   
                    //                     i++  

                    //                 }
                    //             })
                    //             // console.log(before , number)
                    //             if(before=='no'){
                    //                     i=0
                    //                     data.words[key][ar].forEach((item , index)=>{
                    //                         if(index==i && item.dataTime<data.today ){
                    //                             befor.setAttribute('onclick' , 'next(0,'+item.id+','+ ar +')')
                    //                             next.setAttribute('onclick' , 'next(1,'+item.id+','+ ar +')')
                    //                             beforword.innerText='  خوانده نشده ها'
                    //                             wordTitle.innerText=item.word
                    //                             wordFontek.innerText='فونوتیک'
                    //                             wordAdjectiv.innerText="گرامر"
                    //                             wordMean.innerText=item.wordMeaning
                    //                             wordSentence.innerText=item.sentence
                    //                             wordSentenceMean.innerText="معنی جمله"
                    //                         }else{
                    //                             i++
                    //                     }
                    //                 })
                    //             }
                    //         }
                    //     }else{
                    //         console.log(box)
                    //         if(box=='ok'){
                    //             number++
                    //             // boxWordes(number,box)
                    //             return
                    //         }
                    //     }    
                    // }










        //  خانم خدا قلی پور 


        //     let leitnerPopup = document.getElementById('leitnerPopup');
        //     let closeLeitnerPopup = document.getElementById('closeLeitnerPopup');
        //     let words = [];
        //     let index = 0;
        //     showLeitnerPopup()
        //     function showLeitnerPopup() {
        //         leitnerPopup.style.display = 'block';
        //         document.getElementById('knowBtn').style.display = 'inline-block';
        //         document.getElementById('unknowBtn').style.display = 'inline-block';
        //         document.getElementById('showMeaning').style.display = 'inline-block';
                
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //             }
        //         });
                
        //         $.ajax({
        //             url: "{{ route('leitnary.getWords') }}",
        //             type: "POST",
        //             dataType: "json",
        //             success: function(data) {
        //                 words = data;
        //                 index = 0;
        //                 showWord();
        //             },
        //             error: function() {
        //                 alert('خطا در بارگیری اطلاعات');
        //             }
        //         });
        //     }

        //     function showWord() {
        //         if (index < words.length) {
        //             document.getElementById('popupWord').innerHTML = words[index].word;
        //             document.getElementById('popupSentence').innerHTML = words[index].sentence;
        //             document.getElementById('popupWordMeaning').style.display = 'none';
        //             document.getElementById('popupSentenceMeaning').style.display = 'none';

        //             document.getElementById('knowBtn').style.display = 'inline-block';
        //             document.getElementById('unknowBtn').style.display = 'inline-block';
        //             document.getElementById('showMeaning').style.display = 'inline-block';
        //         } else {
        //             document.getElementById('popupWord').innerHTML = 'مرور به پایان رسید';
        //             document.getElementById('popupSentence').innerHTML ='';
                    
        //             document.getElementById('knowBtn').style.display = 'none';
        //             document.getElementById('unknowBtn').style.display = 'none';
        //             document.getElementById('showMeaning').style.display = 'none';
        //         }
        //     }

        //     function next(flag) {
        //         // console.log(words[index].id)
        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
        //             }
        //         });
                
        //         $.ajax({
        //             url: "{{ route('leitnary.review') }}",
        //             type: "POST",
        //             dataType: "json",
        //             data: {
        //                 'word_id': words[index].id,
        //                 'flag': flag
        //             },
        //             success: function(datas) {
        //                 console.log(datas)
        //                 return
        //                 index++;
        //                 showWord();
        //             },
        //             error: function() {
        //                 alert('خطا در ذخیره نتیجه');
        //             }
        //         });
        //     }
        //     function showMeaning() {
        //     let wordMeaning = document.getElementById('popupWordMeaning');
        //     let sentenceMeaning = document.getElementById('popupSentenceMeaning');
        //     let btn = document.getElementById('showMeaning');
            
        //     if (wordMeaning.style.display === 'none') {
        //         wordMeaning.innerHTML = 'معنی کلمه: ' + words[index].wordMeaning;
        //         wordMeaning.style.display = 'block';
        //         sentenceMeaning.innerHTML = 'معنی جمله: ' + words[index].sentenceMeaning;
        //         sentenceMeaning.style.display = 'block';
        //         btn.innerHTML = 'پنهان کردن معنی';
        //     } else {
        //         wordMeaning.style.display = 'none';
        //         sentenceMeaning.style.display = 'none';
        //         btn.innerHTML = 'نمایش معنی';
        //     }
        // }
        //     if (closeLeitnerPopup) {
        //         closeLeitnerPopup.addEventListener('click', function() {
        //             leitnerPopup.style.display = 'none';
        //         });
        //     }
    </script>

@endsection