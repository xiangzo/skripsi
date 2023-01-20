<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FuzzyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VannameiController;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/litopenaeus-vannamei', [VannameiController::class, 'index'])->name('vannamei');
    Route::get('/litopenaeus-vannamei/edit/{_id}', [VannameiController::class, 'edit'])->name('vannamei.edit');
    Route::put('/litopenaeus-vannamei/update/{_id}', [VannameiController::class, 'update'])->name('vannamei.update');
    Route::get('/fuzzy', [FuzzyController::class, 'index'])->name('fuzzy');
    Route::get('/fuzzy-rules', [FuzzyController::class, 'getRules'])->name('fuzzy.getRules');
});
