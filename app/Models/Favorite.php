<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    protected $fillable = ['utilisateur_id', 'car_exemplaire_id'];

    public function utilisateur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function carExemplaire(): BelongsTo
    {
        return $this->belongsTo(CarExemplaire::class, 'car_exemplaire_id');
    }
};