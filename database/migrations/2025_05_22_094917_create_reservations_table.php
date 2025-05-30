<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('car_exemplaire_id')->constrained('car_exemplaire')->onDelete('cascade');
            $table->foreignId('reservation_st_id')->constrained('reservation_sts')->onDelete('cascade'); // Mise à jour ici
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
