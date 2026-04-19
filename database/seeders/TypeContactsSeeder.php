<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('type_contacts')->insert([
            [
                'type' => 'Client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Fournisseur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Ajoutez d'autres entrées selon vos besoins
        ]);
    }
}
