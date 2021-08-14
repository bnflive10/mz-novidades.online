<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\crudController;
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



Route::get('',[frontController::class, 'index']);

Route::get('author',[frontController::class, 'author']);

Route::get('categoria/{category_id}',[frontController::class, 'categoria']);

Route::get('category-02',[frontController::class, 'category02']);

Route::get('category-03',[frontController::class, 'category03']);

Route::get('contacto',[frontController::class, 'contact']);

Route::get('post/{slug}',[frontController::class, 'single']);

Route::get('search-content', [frontController::class, 'searchContent']);


//admin painel

Route::get('add-post',[adminController::class, 'addPost']);

Route::get('category',[adminController::class, 'category']);

Route::get('mz-painel',[adminController::class, 'admin']);

Route::get('login',[adminController::class, 'login']);

Route::get('menu',[adminController::class, 'menu']);

Route::get('all-posts',[adminController::class, 'allPosts']);

//DB rotes category
Route::post('addcategory',[crudController::class, 'insertData']);

Route::get('editcategory/{id}',[adminController::class, 'editCategory']);
Route::post('updatecategory/{id}',[crudController::class, 'updateData']);
Route::post('multipledelete',[adminController::class, 'multipleDelete']);

//settings
Route::get('settings',[adminController::class, 'settings']);
Route::post('addsettings',[crudController::class, 'insertData']);
Route::post('updatesettings/{id}',[crudController::class, 'updateData']);
Route::post('addpost',[crudController::class, 'insertData']);
Route::get('editpost/{id}',[adminController::class, 'editPost']);
Route::post('updatepost/{id}',[crudController::class, 'updateData']);