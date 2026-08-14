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
    public function index(){
        $story=story::all();
        return view('admin.story.index' , ['story'=>$story]);
    }
    public function single(story $story){
        return view('admin.story.single' , ['story'=>$story]);
    }
    public function edit(story $story){
        return view ('admin.story.edit' , ['story'=>$story]);
    }
    public function update(Request $request){
        $story=story::find($request->id);
        $name = $request->path->getClientOriginalName();
        $fullName = time()."_".$name;
        $file = $request->file('path')->storeAs('story', $fullName, 'public');
        $story->title=$request->title;
        $story->path=$file;
        $story->save();
        return to_route('story.list');
    }
    public function delete(story $story){
        $story->delete();
        return to_route('story.list');
    }
}
