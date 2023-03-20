<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataSensorController;
use App\Http\Controllers\FuzzyController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProsesController;
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
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/litopenaeus-vannamei', [VannameiController::class, 'index'])->name('vannamei');
    Route::get('/litopenaeus-vannamei/edit/{_id}', [VannameiController::class, 'edit'])->name('vannamei.edit');
    Route::put('/litopenaeus-vannamei/update/{_id}', [VannameiController::class, 'update'])->name('vannamei.update');
    Route::get('/fuzzy', [FuzzyController::class, 'index'])->name('fuzzy');
    Route::get('/fuzzy-rules', [FuzzyController::class, 'getRules'])->name('fuzzy.getRules');
    Route::get('/fuzzy-rules/add', [FuzzyController::class, 'create'])->name('fuzzy.add');
    Route::post('/fuzzy-rules/store', [FuzzyController::class, 'store'])->name('fuzzy.store');
    Route::get('/fuzzy-rules/edit/{_id}', [FuzzyController::class, 'edit'])->name('fuzzy.edit');
    Route::put('/fuzzy-rules/{_id}', [FuzzyController::class, 'update'])->name('fuzzy.update');
    Route::delete('/fuzzy-rules/delete/{_id}', [FuzzyController::class, 'destroy'])->name('fuzzy.delete');
    Route::get('/proses', [ProsesController::class, 'index'])->name('proses');
    Route::get('/proses/add', [ProsesController::class, 'create'])->name('proses.create');
    Route::post('/proses/store', [ProsesController::class, 'store'])->name('proses.store');
    Route::get('/proses/detail/{_id}', [ProsesController::class, 'detail'])->name('proses.detail');
    Route::delete('/proses/{_id}', [ProsesController::class, 'destroy'])->name('proses.delete');
    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan');
    Route::post('/perhitungan/create', [PerhitunganController::class, 'create'])->name('perhitungan.create');
    Route::post('/perhitungan/store', [PerhitunganController::class, 'store'])->name('perhitungan.store');
    Route::get('/perhitungan/detail/{_id}', [PerhitunganController::class, 'detail'])->name('perhitungan.detail');
    Route::get('/history', [PerhitunganController::class, 'history'])->name('history');
    Route::get('/get-data-sensor', [DataSensorController::class, 'getDataSensor'])->name('get-data-sensor');
    Route::get('/get-one-last-data-sensor', [DataSensorController::class, 'getOneLastDataSensor'])->name('get-one-last-data-sensor');
});
