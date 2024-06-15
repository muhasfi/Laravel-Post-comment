<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', App\Http\Controllers\TimelineController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::post('posts' , App\Http\Controllers\Post\PostStoreController::class)->name('posts.store');
Route::get('posts/{id}/edit' , App\Http\Controllers\Post\PostEditController::class)->name('posts.edit');
Route::put('posts/{id}' , App\Http\Controllers\Post\PostUpdateController::class)->name('posts.update');
Route::delete('posts/{id}' , App\Http\Controllers\Post\PostDeleteController::class)->name('posts.destroy');

Route::get('posts/{post}' , App\Http\Controllers\Post\PostCommentController::class)->name('posts.comment');
Route::post('posts/{post}/comment' , App\Http\Controllers\Post\StoreCommentController::class)->name('comment.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
