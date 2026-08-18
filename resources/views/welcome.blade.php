@include("header")

    <style>
        .sidebar-transition {
            transition: transform 0.25s ease-in-out;
        }

        .overlay {
            transition: opacity 0.2s;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* چرخش آیکون دراپ‌داون */
        .chevron {
            transition: transform 0.2s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans antialiased">

    <!-- لایه تاریک موبایل -->
    <div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden transition-all lg:hidden"></div>

    <div class="flex h-screen overflow-hidden relative">

        <!-- ======================== سایدبار با منوی دراپ‌داون ======================== -->
        <aside id="sidebar" class="fixed inset-y-0 right-0 z-50 w-72 bg-white shadow-2xl lg:shadow-xl transform translate-x-full lg:translate-x-0 sidebar-transition flex flex-col lg:relative lg:right-auto lg:z-0 border-l border-gray-100 overflow-y-auto">

            <!-- هدر لوگو -->
            <!-- <div class="flex items-center justify-between px-6 pt-6 pb-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-400 flex items-center justify-center shadow-md">
                        <span class="text-white text-lg font-bold">🌐</span>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-500 to-indigo-400 bg-clip-text text-transparent">RinTalk</h1>
                </div>
                <button id="closeSidebarBtn" class="text-gray-400 hover:text-gray-600 transition-all lg:hidden">
                    <span class="text-2xl">✕</span>
                </button>
            </div> -->

            <!-- پروفایل کاربر -->
            <div class="px-5 py-5 flex items-center gap-3 border-b border-gray-50">
                <div class="relative">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 via-[#bf47dd] to-purple-700 flex items-center justify-center text-white font-bold text-lg shadow">آ</div>
                    <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
                <div>
                    @php $user = Auth::user(); @endphp
                    @if($user && ($user->name || $user->family))
                    <p class="font-semibold text-gray-800">{{ trim(($user->name ?? '') . ' ' . ($user->family ?? '')) }}</p>
                    @else
                    <p class="font-semibold text-gray-800">کاربر عادی</p>
                    @endif
                    <p class="text-xs text-gray-500">⭐⭐⭐ سطح فوق پیشرفته (C2)</p>
                </div>
            </div>
            <!-- منوی اصلی با دراپ‌داون -->
            <nav class="flex-1 px-4 py-6 space-y-1.5">
                <!-- لینک داشبورد (بدون دراپ‌داون) -->
                <!-- <a href="{{route('user.profile')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">👧🏻</span>
                    <span>پروفایل</span>
                </a>
                <a href="{{route('user.dashboard')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">📤</span>
                    <span>داشبورد</span>
                </a> -->
                <!-- @if(!Auth::check())
                <a href="{{route('signup')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">🔓</span>
                    <span>ورود</span>
                </a>
                <a href="{{route('signup')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">📝</span>
                    <span>ثبت نام</span>
                </a>
                @endif -->
                <!-- <a href="{{route('user.logout')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">🕳</span>
                    <span>خروج از حساب کاربری</span>
                </a> -->
                <!-- ========== منوی دوره‌ها با دراپ‌داون ========== -->
                @if(!Auth::check())
                    <div class="flex items-center gap-3 ">
                        <div class="flex items-center gap-2.5">
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
                @can('panelCan' , ['admin'])
                <div class="dropdown-item">
                    <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="w-5 text-center">📚</span>
                            <span>دوره‌ها</span>
                        </div>
                        <span class="chevron text-gray-400 text-sm">▼</span>
                    </div>
                    <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                        <li><a href="{{route('course.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد دروه</a></li>
                        <li><a href="{{route('course.courses')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه دوره ها</a></li>
                        <li><a href="{{route('books.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">افزودن کتاب</a></li>
                        <li><a href="{{route('books.index')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست کتاب ها</a></li>
                        <li><a href="{{route('courseMedia.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجادمدیا</a></li>
                        <li><a href="{{route('courseMedia.index')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه مدیا ها</a></li>

                        <!-- <li><a href="$" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مدیریت نظرات</a></li> -->
                        {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">آزمون آیلتس</a></li> --}}
                        {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مکالمه روزمره</a></li> --}}
                        <!-- <li><a href="{{ route('lesson.create') }}" class="block px-4 py-2 text-sm hover:bg-gray-50 rounded-lg">ایجاد درس</a></li> -->

                    </ul>
                </div>
                @endcan

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

                <div class="dropdown-item">
                    <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="w-5 text-center">📔</span>
                            <span>متن کتاب</span>
                        </div>
                        <span class="chevron text-gray-400 text-sm">▼</span>
                    </div>
                    <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                @can('panelCan' , ['admin'])
                        <li><a href="{{route('Text.create')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">افزودن متن</a></li>
                @endcan
                        <li><a href="{{route('Text.texts')}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست متن</a></li>
                    </ul>
                </div>
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
            </nav>
        </aside>

        <!-- ======================== محتوای اصلی ======================== -->
        <main class="flex-1 overflow-y-auto pb-8">
            <!-- هدر موبایل -->
            <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200/80 px-4 py-3 flex items-center justify-between lg:hidden">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-primary-100 flex items-center justify-center">
                        <span class="text-primary-600">🌐</span>
                    </div>
                    <span class="font-bold text-gray-700">RinTalk</span>
                </div>
                <button id="openSidebarBtn" class="text-primary-600 bg-primary-50 p-2 rounded-xl">
                    <span class="text-xl">☰</span>
                </button>
            </div>
        </main>
        <div class="w-full h-dvh lg:w-[calc(100%-265px)] float-end pt-15 lg:px-5 overflow-y-auto px-5 relative bg-[#F2F2F2]"
            style="scrollbar-width:none;">
            @yield('content')
        </div>
    </div>

    <!-- اسکریپت مدیریت سایدبار و دراپ‌داون‌ها -->
    <script>
        (function() {
            // ========== مدیریت سایدبار در موبایل ==========
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const openBtn = document.getElementById('openSidebarBtn');
            const closeBtn = document.getElementById('closeSidebarBtn');

            function openSidebar() {
                sidebar.classList.add('translate-x-0');
                sidebar.classList.remove('translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
            if (openBtn) openBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (overlay) overlay.addEventListener('click', closeSidebar);

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    if (sidebar.classList.contains('translate-x-0') && !sidebar.classList.contains('lg:translate-x-0')) {
                        sidebar.classList.remove('translate-x-0');
                        sidebar.classList.add('translate-x-full');
                    }
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // ========== مدیریت دراپ‌داون‌های منو (دوره‌ها، فصل‌ها، درس‌ها) ==========
            // const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

            // dropdownTriggers.forEach(trigger => {
            //     trigger.addEventListener('click', function(e) {
            //         e.preventDefault();
            //         // بستن سایر دراپ‌داون‌ها (اختیاری)
            //         // این کار باعث می‌شود فقط یکی باز بماند. برای تجربه بهتر می‌توانید آن را فعال کنید.
            //         // اما بنا بر نیاز کاربر، معمولاً بهتر است همزمان چند تا باز باشند. ما هر کدام را مستقل می‌کنیم.

            //         const parentItem = this.closest('.dropdown-item');
            //         const menu = parentItem.querySelector('.dropdown-menu');
            //         const chevron = this.querySelector('.chevron');

            //         if (menu.classList.contains('hidden')) {
            //             menu.classList.remove('hidden');
            //             chevron.classList.add('rotate-180');
            //         } else {
            //             menu.classList.add('hidden');
            //             chevron.classList.remove('rotate-180');
            //         }
            //     });
            // });

            // جلوگیری از بسته شدن وقتی روی لینک‌های زیرمنو کلیک می‌شود
            document.querySelectorAll('.dropdown-menu a').forEach(link => {
                link.addEventListener('click', (e) => {
                    // اجازه می‌دهد لینک کار کند، ولی سایدبار در موبایل بسته نمی‌شود
                    // در صورت نیاز می‌توانید کد اضافه کنید
                    console.log('رفتن به:', link.innerText);
                });
            });
        })();
    </script>
</body>

</html>