<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    public function create()
    {
        $categories=category::all();
        return view('admin.category.create',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
    $path = null;
     if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('image')->storeAs('category_images', $fullName, 'public');
        }
        $category_id=category::insertGetId([
           'title' => $request->title,
           'parent_id' => $request->parent_id ,
           'image'=>$path,
           'description'=>$request->description
       ]);
        return to_route('category.list');
    }
     public function index()
    {
        $categories=category::all();
        return view("admin.category.index",['categories' => $categories]);
    }
    public function show(category $category)
    {
        return view("admin.category.single", ['category' => $category]);
    }
    public function edit(category $category)
    {
         $categories=category::all();
        return view('admin.category.edit', ['category' => $category , 'categories' => $categories]);
    }
    public function update(Request $request)
    {
        $category = category::find($request->id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
         if(isset($request->image)){
            $type = $request->image->getClientOriginalExtension();
            $name = $request->image->getClientOriginalName();
            $fullName = Str::uuid() . "_" . $name;
            $path = $request->file('image')->storeAs('category_images', $fullName, 'public');
            $category->image = $path;

        }
        $category->save();
        return to_route('category.list');
    }
    public function delete(category $category)
    {
         if ($category->image) {
              Storage::disk('public')->delete($category->image);
            }
        $category->delete();
        return to_route('category.list');
    }
    public function deleteAll(Request $request){
        foreach($request->categories as $category){
                $category->delete();
            }
        return to_route('category.list');
    }
}
