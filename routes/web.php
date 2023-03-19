<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\NotationController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;


Route::get('/', [NotationController::class, "welcome"]);


Route::prefix('/produits')->group(function () {

    Route::get('/', [ProduitController::class, "liste"]);
    Route::get('/ajouter', [ProduitController::class, "ajouter"]);
    Route::get('/{id}', [ProduitController::class, "details"]);
    Route::get('/supprimer/{id}', [ProduitController::class, "delete"]);

    Route::post('/ajouter', [ProduitController::class, "insert"]);
    Route::post('/modifier/{id}', [ProduitController::class, "update"]);
});


Route::prefix('/clients')->group(function () {

    Route::get('/', [ClientController::class, "liste"]);
    Route::get('/ajouter', [ClientController::class, "ajouter"]);
    Route::get('/{id}', [ClientController::class, "details"]);
    Route::get('/supprimer/{id}', [ClientController::class, "delete"]);


    Route::post('/ajouter', [ClientController::class, "insert"]);
    Route::post('/modifier/{id}', [ClientController::class, "update"]);
});

Route::prefix('/notations')->group(function () {
    Route::get('/{id}', [NotationController::class, "notation"]);
    Route::post('/ajouter/{id}', [NotationController::class, "insert"]);
    Route::get('/supprimer/produit/{idProduit}/client/{idClient}', [NotationController::class, "delete"]);
});


