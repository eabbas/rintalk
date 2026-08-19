<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\course;
use App\Models\CourseAttachment;
use App\Models\CourseCategory;
use App\Models\level;
use App\Models\partnerRequests;
use App\Models\status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

class CourseController extends Controller
{
    public function create()
    {
        $levels = level::all();
        $statuses = status::all();
        $categories = category::all();
        return view('admin.course.create', ['levels' => $levels, 'statuses' => $statuses, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $imagePath = null;
        if(isset($request->image)){
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $imagePath = $request->file('image')->storeAs('courses', $fullName, 'public');
        }
        $courseId = course::insertGetId([
            'user_id' => 1,
            'master_name' => $request->master_name,
            'title' => $request->title,
            'description' => $request->description,
            'summary' => $request->summary,
            'duration' => $request->duration,
            'price' => $request->price,
            'discount' => $request->discount,
            'level_id' => $request->level_id,
            'status_id' => $request->status_id,
            'active' => $request->active,
            'show_in_home' => $request->show_in_home,
            'prerequisite' => $request->prerequisite,
            'image'=>$imagePath
        ]);
        foreach($request->category_id as $catId){
            courseCategory::create([
                'course_id' => $courseId,
                'category_id' => $catId,
            ]);
        }
        return to_route('course.courses');
    }

    public function index()
    {
        $courses = course::all();
        return view('admin.course.index', ['courses' => $courses]);
    }

    public function edit(course $course)
    {
        $levels = level::all();
        $statuses = status::all();
        $categories = category::all();
        $course->catIds = courseCategory::where('course_id', $course->id)->pluck('category_id')->toArray();
        return view('admin.course.edit', ['course' => $course, 'levels' => $levels, 'statuses' => $statuses, 'categories' => $categories]);
    }

    public function update(Request $request)
    {
        $course = course::find($request->course_id);
        if(isset($request->image)){
            if($course->image){
                Storage::disk('public')->delete($course->image);
            }
            $name = $request->image->getClientOriginalName();
            $fullName = time().'_'.$name;
            $imagePath = $request->file('image')->storeAs('courses', $fullName, 'public');
            $course->image = $imagePath;
        }
        courseCategory::where('course_id', $course->id)->delete();
        foreach($request->category_id as $catId){
            courseCategory::create([
                'course_id' => $course->id,
                'category_id' => $catId,
            ]);
        }
        $course->user_id = 1;
        $course->master_name = $request->master_name;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->summary = $request->summary;
        $course->duration = $request->duration;
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->level_id = $request->level_id;
        $course->status_id = $request->status_id;
        $course->active = $request->active;
        $course->show_in_home = $request->show_in_home;
        $course->prerequisite = $request->prerequisite;
        $course->save();
        return to_route('course.courses');
    }

    public function single(course $course)
    {
        $course = course::find($course->id);
        return view('admin.course.single', ['course' => $course]);
    }

    public function media(course $course)
    {
        return view('admin.course.medias', ['course' => $course]);
    }

    public function delete($id)
    {
        $course = course::find($id)->delete();
        if ($course->media->file_path) {
            Storage::disk('public')->delete($course->media->file_path);
        }
        return to_route('course.courses');
    }

    public function CreateChapter(course $course)
    {
        return view('admin.course.createChapter');
    }

    // public function courseUserList(course $course){
    //     $courseUsers=$course->users;
    //     // dd($courseUsers);
    //     $authUser=User::find(1);
    //     $status = partnerRequests::where('user_id', $authUser->id)->where('status', 1)->first();
    //     return view("admin.course.courseUserList",['courseUsers'=>$courseUsers,'status'=>$status ,'authUser'=>$authUser]);

    // }
    // public function requestList(){
    //     $requests=null;
    //     $authUser=User::find(2);
    //     $partnerRequests=partnerRequests::where('applicant',$authUser->id)->get();
    //     $status = partnerRequests::where('user_id', $authUser->id)->where('status', 1)->first();

    //     // dd($partnerRequests);
    //     foreach($partnerRequests as $partner){
    //     $requests[]=User::find($partner->user_id);
    //     }
    //     // dd($requests);
    //     return view("admin.course.requestList",['requests'=>$requests,'status'=>$status]);

    // }
    // public function sendRequestToPartner(User $User){
    //     $authUser=User::find(1);
    //     // dd($authUser);
    //     partnerRequests::create(['user_id'=>$authUser->id ,'applicant'=>$User->id ,'status'=>0]);
    //     return to_route('course.courses');
    // }
    public function requestList()
    {
        $requests = null;
        $authUser = Auth::user();
        $partnerRequests = partnerRequests::where('applicant', $authUser->id)->get();
        $status = partnerRequests::where('applicant', $authUser->id)->where('status', 1)->first();
        $partnerCount = partnerRequests::where('applicant', $authUser->id)->where('status', 1)->count();
        foreach ($partnerRequests as $partner) {
            $requests[] = User::find($partner->user_id);
        }
        return view('admin.course.requestList', ['requests' => $requests, 'status' => $status, 'partnerCount' => $partnerCount]);
    }

    public function courseUserList(course $course)
    {
        $courseUsers = $course->users;
        $authUser = Auth::user();
        $status = partnerRequests::where('user_id', $authUser->id)->where('status', 1)->first();
        $sentRequests = partnerRequests::where('user_id', $authUser->id)->where('status', 0)->pluck('applicant')->toArray();
        $sentRequestsCount = partnerRequests::where('user_id', $authUser->id)->where('status', 0)->count();

        return view('admin.course.courseUserList', ['courseUsers' => $courseUsers, 'status' => $status, 'authUser' => $authUser, 'sentRequests' => $sentRequests, 'sentRequestsCount' => $sentRequestsCount]);
    }

    public function sendRequestToPartner(Request $request)
    {
        $authUser = Auth::user();
        $userId = $request->user_id;

        $oneRequest = partnerRequests::where('user_id', $authUser->id)->where('status', 1)->first();
        if ($oneRequest) {
            return response()->json([
                'success' => false,
                'message' => 'شما قبلاً یک هم‌تیم تایید کرده‌اید'
            ]);
        }

        $requestCount = partnerRequests::where('user_id', $authUser->id)->where('status', 0)->count();
        if ($requestCount >= 2) {
            return response()->json([
                'success' => false,
                'message' => 'شما فقط میتوانید به 2 کاربر درخواست ارسال کنید'
            ]);
        }

        $existingRequest = partnerRequests::where('user_id', $authUser->id)->where('applicant', $userId)->first();
        if ($existingRequest) {
            return response()->json([
                'success' => false,
                'message' => 'شما قبلاً به این کاربر درخواست ارسال کرده‌اید'
            ]);
        }

        $partnerRequest = partnerRequests::create([
            'user_id' => $authUser->id,
            'applicant' => $userId,
            'status' => 0
        ]);

        if ($partnerRequest) {
            return response()->json([
                'success' => true,
                'message' => 'درخواست با موفقیت ارسال شد'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'خطادرارسال درخواست'
        ]);
    }

    public function acceptRequest(Request $request)
    {
        $authUser = Auth::user();
        $user = User::find($request->user_id);
        $partnerCount = partnerRequests::where('applicant', $authUser->id)->where('status', 1)->count();
        if ($partnerCount >= 2) {
            return response()->json([
                'success' => false,
                'message' => 'شما فقط میتوانید 2 کاربر را تایید کنید'
            ]);
        }

        $partnerRequests = partnerRequests::where('user_id', $authUser->id)->where('status', 1)->first();
        if ($partnerRequests) {
            return response()->json([
                'success' => false,
                'message' => 'شما قبلاً یک کاربر را تایید کرده‌اید'
            ]);
        }
        $x = partnerRequests::where('applicant', $authUser->id)->where('user_id', $user->id)->update(['status' => 1]);
        if ($x) {
            return response()->json([
                'success' => true,
                'message' => 'کاربر با موفقیت تایید شد'
            ]);
        }
    }

    public function listcourseuser()
    {
        $courses = course::select('*', DB::raw("IFNULL(image , 'home/file_0000000068a071f4b4abc9e3fcc298aa.png') image"))->get();
        return view('admin.course.listcourseuser', ['courses' => $courses]);
    }
}
