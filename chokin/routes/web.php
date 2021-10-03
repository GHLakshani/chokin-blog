<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
use App\http\Controllers\UserController;
use App\http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'home']);

Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);

Route::get('/admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category','CategoryController');

Route::get('/admin/user/{id}/delete',[UserController::class,'destroy']);
Route::resource('admin/user','UserController');

