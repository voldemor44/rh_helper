<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EvenementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('evenements')->insert([
        //     [
        //         'titre' => 'Événement 1',
        //         'description' => 'Description de l\'événement 1',
        //         'user_id' => 1, // ID de l'utilisateur lié à l'événement
        //         'type_evenement_id' => 1, // ID du type d'événement lié
        //         'date_debut' => '2023-06-08 10:00:00',
        //         'date_fin' => '2023-06-08 12:00:00',
        //     ],
        //     [
        //         'titre' => 'Événement 2',
        //         'description' => 'Description de l\'événement 2',
        //         'user_id' => 1, // ID de l'utilisateur lié à l'événement
        //         'type_evenement_id' => 2, // ID du type d'événement lié
        //         'date_debut' => '2023-06-09 14:00:00',
        //         'date_fin' => '2023-06-09 16:00:00',
        //     ],
        //     // Ajoutez d'autres événements si nécessaire
        // ]);
    }
}
