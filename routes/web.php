<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminloginController;
use App\Http\Controllers\Admin\AdminController;

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

Route::group(['prefix'=>'admin'], function(){

Route::get('/adminlogin',[AdminloginController::class, 'adminlogin'])->name('adminlogin');

Route::post('/authentication',[AdminloginController::class, 'authentication']);

Route::get('/home',[AdminController::class, 'home']);
 
});
