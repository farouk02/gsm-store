<?php

use App\Http\Controllers\Roles\UserController;
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



Route::middleware(['PreventBackHistory'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::group(['prefix' => 'user', 'middleware' => 'user', 'name' => 'user.'], function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'name' => 'admin.'], function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::group(['prefix' => 'vendor', 'middleware' => 'vendor', 'name' => 'vendor.'], function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::group(['prefix' => 'repairer', 'middleware' => 'repairer', 'name' => 'repairer.'], function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
    });
});
