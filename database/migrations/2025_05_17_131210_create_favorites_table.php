<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->foreignId('car_exemplaire_id')->constrained('car_exemplaire')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['utilisateur_id', 'car_exemplaire_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
