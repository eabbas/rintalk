<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\CourseComment;
use Illuminate\Http\Request;

class CourseCommentController extends Controller
{
   
public function create(){
      $courses =course::all();
     return view("courseComent.create",["courses"=>$courses]);
    }
   
public function store(Request $request){

 $course=course::where("id",$request->course_id)->first();   
            // $request->course_id = $course->id;
            $commentId = CourseComment::insertGetId([
                'comment' => $request->comment,
                'course_id' => $request->course_id,
                'user_id' => $request->user_id,
                ]); 
            return redirect()->route("courseComent.single",["course"=>$request->course_id]);


        }

 public function index(){
     $comments=CourseComment::with("lesson")->get();
    
       return view("courseComent.index",["comments"=>$comments]);
 }

public function single(course $course){
    $course->load("comments");
    foreach($course->comments as $comment){
        $course['comments'] = $comment;
    }
    return view("courseComent.single",["comment"=>$comment,"course"=>$course]);
}
}
