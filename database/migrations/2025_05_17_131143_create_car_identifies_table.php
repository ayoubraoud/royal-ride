<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('car_identifie', function (Blueprint $table) {
            $table->id();
            $table->string('marque', 100);
            $table->string('modele', 100);
            $table->string('avatar_url', 500);
            $table->string('Gearbox', 500);
            $table->string('Air_conditioner', 500);
            $table->integer('seats');
            $table->string('Carburant', 500);
            $table->integer('Portes');
            $table->integer('Distance');

            $table->string('motorisation', 100)->nullable();
            $table->integer('annee_production')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_identifie');
    }
};
