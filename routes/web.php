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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [App\Http\Controllers\IndoregionController::class, 'form'])->name('form');
Route::post('/getkabupaten', [App\Http\Controllers\IndoregionController::class, 'getkabupaten'])->name('getkabupaten');
Route::post('/getkecamatan', [App\Http\Controllers\IndoregionController::class, 'getkecamatan'])->name('getkecamatan');
Route::post('/getdesa', [App\Http\Controllers\IndoregionController::class, 'getdesa'])->name('getdesa');