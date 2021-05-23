<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

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
//     return view('users.welcome');
// });

//ユーザー画面
Route::get('/login', function () {
    return view('users.login_page');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__ . '/auth.php';

Auth::routes();

//adminのホーム画面
Route::get('/admin/home', function () {
    return view('admin.home');
})->name('admin_home');

//adminログイン画面
Route::get('/admin', [AdminController::class, 'show']);
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
