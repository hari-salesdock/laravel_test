<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('post/store', [PostController::class, 'store']);
Route::get('post/get/{id}', [PostController::class, 'get']);
Route::post('post/update/{id}', [PostController::class, 'update']);
Route::post('post/delete/{id}', [PostController::class, 'delete']);
