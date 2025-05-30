<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CarIdentifieController;
use App\Http\Controllers\CarExemplaireController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\PromotionCarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationStController;

// API Resources
Route::apiResource('utilisateurs', UtilisateurController::class);
Route::apiResource('roles', RoleController::class);
Route::apiResource('car_identifies', CarIdentifieController::class)->parameters([
    'car_identifies' => 'carIdentifie'
]);
Route::apiResource('car_exemplaires', CarExemplaireController::class)->parameters([
    'car_exemplaires' => 'carExemplaire'
]);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('reservation_st', ReservationStController::class);
Route::apiResource('favorites', FavoriteController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('promotions', PromotionController::class);
Route::apiResource('promotion_cars', PromotionCarController::class)->parameters([
    'promotion_cars' => 'promotionCar'
]);

Route::middleware('auth:sanctum')->get('/utilisateur', function (Request $request) {
    return $request->user();
});
