<?php

namespace App\Http\Controllers;
use App\Models\ChapterMedia;
use App\Models\chapter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ChapterMediaController extends Controller
{
public function create(chapter $chapter){
        return view("admin.chapterMedia.create",["chapter"=>$chapter]);
    }

    public function store(Request $request){
             $Filepath=null;
           if($request->file_path){
            $fileName=$request->file_path->getClientOriginalName();
            $fullName=Str::uuid()."_".$fileName;
            $Filepath=$request->file('file_path')->storeAs("files",$fullName,"public");
           }
           $ChapterMediatId =ChapterMedia::insertGetId([
                'chapter_id' => $request->chapter_id,
                'file_path' => $Filepath,
                'duration' => $request->duration,
                'order' => 1,
                'preview' => $request->preview,
                ]);
             
            return redirect()->route("chapterMedia.chapterMediaIndex");
    }

    public function index(){
        $chapterMedias=ChapterMedia::all();
        return view("admin.chapterMedia.index", ["chapterMedias" => $chapterMedias]);    
    }

    public function edit($id){
       $chapterMedia=ChapterMedia::find($id);
       return view("admin.chapterMedia.edit",["chapterMedia"=>$chapterMedia]);
    }

    public function update(Request $request){
          $chapterMedia=ChapterMedia::find($request->id);
           if(isset($request->file_path)){
            $type = $request->file_path->getClientOriginalExtension();
            $name = $request->file_path->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('file_path')->storeAs('lessonMedia_file', $fullName, 'public');
            $chapterMedia->file_path = $path;
        }
          $chapterMedia->duration=$request->duration;
          $chapterMedia->preview=$request->preview;
            $chapterMedia->save();   
        return redirect()->route("chapterMedia.chapterMediaIndex");

    }

    public function delete($id){
     $ChapterMedia=ChapterMedia::find($id);
     $ChapterMedia->delete();
        return redirect()->route("chapterMedia.chapterMediaIndex");


    }
}
