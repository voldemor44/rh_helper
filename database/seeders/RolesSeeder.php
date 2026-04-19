<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            [
                'nom' => 'SuperAdmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Administrateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Utilisateur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
