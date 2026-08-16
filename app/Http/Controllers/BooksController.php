<?php

namespace App\Http\Controllers;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\level;
use App\Models\status;


class BooksController extends Controller
{
   public function create(){
    $levels = level::all();
    $statuses = status::all();
        return view('admin.books.create' , ['levels'=>$levels , 'statuses'=>$statuses]);
    }

    public function store(Request $request){
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
             $booksId = Books::insertGetId([
                'title' => $request->title,
                'description' => $request->description,
                'summary' => $request->summary,
                'price' => $request->price,
                'discount' => $request->discount,
                'level_id' => $request->level_id,
                'status_id' => $request->status_id,
                'active' => $request->active,
                'show_in_home' => $request->show_in_home,
                'file_path' => $file_path,
                'image'=> $image
             ]);
        return to_route('books.index');
    }

    public function index(){
        $books = Books::all();
        return view('admin.books.index' , ['books'=>$books]);
    }

    public function edit(Books $book){
        $book = Books::find($book->id);
        return view('admin.books.edit' , ['book'=>$book]);
    }

    public function update(Request $request){
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
        $book = Books::find($request->book_id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->summary = $request->summary;
        $book->price = $request->price;
        $book->discount = $request->discount;
        $book->level_id = $request->level_id;
        $book->status_id = $request->status_id;
        $book->active = $request->active;
        $book->show_in_home = $request->show_in_home;
        $book->file_path =  $file_path;
        $book->image =  $image;
        $book->save();
        return to_route('books.index');
    }

    public function single(books $book){
        $book = Books::find($book->id);
        return view('admin.books.single' , ['book'=>$book]);
    }

     public function downloadFile(Books $book){
    return Storage::disk("public")->download($book->file_path);                 
    }

     public function delete($id){
         Books::find($id)->delete();
         return to_route('books.index');
    }
}
