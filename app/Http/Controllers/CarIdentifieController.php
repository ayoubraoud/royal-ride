<?php

namespace App\Http\Controllers;

use App\Models\CarIdentifie;
use Illuminate\Http\Request;

class CarIdentifieController extends Controller
{
    public function index()
    {
        $CarIdentifies= CarIdentifie::with('exemplaires')->get();
        return response()->json([
            'message'=>'Liste des voitures recuperee avec succes',
            'data'=> $CarIdentifies,
        ]);
    }

    public function show(CarIdentifie $carIdentifie)
    {
       
         return  $carIdentifie->load('exemplaires');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:100',
            'modele' => 'required|string|max:100',
            'avatar_url'=>'nullable|string|max:100',
            'Gearbox'=>'nullable|string|max:100',
            'Air_conditioner'=>'nullable|string|max:100',
            'seats'=>'nullable|integer',
            'Carburant'=>'nullable|string|max:100',
            'Portes'=>'nullable|integer',
            'Distance'=>'nullable|integer',
            'motorisation' => 'nullable|string|max:100',
            'annee_production' => 'nullable|integer',
        ]);

        return CarIdentifie::create($validated);
    }

    public function update(Request $request, CarIdentifie $carIdentifie)
    {
        $validated = $request->validate([
            'marque' => 'sometimes|string|max:100',
            'modele' => 'sometimes|string|max:100',
            'avatar_url'=>'nullable|string|max:100',
            'Gearbox'=>'nullable|string|max:100',
            'Air_conditioner'=>'nullable|string|max:100',
            'seats'=>'nullable|integer',
            'Carburant'=>'nullable|string|max:100',
            'Portes'=>'nullable|integer',
            'Distance'=>'nullable|integer',
            'motorisation' => 'nullable|string|max:100',
            'annee_production' => 'nullable|integer',
        ]);

        $carIdentifie->update($validated);
        return $carIdentifie;
    }

    public function destroy(CarIdentifie $carIdentifie)
    {
        $carIdentifie->delete();
        return response()->json(['message' => 'CarIdentifie deleted']);
    }
};