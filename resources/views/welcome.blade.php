@include("header")
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RinTalk | داشبورد</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <!-- Tailwind CSS v3 (فایل محلی یا CDN - در اینجا از CDN استفاده شده، اما شما می‌توانید asset خود را جایگزین کنید) -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- در صورت استفاده از assets محلی، خط زیر را فعال کنید و خط بالایی را غیرفعال -->
    {{-- <script src="{{ asset('assets/js/tailwind.js') }}"></script> --}}
    <link rel="stylesheet" href="{{ url('assets/css/fontiran.css') }}" type="text/css">
    <!-- <style>
        * {
    font-family: "Samim";
}
    </style> -->
    <script>
        // tailwind.config = {
        //     theme: {
        //         extend: {
        //             fontFamily: {
        //                 'sans': ['Segoe UI', 'Tahoma', 'system-ui', 'sans-serif'],
        //             },
        //             colors: {
        //                 primary: {
        //                     50: '#eff6ff',
        //                     100: '#dbeafe',
        //                     500: '#3b82f6',
        //                     600: '#2563eb',
        //                     700: '#1d4ed8',
        //                 }
        //             }
        //         }
        //     }
        // }
    </script>
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