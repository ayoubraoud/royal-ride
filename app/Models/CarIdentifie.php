<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarIdentifie extends Model
{
    protected $table = 'car_identifie';

    protected $fillable = ['marque', 'modele','avatar_url','Gearbox','Air_conditioner','seats','Carburant','Portes','Distance', 'motorisation', 'annee_production'];

    public function exemplaires(): HasMany
    {
        return $this->hasMany(CarExemplaire::class, 'car_identifie_id');
    }
};