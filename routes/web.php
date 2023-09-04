<?php

use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('dashboard.')->prefix('dashboard')->group(function () {

        Route::name('products.')->prefix('products')->group(function () {
            Route::get('index', [ProductController::class, 'index'])->name('index');
            Route::post('store', [ProductController::class, 'store'])->name('store');
            Route::put('update', [ProductController::class, 'update'])->name('update');
            Route::delete('destroy', [ProductController::class, 'destroy'])->name('destroy');
        });

        Route::name('users.')->prefix('users')->group(function () {
            Route::get('index', [UserController::class, 'index'])->name('index');
            Route::post('store', [UserController::class, 'store'])->name('store');
            Route::put('update', [UserController::class, 'update'])->name('update');
            Route::delete('destroy', [UserController::class, 'destroy'])->name('destroy');
        });
    });
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
