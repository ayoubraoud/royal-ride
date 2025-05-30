<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        // Assurez-vous que ces IDs existent dans les tables respectives
        DB::table('reservations')->insertOrIgnore([
            [
                'utilisateur_id' => 1, // Vérifiez que cet ID existe dans la table utilisateurs
                'car_exemplaire_id' => 1, // Vérifiez que cet ID existe dans la table car_exemplaire
                'reservation_st_id' => 1, // Mise à jour ici
                'date_debut' => now()->addDays(1), // Réservation pour demain
                'date_fin' => now()->addDays(5), // Réservation pour 5 jours
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'utilisateur_id' => 1, // Vérifiez que cet ID existe dans la table utilisateurs
                'car_exemplaire_id' => 2, // Vérifiez que cet ID existe dans la table car_exemplaire
                'reservation_st_id' => 2, // Mise à jour ici
                'date_debut' => now()->addDays(2), // Réservation pour dans 2 jours
                'date_fin' => now()->addDays(3), // Réservation pour 3 jours
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
