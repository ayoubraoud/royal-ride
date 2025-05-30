<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesSeeder extends Seeder
{
    public function run()
    {
        DB::table('favorites')->insertOrIgnore([
            [
                'utilisateur_id' => 1,
                'car_exemplaire_id' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
