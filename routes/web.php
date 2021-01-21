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

Route::get('/', 'App\Http\Controllers\UserController@index')->name('UserIndex');
Route::get('/wisata', 'App\Http\Controllers\UserController@wisata')->name('UserWisata');
Route::get('/tentang', 'App\Http\Controllers\UserController@tentang')->name('UserTentang');
Route::get('/hubungi_kami', 'App\Http\Controllers\UserController@hubungi_kami')->name('UserHubungiKami');
Route::get('/detail_wisata/{id}', 'App\Http\Controllers\UserController@detail_wisata/{id}');
Route::get('login', 'App\Http\Controllers\AdminController@form_login')->name('FormLogin');
Route::post('login', 'App\Http\Controllers\AdminController@login')->name('login');

Route::group(['middleware' => 'auth'], function(){
    Route::get('logout', 'App\Http\Controllers\AdminController@logout')->name('logout');
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('AdminIndex');
    Route::get('/admin/tentang', 'App\Http\Controllers\AdminController@tentang')->name('AdminTentang');
    Route::get('/admin/saran', 'App\Http\Controllers\AdminController@saran')->name('AdminSaran');
    Route::get('/admin/rating', 'App\Http\Controllers\AdminController@show_rating')->name('AdminRating');
    Route::post('/admin/wisata/{id}/rating', 'App\Http\Controllers\AdminController@rating');
    Route::delete('/admin/wisata/{id}/rating', 'App\Http\Controllers\AdminController@hapus_rating')->name('rating.destroy');
    Route::get('/admin/komentar', 'App\Http\Controllers\AdminController@show_komentar')->name('AdminKomentar');
    Route::post('/admin/wisata/{id}/komentar', 'App\Http\Controllers\AdminController@komentar');
    Route::delete('/admin/wisata/{id}/komentar', 'App\Http\Controllers\AdminController@hapus_komentar')->name('komentar.destroy');
    Route::resource('/admin/wisata', 'App\Http\Controllers\WisataController');
});
