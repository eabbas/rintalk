
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ثبت نام آموزشگاه زبان</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            
            <div class="bg-blue-600 px-6 py-5 text-center">
                <h2 class="text-xl font-bold text-white">فرم ثبت نام زبان</h2>
                <p class="text-blue-100 text-sm mt-1">لطفاً اطلاعات خود را وارد کنید</p>
            </div>

            <form class="p-6 space-y-4" action="{{ route('Student.studentStore') }}" method="post">
                @csrf
                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">نام</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">نام خانوادگی</label>
                    <input type="text" name="family" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">جنسیت</label>
                    <div class="flex gap-6">
                   
                        <label class="flex items-center gap-2"><input type="radio" name="gender" value="مرد" > مرد</label>
                      
                        <label class="flex items-center gap-2"><input type="radio" name="gender" value="زن" > زن</label>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2 text-sm">سن</label>
                    <input type="number" name="age" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <button class="w-full bg-blue-600 text-white font-bold py-2.5 rounded-lg">ثبت نام</button>
            </form>
        </div>
    </div>

</body>
</html>


