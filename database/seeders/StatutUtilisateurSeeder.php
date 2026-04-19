<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutUtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuts = ['Actif', 'Passif', 'Archivé'];
        for ($i = 0; $i < 3; $i++) {
            DB::table('statut_utilisateurs')->insert(
                [
                    'statut' => $statuts[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
