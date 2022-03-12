<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Roles\UserController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['PreventBackHistory'])->group(function () {
    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/locale/{locale}', [HomeController::class, 'locale'])->name('locale');
    Route::get('/track', [TrackController::class, 'index'])->name('track');

    // Route::middleware(['auth'])->group(function () {

    Route::controller(ActivityController::class)->prefix('activities')->middleware(['admin'])->name('activities')->group(function () {
        Route::get('', 'index');
        Route::post('store', 'store')->name('.store');
        Route::post('order', 'order')->name('.order');
        Route::post('update/{activity}', 'update')->name('.update');
        Route::post('destroy/{activity}', 'destroy')->name('.destroy');
        Route::post('delete/{activity}', 'delete')->name('.delete')->withTrashed();
        Route::get('restore/{activity}', 'restore')->name('.restore')->withTrashed();
    });

    Route::controller(OrderController::class)->prefix('orders')->name('orders')->group(function () {
        Route::get('', 'index');
        Route::get('create', 'create')->name('.create');
        Route::post('store', 'store')->name('.store');
        Route::get('show/{order}', 'show')->name('.show');
        Route::get('edit', 'edit')->name('.edit');
        Route::post('update/{order}', 'update')->name('.update');
        Route::post('delete/{order}', 'delete')->name('.delete');
        Route::post('destroy/{order}', 'destroy')->name('.destroy')->withTrashed();
        Route::post('restore/{order}', 'restore')->name('.restore')->withTrashed();
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
    // });
});
