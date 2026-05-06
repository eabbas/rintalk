@extends('welcome')
@section('title', 'نمایش کتاب')
@section('content')
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نمایش کتاب | RinTalk</title>
    <!-- Tailwind CSS v3 CDN -->
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['system-ui', 'Segoe UI', 'Tahoma', 'sans-serif'],
                    },
                    boxShadow: {
                        'card': '0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.02)',
                    }
                }
            }
        }
    </script>
    <style>
        /* اسکرول زیبا */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #e2e8f0;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 10px;
        }
        .badge {
            @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-indigo-50/40 font-sans antialiased p-4 md:p-8">

    <div class="max-w-6xl mx-auto">
        <!-- دکمه بازگشت -->
        {{-- <div class="mb-6">
            <a href="#" class="inline-flex items-center gap-2 text-gray-600 hover:text-primary-600 transition-colors bg-white/70 backdrop-blur-sm px-4 py-2 rounded-full shadow-sm">
                <span>←</span>
                <span>بازگشت به دوره‌ها</span>
            </a>
        </div> --}}

        <!-- کارت اصلی کتاب/دوره -->
        <div class="bg-white rounded-3xl shadow-card border border-gray-100 overflow-hidden">
            <!-- هدر با تصویر (شبیه بنر) -->
            <div class="relative h-56 md:h-72 lg:h-80 bg-gradient-to-r from-indigo-500 via-white-500 overflow-hidden">
                <!-- تصویر زمینه (image) - در صورت وجود آدرس واقعی، اینجا قرار می‌گیرد -->
                <img src="{{ asset('storage/'.$book->image) }}" alt="تصویر جلد کتاب" class="w-full h-full object-cover mix-blend-overlay">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-6">
                    <div class="text-white">
                        <span class="inline-block bg-emerald-500/90 backdrop-blur-sm text-white text-xs px-3 py-1 rounded-full mb-3">⭐ جدیدترین انتشار</span>
                        <h1 class="text-2xl md:text-4xl font-bold">{{$book->title}}</h1>
                        <p class="text-white/80 text-sm md:text-base mt-2">توسط سارا محمدی</p>
                    </div>
                </div>
            </div>

            <!-- اطلاعات اصلی -->
            <div class="p-6 md:p-8 space-y-7">
                <!-- وضعیت، سطح، فعال/نمایش در خانه -->
                <div class="flex flex-wrap gap-3 items-center border-b border-gray-100 pb-4">
                    <!-- سطح (level_id) -->
                    <span class="badge text-blue-800">📊 سطح: {{$book->status_id}}</span>
                    <!-- وضعیت (status_id) -->
                    <span class="badge text-green-800">✅ وضعیت: {{$book->status_id}}</span>
                    <!-- active -->
                    @if($book->active == 1)
                    <span class="badge  text-emerald-800">🟢 فعال</span>
                    @elseif($book->active == 0)
                    <span class="badge text-emerald-800">🔴 غیرفعال</span>
                    @endif
                    <!-- show_in_home -->
                    @if($book->show_in_home == 1)
                    <span class="badge text-amber-800">🏠 نمایش در صفحه اصلی</span>
                    @elseif($book->show_in_home == 0)
                    <span class="badge text-amber-800">🏠  در صفحه اصلی نمایش داده نمیشود</span>
                    @endif
                </div>

                <!-- دو ستون: سمت راست اطلاعات اصلی، سمت چپ جعبه قیمت و فایل -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- ستون اصلی (توضیحات و خلاصه) -->
<div class="lg:col-span-2 space-y-6">
                        <!-- خلاصه (summary) -->
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2 mb-3"><span class="w-1 h-5 bg-primary-500 rounded-full"></span> خلاصه دوره</h2>
                            <p class="text-gray-700 leading-relaxed bg-gray-50 p-4 rounded-xl border border-gray-100">
                                {{$book->summary}}
                            </p>
                        </div>

                        <!-- توضیحات کامل (description) -->
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2 mb-3"><span class="w-1 h-5 bg-primary-500 rounded-full"></span> توضیحات کامل</h2>
                            <div class="text-gray-700 space-y-3 leading-relaxed">
                                <p>{{$book->description}}</p>
                            </div>
                        </div>
                    </div>

                    <!-- کارت خرید و فایل (سمت چپ) -->
                    <div class="lg:col-span-1">
                        <div class="sticky top-6 bg-gradient-to-br from-white to-gray-50 rounded-2xl border border-gray-200 shadow-lg p-5 space-y-5">
                            <!-- قیمت و تخفیف -->
                            <div>
                                <div class="flex items-baseline gap-2">
                                    <span class="text-gray-500 text-sm line-through">{{$book->price}} تومان</span>
                                    <span class="text-3xl font-extrabold text-primary-600">{{$book->discount}} تومان</span>
                                </div>
                                <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full inline-block mt-1">🔥 ۳۴٪ تخفیف ویژه</span>
                            </div>

                            <!-- فایل (file_path) - لینک دانلود / پیش‌نمایش -->
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex items-center gap-2 text-gray-700 font-medium mb-2">
                                    <span>📁</span>
                                    <span>فایل ضمیمه</span>
                                </div>
                                <a href="{{ route('books.download', [$book->id]) }}" class="flex items-center justify-between bg-white rounded-xl border border-gray-200 p-3 hover:bg-gray-50 transition">
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-500">📘</span>
                                        <span class="text-sm font-medium">جزوه کامل دوره (PDF)</span>
                                    </div>
                                    <span class="text-blue-500 text-sm">دانلود ↓</span>   
                                </a>
                                <a href="#" class="flex items-center justify-between bg-white rounded-xl border border-gray-200 p-3 mt-2 hover:bg-gray-50 transition">
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-500">🎧</span>
                                        <span class="text-sm font-medium">فایل‌های صوتی (ZIP)</span>
                                    </div>
                                    <span class="text-blue-500 text-sm">دانلود ↓</span>
                                </a>
                                <p class="text-xs text-gray-400 mt-3">* برای دسترسی به تمام فایل‌ها، پس از خرید لینک دانلود فعال می‌شود.</p>
                            </div>

                            <!-- دکمه خرید / اقدام -->
                            <button class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl transition flex items-center justify-center gap-2 shadow-md">
                                <span>🛒</span> خرید و دسترسی فوری
                            </button>
                            <p class="text-center text-xs text-gray-400">ضمانت بازگشت وجه تا ۷ روز</p>
                        </div>
                    </div>
                </div>

                <!-- گالری تصاویر یا اطلاعات تکمیلی (اختیاری) - نمایش آدرس image نمونه -->
                <div class="border-t border-gray-100 pt-6">
                    <h3 class="text-md font-semibold text-gray-700 mb-3">📸 تصاویر معرفی کتاب</h3>
                    <div class="flex gap-3 overflow-x-auto pb-2">
                        <img src="https://picsum.photos/id/24/200/150" class="w-32 h-24 object-cover rounded-xl shadow-sm border" alt="preview1">
                        <img src="https://picsum.photos/id/26/200/150" class="w-32 h-24 object-cover rounded-xl shadow-sm border" alt="preview2">
                        <img src="https://picsum.photos/id/28/200/150" class="w-32 h-24 object-cover rounded-xl shadow-sm border" alt="preview3">
                    </div>
                    <p class="text-xs text-gray-400 mt-2">آدرس تصویر اصلی: <code class="bg-gray-100 px-1 rounded">/storage/books/main-image.jpg</code></p>
                </div>
            </div>

            <!-- فوتر یا پایین صفحه (اطلاعات فرعی) -->
            <div class="bg-gray-50 px-6 md:px-8 py-4 border-t border-gray-100 text-xs text-gray-500 flex justify-between flex-wrap gap-2">
                <span>📅 آخرین به‌روزرسانی: ۱۴۰۴/۰۲/۱۵</span>
                <span>👥 تعداد دانشجویان: ۱,۲۴۰ نفر</span>
                <span><span class="inline-block w-2 h-2 rounded-full bg-green-500 ml-1"></span> پشتیبانی ۲۴/۷</span>
            </div>
        </div>

        <!-- توضیح فیلدهای داده شده در دمو (برای نمایش منطق) -->
        <div class="mt-6 text-center text-xs text-gray-400 bg-white/50 rounded-xl p-3">
            <span>🔹 نمایش فیلدهای مدل: title, description, summary, price, discount, level_id (C1), status_id (منتشر شده), active (فعال), show_in_home (بله), file_path (دو فایل نمونه), image (تصویر بنر و گالری)</span>
        </div>
    </div>

    <!-- اسکریپت ساده برای شبیه‌سازی کلیک (اختیاری) -->
    <script>
        document.querySelectorAll('button, a').forEach(btn => {
            btn.addEventListener('click', (e) => {
                if(btn.getAttribute('href') === '#' || btn.tagName === 'BUTTON') {
                    e.preventDefault();
                    alert('این یک نسخه نمایشی است. در سایت واقعی به صفحه خرید هدایت می‌شوید.');
                }
            });
        });
    </script>
</body>
</html>
@endsection