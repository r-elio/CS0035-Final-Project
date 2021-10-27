<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LogoutController;
use App\Http\Livewire\AccountSettings;
use App\Http\Livewire\Admin;
use App\Http\Livewire\BalanceInquiry;
use App\Http\Livewire\CashDeposit;
use App\Http\Livewire\CashWithdrawal;
use App\Http\Livewire\Login;
use App\Http\Livewire\TransferFunds;
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
    Route::get('/', Login::class)->name('login');
    Route::get('/admin', Admin::class)->name('admin')->middleware(['auth', 'is_admin']);
    Route::get('/user', User::class)->name('user')->middleware('auth');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/user/withdraw', CashWithdrawal::class)->name('cash-withdrawal')->middleware('auth');
    Route::get('/user/deposit', CashDeposit::class)->name('cash-deposit')->middleware('auth');
    Route::get('/user/transfer', TransferFunds::class)->name('transfer-funds')->middleware('auth');
    Route::get('/user/balance', BalanceInquiry::class)->name('balance-inquiry')->middleware('auth');
    Route::get('/user/settings', AccountSettings::class)->name('account-settings')->middleware('auth');
    Route::post('/admin/add', [AccountController::class, 'add_account'])->name('admin.add')->middleware(['auth', 'is_admin']);
    Route::post('/admin/update/{user}', [AccountController::class, 'update_account'])->name('admin.update')->middleware(['auth', 'is_admin']);
    Route::delete('/admin/remove/{user}',[AccountController::class, 'remove_account'])->name('admin.remove')->middleware(['auth', 'is_admin']);
});
