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
    return redirect()->route('login');
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
    Route::any('/password/change', [Auth\ResetPasswordController::class, 'change'])->name('password.change');
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/manage-user', [Admin\DashboardController::class, 'manageUser'])->name('manageUser');
    Route::post('/edit-user', [Admin\DashboardController::class, 'editUser'])->name('editUser');
    Route::post('/update-user', [Admin\DashboardController::class, 'updateUser'])->name('updateUser');
    Route::get('/user/delete/{id}', [Admin\DashboardController::class, 'destroy']);
    Route::get('/delete/account', [Admin\DashboardController::class, 'deleteAccount']);
    // company profile routing 
    Route::get('/company_profiles', [Admin\CompanyProfileController::class, 'index'])->name('index');
    Route::post('/company_profiles/create', [Admin\CompanyProfileController::class, 'store'])->name('create');
    Route::post('/company_profiles/edit', [Admin\CompanyProfileController::class, 'edit'])->name('edit');
    Route::post('/company_profiles/update', [Admin\CompanyProfileController::class, 'update'])->name('update');
    Route::post('/company_profiles/delete', [Admin\CompanyProfileController::class, 'destroy'])->name('destroy');
    // user profile CRUD 
    Route::get('/users', [Admin\UserProfileController::class, 'index'])->name('users.index');
});
