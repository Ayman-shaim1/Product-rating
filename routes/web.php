<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});




Route::prefix('/produits')->group(function () {
    Route::get('/', [EtudiantController::class, "index"]);
});


Route::prefix('/clients')->group(function () {
    Route::get('/', [EtudiantController::class, "index"]);
});
Route::prefix('/produits')->group(function () {
    Route::get('/', [EtudiantController::class, "index"]);
});
