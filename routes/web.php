<?php

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

Route::get('/main',[App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/', function () {
    return view('home');
});

Route::get('/datapeserta', function () {
    return view('datapeserta');
});


use App\Http\Controllers\PesertaController;
Route::controller(PesertaController::class)->group(function() {
    Route::get('peserta/', 'index');
    Route::get('peserta/add', 'add');
    Route::post('peserta/store', 'store');
    Route::get('peserta/edit/{id}', 'edit');
    Route::post('peserta/update/{id}', 'update');
    Route::get('peserta/delete/{id}', 'delete');
});

use App\Http\Controllers\KriteriaController;
Route::controller(KriteriaController::class)->group(function() {
    Route::get('kriteria/', 'index');
    Route::get('kriteria/add', 'add');
    Route::post('kriteria/store', 'store');
    Route::get('kriteria/edit/{id}', 'edit');
    Route::post('kriteria/update/{id}', 'update');
    Route::get('kriteria/delete/{id}', 'delete');
});

use App\Http\Controllers\AlternatifController;
Route::controller(AlternatifController::class)->group(function() {
    Route::get('alternatif/', 'index');
    Route::get('alternatif/add', 'add');
    Route::post('alternatif/store', 'store');
    Route::get('alternatif/edit/{id}', 'edit');
    Route::post('alternatif/update/{id}', 'update');
    Route::get('alternatif/delete/{id}', 'delete');
});


use App\Http\Controllers\HitungController;
// Route::get('/spk',function(){
//     return view('hitung');
// });

Route::get('/hitung', [HitungController::class, 'hitung'])->name('hitung');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



