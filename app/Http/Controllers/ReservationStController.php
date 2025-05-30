<?php
namespace App\Http\Controllers;

use App\Models\ReservationSt;
use Illuminate\Http\Request;

class ReservationStController extends Controller
{
    public function index()
    {
        return ReservationSt::all();
    }

    public function show(ReservationSt $reservationSt)
    {
        return $reservationSt;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:50|unique:reservation_sts,status',
        ]);
        return ReservationSt::create($validated);
    }

    public function update(Request $request, ReservationSt $reservationSt)
    {
        $validated = $request->validate([
            'status' => "required|string|max:50|unique:reservation_sts,status,{$reservationSt->id}",
        ]);
        $reservationSt->update($validated);
        return $reservationSt;
    }

    public function destroy(ReservationSt $reservationSt)
    {
        $reservationSt->delete();
        return response()->json(['message' => 'ReservationSt deleted']);
    }
}
