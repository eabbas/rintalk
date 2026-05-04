<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rinTalk</title>
    <!-- Tailwind CSS v3 از CDN رسمی (تنها منبع خارجی) -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
     <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <!-- تنظیم سفارشی برای پشتیبانی بهتر از RTL و رنگ‌های پیشفرض -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['', 'Segoe UI', 'Tahoma', 'sans-serif'],
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
        /* فقط برای انیمیشن سایدبار و اسکرول - بدون آیکون‌فونت */
        .sidebar-transition {
            transition: transform 0.25s ease-in-out;
        }
        .overlay {
            transition: opacity 0.2s;
        }
        /* اسکرول بار دلخواه */
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
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans antialiased">

    <!-- لایه تاریک برای موبایل -->
    <div id="overlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden transition-all lg:hidden"></div>

    <div class="flex h-screen overflow-hidden relative">
        
        <!-- ======================== سایدبار منو ======================== -->
        <aside id="sidebar" class="fixed inset-y-0 right-0 z-50 w-72 bg-white shadow-2xl lg:shadow-xl transform translate-x-full lg:translate-x-0 sidebar-transition flex flex-col lg:relative lg:right-auto lg:z-0 border-l border-gray-100 overflow-y-auto">
            <!-- هدر لوگو و دکمه بستن (موبایل) -->
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
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-300 to-indigo-400 flex items-center justify-center text-white font-bold text-lg shadow">س</div>
                    <span class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-green-500 border-2 border-white rounded-full"></span>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">ثمین شعفی</p>
                    <p class="text-xs text-gray-500">⭐⭐⭐ سطح پیشرفته (B2)</p>
                </div>
            </div>

            <!-- منوی اصلی -->
            <nav class="flex-1 px-4 py-6 space-y-1.5">
<a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary-50 text-primary-700 font-medium transition-all">
                    <span class="w-5 text-center">📊</span>
                    <span>داشبورد</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                    <span class="w-5 text-center">📚</span>
                    <span>دوره‌های من</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                    <span class="w-5 text-center">🎯</span>
                    <span>مهارت‌ها</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-600 hover:bg-gray-50 transition-all">
                    <span class="w-5 text-center">📈</span>
                    <span>گزارش پیشرفت</span>
                </a>
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
            <!-- هدر موبایل (فقط دکمه هامبورگر) -->
            <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200/80 px-4 py-3 flex items-center justify-between lg:hidden">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-primary-100 flex items-center justify-center">
                        <span class="text-primary-600">🌐</span>
                    </div>
                    <span class="font-bold text-gray-700">LinguaFlow</span>
                </div>
                <button id="openSidebarBtn" class="text-primary-600 bg-primary-50 p-2 rounded-xl">
                    <span class="text-xl">☰</span>
                </button>
            </div>
        </main>
    </div>

    <!-- اسکریپت ساده برای مدیریت سایدبار در موبایل -->
    <script>
        (function() {
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

            // در صورت تغییر سایز به دسکتاپ، سایدبار را ریست کنید
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
        })();
    </script>
</body>
</html>