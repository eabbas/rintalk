<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\UserMiddleware;
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
//Text
use App\Http\Controllers\TextController;
//leitnary
use App\Http\Controllers\LeitnaryController;


Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware([UserMiddleware::class]);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware([LoginMiddleware::class]);
Route::get('/signup', [UserController::class, "create"])->name('signup')->middleware([LoginMiddleware::class]);
Route::post('/check', [UserController::class, "checkAuth"])->name('checkAuth');

Route::group([
    'prefix' => 'users',
    'controller' => UserController::class,
    'as' => 'user.',
    'middleware' => [UserMiddleware::class]
], function () {
    Route::post("/store", "store")->name('store')->withoutMiddleware([UserMiddleware::class]);
    Route::post("/check", "check")->name('check')->withoutMiddleware([UserMiddleware::class]);
    Route::get("/logout", "logout")->name('logout');
    Route::get("/", "index")->name('list');
    Route::get("/panel/{user}", "panel")->name('panel');
    Route::get('/profile/{user?}', 'profile')->name('profile');
    Route::get('/show/{user}', 'show')->name('show');
    Route::get("/edit/{user}", "edit")->name('edit');
    Route::post("/update", "update")->name('update');
    Route::get("/delete/{user}", "delete")->name('delete');
    Route::get('/compelete', 'compelete_form')->name('compelete_form');
    Route::post('/save', 'save')->name('save');
    Route::get('/setting', 'setting')->name('setting');
    Route::post('/set', 'set')->name('set');
    route::post('/set_order', 'set_order')->name('set_order');
    Route::get('/create_user', 'create_user')->name('create_user');
    Route::post('/store_user', 'store_user')->name('store_user');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});



/// text

Route::group([
    'prefix' => 'Text',
    'controller' => TextController::class,
    'as' =>'Text.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/single/{Text}', 'single')->name('single');
    Route::get('/showMeaning/{Text}', 'showMeaning')->name('showMeaning');
    Route::post('/saveMeanings', 'saveMeanings')->name('saveMeanings');
    Route::get('/setMeaning/{Text}', 'setMeaning')->name('setMeaning');
    Route::post('/saveSentenceMeanings', 'saveSentenceMeanings')->name('saveSentenceMeanings');
    Route::get('/setSentenceMeaning/{Text}', 'setSentenceMeaning')->name('setSentenceMeaning');
    Route::get('/index' , 'index')->name('texts');
    Route::get('/delete/{id}', 'delete')->name('delete');


  ///leitnary
});
Route::group([
    'prefix' => 'leitnary',
    'controller' => LeitnaryController::class,
    'as' =>'leitnary.',
], function(){
    Route::get('/create', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/userLeitnary', 'userLeitnary')->name('userLeitnary');
    Route::post('/delete', 'delete')->name('delete');
    Route::post('/review', 'review')->name('review');
    Route::post('/getWords', 'getWords')->name('getWords');
    // Route::get('/single/{SeperateSentense}', 'single')->name('single');
    // Route::get('/showMeaning/{SeperateSentense}', 'showMeaning')->name('showMeaning');
    // Route::get('/index' , 'index')->name('leitnarys');


  
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
    Route::get('/courseUserList/{course}' , 'courseUserList')->name('courseUserList');
    Route::post('/sendRequestToPartner/{User?}' , 'sendRequestToPartner')->name('sendRequestToPartner');
    Route::get('/requestList' , 'requestList')->name('requestList');
    Route::post('/acceptRequest' , 'acceptRequest')->name('acceptRequest');
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
    Route::get('/create/{chapter?}', 'create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/index' , 'index')->name('lessons');
    Route::get('/chapterLesson/{chapter}' , 'chapterLesson')->name('chapterLesson');
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
    Route::get('/create/{course}', 'create')->name('create');
    Route::get('/index', 'index')->name('ChapterIndex');
    Route::get('/edit/{id}', 'edit')->name('ChapterEdit');
    Route::get('/delete/{id}', 'delete')->name('DeleteChapter');
    Route::post('/update', 'update')->name('UpdateChapter');
    Route::post('/store' , 'store')->name('chapterStore');
    Route::get('/indexChapterOfCourse/{course}' , 'indexChapterOfCourse')->name('ChapterOfCourse');

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