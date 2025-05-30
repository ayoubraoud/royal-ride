<?php

namespace Database\Seeders;

use Database\Seeders\RoleSeeder;
use Database\Seeders\UtilisateurSeeder;
use Database\Seeders\CarIdentifieSeeder;
use Database\Seeders\CarExemplaireSeeder;
use Database\Seeders\PromotionSeeder;
use Database\Seeders\PromotionCarSeeder;
use Database\Seeders\FavoritesSeeder;
use Database\Seeders\CommentsSeeder;
use Database\Seeders\ReservationStSeeder;
use Database\Seeders\ReservationSeeder;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
        RoleSeeder::class,
        UtilisateurSeeder::class,
        CarIdentifieSeeder::class,
        CarExemplaireSeeder::class,
        PromotionSeeder::class,
        PromotionCarSeeder::class,
        FavoritesSeeder::class,
        CommentsSeeder::class,
        ReservationStSeeder::class,
        ReservationSeeder::class,
    ]);
    }
}
