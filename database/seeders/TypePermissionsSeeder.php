<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Demande de congés maladie', 'Abscence justifiée'];
        for ($i = 0; $i < 2; $i++) {
            DB::table('type_permissions')->insert(
                [
                    'type' => $types[$i],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
