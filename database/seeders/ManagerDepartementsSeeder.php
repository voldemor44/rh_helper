<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use App\Models\Departement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagerDepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrepriseUuid = Entreprise::first()->id;
        $user3 = User::skip(2)->take(1)->first();
        $departement = Departement::where('nom', 'Web')->first();
        DB::table('manager_departements')->insert(
            [
                'manager_id' => $user3->id,
                'departement_id' => $departement->id,
                'entreprise_id' => $entrepriseUuid
            ]
        );
    }
}
