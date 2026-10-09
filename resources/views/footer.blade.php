{{-- bottom menu mobile --}}
<style>
    #install-prompt{
        display: none !important;
    }
</style>
<footer class="w-full flex justify-center rounded-t-4xl bg-white fixed bottom-0 left-0 pt-2 pb-2 z-999" style="box-shadow: 0px 0px 10px 1px var(--secondary-text-color);"><!-- lg:w-[calc(100%-265px)] -->
    <div class="w-11/12 flex justify-between items-center">
        <a href="{{{ route('home') }}}" class="w-1/7 flex flex-col items-center gap-2" id="homeIcon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5" fill="none" stroke="@if(Route::is('home')) #2f1d6a @else black @endif" stroke-width="32" stroke-linecap="round" stroke-linejoin="round">
                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
            </svg>
            <span class="text-xs @if(Route::is('home')) text-[#2f1d6a] @else text-(--secondary-text-color) @endif">خانه</span>
        </a>
        <a href="{{route('course.listcourseuser')}}" class="w-1/7 flex flex-col items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-6.5 @if(Route::is('course.listcourseuser')) fill-[#2f1d6a] @else fill-black @endif">
                <path d="M320 80c2.5 0 5 .4 7.4 1.3l218 78.7-218 78.7c-2.4 .9-4.9 1.3-7.4 1.3s-5-.4-7.4-1.3L184.9 192.6l140.8-52.8c8.3-3.1 12.5-12.3 9.4-20.6s-12.3-12.5-20.6-9.4L154.9 169.6c-5.2 2-10.3 4.2-15.3 6.6L94.7 160l218-78.7c2.4-.9 4.9-1.3 7.4-1.3zM15.8 182.6l77.4 27.9c-27.2 28.7-43.7 66.7-45.1 107.7c-.1 .6-.1 1.2-.1 1.8c0 28.4-10.8 57.8-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7c-3.2-14-7.5-28.3-13.4-41.5c1.9-37 19.2-70.9 46.7-94.2l169.5 61.2c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32s-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6zm480.8 80l-46.5 16.8 12.7 120.5c-4.8 3.5-12.8 8-24.6 12.6C410 423.6 368 432 320 432s-90-8.4-118.3-19.4c-11.8-4.6-19.8-9.2-24.6-12.6l12.7-120.5-46.5-16.8L128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6zM467.4 396a.7 .7 0 1 0 -1.2-.7 .7 .7 0 1 0 1.2 .7zm-294.8 0a.7 .7 0 1 0 1.2-.6 .7 .7 0 1 0 -1.2 .6z"/>
            </svg>
            <span class="text-xs text-nowrap @if(Route::is('course.listcourseuser')) text-[#2f1d6a] @else text-black @endif">دوره ها</span>
        </a>
        <div class="w-1/7 flex flex-col items-center mb-3 cursor-pointer relative" onclick="scanQr('open')">
            <a href="{{route('leitnary.userLeitnary')}}" class=" bg-white flex flex-col gap-2 justify-center items-center rounded-full absolute -bottom-5" id="qrIcon">
                <div class="size-12 bg-[#2f1d6a] rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="size-6.5 fill-white">
                        <g>
                            <path d="M3.179 5.998a1.005 1.005 0 0 0-1.408.132L.494 7.669a1.004 1.004 0 0 0 .131 1.407l7.888 6.542-3.807-8.354-1.527-1.266zm3.834-3.315l-1.82.829a1.005 1.005 0 0 0-.495 1.324l4.25 9.325.213-9.179-.822-1.804c-.23-.5-.826-.723-1.326-.495zm7.198.204a1.003 1.003 0 0 0-.976-1.023l-2-.046a1.003 1.003 0 0 0-1.022.976l-.239 10.243 4.19-8.167.047-1.983zm4.98.95l-1.779-.913a1.005 1.005 0 0 0-1.347.434L9.674 15.814a1.004 1.004 0 0 0 .434 1.347l1.779.913a1.003 1.003 0 0 0 1.346-.433l6.391-12.456a1.005 1.005 0 0 0-.433-1.348zm-6.392 12.456a1 1 0 1 1-1.78-.911 1 1 0 0 1 1.78.911z"></path>
                        </g>
                    </svg>

                </div>
                <span class="text-xs @if(Route::is('leitnary.userLeitnary')) text-[#2f1d6a] @else text-black @endif">لایتنر</span>
            </a>
        </div>
        <div class="w-1/7 flex flex-col items-center gap-1 cursor-pointer relative"  id="orderLink">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-6.5">
                <path d="M128 128a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM269.7 336c80 0 145 64.3 146.3 144H32c1.2-79.7 66.2-144 146.3-144h91.4zM224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3zm431 208c17 0 30.7-13.8 30.7-30.7C640 392.2 567.8 320 478.7 320H417.3c-4.4 0-8.8 .2-13.2 .5c11.3 9.4 21.6 19.9 30.7 31.5h43.9c71 0 128.6 57.2 129.3 128H480c0 .8 0 1.5 0 2.3c0 10.8-2.8 20.9-7.6 29.7H609.3zM432 256c61.9 0 112-50.1 112-112s-50.1-112-112-112c-24.8 0-47.7 8.1-66.3 21.7c5.2 9.8 9.3 20.3 12.4 31.2C392.3 71.9 411.2 64 432 64c44.2 0 80 35.8 80 80s-35.8 80-80 80c-25.2 0-47.6-11.6-62.3-29.8c-4.7 10.3-10.4 19.9-17 28.9C373 243.4 401 256 432 256z"/>
            </svg>
            <span class="text-xs text-(--secondary-text-color)">هم بحثی</span>

        </div>
        <div class="w-1/7 flex flex-col items-center gap-1 cursor-pointer" id="userIcon">
            @if(Auth::check())
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"
                     fill="">
                    <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                </svg>
            @else
                <a href="{{ route('login') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4"
                         fill="">
                        <path d="M320 128a96 96 0 1 0 -192 0 96 96 0 1 0 192 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM32 480H416c-1.2-79.7-66.2-144-146.3-144H178.3c-80 0-145 64.3-146.3 144zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                    </svg>
                </a>
            @endif
            <div>
                <span class="">پروفایل</span>
            </div>
            {{--                pop_up_profle_start--}}
            @if(Auth::check())
                <div class="relative ">

                    <div class="w-50 bg-white border-black shadow-[15px_0px_30px_#bab2b29e] fixed bottom-25 left-1/30 px-3 flex flex-col gap-2 rounded-lg  overflow-hidden max-h-0 transition-all duration-400  z-10"
                         id="pup_up_profile">
                        <div class="w-8 h-8 bg-[#fc8e21] rounded-full absolute -top-4 -right-3 flex justify-center items-center z-100"
                             onclick="pup_up_profil('close')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-4 "
                                 fill="#fff">
                                <path d="M345 137l17-17L328 86.1l-17 17-119 119L73 103l-17-17L22.1 120l17 17 119 119L39 375l-17 17L56 425.9l17-17 119-119L311 409l17 17L361.9 392l-17-17-119-119L345 137z"/>
                            </svg>
                        </div>
                        <div class="w-full flex gap-5 justify-start items-center px-4" onclick="account_user()">

                            @if(Auth::user()->name && Auth::user()->family)
                                <h2 class=" font-bold text-nowrap">{{Auth::user()->name}} {{Auth::user()->family}}</h2>

                            @else
                                <h2 class=" font-bold">نام من</h2>
                            @endif

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="transition-all duration-400 rotate-180"
                                 id="account_user_sample">
                                <polyline points="18 15 12 9 6 15"></polyline>
                            </svg>
                        </div>
                        <a href=""
                           class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 512 512">
                                <path d="M256 0c17 0 33.6 1.7 49.8 4.8c7.9 1.5 21.8 6.1 29.4 20.1c2 3.7 3.6 7.6 4.6 11.8l9.3 38.5C350.5 81 360.3 86.7 366 85l38-11.2c4-1.2 8.1-1.8 12.2-1.9c16.1-.5 27 9.4 32.3 15.4c22.1 25.1 39.1 54.6 49.9 86.3c2.6 7.6 5.6 21.8-2.7 35.4c-2.2 3.6-4.9 7-8 10L459 246.3c-4.2 4-4.2 15.5 0 19.5l28.7 27.3c3.1 3 5.8 6.4 8 10c8.2 13.6 5.2 27.8 2.7 35.4c-10.8 31.7-27.8 61.1-49.9 86.3c-5.3 6-16.3 15.9-32.3 15.4c-4.1-.1-8.2-.8-12.2-1.9L366 427c-5.7-1.7-15.5 4-16.9 9.8l-9.3 38.5c-1 4.2-2.6 8.2-4.6 11.8c-7.7 14-21.6 18.5-29.4 20.1C289.6 510.3 273 512 256 512s-33.6-1.7-49.8-4.8c-7.9-1.5-21.8-6.1-29.4-20.1c-2-3.7-3.6-7.6-4.6-11.8l-9.3-38.5c-1.4-5.8-11.2-11.5-16.9-9.8l-38 11.2c-4 1.2-8.1 1.8-12.2 1.9c-16.1 .5-27-9.4-32.3-15.4c-22-25.1-39.1-54.6-49.9-86.3c-2.6-7.6-5.6-21.8 2.7-35.4c2.2-3.6 4.9-7 8-10L53 265.7c4.2-4 4.2-15.5 0-19.5L24.2 218.9c-3.1-3-5.8-6.4-8-10C8 195.3 11 181.1 13.6 173.6c10.8-31.7 27.8-61.1 49.9-86.3c5.3-6 16.3-15.9 32.3-15.4c4.1 .1 8.2 .8 12.2 1.9L146 85c5.7 1.7 15.5-4 16.9-9.8l9.3-38.5c1-4.2 2.6-8.2 4.6-11.8c7.7-14 21.6-18.5 29.4-20.1C222.4 1.7 239 0 256 0zM218.1 51.4l-8.5 35.1c-7.8 32.3-45.3 53.9-77.2 44.6L97.9 120.9c-16.5 19.3-29.5 41.7-38 65.7l26.2 24.9c24 22.8 24 66.2 0 89L59.9 325.4c8.5 24 21.5 46.4 38 65.7l34.6-10.2c31.8-9.4 69.4 12.3 77.2 44.6l8.5 35.1c24.6 4.5 51.3 4.5 75.9 0l8.5-35.1c7.8-32.3 45.3-53.9 77.2-44.6l34.6 10.2c16.5-19.3 29.5-41.7 38-65.7l-26.2-24.9c-24-22.8-24-66.2 0-89l26.2-24.9c-8.5-24-21.5-46.4-38-65.7l-34.6 10.2c-31.8 9.4-69.4-12.3-77.2-44.6l-8.5-35.1c-24.6-4.5-51.3-4.5-75.9 0zM208 256a48 48 0 1 0 96 0 48 48 0 1 0 -96 0zm48 96a96 96 0 1 1 0-192 96 96 0 1 1 0 192z"></path>
                            </svg>
                            <span class="text-sm text-[#5b5c75]">داشبورد</span>
                        </a>
                        <a href="{{ route('user.profile') }}"
                           class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4">
                                <!--! Font Awesome Pro 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
                            </svg>
                            <span class="text-sm text-[#5b5c75]">حساب کاربری</span>
                        </a>
                        <a href="{{ route('user.logout') }}"
                           class="w-full rounded-lg cursor-pointer px-4 py-2 hover:bg-[#F9FAFC] flex gap-5 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 20 20" id="entypo-log-out" class="w-4" fill="#fc8e21">
                                <g>
                                    <path d="M19 10l-6-5v3H6v4h7v3l6-5zM3 3h8V1H3c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H3V3z"></path>
                                </g>
                            </svg>
                            <span class="text-sm text-[#fc8e21]">خروج</span>
                        </a>

                    </div>
                </div>
            @endif
            {{--                pop_up_profle_end--}}


        </div>
    </div>
</footer>

<div class="fixed bg-black/50 w-full h-full top-0 right-0 flex justify-center items-center invisible opacity-0 transition-all duration-300 z-50"
     id="popupQr">
    <div class="w-9/12 h-1/2 rounded-sm flex justify-center items-center p-5 transition-all duration-300 scale-95 relative">
        <!--loading scan-->
        <div class="absolute w-full h-full bg-white flex flex-row items-center justify-center invisible opacity-0 rounded-md"
             id="loading"></div>
        <!--loading scan  end-->
        <div class="p-3 rounded-full bg-white absolute top-1 right-1 z-50 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" onclick="scanQr('close')" viewBox="0 0 384 512">
                <path fill="red"
                      d="M345 137c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-119 119L73 103c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l119 119L39 375c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l119-119L311 409c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-119-119L345 137z"/>
            </svg>
        </div>
        <div id="reader"></div>
    </div>
</div>
<style>
    #reader {
        width: 100%;
        height: 100%;
    }

    #reader > video {
        width: 100%;
        height: 100%;
    }

    .underLineBorder::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 3px;
        border-radius: 9999px;
        background-color: #eb3254;
    }
</style>


<script>
    let pup_up_profile= document.getElementById('pup_up_profile')
    // let close_pup_up_profile_all_viwe=document.getElementById('close_pup_up_profile_all_viwe')
    function pup_up_profil(viwe){
        if(viwe =='open'){
            pup_up_profile.classList.toggle('max-h-0')
            // pup_up_profile.classList.toggle('h-50')
            pup_up_profile.classList.toggle('overflow-hidden')
            // pup_up_profile.classList.toggle('invisible')
            // pup_up_profile.classList.toggle('opacity-0')
            pup_up_profile.classList.toggle('py-4')
            // close_pup_up_profile_all_viwe.classList.remove('invisible')
            // close_pup_up_profile_all_viwe.classList.remove('opacity-0')
        }
        if(viwe =='close'){

            pup_up_profile.classList.add('max-h-0')
            pup_up_profile.classList.add('overflow-hidden')
            // pup_up_profile.classList.add('invisible')
            // pup_up_profile.classList.add('opacity-0')
            pup_up_profile.classList.remove('py-4')
            // close_pup_up_profile_all_viwe.classList.add('invisible')
            // close_pup_up_profile_all_viwe.classList.add('opacity-0')
        }
    }
    //users
    let account_user_items= document.getElementById('account_user_items')
    let account_user_sample= document.getElementById('account_user_sample')
    function account_user(){
        account_user_items.classList.toggle('max-h-0')
        account_user_items.classList.toggle('py-1')
        account_user_sample.classList.toggle('rotate-180')
    }
    //users

</script>
{{--                --}}{{--                      pup_up_user_profile_end--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if (Auth::check())--}}
{{--        <div class="w-full h-[calc(100vh-300px)] fixed z-40 right-0 border-t-1 border-x-1 border-gray-300 transition-all duration-200 -bottom-full bg-white rounded-t-xl"--}}
{{--            id="popupUser">--}}
{{--            <div class="w-full relative">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3 size-3 cursor-pointer"--}}
{{--                    onclick="openUserOptions('close')" viewBox="0 0 448 512">--}}
{{--                    <path--}}
{{--                        d="M41 39C31.6 29.7 16.4 29.7 7 39S-2.3 63.6 7 73l183 183L7 439c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l183-183L407 473c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-183-183L441 73c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-183 183L41 39z" />--}}
{{--                </svg>--}}
{{--                <h3 class="text-center py-4 font-bold bg-gray-200 rounded-t-[11px] border-b border-gray-300">--}}
{{--                    {{ Auth::user()->name }} {{ Auth::user()->family }}</h3>--}}
{{--                <ul class="flex flex-col px-3">--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.profile') }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">پروفایل من</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.edit', [Auth::user()]) }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">--}}
{{--                            ویرایش پروفایل--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('aboutUs.clientList') }}"--}}
{{--                            class="block py-3 border-b border-gray-300 text-sm font-bold">درباره فامنو</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('contactUs.create') }}" class="block py-3 text-sm font-bold">ارتباط با--}}
{{--                            ما</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('user.logout') }}"--}}
{{--                            class="block py-3  text-sm font-bold bg-[#eb3254]/30 text-center text-red-500 rounded-sm">خروج--}}
{{--                            از حساب کاربری</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{-- bottom menu mobile end --}}
{{-- <footer class="hidden lg:block lg:w-full mx-auto">
    <div class="w-full bg-gray-600 flex flex-col gap-1 pt-1 justify-center items-center rounded-t-sm">
        <span class="text-white">آکادمی فائوس</span>
        <a href="tel:+989147794595" class="text-gray-100">09147794595</a>
    </div>
</footer> --}}


<script>
    let qrIcon = document.getElementById('qrIcon')
    let homeIcon = document.getElementById('homeIcon')
    let userIcon = document.getElementById('userIcon')
    let loading = document.getElementById('loading')
    let popupQr = document.getElementById('popupQr')

    function scanQr(state) {
        const html5QrCode = new Html5Qrcode("reader")

        if (state == 'open') {
            qrIcon.children[0].classList.remove('fill-black')
            qrIcon.children[0].classList.add('fill-white')
            qrIcon.classList.add('bg-[#eb3254]')
            popupQr.classList.remove('invisible')
            popupQr.classList.remove('opacity-0')
            popupQr.children[0].classList.remove('scale-95')
            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                html5QrCode.stop()
                loading.classList.remove('invisible')
                loading.classList.remove('opacity-0')
                loading.innerHTML = `
                    <div class="loading-wave">
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                        <div class="loading-bar"></div>
                    </div>
                    `
                window.location.assign(decodedText)
                // window.location.assign("https://" + decodedText)
            }
            const config = {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            };
            console.log(html5QrCode)
            console.log(html5QrCode.elementId)
            html5QrCode.start({
                facingMode: "environment"
            }, config, qrCodeSuccessCallback)
        }
        if (state == 'close') {
            popupQr.classList.add('invisible')
            popupQr.classList.add('opacity-0')
            popupQr.children[0].classList.add('scale-95')
            html5QrCode.stop()
        }

    }



</script>
<script src="{{ asset('assets/js/home.js') }}"></script>
{{-- @if(Route::is('client.menu'))
    @include('newMenuJs')
@endif --}}
{{--    <script src="{{ asset('assets/js/userPanel.js') }}"></script>--}}
@RegisterServiceWorkerScript
</body>

</html>