<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function (){
    Route::resource('/admin/product',ProductController::class);
    Route::resource('/admin/service',\App\Http\Controllers\ServiceController::class);
    Route::resource('/admin/message',\App\Http\Controllers\MessageController::class);
    Route::resource('/admin/enquiry',\App\Http\Controllers\EnquiryController::class);
});
