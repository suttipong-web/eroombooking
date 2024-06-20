<?php

use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getAllRoom', [RoomController::class, 'getAllRoom']);
//Route Group Room CRUD
Route::prefix('/room')->group(
    function () {
        Route::post('/store', [RoomController::class, 'store']);
        Route::put('/{id}', [RoomController::class, 'updateA']);
        Route::put('/status/{id}', [RoomController::class, 'updateStatus']);
        Route::delete('/{id}', [RoomController::class, 'destroy']);
    }
);
