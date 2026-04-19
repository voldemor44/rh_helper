<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDossiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Rapport', 'Contrat', 'dossierPersonnel'];
        for ($i = 0; $i <= 2; $i++) {
            DB::table('type_dossiers')->insert(
                [
                    'type' => $types[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
