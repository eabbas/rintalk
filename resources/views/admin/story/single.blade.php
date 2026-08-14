@extends('welcome')
@section('title', "سینگل استوری")
@section('content')
    <div class="flex flex-col items-center h-full gap-5">
        <h1 class="text-3xl font-bold">{{ $story->title }}</h1>
        <img class="w-6/12 h-6/12  rounded-3xl" src="{{asset('storage/' . $story->path)}}" alt="">
    </div>
@endsection