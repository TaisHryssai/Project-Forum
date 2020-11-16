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

//Auth::routes();

Route::get('/user', ['App\Http\Controllers\UserController', 'new'])->name('new.user');
Route::post('/user', ['App\Http\Controllers\UserController', 'create'])->name('create.user');

Route::get('/page/{page}', ['App\Http\Controllers\TopicController', 'index'])->name('admin.topic.page');
Route::get('/', ['App\Http\Controllers\TopicController', 'index'])->name('index.topic');
Route::get('/search/{term}/page/{page}', ['App\Http\Controllers\TopicController', 'index'])->name('admin.search.topic.page');
Route::get('/search/{term}', ['App\Http\Controllers\TopicController', 'index'])->name('admin.search.topics');

Route::get('/user/{id}/topic/new', ['App\Http\Controllers\TopicController', 'new'])->name('new.topic');
Route::post('/user/{id}/topic/new', ['App\Http\Controllers\TopicController', 'create'])->name('create.topic');
Route::get('/user/topic/{id}/show', ['App\Http\Controllers\TopicController', 'show'])->name('show.topic');

Route::get('/topic/{id}/response/user', ['App\Http\Controllers\UserController', 'newUser'])->name('new.user.response');
Route::post('/topic/{id}/response/user', ['App\Http\Controllers\UserController', 'createUser'])->name('create.user.response');

Route::get('/user/{user_id}/topic/{id}/response', ['App\Http\Controllers\ResponseController', 'new'])->name('new.response');
Route::post('/user/{user_id}/topic/{id}/response', ['App\Http\Controllers\ResponseController', 'create'])->name('create.response');



