<?php
Auth::routes();

Route::get('/', 'PostController@index')->name('posts.index');
Route::resource('/posts', 'PostController', ['except' => ['index']]);

Route::resource('/postuser', 'PostuserController', ['only' => ['store','destroy']]);
Route::resource('/posts.comments', 'CommentController');
Route::resource('/users', 'UserController');
Route::resource('/ratings', 'RatingController');
