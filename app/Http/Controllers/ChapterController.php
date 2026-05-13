<?php

namespace App\Http\Controllers;
use App\Models\chapter;
use App\Models\course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function create(course $course){
        $courses = course::all();
        return view("admin.chapters.create" , ['course',$course , 'courses'=>$courses]);
    }

    public function store(Request $request){
           $chapterId = chapter::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'course_id' => $request->course_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'duration' => $request->duration,
                'order'=>1
                ]);
             
            return redirect()->route("chapter.ChapterIndex");
    }

    public function index(){
        $chapters=chapter::all();
        return view("admin.chapters.index", ["chapters" => $chapters]);    
    }

    public function edit($id){
       $chapter=chapter::find($id);
       return view("admin.chapters.edit",["chapter"=>$chapter]);
    }

    public function update(Request $request){
         
          $chapter=chapter::find($request->id);
          $chapter->title=$request->title;
          $chapter->description=$request->description;
          $chapter->price=$request->price;
          $chapter->discount=$request->discount;
          $chapter->duration=$request->duration;
            $chapter->save();   
         return redirect()->route("chapter.ChapterIndex");
    }

    public function delete($id){
     $chapter=chapter::find($id);
     $chapter->delete();
    return redirect()->route("chapter.ChapterIndex");
    }
}
