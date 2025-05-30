<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CarExemplaire extends Model
{
    protected $table = 'car_exemplaire';

    protected $fillable = [
        'car_identifie_id', 'numero_chassis', 'immatriculation', 'couleur',
        'date_mise_en_circulation', 'proprietaire_id', 'promo_date_debut', 'promo_date_fin'
    ];

    public function carIdentifie(): BelongsTo
    {
        return $this->belongsTo(CarIdentifie::class, 'car_identifie_id');
    }

    public function proprietaire(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'proprietaire_id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class, 'car_exemplaire_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'car_exemplaire_id');
    }

    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class, 'promotion_car', 'car_exemplaire_id', 'promotion_id');
    }
};