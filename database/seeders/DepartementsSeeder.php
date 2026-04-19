<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $entrepriseUuid = Entreprise::first()->id;
        $departements = ['Web', 'Marketing'];
        for ($i = 0; $i < 2; $i++) {
            DB::table('departements')->insert(
                [
                    'id' => Uuid::uuid4()->toString(),
                    'nom' => $departements[$i],
                    'entreprise_id' => $entrepriseUuid,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
