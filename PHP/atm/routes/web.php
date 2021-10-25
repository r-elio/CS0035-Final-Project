<?php

use App\Http\Controllers\LogoutController;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Login;
use App\Http\Livewire\User;
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

Route::redirect('/','/'. app()->getLocale());

Route::group(['prefix' => '{language}'], function () {
    Route::get('/', Login::class)->name('login')->middleware('guest');
    Route::get('/admin', Admin::class)->name('admin')->middleware(['auth', 'is_admin']);
    Route::get('/user', User::class)->name('user')->middleware('auth');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
