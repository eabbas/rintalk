<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش سرفصل</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
   <script src="{{ asset('assets/js/tailwind.js') }}"></script>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">ویرایش سرفصل</h1>

        <form action="{{ route('chapter.UpdateChapter') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $chapter->id }}" class="w-full border p-2 rounded">
            </div>


            <div class="mb-3">
                <label class="block mb-1">عنوان</label>
                <input type="text" name="title" value="{{ $chapter->title }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block mb-1">توضیحات</label>
                <textarea name="description" rows="3" class="w-full border p-2 rounded">{{ $chapter->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="block mb-1">قیمت (تومان)</label>
                <input type="number" name="price" value="{{ $chapter->price }}" class="w-full border p-2 rounded">
            </div>
             <div class="mb-3">
                <label class="block mb-1">تخفیف</label>
                <input type="number" name="discount" value="{{ $chapter->discount }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block mb-1">مدت (دقیقه)</label>
                <input type="number" name="duration" value="{{ $chapter->duration }}" class="w-full border p-2 rounded">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">ویرایش</button>
                <a href="{{ route('chapter.ChapterIndex') }}" class="bg-gray-400 text-white px-4 py-2 rounded">بازگشت</a>
            </div>
        </form>
    </div>
</body>
</html>
