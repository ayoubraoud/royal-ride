<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('promotion_car', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->constrained('promotions');
            $table->foreignId('car_exemplaire_id')->constrained('car_exemplaire');
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('new_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promotion_car');
    }
};