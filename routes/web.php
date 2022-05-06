<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Roles\UserController;
use App\Http\Controllers\SearchOrderController;
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

    Route::middleware(['auth'])->group(function () {


        Route::controller(SearchOrderController::class)->group(function () {
            Route::get('search', 'index');
            Route::post('autocomplete', 'autocomplete')->name('autocomplete');
        });

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
            Route::get('in-progress', 'inProgress')->name('.inprogress');
            Route::get('checked-out', 'checkedOut')->name('.checkedOut');
            Route::get('trash', 'trash')->name('.trashed');
            Route::get('create', 'create')->name('.create');
            Route::post('store', 'store')->name('.store');
            Route::get('show/{order}', 'show')->name('.show');
            Route::post('upStatus/{order}', 'updateStatus')->name('.upStatus');
            Route::get('edit/{order}', 'edit')->name('.edit');
            Route::post('update/{order}', 'update')->name('.update');
            Route::post('destroy/{order}', 'destroy')->name('.destroy');
            Route::post('delete/{order}', 'delete')->name('.delete')->withTrashed();
            Route::post('restore/{order}', 'restore')->name('.restore')->withTrashed();
        });

        Route::controller(UserController::class)->middleware(['admin'])->prefix('users')->name('users')->group(function () {
            Route::get('', 'index');
            Route::get('trash', 'trash')->name('.trashed');
            Route::get('edit/{user}', 'edit')->name('.edit');
            Route::get('change-password', 'passwordView')->name('.password');
            Route::post('new-password', 'password')->name('.newPassword');
            Route::post('update/{user}', 'update')->name('.update');
            Route::post('destroy/{user}', 'destroy')->name('.destroy');
            Route::post('delete/{user}', 'delete')->name('.delete')->withTrashed();
            Route::post('restore/{user}', 'restore')->name('.restore')->withTrashed();
        });

        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('updateProfile', [UserController::class, 'updateP'])->name('updateP');
    });
});
