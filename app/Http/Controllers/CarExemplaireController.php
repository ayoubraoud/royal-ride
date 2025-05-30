<?php

namespace App\Http\Controllers;

use App\Models\CarExemplaire;
use Illuminate\Http\Request;

class CarExemplaireController extends Controller
{
    public function index()
    {
        
        return CarExemplaire::with(['carIdentifie', 'proprietaire', 'promotions'])->get();

    }

    public function show(CarExemplaire $carExemplaire)
    {

        return $carExemplaire->load(['carIdentifie', 'proprietaire', 'promotions']);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_identifie_id' => 'required|exists:car_identifie,id',
            'numero_chassis' => 'required|string|max:100|unique:car_exemplaire,numero_chassis',
            'immatriculation' => 'nullable|string|max:50|unique:car_exemplaire,immatriculation',
            'couleur' => 'nullable|string|max:50',
            'date_mise_en_circulation' => 'nullable|date',
            'proprietaire_id' => 'nullable|exists:users,id',
            'promo_date_debut' => 'nullable|date',
            'promo_date_fin' => 'nullable|date|after_or_equal:promo_date_debut',
        ]);

        
        return CarExemplaire::create($validated);
        
    }

    public function update(Request $request, CarExemplaire $carExemplaire)
    {
        $validated = $request->validate([
            'car_identifie_id' => 'sometimes|exists:car_identifie,id',
            'numero_chassis' => "sometimes|string|max:100|unique:car_exemplaire,numero_chassis,{$carExemplaire->id}",
            'immatriculation' => "nullable|string|max:50|unique:car_exemplaire,immatriculation,{$carExemplaire->id}",
            'couleur' => 'nullable|string|max:50',
            'date_mise_en_circulation' => 'nullable|date',
            'proprietaire_id' => 'nullable|exists:users,id',
            'promo_date_debut' => 'nullable|date',
            'promo_date_fin' => 'nullable|date|after_or_equal:promo_date_debut',
        ]);

        $carExemplaire->update($validated);
        return $carExemplaire;
    }

    public function destroy(CarExemplaire $carExemplaire)
    {
        $carExemplaire->delete();
        return response()->json(['message' => 'CarExemplaire deleted']);
    }
};