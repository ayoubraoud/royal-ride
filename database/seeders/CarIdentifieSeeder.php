<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarIdentifieSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_identifie')->insert([
            [
                'marque' => 'Toyota',
                'modele' => 'Corolla',
                'avatar_url' => 'https://example.com/corolla.jpg',
                'Gearbox' => 'Automatique',
                'Air_conditioner' => 'Oui',
                'seats' => 5,
                'Carburant' => 'Essence',
                'Portes' => 4,
                'Distance' => 30000,
                'motorisation' => '1.8L',
                'annee_production' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marque' => 'Peugeot',
                'modele' => '308',
                'avatar_url' => 'https://example.com/308.jpg',
                'Gearbox' => 'Manuelle',
                'Air_conditioner' => 'Oui',
                'seats' => 5,
                'Carburant' => 'Diesel',
                'Portes' => 5,
                'Distance' => 45000,
                'motorisation' => '1.6L',
                'annee_production' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
