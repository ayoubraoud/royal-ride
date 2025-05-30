<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['utilisateur_id', 'car_exemplaire_id', 'reservation_st_id', 'date_debut', 'date_fin']; // Mise à jour ici

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function carExemplaire(): BelongsTo
    {
        return $this->belongsTo(CarExemplaire::class);
    }

    public function reservationSt(): BelongsTo // Mise à jour ici
    {
        return $this->belongsTo(ReservationSt::class);
    }
}
