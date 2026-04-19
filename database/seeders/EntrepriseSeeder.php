<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Créez des données d'exemple pour les entreprises
        $entreprises = [
            [
                "id" => Uuid::uuid4()->toString(),
                'nom' => 'Entreprise A',
                'email' => 'entrepriseA@example.com',
                'telephone' => '123-657-7890',
                'pays' => 'Pays A',
                'devise' => 'Devise A',
                'type_entreprise_id' => 1,
                'nombreProjets' => 2,
                'nombreEmployes'  => 3,
                'nombreDossiers' => 4,
            ],
            [
                "id" => Uuid::uuid4()->toString(),
                'nom' => 'Entreprise B',
                'email' => 'entrepriseB@example.com',
                'telephone' => '128-456-7890',
                'pays' => 'Pays B',
                'devise' => 'Devise B',
                'type_entreprise_id' => 2,
                'nombreProjets' => 2,
                'nombreEmployes'  => 3,
                'nombreDossiers' => 4,
            ],
            [
                "id" => Uuid::uuid4()->toString(),
                'nom' => 'Entreprise C',
                'email' => 'entrepriseC@example.com',
                'telephone' => '129-456-7890',
                'pays' => 'Pays C',
                'devise' => 'Devise C',
                'type_entreprise_id' => 3,
                'nombreProjets' => 2,
                'nombreEmployes'  => 3,
                'nombreDossiers' => 4,
            ],
            [
                "id" => Uuid::uuid4()->toString(),
                'nom' => 'Entreprise D',
                'email' => 'entrepriseD@example.com',
                'telephone' => '134-456-7890',
                'pays' => 'Pays C',
                'devise' => 'Devise C',
                'type_entreprise_id' => null,
                'nombreProjets' => 2,
                'nombreEmployes'  => 3,
                'nombreDossiers' => 4,
            ],

        ];

        // Insérez les données dans la table "entreprises"
        DB::table('entreprises')->insert($entreprises);
    }
}
