@extends('welcome')
@section('title', 'ایجاد مرحله ')
@section('content')
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> فرم ایجاد  مرحله | RinTalk</title>
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" type="text/css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['system-ui', 'Segoe UI', 'Tahoma', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 1rem;
            transition: all 0.15s ease;
            background-color: #eff6ff;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            ring: 2px solid #3b82f6;
            border-color: #3b82f6;
            background-color: #ffffff;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans p-6 lg:p-8">

    <div class="max-w-5xl mx-auto">
        <!-- هدر فرم -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">🎓 ایجاد دوره جدید</h1>
            <p class="text-gray-500 mt-2">اطلاعات دوره را با دقت وارد کنید</p>
        </div>

        <!-- فرم اصلی -->
        <form action="{{route('coursestep.store')}}" method="POST" class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 space-y-6" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"  value="{{$id}}">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- عنوان دوره -->
                <div class="col-span-1">
                    <label class="form-label">عنوان مرحله <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="form-input" placeholder="مثال: مرحله یک" required>
                </div>
                
                <div class="col-span-1">
                    <label class="form-label">تصویر مرحله</label>
                    <input type="file" name="image" class="form-input" placeholder="تصویر مرحله" required>
                </div>
                <div class="col-span-1">
                    <label class="form-label">مرحله:</label>
                    <input type="number" name="step" class="form-input" placeholder="1,2,3" required>
                </div>

            </div>

            <!-- توضیحات کامل -->
            <div>
                <label class="form-label">توضیحات مرحله</label>
                <textarea name="description" rows="4" class="form-textarea w-full" placeholder="توضیحات کامل مرحله را بنویسید..." ></textarea>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md transition-all flex items-center gap-2">
                    <span>✓</span> ایجاد مرحله
                </button>
            </div>
        </form>

        <p class="text-xs text-gray-400 text-center mt-8">تمامی فیلدهای ستاره‌دار الزامی هستند.</p>
    </div>
</body>
</html>
@endsection