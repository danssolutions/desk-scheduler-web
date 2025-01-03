<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\EnsureAdmin;



// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/settings',function(){return view('settings');});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/scheduler', action:  [PostController::class, 'scheduler'])->name('scheduler');
    Route::get('/', function(){ return view('main');});
    Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
    Route::get('/about', function () {return view('about'); })->name('about');
    Route::get('/graph',[ChartController::class,'loadGraphPage']);
    Route::get('/main',function () {return view('main'); }) -> name('main');
});

require __DIR__.'/auth.php';

Route::get('/privacy', [HomeController::class, 'rules'])->name('websiteRegulations');

Route::get('/create',[PostController::class,'create']);
Route::post('/post',[PostController::class,'store']);
Route::delete('/delete/{id}',action: [PostController::class,'destroy']);
Route::get('/edit/{id}',action: [PostController::class,'edit']);
Route::put('/update/{id}',action: [PostController::class,'update']);

Route::put('/posts/{id}', [PostController::class, 'update']);

Route::middleware(['auth', EnsureAdmin::class])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::post('/admin/users/{id}/update-desk-id', [AdminController::class, 'updateDeskId'])->name('admin.update-desk-id');
    Route::delete('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.delete-user');
});

// Route::get('/notify', [PostController::class, 'notificationdesk']);



//Route::get('send',[HomeController::class,"sendnotification"]);