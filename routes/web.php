<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\PayblingAPI;
use App\Http\Controllers\UserController;
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

Route::get('login', function () {
    return view('auth/login');
});

Route::post('login', [PayblingAPI::class, 'Login'])->name('login');
Route::get('logout', [PayblingAPI::class, 'Logout'])->name('logout');

Route::get('/', function () {
    return view('home');
})->name('home')->middleware("login");
Route::get('logout', [PayblingAPI::class, 'Logout'])->name('logout');

//Merchants

Route::get('merchants', [PayblingAPI::class, 'MerchantPending'])->name('merchants')->middleware("login");
Route::get('trans/{cat}', [PayblingAPI::class, 'Transactions'])->name('merchants')->middleware("login");
Route::get("merchants/create", function(){
    return view('merchants/create', ["title" => "Create Merchant"]);
})->name('createMerchant')->middleware("login");
Route::post('merchants/create', [PayblingAPI::class, 'CreateMerchant'])->name('createMerchantP')->middleware("login");
//Crypto

Route::post('transfer', [CryptoController::class, 'transfer'])->name('transfer');


Route::get('crypto', [CryptoController::class, 'getBalance'])->name('crypto')->middleware('login');
Route::get('crypto/history', [CryptoController::class, 'getWithdrawHistory'])->name('cryptohistory')->middleware('login');
Route::get('crypto/balance', [CryptoController::class, 'getArrayBalance'])->name('cryptobalance')->middleware('login');