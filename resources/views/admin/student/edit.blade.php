@extends('welcome')
@section('title', 'ویرایش دانشجو')
@section('content')

<div class="max-w-2xl mx-auto p-6">
    
    <div class="mb-4 text-right">
        <a href="{{ route('Student.studentIndex') }}" class="bg-gray-500 text-white px-4 py-2 rounded-xl inline-block">← بازگشت به لیست</a>
    </div>

    <h1 class="text-3xl font-bold text-center mb-8">✏️ ویرایش دانشجو</h1>

    <form action="{{route('Student.updateStudent')}}" method="POST" class="bg-white rounded-2xl shadow-xl p-8">
        @csrf

        <input type="hidden" name="id" value="{{ $student->id }}">
        <div class="mb-4">
            <label class="block mb-2 font-bold">نام:</label>
            <input type="text" name="name" value="{{ $student->name }}" class="w-full p-3 border rounded-xl bg-blue-50" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold">نام خانوادگی:</label>
            <input type="text" name="family" value="{{ $student->family }}" class="w-full p-3 border rounded-xl bg-blue-50" required>
        </div>

       
        <div class="mb-4">
            <label class="block mb-2 font-bold">سن:</label>
            <input type="number" name="age" value="{{ $student->age }}" class="w-full p-3 border rounded-xl bg-blue-50" min="1" max="120" required>
        </div>

    
        <div class="mb-6">
            <label class="block mb-2 font-bold">جنسیت:</label>
            <div class="flex gap-6">
                <label>
                    <input type="radio" name="gender" value="مرد" {{ $student->gender == 'مرد' ? 'checked' : '' }}> مرد
                </label>
                <label>
                    <input type="radio" name="gender" value="زن" {{ $student->gender == 'زن' ? 'checked' : '' }}> زن
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('Student.studentIndex') }}" class="px-6 py-2 border rounded-xl">انصراف</a>
            <button type="submit" class="px-6 py-2 bg-yellow-500 text-white rounded-xl">  بروزرسانی</button>
        </div>
    </form>
</div>

@endsection