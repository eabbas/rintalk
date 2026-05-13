<?php

namespace App\Http\Controllers;
use App\Models\ChapterAtachment;
use App\Models\chapter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChapterAtachmentController extends Controller
{
        public function create(chapter $chapter){
        return view("admin.chapterAtachment.create",["chapter"=>$chapter]);
    }

    public function store(Request $request){
             $imagePath = null;
         if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $imagePath = $request->file('image')->storeAs('ChapterAtachment_images', $fullName, 'public');
         }
        $path = null;
         if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('ChapterAtachment_file', $fullName, 'public');
         }
           $ChapterAtachmentId =ChapterAtachment::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'price' => $request->price,
                'discount' => $request->discount,
                'image' => $imagePath,
                'file_path' => $path,
                'chapter_id' => $request->chapter_id,
                'type' => $type,

                ]);
             
             return to_route('chapterAtachment.chapterAtachmentIndex');
    }

    public function index(){
        $ChapterAtachments=ChapterAtachment::all();
        return view("admin.chapterAtachment.index", ["ChapterAtachments" => $ChapterAtachments]);    
    }

    public function edit($id){
       $ChapterAtachment=ChapterAtachment::find($id);
       return view("admin.chapterAtachment.edit",["ChapterAtachment"=>$ChapterAtachment]);
    }

    public function update(Request $request){
         $ChapterAtachment=ChapterAtachment::find($request->id);
         if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('image')->storeAs('ChapterAtachment_images', $fullName, 'public');
            $ChapterAtachment->image = $path;
        }
        if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('ChapterAtachment_file', $fullName, 'public');
            $ChapterAtachment->file_path = $path;
            $ChapterAtachment->type = $type;

        }
          $ChapterAtachment=ChapterAtachment::find($request->id);
          $ChapterAtachment->title=$request->title;
          $ChapterAtachment->description=$request->description;
          $ChapterAtachment->price=$request->price;
          $ChapterAtachment->discount=$request->discount;
          $ChapterAtachment->summary=$request->summary;
         $ChapterAtachment->save();   
            return to_route('chapterAtachment.chapterAtachmentIndex');
    }

    public function delete($id){
     $chapterAtachment=chapterAtachment::find($id);
     $chapterAtachment->delete();
     return redirect()->route("chapterAtachment.chapterAtachmentIndex");

    }
}
