<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusDossiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuts = ['Validé', 'Rejetté', 'En traitement'];
        for ($i = 0; $i < 3; $i++) {
            DB::table('status_dossiers')->insert(
                [
                    'statut' => $statuts[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
