<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});
// guset route for login and register 
Route::group(['middleware' => 'guest'], function () {
    Route::any('/login', [Auth\LoginController::class, 'login'])->name('login');
    Route::any('/register', [Auth\RegisterController::class, 'register'])->name('register');
    Route::any('password/forget', [Auth\ForgotPasswordController::class, 'forgetPassword'])->name('password.forget');
    Route::get('password/reset/{token}', [Auth\ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');
    Route::post('password/reset', [Auth\ResetPasswordController::class, 'submitResetPasswordForm'])->name('submit.password.reset');
});
// auth route for auth
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    // this route after authenticated accessable
    Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [admin\DashboardController::class, 'index'])->name('index');
    Route::get('/manage-user', [admin\DashboardController::class, 'manageUser'])->name('manageUser');
    Route::post('/edit-user', [admin\DashboardController::class, 'editUser'])->name('editUser');
    Route::post('/update-user', [admin\DashboardController::class, 'updateUser'])->name('updateUser');
    Route::get('/user/delete/{id}', [admin\DashboardController::class, 'destroy']);
});
