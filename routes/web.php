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

Auth::routes();

Route::get('/', ['App\Http\Controllers\UserController', 'new'])->name('new.user');
Route::post('/', ['App\Http\Controllers\UserController', 'create'])->name('create.user');
Route::get('/signOut', ['App\Http\Controllers\UserController', 'logout'])->name('logout.user');


Route::get('/topics', ['App\Http\Controllers\TopicController', 'index'])->name('index.topic');
Route::get('/topic/new', ['App\Http\Controllers\TopicController', 'new'])->name('new.topic');
Route::post('/topic/new', ['App\Http\Controllers\TopicController', 'create'])->name('create.topic');
Route::get('/topic/show', ['App\Http\Controllers\TopicController', 'show'])->name('show.topic');

Route::get('/topic/response', ['App\Http\Controllers\ResponseController', 'new'])->name('new.response');
