<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarExemplaireSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_exemplaire')->insertOrIgnore([
            [
                'car_identifie_id' => 1,
                'numero_chassis' => 'ABC123XYZ',
                'immatriculation' => '1234-AB-75',
                'couleur' => 'Rouge',
                'date_mise_en_circulation' => '2021-03-10',
                'proprietaire_id' => 1,
                'promo_date_debut' => null,
                'promo_date_fin' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
