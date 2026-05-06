<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMedia;
use App\Models\Course;
use App\Models\course as ModelsCourse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CourseMediaController extends Controller
{
    //   public function create(course $course)
    // {
    //     return view('admin.courseMedia.create',['course'=>$course]);
    // }

    public function create()
    {
        $courses = Course::all();
        return view('admin.courseMedia.create',['courses'=>$courses]);
    }

    public function store(Request $request)
    {
    $path = null;
     if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('file_paths', $fullName, 'public');
        }
        $LessonMedia_id=CourseMedia::insertGetId([
           'order' => $request->order,
           'preview' => $request->preview,
           'duration' => $request->duration,
           'file_path'=>$path,
           'course_id'=>$request->course_id,
           'type'=>$type
       ]);
        return to_route('courseMedia.index');
    }
    //  public function index(course $course)
    // {
    //     $lessonWithMedias=$course->LessonMedias;
    //     return view("admin.courseMedia.index",['lessonWithMedias'=>$lessonWithMedias]);
    // }
    public function index()
    {
        $medias = CourseMedia::all();
        return view("admin.courseMedia.index",['medias'=>$medias]);
    }

    public function single(courseMedia $courseMedia)
    {
        return view("admin.courseMedia.single", ['courseMedia' => $courseMedia]);
    }
    public function edit(courseMedia $courseMedia)
    {
        $courses = Course::all();
        return view('admin.courseMedia.edit', ['courseMedia' => $courseMedia , 'courses'=>$courses]);
    }
    public function update(Request $request)
    {
        $courseMedia = courseMedia::find($request->id);
        $courseMedia->order = $request->order;
        $courseMedia->duration = $request->duration;
        $courseMedia->preview = $request->preview;
         if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('file_paths', $fullName, 'public');
            $courseMedia->file_path = $path;

        }
        $courseMedia->save();
        return to_route('courseMedia.index');
    }
    public function delete(courseMedia $courseMedia)
    {
        if($courseMedia->file_path){
            Storage::disk('public')->delete($courseMedia->file_path);
        }
        $courseMedia->delete();
        return to_route('courseMedia.index');
    }
}
