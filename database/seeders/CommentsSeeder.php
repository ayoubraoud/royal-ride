<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            [
                'utilisateur_id' => 2,
                'car_exemplaire_id' => 1,
                'content' => 'Très bonne voiture !',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
