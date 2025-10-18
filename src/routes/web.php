<?php

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// TGMDK決済テスト（開発用）
Route::prefix('payment/test')->group(function () {
    Route::get('/', [App\Http\Controllers\PaymentTestController::class, 'index']);
    Route::post('/authorize', [App\Http\Controllers\PaymentTestController::class, 'testAuthorize']);
    Route::post('/capture', [App\Http\Controllers\PaymentTestController::class, 'testCapture']);
    Route::post('/cancel', [App\Http\Controllers\PaymentTestController::class, 'testCancel']);
    Route::post('/refund', [App\Http\Controllers\PaymentTestController::class, 'testRefund']);
});
