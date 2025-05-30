<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReservationSt  extends Model
{
    protected $fillable = ['status'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}

