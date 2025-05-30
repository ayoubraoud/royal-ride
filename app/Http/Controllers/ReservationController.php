<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return Reservation::with(['utilisateur', 'carExemplaire', 'reservationSt'])->get();
    }

    public function show(Reservation $reservation)
    {
        return $reservation->load(['utilisateur', 'carExemplaire', 'reservationSt']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'car_exemplaire_id' => 'required|exists:car_exemplaire,id',
            'reservation_st_id' => 'required|exists:reservation_sts,id', // Mise à jour ici
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);
        return Reservation::create($validated);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'reservation_st_id' => 'sometimes|exists:reservation_sts,id', // Mise à jour ici
            'date_debut' => 'sometimes|date',
            'date_fin' => 'sometimes|date|after_or_equal:date_debut',
        ]);
        $reservation->update($validated);
        return $reservation;
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted']);
    }
}
