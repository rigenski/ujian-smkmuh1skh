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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/check', 'HomeController@check')->name('exportPDF');

Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', 'HomeController@admin')->name('admin');
    Route::post('/admin/student/import', 'HomeController@import')->name('import');
    Route::get('/admin/student/{student}/enable', 'HomeController@enable');
});
