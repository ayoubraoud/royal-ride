<?php 

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PromotionSeeder extends Seeder
{
    public function run()
    {
        DB::table('promotions')->insert([
            [
                'title' => 'Black Friday 2024',
                'description' => 'Super réduction pour le Black Friday',
                'discount_type' => 'percentage',
                'discount_value' => 20.00,
                'date_debut' => '2024-11-25',
                'date_fin' => '2024-12-01',
                'is_black_friday' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
