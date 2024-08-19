<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CheckOutController;

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
    return view('welcome');
});



Route::get('/checkout', [CheckOutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckOutController::class, 'pay'])->name('post.checkout');
Route::post('/checkout', [CheckOutController::class, 'pay'])->name('post.checkout');
Route::get('/success', [CheckOutController::class, 'success'])->name('success');
Route::get('/cancel', [CheckOutController::class, 'cancel'])->name('cancel');