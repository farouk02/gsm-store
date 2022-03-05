<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Roles\UserController;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['PreventBackHistory'])->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/test', function () {
        return view('dashboard.test');
    });

    Route::get('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');
    Route::get('/status', [OrderController::class, 'status'])->name('status');

    Route::middleware(['auth'])->group(function () {

        Route::controller(ActivityController::class)->prefix('activities')->name('activities')->group(function () {
            Route::get('', 'index');
            Route::post('store', 'store');
            Route::post('update/{id}', 'update');
            Route::get('delete/{id}', 'delete');
            Route::get('destroy/{id}', 'destroy')->withTrashed();
            Route::get('restore/{id}', 'restore')->withTrashed();
        });

        Route::controller(OrderController::class)->prefix('orders')->name('orders')->group(function () {
            Route::get('', 'index');
            Route::get('create', 'create');
            Route::post('store', 'store');
            Route::get('edit', 'edit');
            Route::post('update/{id}', 'update');
            Route::get('delete/{id}', 'delete');
            Route::get('destroy/{id}', 'destroy')->withTrashed();
            Route::get('restore/{id}', 'restore')->withTrashed();
        });

        Route::controller(Client::class)->prefix('clients')->name('clients')->group(function () {
            Route::get('', 'index');
            Route::get('create', 'create');
            Route::post('store', 'store');
            Route::get('edit', 'edit');
            Route::post('update/{id}', 'update');
            Route::get('delete/{id}', 'delete');
            Route::get('destroy/{id}', 'destroy')->withTrashed();
            Route::get('restore/{id}', 'restore')->withTrashed();
        });




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
