<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationStSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservation_sts')->insertOrIgnore([
            ['status' => 'En attente'],
            ['status' => 'Confirmée'],
            ['status' => 'Annulée'],
            ['status' => 'Complétée'],
            ['status' => 'Expirée'],
        ]);
    }
}
