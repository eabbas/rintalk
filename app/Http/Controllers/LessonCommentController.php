<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\LessonComment;
class LessonCommentController extends Controller
{
    //  public function create()
    // {
    //     return view('admin.LessonComment.create');
    // }
    // public function store(Request $request)
    // {
    //     $LessonComment_id=LessonComment::create([
    //        'comment' => $request->comment,
    //        'parent_id' => $request->parent_id ,
    //        'lesson_id' => $request->lesson_id ,
    //        'user_id' => Auth::id() ,
    //        'active'=> $request->active ? 1 : 0,
    //    ]);
    //     return to_route('LessonComment.list');
    // }
    //  public function index()
    // {
    //     return view("admin.LessonComment.index");
    // }
    // public function show(LessonComment $LessonComment)
    // {
    //     return view("admin.LessonComment.single", ['LessonComment' => $LessonComment]);
    // }
    // public function edit(LessonComment $LessonComment)
    // {
    //     return view('admin.LessonComment.edit', ['LessonComment' => $LessonComment]);
    // }
    // public function update(Request $request)
    // {
    //     $LessonComment = LessonComment::find($request->id);
    //     $LessonComment->parent_id = $request->parent_id;
    //     $lessonComment->active= $request->active ? 1 : 0;
    //     $LessonComment->parent_id = $request->parent_id;
    //     $LessonComment->comment = $request->comment;
    //     $LessonComment->save();
    //     return to_route('LessonComment.list');
    // }
    // public function delete(LessonComment $LessonComment)
    // {
    //     $LessonComment->delete();
    //     return to_route('LessonComment.list');
    // }
}
