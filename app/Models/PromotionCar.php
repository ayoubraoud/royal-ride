<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionCar extends Model

{
    protected $table = 'promotion_car';
    protected $fillable = ['promotion_id', 'car_exemplaire_id', 'old_price', 'new_price'];
     
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function carExemplaire()
    {
        return $this->belongsTo(CarExemplaire::class);
    }
};