<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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
Route::get('/album',[ApiController::class,'albums']);
Route::get('/photos',[ApiController::class,'photos']);
Route::get('/album/{id}',[ApiController::class,'album']);
Route::get('/albums',[ApiController::class,'albumwphoto']);
Route::post('/album/create',[ApiController::class,'createAlbum']);