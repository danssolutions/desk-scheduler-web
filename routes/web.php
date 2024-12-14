<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DeskController;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/settings',function(){return view('settings');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/', action:  [PostController::class, 'index'])->name('index');
    Route::get('/profilepage', function(){ return view('profile');});
    Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
    Route::get('/about', function () {return view('about'); })->name('about');
    Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/graph',[ChartController::class,'loadGraphPage']);
    Route::get('/scheduleradmin', function(){ return view('scheduleradmin');});
    Route::get('/main',function () {return view('analyticsadmin'); }) -> name('analytics');
});

require __DIR__.'/auth.php';



Route::get('/create',[PostController::class,'create']);
Route::post('/post',[PostController::class,'store']);
Route::delete('/delete/{id}',action: [PostController::class,'destroy']);
Route::get('/edit/{id}',action: [PostController::class,'edit']);
Route::put('/update/{id}',action: [PostController::class,'update']);

Route::put('/posts/{id}', [PostController::class, 'update']);

// Route::get('/notify', [PostController::class, 'notificationdesk']);



//Route::get('send',[HomeController::class,"sendnotification"]);