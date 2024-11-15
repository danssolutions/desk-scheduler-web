<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function () {
    return view('about'); 
});


Route::get('/',[PostController::class,'index']);

Route::get('/create',function(){
    return view('create');
});

Route::post('/post',[PostController::class,'store']);

Route::delete('/delete/{id}',action: [PostController::class,'destroy']);

Route::get('/edit/{id}',action: [PostController::class,'edit']);


Route::put('/update/{id}',action: [PostController::class,'update']);


require __DIR__.'/auth.php';
