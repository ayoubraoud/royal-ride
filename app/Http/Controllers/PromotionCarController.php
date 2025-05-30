<?php

namespace App\Http\Controllers;

use App\Models\PromotionCar;
use Illuminate\Http\Request;

class PromotionCarController extends Controller
{
    public function index()
    {
        return PromotionCar::with(['promotion', 'carExemplaire'])->get();
    }

    public function show(PromotionCar $promotionCar)
    {
        return $promotionCar->load(['promotion', 'carExemplaire']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'promotion_id' => 'required|exists:promotions,id',
            'car_exemplaire_id' => 'required|exists:car_exemplaire,id',
            'old_price' => 'nullable|numeric',
            'new_price' => 'nullable|numeric',
        ]);

        return PromotionCar::create($validated);
    }

    public function update(Request $request, PromotionCar $promotionCar)
    {
        $validated = $request->validate([
            'old_price' => 'nullable|numeric',
            'new_price' => 'nullable|numeric',
        ]);

        $promotionCar->update($validated);
        return $promotionCar;
    }

    public function destroy(PromotionCar $promotionCar)
    {
        $promotionCar->delete();
        return response()->json(['message' => 'PromotionCar deleted']);
    }
}
