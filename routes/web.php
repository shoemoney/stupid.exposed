<?php


Event::listen('illuminate.query', function($query)
{
    //var_dump($query);
});


Auth::routes();


Route::get('home', 'HomeController@index');
// list all posts
Route::get('posts',['as' => 'posts', 'uses' =>'SKE\Posts\Controllers\PostController@index']);
Route::get('post', function(){
    return redirect()->route('posts');
});
Route::group([/*'middleware' => 'auth'*/], function()
{
    Route::get('post/create/video','VideoController@create');
    Route::post('post/create/video','VideoController@store');
    Route::get('post/create/gallery','ImageController@create');
    Route::post('post/create/gallery','ImageController@store');
    Route::get('post/create/story','StoryController@create');
    Route::post('post/create/story','StoryController@store');
    Route::get('post/create','SKE\Posts\Controllers\PostController@create');
    //Route::post('post/create','PostController@store');
    Route::get('post/edit/{slug}','SKE\Posts\Controllers\PostController@edit');
    Route::put('post/edit/{slug}','SKE\Posts\Controllers\PostController@update');
    Route::delete('post/exterminate/{slug}','SKE\Posts\Controllers\PostController@destroy');
});
Route::get('post/{slug}/comments','CommentController@show');
Route::get('post/{slug}',['as'=>'post','uses'=>'SKE\Posts\Controllers\PostController@show']);
// list all categories
Route::get('categories',['as'=>'categories','uses'=>'CategoryController@index']);
Route::get('category', function(){
    return redirect()->route('categories');
});
// list all posts belonging to a category
Route::get('category/{category}','CategoryController@show');
Route::post('comment','CommentController@store');
