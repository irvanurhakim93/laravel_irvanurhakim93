<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
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

Route::get('/', [RumahSakitController::class, 'index']);
Route::post('/processlogin',[RumahSakitController::class,'login'])->name('processlogin');
Route::get('/dashboard',[RumahSakitController::class, 'dashboard'])->name('gotodashboard');
Route::get('/create', [RumahSakitController::class, 'create'])->name('rs.create');
Route::post('/store', [RumahSakitController::class,'store'])->name('rs.store');
Route::get('/edit/{id}', [RumahSakitController::class,'edit'])->name('rs.edit');
Route::post('/update/{id}', [RumahSakitController::class,'update'])->name('rs.update');
Route::delete('/delete/{id}',[RumahSakitController::class,'destroy'])->name('rs.destroy');
Route::get('/logout',[RumahSakitController::class,'logout'])->name('logout');

//pasien routes
Route::get('/pasien', [PasienController::class,'index'])->name('pasien.dashboard');
Route::get('/pasien/create', [PasienController::class,'create'])->name('pasien.create');
Route::post('/pasien/store', [PasienController::class,'store'])->name('pasien.store');
Route::get('/pasien/edit/{id}',[PasienController::class,'edit'])->name('pasien.edit');
Route::post('/pasien/update/{id}', [PasienController::class,'update'])->name('pasien.update');
Route::delete('/pasien/delete/{id}', [PasienController::class,'destroy'])->name('pasien.destroy');