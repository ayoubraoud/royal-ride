<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return Favorite::with(['utilisateur', 'carExemplaire'])->get();
    }

    public function show(Favorite $favorite)
    {
        return $favorite->load(['utilisateur', 'carExemplaire']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'car_exemplaire_id' => 'required|exists:car_exemplaire,id',
        ]);

        return Favorite::create($validated);
    }

    public function update(Request $request, Favorite $favorite)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'sometimes|exists:utilisateurs,id',
            'car_exemplaire_id' => 'sometimes|exists:car_exemplaire,id',
        ]);

        $favorite->update($validated);
        return $favorite;
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return response()->json(['message' => 'Favorite deleted']);
    }
}
