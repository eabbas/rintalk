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
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Segoe UI', 'Tahoma', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
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
            <div class="flex items-center justify-between px-6 pt-6 pb-4 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-400 flex items-center justify-center shadow-md">
                        <span class="text-white text-lg font-bold">🌐</span>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-indigo-500 to-indigo-400 bg-clip-text text-transparent">RinTalk</h1>
                </div>
                <button id="closeSidebarBtn" class="text-gray-400 hover:text-gray-600 transition-all lg:hidden">
                    <span class="text-2xl">✕</span>
                </button>
            </div>

            <!-- پروفایل کاربر -->
            <div class="px-5 py-5 flex items-center gap-3 border-b border-gray-50">
                <div class="relative">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-300 to-indigo-400 flex items-center justify-center text-white font-bold text-lg shadow">ث</div>
                    <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">ثمین شعفی</p>
                    <p class="text-xs text-gray-500">⭐⭐⭐ سطح پیشرفته (B2)</p>
                </div>
            </div>
<!-- منوی اصلی با دراپ‌داون -->
            <nav class="flex-1 px-4 py-6 space-y-1.5">
                <!-- لینک داشبورد (بدون دراپ‌داون) -->
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">📊</span>
                    <span>داشبورد</span>
                </a>

                <!-- ========== منوی دوره‌ها با دراپ‌داون ========== -->
                <div class="dropdown-item">
                    <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="w-5 text-center">📚</span>
                            <span>دوره‌ها</span>
                        </div>
                        <span class="chevron text-gray-400 text-sm">▼</span>
                    </div>
                    <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                        <li><a href="{{route("course.create")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجاد دروه</a></li>
                        <li><a href="{{route("course.courses")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه دوره ها</a></li>
                        <li><a href="{{route("books.create")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">افزودن کتاب</a></li>
                        <li><a href="{{route("books.index")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست کتاب ها</a></li>
                        <li><a href="{{route("courseMedia.create")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">ایجادمدیا</a></li>
                        <li><a href="{{route("courseMedia.index")}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">لیست همه مدیا ها</a></li>
                        <li><a href="$" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مدیریت نظرات</a></li>
                        {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">آزمون آیلتس</a></li> --}}
                        {{-- <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">مکالمه روزمره</a></li> --}}
                    </ul>
                </div>

                <!-- ========== منوی فصل‌ها با دراپ‌داون ========== -->
                <div class="dropdown-item">
                    <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="w-5 text-center">🎯</span>
                            <span>فصل‌ها</span>
                        </div>
                        <span class="chevron text-gray-400 text-sm">▼</span>
                    </div>
                    <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">فصل ۱: مقدمات</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">فصل ۲: گرامر پایه</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">فصل ۳: واژگان کلیدی</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">فصل ۴: مهارت شنیداری</a></li>
                    </ul>
                </div>

                <!-- ========== منوی درس‌ها با دراپ‌داون ========== -->
                <div class="dropdown-item">
                    <div class="dropdown-trigger flex items-center justify-between px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <span class="w-5 text-center">📖</span>
                            <span>درس‌ها</span>
                        </div>
                        <span class="chevron text-gray-400 text-sm">▼</span>
                    </div>
                    <ul class="dropdown-menu hidden mr-6 mt-1 space-y-1">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">درس ۱: معرفی خود</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">درس ۲: خانواده و دوستان</a></li>
<li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">درس ۳: برنامه روزانه</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">درس ۴: سفر و گردشگری</a></li>
                    </ul>
                </div>

                <!-- سایر لینک‌های ساده -->
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                    <span class="w-5 text-center">🏆</span>
                    <span>بورد رقابتی</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                    <span class="w-5 text-center">⚙️</span>
                    <span>تنظیمات</span>
                </a>
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
        <div class="w-full h-dvh lg:w-[calc(100%-265px)] float-end pt-20 lg:px-5 overflow-y-auto px-5 relative bg-[#F2F2F2]"
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