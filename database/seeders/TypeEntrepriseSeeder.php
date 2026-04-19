<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeEntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $typesEntreprises = [
            ['type' => 'Startup'],
            ['type' => 'PME'],
            ['type' => 'GE'],

        ];

        // Insérer les données dans la table
        DB::table('type_entreprises')->insert($typesEntreprises);
    }
}
