<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('news.list');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.register');
Route::get('/users', [UserController::class, 'list'])->name('users.list');
Route::get('/current-user', [UserController::class, 'currentUser'])->name('users.currentUser');

Route::get('/news', [NewsController::class, 'showCreateForm'])->name('news.create');
Route::post('/news', [NewsController::class, 'create'])->name('news.create');
Route::get('/news/list', [NewsController::class, 'list'])->name('news.list');
