<?php

namespace App\Http\Controllers;
use App\Models\chapter;
use App\Models\ChapterComment;

use Illuminate\Http\Request;

class ChapterCommentController extends Controller
{
    
public function create(chapter $chapter){
       $chapters=chapter::all();
     return view("admin.chapterComment.create",["chapter"=>$chapter,"chapters"=>$chapters]);
    }
   
public function store(Request $request){
            $CommentId = ChapterComment::insertGetId([
                'comment' => $request->comment,
                'chapter_id' => $request->chapter_id,
                'user_id' => $request->user_id,
                'active' => $request->active,
                'active' => $request->active,
                'parent_id'=>0
                ]); 
            return redirect()->route("chapterComment.commentSingle",["chapter"=>$request->chapter_id]);


        }

 public function index(){
     $comments=ChapterComment::with("chapter")->get();
       return view("admin.chapterComment.index",["comments"=>$comments]);
 }

public function single(chapter $chapter){
    $chapter->load("chapterComments");
    foreach($chapter->chapterComments as $chapterComment){
        $chapter['chapterComments'] = $chapterComment;
    }
    return view("admin.chapterComment.single",["chapterComment"=>$chapterComment,"chapter"=>$chapter]);
}
}
