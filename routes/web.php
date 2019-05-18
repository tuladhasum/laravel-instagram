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


Auth::routes();


Route::post('follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index');
Route::get('/p/create', 'PostsController@create')->name('post.create');
Route::post('/p', 'PostsController@store')->name('post.store');
Route::get('/p/{post}', 'PostsController@show')->name('post.show');

Route::post('/p/{post}/like', 'LikeController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::group(['prefix'=>'kb','middleware'=>'auth'], function(){

   Route::get('/','HomeController@index');

   Route::get('/category/create','CategoryController@create')->name('category.create');
   Route::post('/category','CategoryController@store')->name('category.store');
   Route::get('/category/{category}','CategoryController@show')->name('category.show');

   Route::get('/article/create','ArticleController@create')->name('article.create');
   Route::get('/article/{article}/edit','ArticleController@edit')->name('article.edit');

   Route::post('/article','ArticleController@store')->name('article.store');
   Route::get('/article/{article}','ArticleController@show')->name('article.show');

   Route::get('/test', function(){
      $category = \App\Category::find(7);
      return $category->articles;
   });
});

Route::group(['prefix'=>'test'],function(){

   Route::get('/vue', function(){
      return view('sandbox.vue');
   });

   Route::get('/bulma', function(){
      return view('sandbox.bulma');
   });

   Route::get('/email', function(){
      // Illuminate\Support\Facades\Mail::to('sumittuladhar@gmail.com')->send(new \App\Mail\ContactMail);
      return new \App\Mail\NewUserWelcomeMail();
   });

   Route::get('/2', function(){

//      $user = \App\User::find(1)->likes()->toggle(1,['like'=>false]);
      $user = \App\User::find(1)->posts;
      dd($user);

//      dd(\App\Profile::all());
      //factory(\App\Profile::class)->create();
   });
});




