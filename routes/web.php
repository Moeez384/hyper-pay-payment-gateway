<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestController;
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

Route::get('/dashboard', function () {
    return view('layouts.layout');
})->middleware(['auth'])->name('dashboard');

Route::get('/test', [PaymentController::class, 'request']);
Route::get('/payment', [TestController::class, 'request'])->name('payment');
Route::get('/ko', [PaymentController::class, 'ko'])->name('ko');
Route::get('/welcome', [PaymentController::class, 'welcome'])->name('welcome');

require __DIR__ . '/auth.php';
