<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ApiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AlbumsController::class,'index']);
Route::get('/albums', [AlbumsController::class,'index']);
Route::get('/albums/create', [AlbumsController::class,'create']);
Route::post('/albums/store', [AlbumsController::class,'store']);
Route::get('albums/{id}',[AlbumsController::class,'show']);
Route::get('/photos/create/{albumId}', [PhotosController::class,'create']);
Route::post('/photos/store', [PhotosController::class,'store']);
Route::get('/photos/show/{id}',[PhotosController::class,'show']);
Route::delete('/photos/delete/{id}',[PhotosController::class,'destroy']);


Route::get('/api/albums',[ApiController::class,'albums']);