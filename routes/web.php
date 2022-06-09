<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\CommentController;

Auth::routes();
Route::get('/', [App\Http\Controllers\Front\HomePageController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\Front\HomePageController::class, 'index'])->name('home');

Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
Route::post('/post/store',[PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
// Route::put('/post/update/{id}',[PostController::class, 'update'])->name('post.update');
Route::put('/post/update',[PostController::class, 'update'])->name('ajax.update');
// Route::get('/post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
Route::post('post/delete',[PostController::class,'delete'])->name('ajax.delete');
Route::get('/post/show/{id}',[PostController::class, 'showOnePost'])->name('post.showOnePost');

Route::get('/comments/{post_id}',[CommentController::class, 'getCommentsByPost'])->name('post.comments');
Route::post('/comment/create/{post_id}',[CommentController::class, 'create'])->name('comment.create');
Route::post('/comment/store/',[CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/edit/{id}',[CommentController::class, 'edit'])->name('comment.edit');
Route::Put('/comment/update',[CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete',[CommentController::class, 'delete'])->name('comment.delete');


//social login
Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);

// Route::get('/message',function(){
//     return view('front.message');
// });
Route::get('/message',[App\Http\Controllers\Message::class,'index']);
Route::post('/message-send',[App\Http\Controllers\Message::class,'makeMsg'])->name('sendMsg');
Route::post('/message/store',[App\Http\Controllers\Message::class,'store'])->name('messages.store');