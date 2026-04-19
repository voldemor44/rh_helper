<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifs')->insert([

            [
                'id' => Uuid::uuid4()->toString(),
                'prix' => '0€' ,
                'formule' => '15',
                'type_entreprise' => null,
                'limitprojets' => 3,
                'limitemployes' => 5,
                'limitdossiers' => 10

            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'prix' => '15€',
                'formule' => 'année',
                'type_entreprise' => 'Startup',
                'limitprojets' => 10,
                'limitemployes' => 25,
                'limitdossiers' => 50
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'prix' => '25€',
                'formule' => 'année',
                'type_entreprise' => 'PME',
                'limitprojets' => 25,
                'limitemployes' => 100,
                'limitdossiers' => 150
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'prix' => '45€',
                'formule' => 'année',
                'type_entreprise' => 'GE',
                'limitprojets' => null,
                'limitemployes' => 250,
                'limitdossiers' => 300
            ]

        ]);
    }
}
