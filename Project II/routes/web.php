<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', 'PostController@getHomePage');
Route::get('/login', 'LoginController@getLogin')->name('getLogin');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'LoginController@getRegisterForm');
Route::post('/register', 'LoginController@register');
Route::get('/logout', 'LoginController@logout');
Route::get('/editprofile', 'LoginController@getFormEditProfile');
Route::post('/editprofile', 'LoginController@EditProfile');
Route::get('/uploadpost', 'PostController@getFormUpload');
Route::post('/uploadpost', 'PostController@uploadPost');
Route::get('/detailpost', 'PostController@getDetailPost');
Route::get('/profile', 'LoginController@getUserProfile');
Route::get('/uploads', 'PostController@getUploadedPosts');
Route::get('/editpost', 'PostController@getFormEditPost');
Route::post('/editpost', 'PostController@EditPost');
Route::get('/wishlist', 'WishController@getUserWishList');

//Định tuyến cho các api
Route::post('/api/deletepost', 'PostController@deletePost');
Route::post('/api/searchuploadedposts', 'PostController@searchUploadedPosts');
Route::post('/api/addtowishlist', 'WishController@addToWishList');
Route::post('/api/removefromwishlist', 'WishController@removeFromWishList');
Route::post('/api/searchwishposts', 'WishController@searchWishPosts');
Route::post('/api/reportpost', 'ReportController@reportPost');
