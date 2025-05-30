<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Http\Request;

// Public routes for authentication
Route::post('/register', [UtilisateurController::class, 'register']);
Route::post('/login', [UtilisateurController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Déconnexion réussie.']);
    });

    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });
});
