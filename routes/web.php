<?php

use App\Http\Controllers\Roles\UserController;
use Illuminate\Support\Facades\App;
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

    Route::get('/lang/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return redirect()->back();
    })->name('locale');

    Auth::routes();

    Route::middleware(['auth'])->group(function () {

        Route::prefix('user')->name('user.')->middleware('user')->group(function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::prefix('vendor')->name('vendor.')->middleware('vendor')->group(function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
        Route::prefix('repairer')->name('repairer.')->middleware('repairer')->group(function () {
            Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
            Route::get('profile', [UserController::class, 'profile'])->name('profile');
        });
    });
});
