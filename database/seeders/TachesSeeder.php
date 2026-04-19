<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     //
    //     DB::table('taches')->insert([
    //         [
    //             "id" => Uuid::uuid4()->toString(),
    //             'contenu' => 'Tâche 1',
    //             'projet_id' => 1,
    //             'user_id' => 1,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //         [
    //             "id" => Uuid::uuid4()->toString(),
    //             'contenu' => 'Tâche 2',
    //             'projet_id' => 1,
    //             'user_id' => 2,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],

    //     ]);
    // }
}
