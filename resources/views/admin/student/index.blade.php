@extends('welcome')
@section('title', 'لیست دانشجوها')
@section('content')

<div class="max-w-5xl mx-auto p-6">
    
    <div class="mb-4 text-left">
        <a href="{{route('Student.signup')}}"  class="bg-pink-400 text-white px-4 py-2 rounded-xl">➕ ثبت نام جدید</a>
    </div>

    <h1 class="text-3xl font-bold text-center mb-8">👥 لیست دانشجوها</h1>

    <div class="bg-white rounded-2xl shadow-xl p-6 overflow-x-auto">
        @if(count($students) > 0)
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">#</th>
                        <th class="p-3">نام</th>
                        <th class="p-3">نام خانوادگی</th>
                        <th class="p-3">سن</th>
                        <th class="p-3">جنسیت</th>
                        <th class="p-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr class="border-b text-center">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $student->name }}</td>
                        <td class="p-3">{{ $student->family}}</td>
                        <td class="p-3">{{ $student->age }}</td>
                        <td class="p-3">
                            @if($student->gender == 'مرد') مرد
                            @else زن
                            @endif
                        </td>
                        <td class="p-3">
                            <a href="{{route('Student.editStudent' , [$student])}}"  class="bg-green-500 text-white px-3 py-1 rounded-lg inline-block ml-2"> ویرایش</a>
                            
                            <a href="{{route('Student.deleteStudent' , [$student])}}"  class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 inline-block"> حذف</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center py-8">هنوز دانشجویی ثبت نام نشده است!</p>
        @endif
    </div>
</div>

@endsection