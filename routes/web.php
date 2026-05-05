<?php

use App\Http\Controllers\CourseAttachmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController; 

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
    'prefix' => '',
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