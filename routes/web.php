<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CourseAttachmentController;
use App\Http\Controllers\CourseCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMediaController;

Route::get('/', function () {
    return view('welcome');
});


/// courses

Route::group([
    'prefix' => 'course',
    'controller' => CourseController::class,
    'as' =>'course.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('courses');
    Route::get('/single/{course}', 'single')->name('single');
    Route::get('/edit/{course}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{course}', 'delete')->name('delete');
});


///CourseAtachment

Route::group([
    'prefix' => 'CourseAttachment',
    'controller' => CourseAttachmentController::class,
    'as' =>'CourseAttachment.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('index');
    Route::get('/single/{CourseAttachment}', 'single')->name('single');
    Route::get('/edit/{CourseAttachment}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{CourseAttachment}', 'delete')->name('delete');
});

///books

Route::group([
    'prefix' => 'books',
    'controller' => BooksController::class,
    'as' =>'books.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('index');
    Route::get('/single/{book}', 'single')->name('single');
    Route::get('/edit/{book}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{CourseAttachment}', 'delete')->name('delete');
     Route::get('/downlod/file/{book}' , 'downloadFile')->name('download');
});

///CourseMedia

Route::group([
    'prefix' => 'CourseMedia',
    'controller' => CourseMediaController::class,
    'as' =>'CourseMedia.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('index');
    Route::get('/single/{book}', 'single')->name('single');
    Route::get('/edit/{book}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{CourseAttachment}', 'delete')->name('delete');
});


Route::group([
    'prefix' => 'CourseComment',
    'controller' => CourseCommentController::class,
    'as' =>'CourseComment.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('index');
    Route::get('/single/{book}', 'single')->name('single');
    Route::get('/edit/{book}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{CourseAttachment}', 'delete')->name('delete');
});