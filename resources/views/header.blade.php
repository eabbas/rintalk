<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
        .profile-menu-container {
            position: relative;
        }

        #dropdownMenu {
            transform-origin: top right;
            animation: dropdownFade 0.2s ease-out;
        }

        @keyframes dropdownFade {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <header dir="rtl" class="bg-white backdrop-blur-md sticky top-0 z-30 shadow-lg shadow-indigo-900/5 border-b border-indigo-200/60">
        {{-- ... بقیه هدر برای حالت not logged in ... --}}
        <div class="px-5 lg:px-8 py-3 flex flex-wrap items-center justify-between gap-4">

            <!-- لوگو + برند -->
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-purple-500 via-[#c989da] to-purple-600  text-white p-2.5 rounded-2xl shadow-lg">
                    <i class="fas fa-brain text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-black tracking-tight bg-gradient-to-r from-purple-500 via-[#ce2eff] to-purple-500 bg-clip-text text-transparent">RinTalk</h1>
                    <p class="text-[11px] font-semibold text-gray-400">پلتفرم هوشمند آموزش زبان</p>
                </div>
            </div>

            <div class="flex-1 max-w-md hidden md:block">
                <div class="relative group">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-purple-500 transition-colors duration-200">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="جستجوی دوره، درس، لایتنر..."
                        class="w-full bg-white/80 border-2 border-indigo-100/70 rounded-2xl py-2.5 pr-10 pl-4 text-sm focus:outline-none focus:ring-2 focus:ring-purple-400/40 focus:border-purple-300 transition-all duration-200 shadow-sm hover:shadow-md placeholder:text-gray-400">
                </div>
            </div>
            @if(!Auth::check())
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2.5">
                    <botton onclick="loginPopup()" class="group relative px-4 py-2 rounded-full text-sm font-bold transition-all duration-200  bg-[#081830] hover:border-purple-400 text-[#081830] hover:text-[#f89820] shadow-sm hover:shadow-md overflow-hidden cursor-pointer">
                        <span class="relative z-10 flex items-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            <span class="relative right-2 px-6 py-2 rounded-full text-sm font-bold bg-white">ورود</span>
                        </span>
                    </botton>

                    <botton onclick="signupPopup()" class="flex flex-row items-center bg-[#081830] px-4 py-2 rounded-full text-sm font-bold transition-all duration-200 hover:border-purple-400 text-[#081830] hover:text-[#f89820]
                ] shadow-sm hover:shadow-md overflow-hidden cursor-pointer">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span class="relative right-2 px-6 py-2 rounded-full text-sm font-bold bg-white">ثبت نام</span>
                    </botton>
                </div>
                <div class="h-8 w-px bg-gradient-to-b from-transparent via-indigo-300 to-transparent hidden sm:block"></div>
                <div class="group relative hidden sm:flex items-center gap-2.5 bg-gradient-to-br from-purple-900/5 to-white border border-purple-200/80 rounded-2xl px-4 py-2 shadow-sm hover:shadow-md transition-all duration-200 cursor-pointer hover:border-purple-300">
                    <div class="bg-purple-100 rounded-xl p-1.5 text-purple-500 group-hover:bg-purple-200 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold text-gray-400">دستیار Rin</p>
                        <p class="text-sm font-bold text-[#f89820]  leading-5">پیشنهاد هوشمند</p>
                    </div>
                    <div class="absolute -bottom-1 -right-1 bg-[#f89820] rounded-full p-0.5 shadow-sm">
                        <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>
            @elseif(Auth::check())
            <!-- بخش ابزارهای هدر (نوتیف، پیام، پروفایل با منو) -->
            <div class="flex items-center gap-5">
                <!-- آیکون پیام‌ها -->
                <button class="relative text-gray-600 hover:text-indigo-600 transition">
                    <i class="fas fa-envelope text-xl"></i>
                    {{-- <svg class="size-5 fill-gray-700" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"></path></svg> --}}
                    <span class="absolute -top-1 -right-2 bg-rose-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۴</span>
                </button>

                <!-- آیکون نوتیفیکیشن + اعلان -->
                <button class="relative text-gray-600 hover:text-indigo-600 transition">
                    <i class="fas fa-bell text-xl"></i>
                    {{-- <svg class="size-6 fill-gray-700" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-bell" width="24" height="24" viewBox="0 0 24 24"><path d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21"></path></svg> --}}

                    <span class="absolute -top-1 -right-2 bg-amber-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۲</span>
                </button>

                <!-- منوی کاربری با عکس و کشویی ساده -->
                <!-- منوی کاربری با عکس و کشویی ساده -->
                <div class="relative profile-menu-container">
                    <div class="flex items-center gap-2 border-r border-gray-200 pr-4 cursor-pointer" id="profileButton">
                        <svg class="w-10 h-10 rounded-full shadow-md border-2 border-white fill-[#653daf]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-account-circle" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path>
                        </svg>
                        <div class="hidden lg:block text-right">
                           @if(Auth::user()->name && Auth::user()->family)
                           {{Auth::user()->name}}{{Auth::user()->family}}
                           @else
                           کاربرعادی
                           @endif
                        </div>
                        <svg class="size-5 text-gray-400 hidden lg:block transition-transform duration-200" id="chevronIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>

                    <!-- منوی کشویی - اصلاح موقعیت -->
                    <div id="dropdownMenu" class="hidden absolute mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50 
                left-0 right-auto 
                sm:left-auto sm:right-0">

                        <a href="" class="flex items-center gap-3 px-4 py-2 text-gray-700 text-sm hover:bg-blue-50 transition-colors duration-150">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>خانه</span>
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>

                        <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 text-sm hover:bg-blue-50 transition-colors duration-150">
                            <svg class="size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                <line x1="8" y1="21" x2="16" y2="21"></line>
                                <line x1="12" y1="17" x2="12" y2="21"></line>
                            </svg>
                            <span>داشبورد</span>
                        </a>

                        <div class="border-t border-gray-100 my-1"></div>

                        <a href="{{ route('user.profile') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 text-sm hover:bg-blue-50 transition-colors duration-150">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>پروفایل کاربری</span>
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>

                        <a href="{{ route('user.logout') }}" class="flex items-center gap-3 px-4 py-2 text-gray-700 text-sm hover:bg-blue-50 transition-colors duration-150">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>خروج از حساب کاربری</span>
                        </a>
                    </div>
                </div>


            </div>
        </div>
        @endif
        </div>
    </header>
    <script>
        // منوی کشویی پروفایل
        // منوی کشویی پروفایل
        const profileButton = document.getElementById('profileButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const chevronIcon = document.getElementById('chevronIcon');

        // باز و بسته کردن منو
        profileButton.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');

            // تنظیم موقعیت منو بر اساس فضای موجود
            if (!dropdownMenu.classList.contains('hidden')) {
                const rect = profileButton.getBoundingClientRect();
                const menuRect = dropdownMenu.getBoundingClientRect();
                const viewportWidth = window.innerWidth;

                // اگر منو از راست صفحه خارج می‌شود
                if (rect.right + menuRect.width > viewportWidth) {
                    dropdownMenu.style.left = 'auto';
                    dropdownMenu.style.right = '0';
                } else {
                    dropdownMenu.style.left = '0';
                    dropdownMenu.style.right = 'auto';
                }

                // چرخش آیکون chevron
                if (chevronIcon) {
                    chevronIcon.style.transform = 'rotate(180deg)';
                }
            } else {
                if (chevronIcon) {
                    chevronIcon.style.transform = 'rotate(0deg)';
                }
            }
        });

        // بستن منو با کلیک بیرون
        document.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
                if (chevronIcon) {
                    chevronIcon.style.transform = 'rotate(0deg)';
                }
            }
        });

        // جلوگیری از بسته شدن منو هنگام کلیک روی خود منو
        dropdownMenu.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        // تایید خروج
        const logoutForm = document.getElementById('logoutForm');
        if (logoutForm) {
            logoutForm.addEventListener('submit', (e) => {
                if (!confirm('آیا از خروج از حساب کاربری خود مطمئن هستید؟')) {
                    e.preventDefault();
                }
            });
        }
    </script>
</body>

</html>