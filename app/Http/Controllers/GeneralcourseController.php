<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\generalcourse;
use App\Models\courseSteps;

class GeneralcourseController extends Controller{
    public function create(){
        $course=generalcourse::first();
        return view('admin.generalcourse.create', ['course'=>$course]);
    }
    public function store(Request $request){
        // dd($request->all());
        $imagePath = null;
        if(isset($request->image)){
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $imagePath = $request->file('image')->storeAs('courses', $fullName, 'public');
        }
        generalcourse::upsert([
            'id'=>$request->id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'status'=>$request->stauts?1:0,
            'img'=>$imagePath
        ], ['id'] , ['title','description','price','discount','img']);
        return to_route('course.courses');
    }
    public function delete($id){
        $course=generalcourse::find($id)->delete();
        $coursestep=courseSteps::where('course_id' , $id)->get();
        foreach($coursestep as $step){
            $step->delete();
        }
        return to_route('course.courses');
    }
}
