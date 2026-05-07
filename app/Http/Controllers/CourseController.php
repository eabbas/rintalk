<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\CourseAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function create(){
        return view('admin.course.create');
    }

    public function store(Request $request){
             $courseId = course::insertGetId([
                'user_id'=>1,
                'master_name'=>$request->master_name,
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'duration' => $request->duration,
                'price' => $request->price,
                'discount' => $request->discount,
                'level_id' => $request->level_id,
                'status_id' => $request->status_id,
                'active' => $request->active,
                'show_in_home' => $request->show_in_home,
                'prerequisite' => $request->prerequisite
             ]);
        return to_route('course.courses');
    }

    public function index(){
       $courses =  course::all();
       return view('admin.course.index' , ['courses'=>$courses]);
    }

    public function edit(course $course){
      $course = course::find($course->id);
      return view('admin.course.edit', ['course'=>$course]);
    }

    public function update(Request $request){
        $course = course::find($request->course_id);
        $course->user_id = 1;
        $course->master_name = $request->master_name;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->summary = $request->summary;
        $course->duration = $request->duration;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->level_id = $request->level_id;
        $course->status_id = $request->status_id;
        $course->active = $request->active;
        $course->show_in_home = $request->show_in_home;
        $course->prerequisite = $request->prerequisite;
        $course->save();
        return to_route('course.courses');
    }
    
    public function single(course $course){
        $course = course::find($course->id);
        return view('admin.course.single' , ['course'=>$course]);
    }

    public function media(course $course)
    {
        return view("admin.course.medias",['course'=>$course]);
    }

     public function delete($id){
        $course = course::find($id)->delete();
         if($course->media->file_path){
            Storage::disk('public')->delete($course->media->file_path);
        }
         return to_route('course.courses');
    }
}
