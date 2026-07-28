<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('assets/js/tailwind.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <title>Document</title>
    <style>
        @import url({{asset('assets/css/fontiran.css')}});
        *{
            font-family:IRANSansXFaNum;
        }
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

    <header dir="rtl" class="py-3">
        <div class="w-11/12 m-auto flex items-center justify-between">
            <div class="flex flex-col gap-1.5 lg:hidden">
                <div class="w-8 h-[2px] bg-black"></div>
                <div class="w-8 h-[2px] bg-black"></div>
                <div class="w-8 h-[2px] bg-black"></div>
            </div>
            <div class=" gap-3 flex items-center justify-center lg:justify-start">
                <div class="bg-gradient-to-br from-purple-500 via-[#c989da] to-purple-600  text-white p-2.5 rounded-2xl shadow-lg">
                    <i class="fas fa-brain text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-black tracking-tight bg-gradient-to-r from-purple-500 via-[#ce2eff] to-purple-500 bg-clip-text text-transparent">RinTalk</h1>
                    <p class="text-[11px] font-semibold text-gray-400">پلتفرم هوشمند آموزش زبان</p>
                </div>
            </div>
            <div class="w-4/12 lg:flex items-center justify-between hidden">
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold">خانه</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold"> تعیین سطح </span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold">هم بحثی</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold">دوره</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold"> درباره ما</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
                <div class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold">تماس با ما</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </div>
            </div>
            <div class="flex items-center justify-end gap-2 lg:gap-5">

                @if(!Auth::check())
                    <div class=" bg-[#06173d] flex p-3  rounded-3xl items-center justify-between lg:gap-3 group cursor-pointer">
                        <span class="text-white text-nowrap lg:text-[1.1rem] text-[.6rem] md:text-[.75rem] group-hover:text-[#ff9a1e] transtion-all duration-300">ورود / ثبت نام </span>
                    </div>
                @endif
                @if(Auth::check())
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="lg:size-4 size-3.5">
                            <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/>
                        </svg>
                    </div>
                    <button class="relative text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-envelope text-xl"></i>
                        {{-- <svg class="size-5 fill-gray-700" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"></path></svg> --}}
                        <span class="absolute -top-1 -right-2 bg-rose-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۴</span>
                    </button>
                    
                    <button class="relative text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-bell text-xl"></i>
                        {{-- <svg class="size-6 fill-gray-700" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-bell" width="24" height="24" viewBox="0 0 24 24"><path d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21"></path></svg> --}}

                        <span class="absolute -top-1 -right-2 bg-amber-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۲</span>
                    </button>
                    
                    <div class="relative profile-menu-container">
                        <div class="flex items-center gap-2 border-r border-gray-200 pr-2 cursor-pointer" id="profileButton">
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
                @endif
            </div>
        </div>
            <div class="fixed top-0 w-full h-dvh bg-black/50 blur-[10px] opacity-0 invisible transtion-all duration-300" id="blackpage" onclick="menu('close')"></div>
                        

            <div id="sidebar" class="fixed top-0 h-dvh w-6/12 bg-[#6c35c2] translate-x-full transtion-all duration-300">

                <!-- پروفایل کاربر -->
                <div class="px-5 py-5 flex items-center gap-3 border-b border-gray-50">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 via-[#bf47dd] to-purple-700 flex items-center justify-center text-white font-bold text-lg shadow">آ</div>
                        <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                    <div>
                        @php $user = Auth::user(); @endphp
                        @if($user && ($user->name || $user->family))
                        <p class="font-semibold text-gray-800 "><span>{{$user->name ?? ""}}</span><span>{{$user->family ?? ""}}</span></p>
                        @else
                        <p class="font-semibold text-gray-800">کاربر عادی</p>
                        @endif
                        <p class="text-xs text-gray-500">⭐⭐⭐ سطح فوق پیشرفته (C2)</p>
                    </div>
                </div>
                <!-- منوی اصلی با دراپ‌داون -->
                <nav class="flex-1 px-4 py-6 space-y-1.5">
                    <div class="px-4 py-2">خانه</div>
                    <div class="px-4 py-2">تعیین سطح</div>
                    <div class="px-4 py-2">هم بحثی</div>
                    @if(!Auth::check())
                        <div class="flex items-center gap-3 ">
                            <div class="flex flex-col items-center gap-2.5">
                                <a href="{{route('login')}}" class="group relative px-4 py-2 rounded-full text-sm font-bold transition-all duration-200  bg-[#081830] hover:border-purple-400 text-[#081830] hover:text-[#f89820] shadow-sm hover:shadow-md overflow-hidden cursor-pointer">
                                    <span class="relative z-10 flex items-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="relative right-2 px-6 py-2 rounded-full text-sm font-bold bg-white">ورود</span>
                                    </span>
                                </a>

                                <a href="{{route('signup')}}" class="flex flex-row items-center bg-[#081830] px-4 py-2 rounded-full text-sm font-bold transition-all duration-200 hover:border-purple-400 text-[#081830] hover:text-[#f89820]
                                        ] shadow-sm hover:shadow-md overflow-hidden cursor-pointer">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    <span class="relative right-2 px-6 py-2 rounded-full text-sm font-bold bg-white">ثبت نام</span>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📚</span>
                                <span>دوره‌ها</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            @can('panelCan' , ['admin'])
                            <li><a href="{{route('course.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد دروه</a></li>
                            @endcan
                            <li><a href="{{route('course.courses')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه دوره ها</a></li>
                            @can('panelCan' , ['admin'])
                            <li><a href="{{route('books.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">افزودن کتاب</a></li>
                            <li><a href="{{route('books.index')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست کتاب ها</a></li>
                            <li><a href="{{route('courseMedia.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجادمدیا</a></li>
                            <li><a href="{{route('courseMedia.index')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه مدیا ها</a></li>
                            @endcan

                            <!-- <li><a href="$" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مدیریت نظرات</a></li> -->
                            {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">آزمون آیلتس</a></li> --}}
                            {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مکالمه روزمره</a></li> --}}
                            <!-- <li><a href="{{ route('lesson.create') }}" class="block px-4 py-2 text-sm hover:bg-gray-50 rounded-lg">ایجاد درس</a></li> -->

                        </ul>
                    </div>

                    <!-- ========== منوی فصل‌ها با دراپ‌داون ========== -->
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">🎯</span>
                                <span>فصل‌ها</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <!-- <li><a href="{{ url('chapter/create') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> ایجاد فصل </a></li> -->
                            <li><a href="{{ url('chapter/index') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> لیست فصل </a></li>
                            <li><a href="{{ url('chapterComment/index') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> کامنت ها</a></li>
                        </ul>
                    </div>
                    @endcan
                    <!-- ========== منوی درس‌ها با دراپ‌داون ========== -->
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📖</span>
                                <span>درس‌ها</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{ route('lesson.create') }}" class="block px-4 py-2 text-sm hover:bg-gray-50 rounded-lg">ایجاد درس</a></li>
                            <li><a href="{{ route('lesson.lessons') }}" class="block px-4 py-2 text-sm hover:bg-gray-50 rounded-lg">لیست دروس</a></li>
                            <!-- <li><a href="{{ route('LessonAttachment.createLessonAttachment') }}" class="block px-4 py-2 text-sm font-bold hover:bg-gray-50 rounded-lg">ایجاد پیوست</a></li>
                            <li><a href="{{ route('LessonAttachment.LessonAttachments') }}" class="block px-4 py-2 text-sm font-bold hover:bg-gray-50 rounded-lg">لیست پیوست</a></li>
                            <li><a href="{{ route('LessonMedia.createLessonMedia') }}" class="block px-4 py-2 text-sm font-bold hover:bg-gray-50 rounded-lg">ایجاد مدیا</a></li>
                            <li><a href="{{ route('LessonMedia.LessonMedias') }}" class="block px-4 py-2 text-sm font-bold hover:bg-gray-50 rounded-lg">لیست مدیا</a></li> -->
                        </ul>
                    </div>
                    @endcan
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">🏷️</span>
                                <span>دسته‌بندی</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{ route('category.create') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد دسته بندی</a></li>
                            <li><a href="{{ route('category.list') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست دسته بندی ها</a></li>
                        </ul>
                    </div>
                    @endcan

                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">👤</span>
                                <span>ثبت نام دانش آموز</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{ route('Student.signup') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> فرم ثبت نام</a></li>
                        </ul>
                    </div>

                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📔</span>
                                <span>متن کتاب</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{route('Text.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">افزودن متن</a></li>
                            <li><a href="{{route('Text.texts')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست متن</a></li>
                        </ul>
                    </div>
                    @endcan
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📝</span>
                                <span>لایتنر من</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{route('leitnary.userLeitnary')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> لایتنر</a></li>
                            <!-- <li><a href="{{route('Text.texts')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست متن</a></li> -->
                        </ul>
                    </div>
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📫</span>
                                <span>درخواست های من</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{route('course.requestList')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg"> درخواست ها</a></li>
                            <!-- <li><a href="{{route('Text.texts')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست متن</a></li> -->
                        </ul>
                    </div>
                    @endcan
                    <!-- سایر لینک‌های ساده -->
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">👨‍👩‍👧‍👧</span>
                                <span>کاربران</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{ route('user.list') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست کاربران</a></li>
                            <!-- در صورت نیاز به آیتم‌های بیشتر، اینجا اضافه کنید -->
                            <li><a href="{{ route('user.create_user') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد کاربر</a></li>
                        </ul>
                    </div>
                    @endcan
                    <!-- <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                        <span class="w-5 text-center">⚙️</span>
                        <span>تنظیمات</span>
                    </a> -->
                </nav>
            </div>
    </header>
    <script>
        let blackpage=document.getElementById('blackpage')
        let sidebar=document.getElementById('sidebar')
        function menu(dor){
            if(dor=='open'){
                blackpage.classList.remove('invisible')
                blackpage.classList.remove('opacity-0')
                sidebar.classList.remove('translate-x-full')
                sidebar.classList.add('translate-x-0')
            }
            if(dor=="close"){
                blackpage.classList.add('invisible')
                blackpage.classList.add('opacity-0')
                sidebar.classList.remove('translate-x-0')
                sidebar.classList.add('translate-x-full')
            }
        }
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
        const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

            dropdownTriggers.forEach(trigger => {
                trigger.addEventListener('click', function(e) {
                    e.preventDefault();
                    // بستن سایر دراپ‌داون‌ها (اختیاری)
                    // این کار باعث می‌شود فقط یکی باز بماند. برای تجربه بهتر می‌توانید آن را فعال کنید.
                    // اما بنا بر نیاز کاربر، معمولاً بهتر است همزمان چند تا باز باشند. ما هر کدام را مستقل می‌کنیم.

                    const parentItem = this.closest('.dropdown-item');
                    const menu = parentItem.querySelector('.dropdown-menu');
                    const chevron = this.querySelector('.chevron');

                    if (menu.classList.contains('hidden')) {
                        menu.classList.remove('hidden');
                        chevron.classList.add('rotate-180');
                    } else {
                        menu.classList.add('hidden');
                        chevron.classList.remove('rotate-180');
                    }
                });
            });

    </script>
