@extends('welcome')
@section('title', 'ویرایش درس')
@section('content')
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ویرایش درس | RinTalk</title>
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
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            ring: 2px solid #3b82f6;
            border-color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans p-6 lg:p-8">

    <div class="max-w-5xl mx-auto">
        <!-- هدر فرم -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">✏️ ویرایش درس</h1>
            <p class="text-gray-500 mt-2">اطلاعات درس را ویرایش کنید</p>
        </div>

        <!-- فرم اصلی -->
        <form action="{{ route('lesson.update') }}" method="POST" class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 space-y-6">
            @csrf
            <input type="hidden" name="id" value="{{ $lesson->id }}">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- عنوان درس -->
                <div class="col-span-1">
                    <label class="form-label">عنوان درس <span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="form-input bg-blue-50" placeholder="مثال: جلسه اول - معرفی" value="{{$lesson->title}}" required>
                </div>

                <!-- فصل والد (chapter_id) -->
                <div class="col-span-1">
                    <label class="form-label">فصل مرتبط <span class="text-red-500">*</span></label>
                    <select name="chapter_id" class="form-select bg-blue-50" required>
                        @foreach($chapters as $chapter)
                        <option value="{{$chapter->id}}"
                        @if ($chapter->id == $lesson->chapter_id) {{ 'selected' }} @endif>
                        {{$chapter->title}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- وضعیت (status_id) -->
                <div class="col-span-1">
                    <label class="form-label">وضعیت درس <span class="text-red-500">*</span></label>
                    <select name="status_id" class="form-select bg-blue-50" required>
                        @foreach($status as $state)
                        <option value="{{$state->id}}"
                            @if ($state->id == $lesson->status_id) {{ 'selected' }} @endif>
                            {{$state->title}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ترتیب نمایش (order) -->
                <div class="col-span-1">
                    <label class="form-label">ترتیب نمایش<span class="text-red-500">*</span></label>
                    <input type="number" name="order" class="form-input bg-blue-50" placeholder="مثال: 1" step="1" value="{{ $lesson->order }}" required>
                </div>
            </div>

            <!-- توضیحات کامل -->
            <div>
                <label class="form-label">توضیحات درس</label>
                <textarea name="description" rows="4" class="form-textarea bg-blue-50 w-full" placeholder="توضیحات کامل درس را بنویسید...">{{$lesson->description }}</textarea>
            </div>

            <!-- خلاصه (summary) -->
            <div>
                <label class="form-label">خلاصه درس</label>
                <textarea name="summary" rows="2" class="form-textarea bg-blue-50 w-full" placeholder="خلاصه کوتاه (حداکثر ۲۰۰ کاراکتر)">{{ $lesson->summary}}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- مدت زمان (duration) -->
                <div>
                    <label class="form-label">مدت زمان (دقیقه)<span class="text-red-500">*</span></label>
                    <input type="text" name="duration" class="form-input bg-blue-50" placeholder="مثال: 45 دقیقه" value="{{$lesson->duration}}"required>
                </div>

                <!-- قیمت (price) -->
                <div>
                    <label class="form-label">قیمت (تومان)<span class="text-red-500">*</span></label>
                    <input type="text" name="price" class="form-input bg-blue-50" placeholder="مثال: 150000" value="{{ $lesson->price }}" required>
                </div>

                <!-- تخفیف (discount) -->
                <div>
                    <label class="form-label">تخفیف (تومان)</label>
                    <input type="text" name="discount" class="form-input bg-blue-50" placeholder="مثال: 20" value="{{ $lesson->discount}}">
                </div>
            </div>

            <!-- چک‌باکس‌ها -->
            <div class="flex gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="active" value="1" class="w-5 h-5 text-primary-600 rounded border-gray-300 focus:ring-primary-500" {{ $lesson->active ? 'checked' : '' }}>
                    <span class="text-gray-700">فعال بودن درس</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="show_in_home" value="1" class="w-5 h-5 text-primary-600 rounded border-gray-300 focus:ring-primary-500" {{ $lesson->show_in_home ? 'checked' : '' }}>
                    <span class="text-gray-700">نمایش در صفحه اصلی</span>
                </label>
            </div>

            <!-- دکمه ارسال و انصراف -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition-all inline-block">انصراف</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md transition-all flex items-center gap-2">
                    <span>✓</span> بروزرسانی درس
                </button>
            </div>
        </form>

        <p class="text-xs text-gray-400 text-center mt-8">تمامی فیلدهای ستاره‌دار الزامی هستند.</p>
    </div>

    <script>
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            if(!cb.hasAttribute('checked')) cb.checked = false;
        });
    </script>
</body>
</html>
@endsection