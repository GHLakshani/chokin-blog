<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
use App\http\Controllers\UserController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\PostController;
use App\http\Controllers\SettingController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/detail/{id}',[HomeController::class,'detail']);
Route::get('/all-categories',[HomeController::class,'all_category']);
Route::get('/category/{id}',[HomeController::class,'category_posts']);
Route::post('/save-comment/{id}',[HomeController::class,'save_comment']);
Route::get('save-post-form',[HomeController::class,'save_post_form']);
Route::post('save-post-form',[HomeController::class,'save_post_data']);
Route::get('manage-posts',[HomeController::class,'manage_posts']);
Route::get('update-posts/{id}',[HomeController::class,'edit_posts']);
Route::post('update-posts/{id}',[HomeController::class,'update_posts']);
Route::get('manage-posts/{id}',[HomeController::class,'destroy_posts']);

Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);

Route::get('/admin/comment',[AdminController::class,'comments']);
Route::get('/admin/comment/{id}/delete',[AdminController::class,'delete_comment']);
//category
Route::get('/admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category','CategoryController');
//post
Route::get('/admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post','PostController');
//setting
Route::get('/admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'save_settings']);
//user
Route::get('/admin/user/{id}/delete',[UserController::class,'destroy']);
Route::resource('admin/user','UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
