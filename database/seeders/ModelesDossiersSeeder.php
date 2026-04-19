<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelesDossiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('modeles_dossiers')->insert([
            [
                'nom' => 'Modèle 1',
                'description' => 'Description du modèle 1',
                'type_dossiers_id' => 1, // Remplacez par l'ID du type de dossier associé
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Modèle 2',
                'description' => 'Description du modèle 2',
                'type_dossiers_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Modèle 3',
                'description' => 'Description du modèle 2',
                'type_dossiers_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres entrées selon vos besoins
        ]);
    }
}
