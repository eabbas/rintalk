@extends('welcome')
@section('title', 'فرم ثبت نام کاربران')
@section('content')
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام | RinTalk</title>
    <style>
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        .form-input, .form-select {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 1rem;
            transition: all 0.15s ease;
            background-color: #eff6ff;
        }
        .form-input:focus, .form-select:focus {
            outline: none;
            ring: 2px solid #3b82f6;
            border-color: #3b82f6;
            background-color: #ffffff;
        }
        .radio-group {
            display: flex;
            gap: 1.5rem;
            padding: 0.5rem 0;
        }
        .radio-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        .radio-label input[type="radio"] {
            width: 1rem;
            height: 1rem;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 font-sans p-6 lg:p-8">

    <div class="max-w-2xl mx-auto">
        <!-- هدر فرم -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800">📝 فرم ثبت نام</h1>
            <p class="text-gray-500 mt-2">لطفاً اطلاعات خود را دقیق وارد کنید</p>
        </div>

        
        <form action="{{route('Student.studentStore')}}" method="POST" class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 space-y-6" onsubmit="showAlert()">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
               
                <div>
                    <label class="form-label">نام <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="form-input" placeholder="مثال: علی" required>
                </div>

             
                <div>
                    <label class="form-label">نام خانوادگی <span class="text-red-500">*</span></label>
                    <input type="text" name="family" class="form-input" placeholder="مثال: محمدی" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              
                <div>
                    <label class="form-label">سن <span class="text-red-500">*</span></label>
                    <input type="number" name="age" class="form-input" placeholder="مثال: 25" min="1" max="120" required>
                </div>

              
                <div>
                    <label class="form-label">جنسیت <span class="text-red-500">*</span></label>
                    <div class="radio-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="مرد" required>
                            <span class="text-gray-700">👨 مرد</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="زن" required>
                            <span class="text-gray-700">👩 زن</span>
                        </label>
                       
                    </div>
                </div>
            </div>

          
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <button type="reset" class="px-6 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 transition-all">لغو</button>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-md transition-all flex items-center gap-2">
                    <span>✓</span> ثبت نام
                </button>
            </div>
        </form>

        <p class="text-xs text-gray-400 text-center mt-8">تمامی فیلدها <span class="text-red-500">*</span> الزامی هستند.</p>
    </div>

    <script>

        function showAlert() {
            alert(" ثبت نام با موفقیت انجام شد!");
            return true;
        }
    </script>
</body>
</html>
@endsection