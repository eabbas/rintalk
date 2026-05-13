<?php

namespace App\Http\Controllers;
use App\Models\student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function signup(){
       return view("admin.student.signupStudent");
    }


    public function store(Request $request){
          
        $studentId =student::insertGetId([
                'name' => $request->name,
                'family' => $request->family,
                'gender' => $request->gender,
                'parent_id' => 0,
                'age' => $request->age,
                ]);
             
            return redirect()->route("Student.studentIndex");
    }


    public function index(){
        $students=student::all();
        return view("admin.student.index",["students"=>$students]);
    }


    public function edit($id){
        $student=student::find($id);
       return view("admin.student.edit",["student"=>$student]);
    }


    public function update(Request $request){
        $student=student::find($request->id);
        $student->name=$request->name;
        $student->family=$request->family;
        $student->gender=$request->gender;
        $student->age=$request->age;
            $student->save();   
            return redirect()->route("Student.studentIndex");
    }


    public function delete($id){
       $student=student::find($id);
        $student->delete();
     return redirect()->route("Student.studentIndex");

    }
}
