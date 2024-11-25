<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateController;

Route::group([
    'prefix' => "kalkulasi",
    'middleware' => ['api']
], function ($token) {
    Route::post("/kalkulasi-tunggal", [CalculateController::class, 'kalkulasiTunggal']);
    Route::post("/kalkulasi-banyak", [CalculateController::class, 'kalkulasiBanyak']);

});

