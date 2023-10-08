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

Route::get('get-hello', function () {
    return response()->json(
        ['message' => 'Hello World!']
    );
});

//route apiPresensi
Route::get('get-Presensi',
       [App\Http\Controllers\Api\PresensiController::class, 'getPresensi']);

Route::get('get-crud',[App\Http\Controllers\CrudController::class, 'index'])->name('crud.index');
Route::post('store-crud',[App\Http\Controllers\CrudController::class, 'store'])->name('crud.store');
Route::delete('destroy-crud/{id}', [App\Http\Controllers\CrudController::class, 'destroy'])->name('crud.destroy');
Route::put('put-crud/{id}', [App\Http\Controllers\CrudController::class, 'update'])->name('crud.update');
