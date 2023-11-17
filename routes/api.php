<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json(
        ['message' => 'This its API Absensi V1.0'],
    );
});

//route apiPresensi


Route::get('get-crud',[App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');
Route::post('store-crud',[App\Http\Controllers\CrudController::class, 'store'])->name('crud.store');
Route::delete('destroy-crud/{id}', [App\Http\Controllers\CrudController::class, 'destroy'])->name('crud.destroy');
Route::put('put-crud/{id}', [App\Http\Controllers\CrudController::class, 'update'])->name('crud.update');

Route::post('register-user', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('login-user', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('get-jurusan', [App\Http\Controllers\JurusanController::class,'index'])->name('jurusan.index');
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('get-Presensi', [App\Http\Controllers\Api\PresensiController::class, 'getPresensis']);
    Route::post('save-presensi', [App\Http\Controllers\API\PresensiController::class, 'savePresensi']);
});
