<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;

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

Route::prefix('kontak')->group(function () {
    Route::get('/', [KontakController::class, 'index']);
    Route::post('/add',[KontakController::class,'add'])->name('kontak.add');
    Route::post('/update/{id}',[KontakController::class,'update'])->name('kontak.update');;
    Route::get('/delete/{id}',[KontakController::class,'delete'])->name('kontak.delete');;
});

Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index']);
    Route::post('/add',[BeritaController::class,'add'])->name('berita.add');
    Route::post('/update/{id}',[BeritaController::class,'update'])->name('berita.update');;
    Route::get('/delete/{id}',[BeritaController::class,'delete'])->name('berita.delete');;
});

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::post('/add',[ProfileController::class,'add'])->name('profile.add');
    Route::post('/update/{id}',[ProfileController::class,'update'])->name('profile.update');;
    Route::get('/delete/{id}',[ProfileController::class,'delete'])->name('profile.delete');;
});
