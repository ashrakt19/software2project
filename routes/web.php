<?php

use Illuminate\Support\Facades\Auth;
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
route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function(){
    route::get('/','Home@index')->name('admin.home');//home page  
    route::resource('users','Users')->except(['show','delete']);
    route::resource('categories','Categories')->except(['show','delete']);
    route::resource('skills','Skills')->except(['show','delete']);
    route::resource('tags','tags')->except(['show','delete']);
    route::resource('pages','pages')->except(['show','delete']);
    route::resource('messages','Messages')->only(['index','destroy','edit']);
    Route::post('messages/replay/{id}', 'Messages@replay')->name('message.replay');
    route::resource('videos','videos')->except(['show','delete']);
    route::post('comments','videos@commentStore')->name('comment.store');
    route::post('comments/{id}','videos@commentUpdate')->name('comment.update'); 
    route::get('comments/{id}','videos@commentDelete')->name('comment.delete');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tag')->name('front.tags');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('/', 'HomeController@welcome')->name('frontend.landing');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');

Route::middleware('auth')->group(function () {
    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
});
