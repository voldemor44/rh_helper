<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mode_paiements')->insert([

            [
                'nom' => 'MTN',


            ],
            [
  'nom' => 'MOOV'
            ],
            [
                'nom' => 'VISA'
            ],
            [
                'nom' => 'MASTERCARD'
            ]

        ]);
    }
}
