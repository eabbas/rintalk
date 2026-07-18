@extends('welcome')
@section('title', 'اقزودن متن')
@section('content')
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    
    <h1 class="text-2xl font-bold text-gray-800 text-center mb-5">افزودن متن</h1>
    
    <form action="{{ route('Text.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen flex items-start justify-center">
            <div class="bg-white rounded-2xl shadow-md p-3 w-full lg:w-3/4">
                <div class="text-center mb-4">
                    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-3 my-4">
                        <div class="w-full flex flex-col gap-3 items-start max-md:flex-col max-md:gap-1 lg:col-span-2">
                            <label class="w-30 text-sm mb-1 mt-2.5 flex justify-start">متن</label>
                            <div class="rounded-lg focus:border-none focus:outline-none focus:bg-[#F1F1F4] bg-[#F9F9F9] text-[#99A1B7] w-full flex">
                                <textarea rows="7" class="p-4 w-full focus:outline-none text-sm font-bold mr-2" 
                                    name='text'></textarea>
                            </div>
                        </div>
                    <div class="w-full text-left mt-4">
                        <button type="submit" class="active:bg-[#0080e5] mt-2 bg-[#03A9F4] text-white p-3 max-md:p-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
                              افزودن متن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection