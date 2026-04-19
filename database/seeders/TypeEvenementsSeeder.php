<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEvenementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Annonce', 'Réunion', 'Formation'];
        for ($i = 0; $i < 3; $i++) {
            DB::table('type_evenements')->insert(
                [
                    'type' => $types[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
