<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservation_sts', function (Blueprint $table) {
            $table->id();
            $table->string('status', 50)->unique(); // Exemples : 'pending', 'confirmed', 'canceled'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_sts');
    }
};
