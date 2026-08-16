@extends('welcome')
@section('title', 'ایجاد درس جدید')
@section('content')
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ایجاد درس | RinTalk</title>
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
            <h1 class="text-3xl font-bold text-gray-800">🎓افزودن کتاب جدید</h1>
            <p class="text-gray-500 mt-2">اطلاعات کتاب را وارد کنید</p>
        </div>

        <!-- فرم اصلی -->
        <form action="{{route('books.store')}}" method="POST" enctype='multipart/form-data' class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 space-y-6" >
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- عنوان دوره -->
                <div class="col-span-1">
                    <label class="form-label">نام کتاب<span class="text-red-500">*</span></label>
                    <input type="text" name="title" class="form-input" placeholder="عنوان کتاب را بنویسید" required>
                </div>

                <!-- کد دوره -->
                {{-- <div class="col-span-1">
                    <label class="form-label">کد دوره</label>
                    <input type="text" name="course_code" class="form-input" placeholder="مثال: ENG-101">
                </div> --}}

                <!-- سطح دوره -->
                <div class="col-span-1">
                    <label class="form-label">سطح <span class="text-red-500">*</span></label>
                    <select name="level_id" class="form-select">
                        <option value="">انتخاب سطح</option>
                        @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->title}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- وضعیت دوره -->
                <div class="col-span-1">
                    <label class="form-label">وضعیت<span class="text-red-500">*</span></label>
                    <select name="status_id" class="form-select">
                        <option value="">انتخاب وضعیت</option>
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{$status->title}}</option>
                        @endforeach
                    </select>
                </div>

               <!-- تصویر -->
               <div class="col-span-1">
                    <label class="form-label">تصویر<span class="text-red-500">*</span></label>
                    <input type="file"  name="image" class="form-input" required>
                </div>
            </div>

            <!-- توضیحات کامل -->
            <div>
                <label class="form-label">توضیحات</label>
                <textarea name="description" rows="4" class="form-textarea w-full" placeholder="توضیحات کامل کتاب را بنویسید..."></textarea>
            </div>

            <!-- خلاصه دوره -->
            <div>
                <label class="form-label">خلاصه</label>
                <textarea name="summary" rows="2" class="form-textarea w-full" placeholder="خلاصه کوتاه (حداکثر ۲۰۰ کاراکتر)"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- مدت زمان -->
                {{-- <div>
                    <label class="form-label">مدت زمان (ساعت)<span class="text-red-500">*</span></label> 
                    <input type="text" name="duration" class="form-input" placeholder="مثال: 24 ساعت">
                </div> --}}
                <!-- پیش نیاز ها -->
                {{-- <div class="col-span-2">
                    <label class="form-label">پیش نیاز های دوره <span class="text-red-500">*</span></label>
                    <input type="text" name="prerequisite" class="form-input" placeholder="مثال: آشنایی با پایه انگلیسی" required>
                </div> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- قیمت -->
                <div>
                    <label class="form-label">قیمت (تومان) <span class="text-red-500">*</span></label>
                    <input type="text" name="price" class="form-input" placeholder="مثال: 450000">
                </div>

                <!-- تخفیف -->
                <div>
                    <label class="form-label">تخفیف <span class="text-red-500">*</span></label>
                    <input type="text" name="discount" class="form-input" placeholder="قیمت با تخفیف">
                </div>

                <!-- فایل -->
               <div class="col-span-1">
                    <label class="form-label">فایل کتاب<span class="text-red-500">*</span></label>
                    <input type="file"  name="file_path" class="form-input" required>
                </div>
                <!-- قیمت پس از تخفیف (فقط نمایشی) -->
                {{-- <div>
                    <label class="form-label">قیمت نهایی (تومان)</label>
                    <input type="text" class="form-input bg-gray-100 cursor-not-allowed" placeholder="به‌طور خودکار محاسبه می‌شود" readonly disabled>
                </div> --}}
            </div>
            <!-- چک‌باکس‌ها -->
            <div class="flex flex-wrap gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="active" value="1" class="w-5 h-5 text-primary-600 rounded border-gray-300 focus:ring-primary-500">
                    <span class="text-gray-700">فعال</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="show_in_home" value="1" class="w-5 h-5 text-primary-600 rounded border-gray-300 focus:ring-primary-500">
                    <span class="text-gray-700">نمایش در صفحه اصلی</span>
                </label>
            </div>
            <!-- دکمه ارسال و انصراف -->
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="reset" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition-all">لغو</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md transition-all flex items-center gap-2">
                    <span></span> افزودن کتاب 
                </button>
            </div>
        </form>

        <p class="text-xs text-gray-400 text-center mt-8">تمامی فیلدهای ستاره‌دار الزامی هستند.</p>
    </div>

    <script>
        // مقداردهی اولیه چک‌باکس‌ها
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            if(!cb.hasAttribute('checked')) cb.checked = false;
        });

        // محاسبه خودکار قیمت نهایی (اختیاری)
        const priceInput = document.querySelector('input[name="price"]');
        const discountInput = document.querySelector('input[name="discount"]');
        const finalPriceInput = document.querySelector('input[placeholder*="محاسبه"]');

        function calculateFinalPrice() {
            const price = parseFloat(priceInput?.value) || 0;
            const discount = parseFloat(discountInput?.value) || 0;
            const finalPrice = price - (price * discount / 100);
            if(finalPriceInput) {
                finalPriceInput.value = finalPrice.toLocaleString('fa-IR') + ' تومان';
            }
        }

        if(priceInput && discountInput) {
            priceInput.addEventListener('input', calculateFinalPrice);
            discountInput.addEventListener('input', calculateFinalPrice);
        }
    </script>
</body>
</html>
@endsection