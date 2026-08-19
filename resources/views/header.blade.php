<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('assets/tailwind.js')}}"></script>
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <!-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> -->
    <title>@yield('title')</title>
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
            <div class="flex flex-col gap-1.5 lg:hidden" onclick="menu('open')">
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
                <a href="{{route('home')}}" class="flex flex-col items-center group gap-1 cursor-pointer">
                    <span class="group-hover:text-[#ff9a1e] transtion-all duration-300 font-bold">خانه</span>
                    <div class="w-0 group-hover:w-16/12 bg-[#ff9a1e] h-[2px] transtion-all duration-300"></div>
                </a>
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
                    <a href="{{route('login')}}" class=" bg-[#06173d] flex p-3  rounded-3xl items-center justify-between lg:gap-3 group cursor-pointer">
                        <span class="text-white text-nowrap lg:text-[1.1rem] text-[.6rem] md:text-[.75rem] group-hover:text-[#ff9a1e] transtion-all duration-300">ورود / ثبت نام </span>
                    </a>
                @endif
                @if(Auth::check())
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="lg:size-4 size-3.5">
                            <path d="M368 208A160 160 0 1 0 48 208a160 160 0 1 0 320 0zM337.1 371.1C301.7 399.2 256.8 416 208 416C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208c0 48.8-16.8 93.7-44.9 129.1L505 471c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L337.1 371.1z"/>
                        </svg>
                    </div>
                    <button class="relative text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-envelope text-xl"></i>
                        <svg class="size-5 fill-gray-700" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z"></path></svg>
                        <span class="absolute -top-1 -right-2 bg-rose-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۴</span>
                    </button>
                    
                    <button class="relative text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-bell text-xl"></i>
                         <svg class="size-6 fill-gray-700" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-bell" width="24" height="24" viewBox="0 0 24 24"><path d="M21,19V20H3V19L5,17V11C5,7.9 7.03,5.17 10,4.29C10,4.19 10,4.1 10,4A2,2 0 0,1 12,2A2,2 0 0,1 14,4C14,4.1 14,4.19 14,4.29C16.97,5.17 19,7.9 19,11V17L21,19M14,21A2,2 0 0,1 12,23A2,2 0 0,1 10,21"></path></svg>
                        <span class="absolute -top-1 -right-2 bg-amber-500 text-white text-[9px] font-bold rounded-full px-1.5 py-0">۲</span>
                    </button>
                    
                    <div class="relative profile-menu-container">
                        <div class="flex items-center gap-2 border-r border-gray-200 pr-2 cursor-pointer" id="profileButton">
                            <svg class="w-10 h-10 rounded-full shadow-md border-2 border-white fill-[#653daf]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="mdi-account-circle" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M12,19.2C9.5,19.2 7.29,17.92 6,16C6.03,14 10,12.9 12,12.9C14,12.9 17.97,14 18,16C16.71,17.92 14.5,19.2 12,19.2M12,5A3,3 0 0,1 15,8A3,3 0 0,1 12,11A3,3 0 0,1 9,8A3,3 0 0,1 12,5M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z"></path>
                            </svg>
                            <div class="hidden lg:flex text-right gap-1">
                            @if(Auth::user()->name && Auth::user()->family)
                            <span>
                            {{Auth::user()->name}} 
                            </span>
                            <span>
                                {{Auth::user()->family}}
                            </span>
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

                            <a href="{{route('home')}}" class="flex items-center gap-3 px-4 py-2 text-gray-700 text-sm hover:bg-blue-50 transition-colors duration-150 cursor-pointer">
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
            <div class="fixed top-0 right-0 w-full h-dvh bg-black/50 blur-[10px] opacity-0 invisible transtion-all duration-300 z-1 lg:hidden" id="blackpage" onclick="menu('close')"></div>
                        

            <div id="sidebar" class="fixed top-0 h-dvh w-3/4 bg-white translate-x-full transtion-all duration-300 z-2 overflow-auto lg:hidden">

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
                    <div class="flex flex-col gap-2">
                        <div>
                            <a href="{{route('home')}}" class="px-4 py-2 hover:text-[#ff9a1e] cursor-pointer transition-all duration-300">خانه</a>
                        </div>
                        <div>
                            <a href=""  class="px-4 py-2 hover:text-[#ff9a1e] cursor-pointer transition-all duration-300">تعیین سطح</a>
                        </div>
                        <div>
                            <a href="{{route('course.listcourseuser')}}" class="px-4 py-2 hover:text-[#ff9a1e] cursor-pointer transition-all duration-300">هم بحثی</a>
                        </div>
                    </div>
                    @if(!Auth::check())
                    @else
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="w-5 text-center">📚</span>
                                <span>دوره‌ها</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                            <li><a href="{{route('course.courses')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه دوره ها</a></li>
                            @can('panelCan' , ['admin'])
                            <li><a href="{{route('course.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد دروه</a></li>
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
                    @can('panelCan' , ['admin'])
                    <div class="dropdown-item">
                        <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                            <div class="flex items-center gap-3">
                                <svg version="1.1" class="can-badge can-alert has-solid size-5" viewBox="0 0 36 36" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" focusable="false" role="img">
                                    <path class="clr-i-outline clr-i-outline-path-1" d="M18.1,11c-3.9,0-7,3.1-7,7s3.1,7,7,7c3.9,0,7-3.1,7-7S22,11,18.1,11z M18.1,23c-2.8,0-5-2.2-5-5s2.2-5,5-5c2.8,0,5,2.2,5,5S20.9,23,18.1,23z"></path>
                                    <path class="clr-i-outline clr-i-outline-path-2" d="M32.8,14.7L30,13.8l-0.6-1.5l1.4-2.6c0.3-0.6,0.2-1.4-0.3-1.9l-2.4-2.4c-0.5-0.5-1.3-0.6-1.9-0.3l-2.6,1.4l-1.5-0.6l-0.9-2.8C21,2.5,20.4,2,19.7,2h-3.4c-0.7,0-1.3,0.5-1.4,1.2L14,6c-0.6,0.1-1.1,0.3-1.6,0.6L9.8,5.2C9.2,4.9,8.4,5,7.9,5.5L5.5,7.9C5,8.4,4.9,9.2,5.2,9.8l1.3,2.5c-0.2,0.5-0.4,1.1-0.6,1.6l-2.8,0.9C2.5,15,2,15.6,2,16.3v3.4c0,0.7,0.5,1.3,1.2,1.5L6,22.1l0.6,1.5l-1.4,2.6c-0.3,0.6-0.2,1.4,0.3,1.9l2.4,2.4c0.5,0.5,1.3,0.6,1.9,0.3l2.6-1.4l1.5,0.6l0.9,2.9c0.2,0.6,0.8,1.1,1.5,1.1h3.4c0.7,0,1.3-0.5,1.5-1.1l0.9-2.9l1.5-0.6l2.6,1.4c0.6,0.3,1.4,0.2,1.9-0.3l2.4-2.4c0.5-0.5,0.6-1.3,0.3-1.9l-1.4-2.6l0.6-1.5l2.9-0.9c0.6-0.2,1.1-0.8,1.1-1.5v-3.4C34,15.6,33.5,14.9,32.8,14.7z M32,19.4l-3.6,1.1L28.3,21c-0.3,0.7-0.6,1.4-0.9,2.1l-0.3,0.5l1.8,3.3l-2,2l-3.3-1.8l-0.5,0.3c-0.7,0.4-1.4,0.7-2.1,0.9l-0.5,0.1L19.4,32h-2.8l-1.1-3.6L15,28.3c-0.7-0.3-1.4-0.6-2.1-0.9l-0.5-0.3l-3.3,1.8l-2-2l1.8-3.3l-0.3-0.5c-0.4-0.7-0.7-1.4-0.9-2.1l-0.1-0.5L4,19.4v-2.8l3.4-1l0.2-0.5c0.2-0.8,0.5-1.5,0.9-2.2l0.3-0.5L7.1,9.1l2-2l3.2,1.8l0.5-0.3c0.7-0.4,1.4-0.7,2.2-0.9l0.5-0.2L16.6,4h2.8l1.1,3.5L21,7.7c0.7,0.2,1.4,0.5,2.1,0.9l0.5,0.3l3.3-1.8l2,2l-1.8,3.3l0.3,0.5c0.4,0.7,0.7,1.4,0.9,2.1l0.1,0.5l3.6,1.1V19.4z"></path>
                                    <path class="clr-i-outline--badged clr-i-outline-path-1--badged" d="M11.1,18c0,3.9,3.1,7,7,7c3.9,0,7-3.1,7-7s-3.1-7-7-7C14.2,11,11.1,14.1,11.1,18z M23.1,18c0,2.8-2.2,5-5,5c-2.8,0-5-2.2-5-5s2.2-5,5-5C20.9,13,23.1,15.2,23.1,18z" style="display:none"></path>
                                    <path class="clr-i-outline--badged clr-i-outline-path-2--badged" d="M32.8,14.7L30,13.8l-0.1-0.3c-0.8,0-1.6-0.2-2.4-0.4c0.3,0.6,0.6,1.3,0.8,1.9l0.1,0.5l3.6,1.1v2.8l-3.6,1.1L28.3,21c-0.3,0.7-0.6,1.4-0.9,2.1l-0.3,0.5l1.8,3.3l-2,2l-3.3-1.8l-0.5,0.3c-0.7,0.4-1.4,0.7-2.1,0.9l-0.5,0.1L19.4,32h-2.8l-1.1-3.6L15,28.3c-0.7-0.3-1.4-0.6-2.1-0.9l-0.5-0.3l-3.3,1.8l-2-2l1.8-3.3l-0.3-0.5c-0.4-0.7-0.7-1.4-0.9-2.1l-0.1-0.5L4,19.4v-2.8l3.4-1l0.2-0.5c0.2-0.8,0.5-1.5,0.9-2.2l0.3-0.5L7.1,9.1l2-2l3.2,1.8l0.5-0.3c0.7-0.4,1.4-0.7,2.2-0.9l0.5-0.2L16.6,4h2.8l1.1,3.5L21,7.7c0.7,0.2,1.3,0.5,1.9,0.8c-0.3-0.8-0.4-1.6-0.4-2.5l-0.4-0.2l-0.9-2.8C21,2.5,20.4,2,19.7,2h-3.4c-0.7,0-1.3,0.5-1.4,1.2L14,6c-0.6,0.1-1.1,0.3-1.6,0.6L9.8,5.2C9.2,4.9,8.4,5,7.9,5.5L5.5,7.9C5,8.4,4.9,9.2,5.2,9.8l1.3,2.5c-0.2,0.5-0.4,1.1-0.6,1.6l-2.8,0.9C2.5,15,2,15.6,2,16.3v3.4c0,0.7,0.5,1.3,1.2,1.5L6,22.1l0.6,1.5l-1.4,2.6c-0.3,0.6-0.2,1.4,0.3,1.9l2.4,2.4c0.5,0.5,1.3,0.6,1.9,0.3l2.6-1.4l1.5,0.6l0.9,2.9c0.2,0.6,0.8,1.1,1.5,1.1h3.4c0.7,0,1.3-0.5,1.5-1.1l0.9-2.9l1.5-0.6l2.6,1.4c0.6,0.3,1.4,0.2,1.9-0.3l2.4-2.4c0.5-0.5,0.6-1.3,0.3-1.9l-1.4-2.6l0.6-1.5l2.9-0.9c0.6-0.2,1.1-0.8,1.1-1.5v-3.4C34,15.6,33.5,14.9,32.8,14.7z" style="display:none"></path>
                                    <path class="clr-i-outline--alerted clr-i-outline-path-1--alerted" d="M33.7,15.4h-5.3v0.1l3.6,1.1v2.8l-3.6,1.1L28.3,21c-0.3,0.7-0.6,1.4-0.9,2.1l-0.3,0.5l1.8,3.3l-2,2l-3.3-1.8l-0.5,0.3c-0.7,0.4-1.4,0.7-2.1,0.9l-0.5,0.1L19.4,32h-2.8l-1.1-3.6L15,28.3c-0.7-0.3-1.4-0.6-2.1-0.9l-0.5-0.3l-3.3,1.8l-2-2l1.8-3.3l-0.3-0.5c-0.4-0.7-0.7-1.4-0.9-2.1l-0.1-0.5L4,19.4v-2.8l3.4-1l0.2-0.5c0.2-0.8,0.5-1.5,0.9-2.2l0.3-0.5L7.1,9.1l2-2l3.2,1.8l0.5-0.3c0.7-0.4,1.4-0.7,2.2-0.9l0.5-0.2L16.6,4h2.8l1.1,3.4l1.4-2.3l-0.6-2C21,2.4,20.4,2,19.7,2h-3.4c-0.7,0-1.3,0.5-1.4,1.2L14,6c-0.6,0.1-1.1,0.3-1.6,0.6L9.8,5.2C9.2,4.9,8.4,5,7.9,5.5L5.5,7.9C5,8.4,4.9,9.2,5.2,9.8l1.3,2.5c-0.2,0.5-0.4,1.1-0.6,1.6l-2.8,0.9C2.5,15,2,15.6,2,16.3v3.4c0,0.7,0.5,1.3,1.2,1.5L6,22.1l0.6,1.5l-1.4,2.6c-0.3,0.6-0.2,1.4,0.3,1.9l2.4,2.4c0.5,0.5,1.3,0.6,1.9,0.3l2.6-1.4l1.5,0.6l0.9,2.9c0.2,0.6,0.8,1.1,1.5,1.1h3.4c0.7,0,1.3-0.5,1.5-1.1l0.9-2.9l1.5-0.6l2.6,1.4c0.6,0.3,1.4,0.2,1.9-0.3l2.4-2.4c0.5-0.5,0.6-1.3,0.3-1.9l-1.4-2.6l0.6-1.5l2.9-0.9c0.6-0.2,1.1-0.8,1.1-1.5v-3.4C34,16,33.9,15.7,33.7,15.4z" style="display:none"></path>
                                    <path class="clr-i-outline--alerted clr-i-outline-path-2--alerted" d="M18.1,23c-2.8,0-5-2.2-5-5s2.2-5,5-5c0.2,0,0.5,0,0.7,0.1c-0.2-0.6-0.3-1.3-0.2-2h-0.5c-3.9,0-7,3.1-7,7c0,3.9,3.1,7,7,7c3.9,0,7-3.1,7-7c0-0.9-0.2-1.8-0.5-2.6h-2.2c0.5,0.8,0.7,1.6,0.7,2.5C23.1,20.8,20.9,23,18.1,23z" style="display:none"></path>
                                    <path class="clr-i-outline--alerted clr-i-outline-path-3--alerted clr-i-alert" d="M26.9,1.1L21.1,11c-0.4,0.6-0.2,1.4,0.3,1.8c0.2,0.2,0.5,0.2,0.8,0.2h11.5c0.7,0,1.3-0.5,1.3-1.2c0-0.3-0.1-0.5-0.2-0.8l-5.7-9.9c-0.4-0.6-1.1-0.8-1.8-0.5C27.1,0.8,27,1,26.9,1.1z" style="display:none"></path>
                                    <path class="clr-i-solid clr-i-solid-path-1" d="M32.57,15.72l-3.35-1a11.65,11.65,0,0,0-.95-2.33l1.64-3.07a.61.61,0,0,0-.11-.72L27.41,6.2a.61.61,0,0,0-.72-.11L23.64,7.72a11.62,11.62,0,0,0-2.36-1l-1-3.31A.61.61,0,0,0,19.69,3H16.31a.61.61,0,0,0-.58.43l-1,3.3a11.63,11.63,0,0,0-2.38,1l-3-1.62a.61.61,0,0,0-.72.11L6.2,8.59a.61.61,0,0,0-.11.72l1.62,3a11.63,11.63,0,0,0-1,2.37l-3.31,1a.61.61,0,0,0-.43.58v3.38a.61.61,0,0,0,.43.58l3.33,1a11.62,11.62,0,0,0,1,2.33L6.09,26.69a.61.61,0,0,0,.11.72L8.59,29.8a.61.61,0,0,0,.72.11l3.09-1.65a11.65,11.65,0,0,0,2.3.94l1,3.37a.61.61,0,0,0,.58.43h3.38a.61.61,0,0,0,.58-.43l1-3.38a11.63,11.63,0,0,0,2.28-.94l3.11,1.66a.61.61,0,0,0,.72-.11l2.39-2.39a.61.61,0,0,0,.11-.72l-1.66-3.1a11.63,11.63,0,0,0,.95-2.29l3.37-1a.61.61,0,0,0,.43-.58V16.31A.61.61,0,0,0,32.57,15.72ZM18,23.5A5.5,5.5,0,1,1,23.5,18,5.5,5.5,0,0,1,18,23.5Z" style="display:none"></path>
                                    <path class="clr-i-solid--badged clr-i-solid-path-1--badged" d="M32.57,15.72l-3.35-1a12.12,12.12,0,0,0-.47-1.32,7.49,7.49,0,0,1-6.14-6.16,11.82,11.82,0,0,0-1.33-.48l-1-3.31A.61.61,0,0,0,19.69,3H16.31a.61.61,0,0,0-.58.43l-1,3.3a11.63,11.63,0,0,0-2.38,1l-3-1.62a.61.61,0,0,0-.72.11L6.2,8.59a.61.61,0,0,0-.11.72l1.62,3a11.63,11.63,0,0,0-1,2.37l-3.31,1a.61.61,0,0,0-.43.58v3.38a.61.61,0,0,0,.43.58l3.33,1a11.62,11.62,0,0,0,1,2.33L6.09,26.69a.61.61,0,0,0,.11.72L8.59,29.8a.61.61,0,0,0,.72.11l3.09-1.65a11.65,11.65,0,0,0,2.3.94l1,3.37a.61.61,0,0,0,.58.43h3.38a.61.61,0,0,0,.58-.43l1-3.38a11.63,11.63,0,0,0,2.28-.94l3.11,1.66a.61.61,0,0,0,.72-.11l2.39-2.39a.61.61,0,0,0,.11-.72l-1.66-3.1a11.63,11.63,0,0,0,.95-2.29l3.37-1a.61.61,0,0,0,.43-.58V16.31A.61.61,0,0,0,32.57,15.72ZM18,23.5A5.5,5.5,0,1,1,23.5,18,5.5,5.5,0,0,1,18,23.5Z" style="display:none"></path>
                                    <path class="clr-i-solid--alerted clr-i-solid-path-1--alerted" d="M32.57,15.72,31.5,15.4H22.85A5.5,5.5,0,1,1,18,12.5a5.53,5.53,0,0,1,.65,0A3.68,3.68,0,0,1,19,9.89l2.09-3.62-.86-2.83A.61.61,0,0,0,19.69,3H16.31a.61.61,0,0,0-.58.43l-1,3.3a11.63,11.63,0,0,0-2.38,1l-3-1.62a.61.61,0,0,0-.72.11L6.2,8.59a.61.61,0,0,0-.11.72l1.62,3a11.63,11.63,0,0,0-1,2.37l-3.31,1a.61.61,0,0,0-.43.58v3.38a.61.61,0,0,0,.43.58l3.33,1a11.62,11.62,0,0,0,1,2.33L6.09,26.69a.61.61,0,0,0,.11.72L8.59,29.8a.61.61,0,0,0,.72.11l3.09-1.65a11.65,11.65,0,0,0,2.3.94l1,3.37a.61.61,0,0,0,.58.43h3.38a.61.61,0,0,0,.58-.43l1-3.38a11.63,11.63,0,0,0,2.28-.94l3.11,1.66a.61.61,0,0,0,.72-.11l2.39-2.39a.61.61,0,0,0,.11-.72l-1.66-3.1a11.63,11.63,0,0,0,.95-2.29l3.37-1a.61.61,0,0,0,.43-.58V16.31A.61.61,0,0,0,32.57,15.72Z" style="display:none"></path><path class="clr-i-solid--alerted clr-i-solid-path-2--alerted clr-i-alert" d="M26.85,1.14,21.13,11A1.28,1.28,0,0,0,22.23,13H33.68A1.28,1.28,0,0,0,34.78,11L29.06,1.14A1.28,1.28,0,0,0,26.85,1.14Z" style="display:none"></path><circle class="clr-i-outline--badged clr-i-outline-path-3--badged clr-i-badge" cx="30" cy="6" r="5" style="display:none"></circle>
                                    <circle class="clr-i-solid--badged clr-i-solid-path-2--badged clr-i-badge" cx="30" cy="6" r="5" style="display:none"></circle>
                                </svg>
                                <span>تنظیمات صفحه</span>
                            </div>
                            <span class="chevron text-gray-400 text-sm">▼</span>
                        </div>
                        <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                        <li><a href="{{ route('story.create') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد استوری جدید</a></li>
                        <li><a href="{{ route('story.list') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست استوری ها </a></li>
                        </ul>
                    </div>
                    @endcan
                    <!-- <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                        <span class="w-5 text-center">⚙️</span>
                        <span>تنظیمات</span>
                    </a> -->
                    @endif
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
                    // chevronIcon.style.transform = 'rotate(180deg)';
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
                

                    // if (menu.classList.contains('hidden')) {
                    //     menu.classList.remove('hidden');
                    //     chevron.classList.add('rotate-180');
                    // } else {
                    //     menu.classList.add('hidden');
                    //     chevron.classList.remove('rotate-180');
                    // }
                });
            });

    </script>
