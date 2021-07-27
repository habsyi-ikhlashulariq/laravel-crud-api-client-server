<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerApiMatakuliah;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/matakuliah/get', [ControllerApiMatakuliah::class,'index']);
Route::get('/matakuliah/getId/{id}', [ControllerApiMatakuliah::class,'detail']);
Route::post('/matakuliah/post', [ControllerApiMatakuliah::class,'simpan']);
Route::put('/matakuliah/update', [ControllerApiMatakuliah::class,'update']);
Route::delete('/matakuliah/delete/{id}', [ControllerApiMatakuliah::class,'hapus']);