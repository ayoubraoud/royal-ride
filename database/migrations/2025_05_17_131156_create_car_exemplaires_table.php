<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('car_exemplaire', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_identifie_id')->constrained('car_identifie');
            $table->string('numero_chassis', 100)->unique();
            $table->string('immatriculation', 50)->unique()->nullable();
            $table->string('couleur', 50)->nullable();
            $table->date('date_mise_en_circulation')->nullable();
            $table->foreignId('proprietaire_id')->nullable()->constrained('utilisateurs');
            $table->date('promo_date_debut')->nullable();
            $table->date('promo_date_fin')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_exemplaire');
    }
};