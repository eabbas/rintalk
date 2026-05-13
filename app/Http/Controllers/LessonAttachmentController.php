<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LessonAttachment;
use App\Models\lesson;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class LessonAttachmentController extends Controller
{
     public function create(lesson $lesson){
        return view('admin.LessonAttachment.create',['lesson'=>$lesson]);
    }
     public function createLessonAttachment(){
        $lessons=lesson::all();
        return view('admin.LessonAttachment.createLessonAttachment',['lessons'=>$lessons]);
    }

    public function store(Request $request){
        $imagePath = null;
         if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $imagePath = $request->file('image')->storeAs('lessonAttachment_images', $fullName, 'public');
         }
        $path = null;
         if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('lessonAttachment_file', $fullName, 'public');
         }
            LessonAttachment::create([
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'file_path' => $path,
                'price' => $request->price,
                'discount' => $request->discount,
                'image' => $imagePath,
                'lesson_id' => $request->lesson_id,
                'type' => $type,
            ]);
            return to_route('LessonAttachment.LessonAttachments');
    }

    public function index(lesson $lesson=null){
         $lessonWithAttachments=LessonAttachment::all();
        if($lesson){
            $lessonWithAttachments=$lesson->LessonAttachments;
        }
       return view('admin.LessonAttachment.index' , ['lessonWithAttachments'=>$lessonWithAttachments]);
    }

    public function edit(LessonAttachment $LessonAttachment){
        return view('admin.LessonAttachment.edit' , ['LessonAttachment'=>$LessonAttachment]);
    }

    public function update(Request $request){
        $LessonAttachment = LessonAttachment::find($request->id);
        if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('image')->storeAs('lessonAttachment_images', $fullName, 'public');
            $LessonAttachment->image = $path;
        }
        if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('lessonAttachment_file', $fullName, 'public');
            $LessonAttachment->file_path = $path;
            $LessonAttachment->type = $type;

        }
        $LessonAttachment->title = $request->title;
        $LessonAttachment->description = $request->description;
        $LessonAttachment->summary = $request->summary;
        $LessonAttachment->price = $request->price;
        $LessonAttachment->discount = $request->discount;
        // $LessonAttachment->lesson_id = $request->lesson_id;
        $LessonAttachment->save();
        return to_route('LessonAttachment.LessonAttachments');
    }
    public function single(LessonAttachment $LessonAttachment){
        return view('admin.LessonAttachment.single' , ['LessonAttachment'=>$LessonAttachment]);
    }

    public function delete(LessonAttachment $LessonAttachment){
         if ($LessonAttachment->file_path) {
              Storage::disk('public')->delete($LessonAttachment->file_path);
            }
         if ($LessonAttachment->image) {
              Storage::disk('public')->delete($LessonAttachment->image);
            }
      $LessonAttachment->delete();
       return to_route('LessonAttachment.LessonAttachments');
    }
}
