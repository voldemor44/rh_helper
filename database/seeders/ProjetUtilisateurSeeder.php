<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('projet_utilisateurs')->insert([
            [
                'user_id' => 1, // ID de l'utilisateur
                'projet_id' => 1, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // ID de l'utilisateur
                'projet_id' => 1, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // ID de l'utilisateur
                'projet_id' => 1, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1, // ID de l'utilisateur
                'projet_id' => 2, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // ID de l'utilisateur
                'projet_id' => 2, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // ID de l'utilisateur
                'projet_id' => 2, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1, // ID de l'utilisateur
                'projet_id' => 3, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // ID de l'utilisateur
                'projet_id' => 3, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // ID de l'utilisateur
                'projet_id' => 3, // ID du rôle
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres enregistrements selon vos besoins
        ]);
    }
}
