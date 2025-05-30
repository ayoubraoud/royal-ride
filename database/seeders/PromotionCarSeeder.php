<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionCarSeeder extends Seeder
{
    public function run()
    {
        DB::table('promotion_car')->insert([
            [
                'promotion_id' => 1,
                'car_exemplaire_id' => 1,
                'old_price' => 20000,
                'new_price' => 16000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
