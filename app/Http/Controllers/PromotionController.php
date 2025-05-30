<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        return Promotion::with('cars')->get();
    }

    public function show(Promotion $promotion)
    {
        return $promotion->load('cars');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'is_black_friday' => 'sometimes|boolean',
        ]);

        return Promotion::create($validated);
    }

    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'discount_type' => 'sometimes|in:percentage,fixed',
            'discount_value' => 'sometimes|numeric',
            'date_debut' => 'sometimes|date',
            'date_fin' => 'sometimes|date|after_or_equal:date_debut',
            'is_black_friday' => 'sometimes|boolean',
        ]);

        $promotion->update($validated);
        return $promotion;
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return response()->json(['message' => 'Promotion deleted']);
    }
}
