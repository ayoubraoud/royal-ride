<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promotion extends Model
{
    protected $fillable = ['title', 'description', 'discount_type', 'discount_value', 'date_debut', 'date_fin', 'is_black_friday'];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(CarExemplaire::class, 'promotion_car', 'promotion_id', 'car_exemplaire_id');
    }
};