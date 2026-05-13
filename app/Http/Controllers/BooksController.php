<?php

namespace App\Http\Controllers;
use App\Models\books;
use App\Models\level;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
   public function create(){
    $levels = level::all();
    $statuses = status::all();
        return view('admin.books.create' , ['levels'=>$levels , 'statuses'=>$statuses]);
    }

    public function store(Request $request){
        $image = null;
         if (isset($request->file_path)) {
        $name = $request->file_path->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $file_path = $request->file('file_path')->storeAs('files', $fullName, 'public');
        }
        if (isset($request->image)) {
        $name =  $request->image->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $image = $request->file('image')->storeAs('files', $fullName, 'public');
    }
             $booksId = books::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'price' => $request->price,
                'discount' => $request->discount,
                'level_id' => $request->level_id,
                'status_id' => $request->status_id,
                'active' => $request->active  ? 1 : 0,
                'show_in_home' => $request->show_in_home  ? 1 : 0,
                'file_path' => $file_path,
                'image'=> $image
             ]);
        return to_route('books.index');
    }

    public function index(){
        $books = books::all();
        return view('admin.books.index' , ['books'=>$books]);
    }

    public function edit(books $book){
        $book = books::find($book->id);
        $levels = level::all();
        $statuses = status::all();
        return view('admin.books.edit' , ['book'=>$book, 'levels'=>$levels, 'statuses'=>$statuses]);
    }

    public function update(Request $request){
        $image = null;
        if (isset($request->file_path)) {
        $name = $request->file_path->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $file_path = $request->file('file_path')->storeAs('files', $fullName, 'public');
        }
        if (isset($request->image)) {
        $name =  $request->image->getClientOriginalName();
        $fullName = Str::uuid() . '_' . $name;
        $image = $request->file('image')->storeAs('files', $fullName, 'public');
    }
        $book = books::find($request->book_id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->summary = $request->summary;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->level_id = $request->level_id;
        $book->status_id = $request->status_id;
        $book->active = $request->active ? 1 : 0;
        $book->show_in_home = $request->show_in_home ? 1 : 0;
        $book->file_path =  $file_path;
        $book->image =  $image;
        $book->save();
        return to_route('books.index');
    }

    public function single(books $book){
        $book = books::find($book->id);
        return view('admin.books.single' , ['book'=>$book]);
    }

     public function downloadFile(books $book){
    return Storage::disk("public")->download($book->file_path);                 
    }

     public function delete($id){
         books::find($id)->delete();
         return to_route('books.index');
    }
}
