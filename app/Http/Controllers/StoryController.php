<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\story;

class StoryController extends Controller{
    public function create(){
        return view('admin.story.create');
    }
    public function store(Request $request){
        // dd($request->all()); 
        $name = $request->path->getClientOriginalName();
        $fullName = time()."_".$name;
        $file = $request->file('path')->storeAs('story', $fullName, 'public');
        story::create([
            'title'=>$request->title,
            'path'=>$file
        ]);
        return to_route('home');
    }
}
