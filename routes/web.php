<?php

use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users', [UsersController::class, 'Ussersdata'])->name('users.index');
Route::post('usersstore', [UsersController::class, 'storeuser'])->name('storeuser');
Route::get('userslist', [UsersController::class, 'userslist'])->name('userslist');
Route::post('/delete', [UsersController::class, 'delete'])->name('delete');
Route::get('/edituser/{id}', [UsersController::class, 'edituser'])->name('edituser');
Route::post('/updateuser/{id}', [UsersController::class, 'updateuser'])->name('updateuser');

