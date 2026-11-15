<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courseSteps;


class CourseStepsController extends Controller{
    public function create($id){
        return view('admin.generalcourse.createstep' , ['id'=>$id]);
    }
    public function store(Request $request){
        $name=$request->image->getClientOriginalName();
        $fullName=time().'_'.$name;
        $imgpath=$request->file('image')->storeAs('courseSteps', $fullName, 'public');
        courseSteps::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'step'=>$request->step,
            'img'=>$imgpath,
            'course_id'=>$request->id
        ]);
        return to_route('coursestep.list');
    }
    public function index(){
        $coursesteps=courseSteps::all();
        return view('admin/generalcourse.stepindex' , ['coursesteps'=>$coursesteps]);
    }
    public function edit(courseSteps $id){
        return view('admin.generalcourse.stepedit' , ['courseSteps'=>$id]);
    }
    public function update(Request $request){
        $step=courseSteps::find($request->id);
        if(isset($request->image)){
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $imagePath = $request->file('image')->storeAs('courses', $fullName, 'public');
            $step->img=$imagePath;
        }
        $step->title=$request->title;
        $step->description=$request->description;
        $step->step=$request->step;
        $step->save();
        return to_route('coursestep.list');
    }
    public function delete(courseSteps $id){
        $id->delete();
        return to_route('coursestep.list');
    }
}
