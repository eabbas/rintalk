<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\lesson;
use App\Models\status;
class LessonController extends Controller
{
     public function create(){
        $status=status::all();
        return view('admin.lesson.create',['status'=>$status]);
    }

    public function store(Request $request){
            lesson::create([
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'duration' => $request->duration,
                'price' => $request->price,
                'discount' => $request->discount,
                'active'=> $request->active ? 1 : 0,
                'order' => $request->order,
                'show_in_home'=> $request->show_in_home ? 1 : 0,
                'status_id' => $request->status_id,
                'course_id' => $request->course_id,
            ]);
            return to_route('lesson.lessons');
    }

    public function index(){
       $lessons = lesson::all();
       return view('admin.lesson.index' , ['lessons'=>$lessons]);
    }

    public function edit(lesson $lesson){
        return view('admin.lesson.edit' , ['lesson'=>$lesson]);
    }

    public function update(Request $request){
        // dd($request->all());
        $lesson = lesson::find($request->id);
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->summary = $request->summary;
        $lesson->duration = $request->duration;
        $lesson->price = $request->price;
        $lesson->discount = $request->discount;
        $lesson->show_in_home = $request->show_in_home ? 1 : 0;
        $lesson->active= $request->active ? 1 : 0;
        $lesson->status_id = 1;
        $lesson->course_id = 1;
        $lesson->order = $request->order;
        $lesson->save();
        return to_route('lesson.lessons');
    }

    public function class_list(lesson $lesson){
        return view('admin.lesson.class_list' , ['lesson'=>$lesson]);
    }
    
    public function single(lesson $lesson){
        return view('admin.lesson.single' , ['lesson'=>$lesson]);
    }

    public function delete(lesson $lesson){
        if($lesson->LessonAttachments){
            foreach($lesson->LessonAttachments as $LessonAttachment){
                     if ($LessonAttachment->file_path) {
              Storage::disk('public')->delete($LessonAttachment->file_path);
            }
             if ($LessonAttachment->image) {
              Storage::disk('public')->delete($LessonAttachment->image);
            }
             $LessonAttachment->delete();
            }
        }
        if($lesson->LessonMedias){
            foreach($lesson->LessonMedias as $LessonMedia){
            if ($LessonMedia->file_path) {
              Storage::disk('public')->delete($LessonMedia->file_path);
            }
            $LessonMedia->delete();
            }
        }
       $lesson->delete();
        return to_route('lesson.lessons');
    }
}
