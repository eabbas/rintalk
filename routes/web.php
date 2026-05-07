<?php

use Illuminate\Support\Facades\Route;
///course
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CourseAttachmentController;
use App\Http\Controllers\CourseCommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMediaController;
//chapter
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterAtachmentController;
use App\Http\Controllers\ChapterMediaController;
use App\Http\Controllers\ChapterCommentController;
//student
use App\Http\Controllers\StudentController;
//lesson
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LessonAttachmentController;
use App\Http\Controllers\LessonCommentController;
use App\Http\Controllers\LessonMediaController;
use App\Http\Controllers\CategoryController;

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
     Route::get('/medias/{course}' , 'media')->name('medias');
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
    'prefix' => 'courseMedia',
    'controller' => CourseMediaController::class,
    'as' =>'courseMedia.',
], function(){
    Route::get('/create/{course?}', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('index');
    Route::get('/single/{courseMedia}', 'single')->name('single');
    Route::get('/edit/{courseMedia}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{courseMedia}', 'delete')->name('delete');
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

/////////////////////////////////////

///student
Route::group([
    'prefix' =>'student',
    'controller'=> StudentController::class,
    'as' =>'Student.',
], function(){
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/store' , 'store')->name('studentStore');
    Route::get('/index' , 'index')->name('studentIndex');
    Route::get('/edit/{id}' , 'edit')->name('editStudent');
    Route::post('/update' , 'update')->name('updateStudent');
    Route::get('/delete/{id}' , 'delete')->name('deleteStudent');
});

////////////////////////////////////////

///lesson
Route::group([
    'prefix' => 'lesson',
    'controller' => LessonController::class,
    'as' =>'lesson.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('lessons');
    Route::get('/class_list/{lesson}' , 'class_list')->name('class_list');
    Route::get('/single/{lesson}', 'single')->name('single');
    Route::get('/edit/{lesson}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{lesson}', 'delete')->name('delete');
});
///LessonAttachment
Route::group([
    'prefix' => 'LessonAttachment',
    'controller' => LessonAttachmentController::class,
    'as' =>'LessonAttachment.',
], function(){
    Route::get('/create/{lesson}', 'create')->name('create');
    Route::get('/createLessonAttachment', 'createLessonAttachment')->name('createLessonAttachment');
    Route::post('/store','store')->name('store');
    Route::get('/index/{lesson?}' , 'index')->name('LessonAttachments');
    Route::get('/single/{LessonAttachment}', 'single')->name('single');
    Route::get('/edit/{LessonAttachment}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{LessonAttachment}', 'delete')->name('delete');
});
///LessonMedia
Route::group([
    'prefix' => 'LessonMedia',
    'controller' => LessonMediaController::class,
    'as' =>'LessonMedia.',
], function(){
    Route::get('/create/{lesson}', 'create')->name('create');
     Route::get('/createLessonMedia', 'createLessonMedia')->name('createLessonMedia');
    Route::post('/store','store')->name('store');
    Route::get('/index/{lesson?}' , 'index')->name('LessonMedias');
    Route::get('/single/{LessonMedia}', 'single')->name('single');
    Route::get('/edit/{LessonMedia}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{LessonMedia}', 'delete')->name('delete');
});
///LessonComment
Route::group([
    'prefix' => 'LessonComment',
    'controller' => LessonCommentController::class,
    'as' =>'LessonComment.',
], function(){
    Route::get('/create/{lesson}', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('LessonComments');
    Route::get('/single/{LessonComment}', 'single')->name('single');
    Route::get('/edit/{LessonComment}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{LessonComment}', 'delete')->name('delete');
});
///Category
Route::group([
    'prefix' => 'category',
    'controller' => categoryController::class,
    'as' => 'category.',
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/categories', 'index')->name('list');
    Route::get('/edit/{category}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/show/{category}', 'show')->name('single');
    Route::get('/delete/{category}', 'delete')->name('delete');
});
//////////////////////////////////////////////////////////////////

//chapter
Route::group([
    'prefix' =>'chapter',
    'controller' => ChapterController::class,
    'as' =>'chapter.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::get('/index', 'index')->name('ChapterIndex');
    Route::get('/edit/{id}', 'edit')->name('ChapterEdit');
    Route::get('/delete/{id}', 'delete')->name('DeleteChapter');
    Route::post('/update', 'update')->name('UpdateChapter');
    Route::post('/store' , 'store')->name('chapterStore');
});


///chapterAtachment
Route::group([
    'prefix' =>'chapterAtachment',
    'controller' => ChapterAtachmentController::class,
    'as' =>'chapterAtachment.',
], function(){
    Route::get('/create/{chapter}', 'create')->name('create');
    Route::get('/index', 'index')->name('chapterAtachmentIndex');
    Route::get('/edit/{id}', 'edit')->name('chapterAtachmentEdit');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/update', 'update')->name('chapterAtachmentUpdate');
    Route::post('/store' , 'store')->name('chapterAtachmentStore');
});

//chapterMedia
Route::group([
    'prefix' =>'chapterMedia',
    'controller'=> ChapterMediaController::class,
    'as' =>'chapterMedia.',
], function(){
    Route::get('/create/{chapter}', 'create')->name('create');
    Route::get('/index', 'index')->name('chapterMediaIndex');
    Route::get('/edit/{id}', 'edit')->name('chapterMediaEdit');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/update', 'update')->name('chapterMediaUpdate');
    Route::post('/store' , 'store')->name('chapterMediaStore');
});
////chapterComment
Route::group([
    'prefix' =>'chapterComment',
    'controller'=> ChapterCommentController::class,
    'as' =>'chapterComment.',
], function(){
    Route::get('/create/{chapter}', 'create')->name('create');
    Route::post('/store' , 'store')->name('commentStore');
    Route::get('/single/{chapter}' , 'single')->name('commentSingle');
    Route::get('/index' , 'index')->name('commentIndex');
});