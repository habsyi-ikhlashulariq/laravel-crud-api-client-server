<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClientApiMatakuliah;

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
    return view('admin.dashboard');
});


Route::get('/matakuliah', [ControllerClientApiMatakuliah::class,'getMatakuliah']);
Route::get('/matakuliah/add', [ControllerClientApiMatakuliah::class,'AddMatakuliah'])->name('matakuliah.add');
Route::post('/matakuliah/store', [ControllerClientApiMatakuliah::class,'StoreMatakuliah'])->name('matakuliah.store');
Route::get('/matakuliah/{id}', [ControllerClientApiMatakuliah::class,'getPerMatakuliah']);
Route::put('/matakuliah/update', [ControllerClientApiMatakuliah::class,'UpdateMatakuliah'])->name('matakuliah.update');
Route::get('/matakuliah/delete/{id}', [ControllerClientApiMatakuliah::class,'DeleteMatakuliah']);
