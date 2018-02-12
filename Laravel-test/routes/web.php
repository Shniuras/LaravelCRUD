<?php

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

Route::get('/index', "HomeController@index" )->name('index');
Route::get('/create', "PostsController@Create")->name('create');
Route::post('/store', "PostsController@Store")->name('store');
Route::get('/all', "HomeController@admin")->name('all');
Route::post('/comment-created/{post_id}', "CommentsController@Create")->name('comment-created');
Route::get('/delete/{id}', 'PostsController@postsDelete')->name('delete');
Route::post('/update/{id}', 'PostsController@Update')->name('update');
Route::get('/edit/{id}', "PostsController@Edit")->name('edit');
Route::get('/single/{id}', "PostsController@Single")->name('single');


