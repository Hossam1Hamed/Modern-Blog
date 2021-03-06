<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pay/{user_id}/',[\App\Http\Controllers\FatoorahController::class,'payOrder'])->name('pay');
Route::get('/callBack',[App\Http\Controllers\FatoorahController::class,'callBack']);

// Route::get('callback',function(){
//     return "success";
// });
Route::get('error',function(){
    return "payment Failed";
});
Route::get('message',[App\Http\Controllers\Message::class,'makeMsg']);