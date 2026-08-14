@include('header')
<style>

    /*  style mahdi  */
    .heder_hover_phone:hover:hover .heder_hover_items_item{
        visibility: visible;
        opacity: 1;

    }
    .heder_hover_phone:hover .heder_hover_items_rotate{
        rotate: 270deg;
    }
    .gradientereer{
        background-image: linear-gradient(90deg , rgb(128, 0, 255) , rgb(255, 0, 166));


    }
    /*  style mahdi  */

/*  style amir  */
     .mohtava_2 {
         background: linear-gradient(220deg, #2c3e50 0%, #0aacb4 100%);
     }
    .peer {
        background: linear-gradient(180deg, #2c3e50 0%, #3498db 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .peer::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 90%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .peer:hover::after {
        width: 1300px;
        height: 1000px;
    }
    /* .peer:hover {
          transform: translateY(-5px);
      } */
    .peer:hover .peerr {
        transform: translateX(-20px);
    }
    .mohtava_1 {
        background: linear-gradient(140deg, #2c3e50 0%, #9b0c5d 100%);
        /* box-shadow: 0 6px 0 #2c3e50, 0 8px 10px rgba(0,0,0,0.2); */
        /* transition: all 0.1s ease; */
    }
     .mohtava_1:hover {
         transform: translateY(-5px);
         /*box-shadow: 0 4px 0 #9b0c5d, 0 6px 8px rgba(0,0,0,0.2);*/
     }
     .mohtava_2:hover {
            transform: translateY(-5px);
            /*box-shadow: 0 4px 0 #9b0c5d, 0 6px 8px rgba(0,0,0,0.2);*/
        }

     /*   .mohtava_1:active {*/
     /*       transform: translateY(2px);*/
     /*       box-shadow: 0 2px 0 #2c3e50, 0 4px 6px rgba(0,0,0,0.2);*/
     /*   }*/
</style>


    <section class="w-full flex justify-center relative mt-5">
        <div class=" w-11/12 pt-1 rounded-lg flex items-center gap-5 overflow-hidden overflow-x-auto">
            @foreach($story as $story)
                <div class="min-w-16 max-w-16 lg:minw-w-17 lg:max-w-17 flex  flex-col gap-1 items-center pup_up_story stoey cursor-pointer" onclick="story('open' , '{{$story->path}}')">
                    <div class="w-full rounded-full border-2 border-[#07164f] flex jsutfiy-center items-center p-0.5 ">
                        <div class="w-full h-full rounded-full overflow-hidden flex justify-center items-center">
                            <img src="{{asset('storage/' . $story->path)}}" alt="" class="object-cover rounded-full">
                        </div>
                    </div>
                    <span class="w-full text-xs md:text-[1rem] lg:text-[1.2rem] text-nowrap text-center">{{$story->title}}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="w-11/12 bg-[#0b1a31] mx-auto rounded-xl flex relative mt-3">
        <div class="w-7/12 h-7/12">
            <img src="{{asset('storage/home/ei_1786388637947-removebg-preview (1).png')}}" alt="" class="object-cover w-full h-full rounded-xl"> 
        </div>
        <div class="w-5/12 h-full absolute left-0 flex flex-col justify-center  gap-1.5 items-end pl-5 lg:pl-15">
            <p class="text-[6px] text-[#f6911e] md:text-[1.1rem] lg:text-[1.4rem] text-nowrap xl:text-[1.8rem]">یاد گیری زبان و فرصتی برای دنیای جدید</p>
            <span class="text-sm font-bold text-white md:text-[1.7rem] lg:text-[2.5rem] xl:text-[3rem] lg:mt-2 xl:mt3">زبان یاد بگیر</span>
            <span class="text-sm font-bold text-white text-nowrap md:text-[1.7rem] lg:text-[2.5rem] xl:text-[3rem] lg:mt-2 xl:mt3">زندگی ات را گسترش بده</span>
            <p class="text-[7px] text-white md:text-[1.2rem] lg:text-[1.5rem] xl:text-[2.1rem] lg:mt-2 xl:mt3 text-nowrap">دوره های کاربردی اساتید حرفه ای</p>
            <p class="text-[7px] text-white md:text-[1.2rem] lg:text-[1.5rem] xl:text-[2.1rem] lg:mt-2 xl:mt3">ثیاد گیری آسان و موثر</p>
            <button class="w-7/12 h-5 md:h-7 md:py-2 lg:h-8 xl:h-11 lg:py-4 rounded-lg bg-[#ff9a1e] flex gap-1 items-center justify-center mt-2 xl:mt-5 ">
                <span class="text-[7px] text-white md:text-[1rem] lg:text-[1.2rem] xl:text-[1.6rem]">مشاهده دوره ها</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-2 md:size-4 lg:size-5 xl:size-7 rotate-90" fill="white">
                    <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"/>
                </svg>
            </button>
        </div>
        <div class="w-15 h-7 md:w-32 md:h-15 lg:w-40 lg:h-22 xl:w-56 xl:h-29 bg-white absolute top-3 right-4 lg:top-9 lg:right-9 rounded-lg flex gap-1 justify-center items-center md:px-2">
            <div class="flex flex-col items-start justify-center">
                <span class="text-[6px] md:text-[.9rem] lg:text-[1.15rem] xl:text-[1.5rem] font-bold ">جلسه رایگان</span>
                <span class="text-[5px] md:text-[.85rem] lg:text-{1.1rem} xl:text-[1.4rem] text-[#b2b3bb]">مشاهده کنید</span>
            </div>
            <div class="w-4 h-4 md:w-11 md:h-11 lg:w-14 lg:h-14 xl:w-20 xl:h-20 rounded-full overflow-hidden">
                <img src="{{asset('storage/home/a4a2435b-73c3-49df-8dca-66f0f42a6c6b.jpg')}}" alt="">
            </div>
        </div>
        <div class="bg-[#2e3952] absolute bottom-8 right-1/30 rounded-md flex gap-0.5 px-1.5 py-1 items-center justiyf-center justify-center">
            <div class="flex flex-col items-start justify-center">
                <span class="text-[5px] md:text-[1rem] lg:text-[1.15rem] xl:text-[1.8rem] text-white">پادکست</span>
                <span class="text-[4px] md:text-[1rem] lg:text-[1.1rem] xl:text-[1.8rem] text-[#b2b3bb]">گوش دهید </span>
            </div>
            <div class="w-4 h-4 md:w-11 md:h-11 xl:w-25 xl:h-25 rounded-full overflow-hidden">
                <img src="{{asset('storage/home/b8540b37-275e-4df2-88fa-b4a44b55abb6.jpg')}}" alt="">
            </div>
        </div>
    </section>
</div>
<div class="fixed top-0 w-full h-dvh flex justify-center items-center opacity-0 invisible transition-all duration-300 z-2" id="popupstory">
        <div class="w-full h-full bg-black/30 cursor-pointer" onclick="story('clos')"></div>
        <div class="w-6/12 absolute md:h-100 lg:h-150">
            <img class="w-full h-full rounded-3xl" src="" alt="" id="imgstory">
        </div>
</div>
{{--tasc mahdi--}}

{{--tasc Amir--}}

<main class="w-full relative mx-auto md:mt-20">



    <style>
        *{
            box-sizing:border-box;
        }

        .audio-player{

            max-width:1200px;

            background:#07164f;
            border-radius:20px;
            display:flex;
            align-items:center;
            /* gap:2px; */

        }

        .play-btn{
            width:50px;
            height:50px;
            border:none;
            border-radius:50%;
            background:#ff8c1a;
            color:#fff;
            font-size:20px;
            cursor:pointer;
            flex-shrink:0;
        }

        .time{
            color:#fff;
            font-size:16px;
            min-width:75px;
            text-align:center;
        }

        .progress{
            flex:1;
            height:4px;
            appearance:none;
            background:#6973a8;
            border-radius:50px;
        }

        .progress::-webkit-slider-thumb{
            appearance:none;
            width:20px;
            height:20px;
            border-radius:50%;
            background:#ff8c1a;
            cursor:pointer;
        }

        .waveform{
            display:flex;
            align-items:center;
            gap:3px;
        }

        .waveform span{
            width:4px;
            background:#ff8c1a;
            border-radius:10px;

        }

        .animate{
            animation:wave 1.2s infinite ease-in-out;
        }

        .waveform span:nth-child(1){height:11px;}
        .waveform span:nth-child(2){height:25px;}
        .waveform span:nth-child(3){height:39px;}
        .waveform span:nth-child(4){height:58px;}
        .waveform span:nth-child(5){height:70px;}
        .waveform span:nth-child(6){height:52px;}
        .waveform span:nth-child(7){height:35px;}
        .waveform span:nth-child(8){height:60px;}
        .waveform span:nth-child(9){height:50px;}
        .waveform span:nth-child(10){height:30px;}
        .waveform span:nth-child(11){height:17px;}
        .waveform span:nth-child(12){height:10px;}

        @keyframes wave{
            0%,100%{
                transform:scaleY(.7);
            }
            50%{
                transform:scaleY(1);
            }
        }
    </style>


    <script>
        imgstory=document.getElementById('imgstory')
        popupstory.document.getElementById('popupstory')
        function story(dor , img){
            if(dor=='open'){
                imgstory.setAttribute("src" , "{{ asset('storage/') }}/" + img)
                popupstory.classList.remove('opacity-0')
                popupstory.classList.remove('invisible')
            }
            if(dor=="clos"){
                popupstory.classList.add('opacity-0')
                popupstory.classList.add('invisible')
            }
        }


        const audio = document.getElementById("audio");
        const playBtn = document.getElementById("playBtn");
        const progress = document.getElementById("progress");
        const currentTime = document.getElementById("currentTime");
        const duration = document.getElementById("duration");

        let wave=document.querySelector('.waveform')

        playBtn.addEventListener("click", () => {
            wave.classList.toggle('animate')
            if(audio.paused){
                audio.play();
                playBtn.textContent = "❚❚";

            }else{
                audio.pause();
                playBtn.innerHTML=""
                let cree=document.createElement('div')
                cree.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4" fill="white"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>`
                playBtn.appendChild(cree)
            }
        });

        audio.addEventListener("loadedmetadata", () => {
            duration.textContent = formatTime(audio.duration);
        });

        audio.addEventListener("timeupdate", () => {
            currentTime.textContent = formatTime(audio.currentTime);

            const percent =
                (audio.currentTime / audio.duration) * 100;

            progress.value = percent || 0;
        });

        progress.addEventListener("input", () => {
            audio.currentTime =
                (progress.value / 100) * audio.duration;
        });

        audio.addEventListener("ended", () => {
            playBtn.textContent = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>`
        });

        function formatTime(seconds){
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);

            return `${String(mins).padStart(2,"0")}:${String(secs).padStart(2,"0")}`;
        }
    </script>


    <!-- تعیین سصح -->
    <section class="w-11/12 mx-auto mt-5 flex gap-1"> 
        <div class="w-1/2 h-full bg-white flex flex-col relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/home/file_00000000fb4471fbbcb3f2b09783b365.png')}}" alt="" class="object-cover w-full h-full lg:size-7/12 rounded-xl">
            <div class="w-full h-full absolute py-1.5 pl-3 flex flex-col justify-between gap-1 items-end">
                <div class="w-full flex gap-4 items-center justify-center">
                    <div class="flex flex-col">
                        <h3 class="text-[16px] md:text-[1.4rem] lg:text-[2rem] font-bold">تعیین سطج</h3>
                        <h4 class="text-[12px] md:text-[1.2rem] lg:text-[1.8rem] font-bold">سطح خود </h4>
                    </div>
                    <div class="w-12 h-12 md:w-18 md:h-18 lg:w-22 lg:h-22 bg-white rounded-full border-3 border-[#f5d5b2] p-[1px] flex justify-center items-center">
                        <div class="w-full h-full bg-[#fa6004] rounded-full  p-1.5 flex justify-center items-center overflow-hidden">
                            <img src="{{asset('storage/home/file_0000000083ec71f489146d02f60521c4.png')}}" alt="" class="object-cover w-full h-full ">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 items-start">
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold">تست استاندارد </span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold">مشخص کردن</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#ff9a1e"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold">تست استاندارد</span>
                    </div>
                </div>
                <div class="px-3 py-1.5 bg-[#ff9a1e] rounded-xl flex gap-1 justify-center items-center">
                    <span class="text-[10px] text-white md:text-[1.2rem] lg:text-[1.6rem] font-bold">تعیین سطح </span>
                    <div class=" rounded-full  bg-[#f98300] flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -50 448 512" class="size-3 md:size-4 lg:size-6 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2 min-h-full lg: bg-white flex flex-col justify-end items-end relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/home/949c2d04-e7eb-4bd4-92a4-4f6bffa86ddb.jpg')}}" alt="" class="object-cover size-10/12 lg:size-7/12">

            <div class="w-full h-full absolute py-1.5 pr-3 flex flex-col justify-between gap-1 items-start">
                <div class="w-full flex gap-4 items-center justify-center">
                    <div class="flex flex-col text-center">
                        <h4 class="text-[16px] md:text-[1.4rem] lg:text-[2rem] font-bold text-[#051b61]">شرکت در دوره</h4>
                        <span class="text-[12px] md:text-[1.3rem] lg:text-[1.8rem] font-bold text-[#051b61]">همین حالا </span>
                    </div>
                    <div class="w-12 h-12 md:w-18 md:h-18 lg:w-22 lg:h-22 bg-white rounded-full border-3 border-[#E6EBF1] p-[1px] flex justify-center items-center">
                        <div class="w-full h-full bg-[#002284] rounded-full  p-1.5 flex justify-center items-center overflow-hidden">
                            <img src="{{asset('storage/home/file_0000000068a071f4b4abc9e3fcc298aa.png')}}" alt="" class="object-cover w-full h-full">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 items-start">
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold text-[#051b61]">دوره های کاربردی</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold text-[#051b61]">اسانید حرفه ای</span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <svg  class="size-3 lg:size-5" viewBox="0 0 36 36" fill="#1a2940"><path class="clr-i-outline clr-i-outline-path-1" d="M18,6A12,12,0,1,0,30,18,12,12,0,0,0,18,6Zm0,22A10,10,0,1,1,28,18,10,10,0,0,1,18,28Z"></path><path  d="M16.34,23.74l-5-5a1,1,0,0,1,1.41-1.41l3.59,3.59,6.78-6.78a1,1,0,0,1,1.41,1.41Z"></path><path class="clr-i-solid clr-i-solid-path-1" d="M30,18A12,12,0,1,1,18,6,12,12,0,0,1,30,18Zm-4.77-2.16a1.4,1.4,0,0,0-2-2l-6.77,6.77L13,17.16a1.4,1.4,0,0,0-2,2l5.45,5.45Z" style="display:none"></path></svg>
                        <span class="text-[10px] md:text-[1.2rem] lg:text-[1.8rem] font-bold text-[#051b61]">تست استاندارد </span>
                    </div>
                </div>
                <div class="px-2 py-1.5 bg-[#002284] rounded-xl flex gap-1 justify-center items-center">
                    <a href="{{route('course.courses')}}" class="text-[10px] text-white md:text-[1.2rem] lg:text-[1.6rem] font-bold">مشاهده دوره ها</a>
                    <div class="rounded-full  bg-[#121e32] flex justify-center items-center">
                        <svg viewBox="0 -50 448 512" class="size-3 md:size-4 lg:size-6 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- تعیین سصح -->

    <!-- پادکست -->
    <section class="w-11/12 mx-auto mt-5 flex gap-1 ">
        <div class="w-5/12 min-h-full flex relative rounded-xl border-1 border-white" style="box-shadow:0.5PX 0.5PX 5PX #d4d4e6">
            <img src="{{asset('storage/home/file_000000009644720aa1772eca64c64eda.png')}}" alt="" class="object-cover w-full h-full rounded-xl">
            <div class="w-11/20 h-full absolute flex flex-col justify-between items-center py-4">
                <span class="text-[6px] text-[#ff9a1e] font-bold">پادکست صوتی</span>
                <h5 class="text-[8px] font-bold">یادگیری زبان در سفر</h5>
                <span class="text-[6px] text-[#ff9a1e]">پادکست صو صوتی</span>
                <button class="w-14 py-1 bg-white rounded-lg flex gap-1 justify-center items-center">
                    <span class="text-[6px]">گوش دهید</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-2"><defs><style>.fa-secondary{opacity:.4}</style></defs><path class="fa-secondary" d=""/><path class="fa-primary" d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"/></svg>
                </button>
            </div>
        </div>
        <div class="w-7/12 min-h-full bg-[#2A137F] rounded-xl relative flex justify-start items-end border-1 border-[#8975c4] " style="box-shadow:0.5PX 0.5PX 5PX #c4b1f8">

            <img src="{{asset('storage/home/ChatGPT Image Jun 6, 2026, 04_45_18 PM.png')}}" alt="" class="size-15">

            <div class="w-full h-full absolute flex flex-col  justify-between items-end pl-7 py-3">
                <h3 class="text-[17px] text-white font-bold">هم بحثیتو پیدا کن</h3>
                <button class="w-5/12 h-6  rounded-xl flex gap-1 justify-center items-center border-1 border-white">
                    <span class="text-[8px] text-white">بیشتر بخوانید</span>
                    <div class="w-3 h-3 rounded-full flex justify-center items-center">
                        <svg viewBox="0 -50 448 512" class="size-2 rotate-90" fill="white">
                            <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M241 337c-9.4 9.4-24.6 9.4-33.9 0L47 177c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l143 143L367 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L241 337z"></path>
                        </svg>
                    </div>
                </button>
            </div>




        </div>
    </section>
    <!-- پادکست -->
    <section class="w-full mt-5 md:mt-20">
        <div class="w-full flex items-center mx-auto">
            <span
                    class="w-48 min-w-fit text-zinc-700 text-xs md:text-sm md:font-yekanBakhBold"
            >جدید ترین مقالات</span
            >
            <span
                    class="h-[1px] w-full bg-gradient-to-r from-white via-zinc-500 to-white"
            ></span>
            <div class="w-32 min-w-fit text-left">
                <a
                        href=""
                        class="text-sm hover:text-orange-500 text-zinc-600 flex fle items-center gap-x-1 group"
                >
                    مشاهده همه
                    <svg
                            class="fill-zinc-600 hover:fill-orange-500 group-hover:-translate-x-1 transition group-hover:fill-orange-500 size-2.5 md:size-3"
                            xmlns="http://www.w3.org/2000/svg"
                            width=""
                            height=""
                            fill=""
                            viewBox="0 0 256 256"
                    >
                        <path
                                d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z"
                        ></path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="w-full flex items-center mx-auto mt-5">
            <div
                    class="overflow-x-auto flex flex-row rounded-xl mx-auto px-[16px] py-[32px] [&::-webkit-scrollbar]:w-0.5 [&::-webkit-scrollbar-thumb]:bg-orange-500 [&::-webkit-scrollbar-thumb]:rounded-full"
            >
                <div class="flex flex-row gap-3">
                    <a href="" class="min-w-30  overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/nody-عکس-پروفایل-aوm-باهم-1630591365.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/3D.Alphabet.PNG.2.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                    <a href="" class="min-w-30 bg-white overflow-hidden flex flex-col items-center rounded-lg gap-y-3">
                        <img src="{{ asset('storage/home/alphabet4.jpg') }}" alt="" class="min-w-30 max-w-30 h-40 bg-red-200 rounded-lg">
                        <div class="text-md text-zinc-600">محتوااااا</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

{{--tasc Amir end--}}


<script>
    for(let j=0;j<7;j++){
        let mmjjjkk=`<div class="w-full min-py-1 flex gap-2 pr-2 justify-between border-r-2 border-[blue]" id="mmjjjkk">
                                            <div class="w-10/12 flex gap-2">
                                                <div>
                                                    <div class="w-10 h-10 rounded-full overflow-hidden border-1">
                                                        <img src="{{asset('assets/img/user.png')}}" alt="" class="object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-10/12 py-1 flex flex-col gap-1">
                                                    <div class="flex gap-2">
                                                        <span class="text-xs text-[#c3c4c7]">mahdi_1111</span>
                                                        <span class="text-xs text-[#c3c4c7]">14h</span>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs lg:text-sm">متن_تستی متن_تستی متن_تستی متن_تستی متن_تستی</p>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="text-xs text-[#c3c4c7]">پاسخ</span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2 items-center">
                                                <div class="like_change_svg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5" fill="black" id="no_like_in_comment"><path d="M256 163.9L222.1 130l-24.2-24.2C181.4 89.3 159 80 135.8 80C87.3 80 48 119.3 48 167.8c0 23.3 9.2 45.6 25.7 62.1l24.2 24.2L256 412.1 414.1 254.1l24.2-24.2c16.5-16.5 25.7-38.8 25.7-62.1c0-48.5-39.3-87.8-87.8-87.8c-23.3 0-45.6 9.2-62.1 25.7L289.9 130 256 163.9zm33.9 282.2L256 480l-33.9-33.9L64 288 39.8 263.8C14.3 238.3 0 203.8 0 167.8C0 92.8 60.8 32 135.8 32c36 0 70.5 14.3 96 39.8L256 96l24.2-24.2c0 0 0 0 0 0c25.5-25.4 60-39.7 96-39.7C451.2 32 512 92.8 512 167.8c0 36-14.3 70.5-39.8 96L448 288 289.9 446.1z"/></svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 hidden" fill="red"  id="like_in_comment"><path d="M39.8 263.8L64 288 256 480 448 288l24.2-24.2c25.5-25.5 39.8-60 39.8-96C512 92.8 451.2 32 376.2 32c-36 0-70.5 14.3-96 39.8L256 96 231.8 71.8c-25.5-25.5-60-39.8-96-39.8C60.8 32 0 92.8 0 167.8c0 36 14.3 70.5 39.8 96z"/></svg>
                                                </div>
                                                <span class="text-black text-sm text-nowrap">235 هزار</span>
                                            </div>
                                        </div>`
        console.log(mmjjjkk)
        let classElement=document.createElement('div')
        classElement.innerHTML=mmjjjkk
        mmmmkkkkddd.appendChild(classElement)
    }



    let story=document.querySelectorAll('.pup_up_story')
    console.log(story)
    story.forEach((item)=>{
        item.addEventListener('click',function(){
            if(item.nextElementSibling.children[0].classList.contains('invisible')){
                item.nextElementSibling.children[0].classList.remove('invisible')
                item.nextElementSibling.children[0].classList.remove('opacity-0')
                item.nextElementSibling.children[1].classList.remove('invisible')
                item.nextElementSibling.children[1].classList.remove('opacity-0')
            }
        })
    })
    let pup_up_story_items=document.getElementById('pup_up_story_items')
    let pup_up_story_black=document.getElementById('pup_up_story_black')
    function pup_up_story_close_out(){
        console.log('skdbf.s')
        pup_up_story_items.classList.add('invisible')
        pup_up_story_items.classList.add('opacity-0')
        pup_up_story_black.classList.add('invisible')
        pup_up_story_black.classList.add('opacity-0')
    }

    let like_change_svg=document.querySelectorAll('.like_change_svg')

    like_change_svg.forEach((item)=>{
        item.addEventListener('click',function(){
            item.children[1].classList.toggle('hidden')
            item.children[0].classList.toggle('hidden')
        })
    })

    let show_reply=document.querySelectorAll('.show_reply')

    show_reply.forEach((item)=>{
        item.addEventListener('click',function(){


            if(item.nextElementSibling.classList.contains('max-h-145')){
                item.nextElementSibling.classList.remove('max-h-145')
                item.nextElementSibling.classList.remove('max-h-75')
                // item.nextElementSibling.classList.remove('pb-5')
                item.nextElementSibling.classList.add('max-h-0')
            }else{
                item.nextElementSibling.classList.toggle('max-h-0')
                item.nextElementSibling.classList.toggle('max-h-75')
                // item.nextElementSibling.classList.toggle('pb-5')
            }
        })
    })
    let all_reply=document.querySelectorAll('.all_reply')
    all_reply.forEach((item)=>{
        item.addEventListener('click',function(){
            item.parentElement.classList.toggle('max-h-75')
            item.parentElement.classList.toggle('max-h-145')
        })
    })

    let more_comment_item=document.getElementById('more_comment_item')
    let more_comment_up_down=document.getElementById('more_comment_up_down')
    function more_comment(viwe){
        if(viwe=='up'){
            if(more_comment_item.classList.contains('h-1/2')){
                more_comment_item.classList.remove('h-1/2')
                more_comment_item.classList.add('h-full')
            }
        }
        if(viwe=='dowen'){
            if(more_comment_item.classList.contains('h-full')){
                more_comment_item.classList.add('h-1/2')
                more_comment_item.classList.remove('h-full')
            }else{
                more_comment_item.classList.remove('h-1/2')
                more_comment_item.classList.add('h-0')
            }
        }
    }
    function open_command(){
        more_comment_item.classList.remove('h-0')
        more_comment_item.classList.add('h-1/2')
    }
            {{--tasc mahdi--}}

//     amir.script
    const audio = document.getElementById("myAudio");
    const playBtn = document.getElementById("playBtn");
    const playIcon = document.getElementById("playIcon");
    const progress = document.getElementById("progress");
    const currentTimeEl = document.getElementById("currentTime");
    const durationEl = document.getElementById("duration");
    const volume = document.getElementById("volume");

    let isPlaying = false;

    // پخش/توقف
    function togglePlay() {
        if (isPlaying) {
            audio.pause();
        } else {
            audio.play();
        }
    }

    // آپدیت UI
    audio.addEventListener("play", () => {
        isPlaying = true;
        playIcon.textContent = "⏸️";
        playBtn.classList.add("bg-pink-600", "hover:bg-pink-700");
    });

    audio.addEventListener("pause", () => {
        isPlaying = false;
        playIcon.textContent = "▶️";
        playBtn.classList.remove("bg-pink-600", "hover:bg-pink-700");
        playBtn.classList.add("bg-purple-600", "hover:bg-purple-700");
    });

    // Progress bar
    audio.addEventListener("timeupdate", () => {
        const percent = (audio.currentTime / audio.duration) * 100;
        progress.style.width = percent + "%";

        currentTimeEl.textContent = formatTime(audio.currentTime);
    });

    audio.addEventListener("loadedmetadata", () => {
        durationEl.textContent = formatTime(audio.duration);
    });

    // تنظیم موقعیت
    function setPosition(event) {
        const rect = event.target.getBoundingClientRect();
        const pos = (event.clientX - rect.left) / rect.width;
        audio.currentTime = pos * audio.duration;
    }

    // صدا
    volume.addEventListener("input", () => {
        audio.volume = volume.value;
    });

    // فرمت زمان
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins.toString().padStart(2, "0")}:${secs
            .toString()
            .padStart(2, "0")}`;
    }

    function menu(meno) {
        meno.classList.toggle("h-20");
        meno.classList.toggle("py-5");
    }


</script>

</body>
</html>