<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


    Route::resource('rumahSakit', RumahSakitController::class)->except(['show']);
    Route::resource('pasien', PasienController::class)->except(['show']);
    
Route::get('/pasien/filter', [PasienController::class, 'filter'])->name('pasien.filter');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
