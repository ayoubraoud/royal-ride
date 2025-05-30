<?php
   namespace Database\Seeders;
   use Illuminate\Database\Seeder;
   use Illuminate\Support\Facades\DB;
   use Illuminate\Support\Facades\Hash;

   class UtilisateurSeeder extends Seeder
   {
       public function run()
       {
           DB::table('utilisateurs')->insertOrIgnore([
               [
                   'username' => 'johndoe',
                   'email' => 'john@example.com',
                   'password_hash' => Hash::make('password123'),
                   'avatar_url' => null,
                   'role_id' => 1, // Assurez-vous que cet ID existe dans la table roles
                   'created_at' => now(),
                   'updated_at' => now(),
               ],
               [
                   'username' => 'janedoe',
                   'email' => 'jane@example.com',
                   'password_hash' => Hash::make('password456'),
                   'avatar_url' => null,
                   'role_id' => 2, // Assurez-vous que cet ID existe dans la table roles
                   'created_at' => now(),
                   'updated_at' => now(),
               ],
           ]);
       }
   }
   