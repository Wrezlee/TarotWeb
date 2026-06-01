<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PackageController;

Route::prefix('packages')->group(function () {

    Route::get('/', [PackageController::class, 'index']);
    Route::get('/{id}', [PackageController::class, 'show']);
    Route::post('/', [PackageController::class, 'store']);
    Route::put('/{id}', [PackageController::class, 'update']);
    Route::delete('/{id}', [PackageController::class, 'destroy']);

});