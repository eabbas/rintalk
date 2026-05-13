<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonMedia;
use App\Models\lesson;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class LessonMediaController extends Controller
{
      public function create(lesson $lesson)
    {
        return view('admin.LessonMedia.create',['lesson'=>$lesson]);
    }
      public function createLessonMedia(){
        $lessons=lesson::all();
        return view('admin.LessonMedia.createLessonMedia',['lessons'=>$lessons]);
    }
    public function store(Request $request)
    {
    $path = null;
     if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('lessonMedia_file', $fullName, 'public');
        }
        $LessonMedia_id=LessonMedia::insertGetId([
           'order' => $request->order,
           'preview' => $request->preview,
           'duration' => $request->duration,
           'file_path'=>$path,
           'lesson_id'=>$request->lesson_id
       ]);
        return to_route('LessonMedia.LessonMedias');
    }
     public function index(lesson $lesson=null)
    {
        $lessonMedias=LessonMedia::all();
        if($lesson){
            $lessonMedias=$lesson->LessonMedias;
        }
        return view("admin.LessonMedia.index",['lessonMedias'=>$lessonMedias]);
    }
    public function single(LessonMedia $LessonMedia)
    {
        return view("admin.LessonMedia.single", ['LessonMedia' => $LessonMedia]);
    }
    public function edit(LessonMedia $LessonMedia)
    {
        return view('admin.LessonMedia.edit', ['LessonMedia' => $LessonMedia]);
    }
    public function update(Request $request)
    {
        $LessonMedia = LessonMedia::find($request->id);
        $LessonMedia->order = $request->order;
        $LessonMedia->duration = $request->duration;
        $LessonMedia->preview = $request->preview;
         if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('lessonMedia_file', $fullName, 'public');
            $LessonMedia->file_path = $path;

        }
        $LessonMedia->save();
        return to_route('LessonMedia.LessonMedias');
    }
    public function delete(LessonMedia $LessonMedia)
    {
          if ($LessonMedia->file_path) {
              Storage::disk('public')->delete($LessonMedia->file_path);
            }
        $LessonMedia->delete();
        return to_route('LessonMedia.LessonMedias');
    }
}
