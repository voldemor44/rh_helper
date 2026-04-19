<?php

namespace Database\Seeders;

use App\Models\Departement;
use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FonctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrepriseUuid = Entreprise::first()->id;
        $departementUuid = Departement::where('nom', 'Web')->first();
        $departementUuid2 = Departement::where('nom', 'Marketing')->first();
        #  $departId = $departementUuid->id;
        $fonctions = ['Developpeur Web', 'Developpeur Front-End', 'Developpeur Back-End', 'Analyste Marketing', 'Gestionnaire de produit', 'Concepteur graphique'];
        for ($i = 0; $i < count($fonctions); $i++) {

            if ($i > 2) {
                DB::table('fonctions')->insert(
                    [
                        'id' => Uuid::uuid4()->toString(),
                        'nom' => $fonctions[$i],
                        'departement_id' => $departementUuid2->id,
                        'entreprise_id' => $entrepriseUuid,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            } else {
                DB::table('fonctions')->insert(
                    [
                        'id' => Uuid::uuid4()->toString(),
                        'nom' => $fonctions[$i],
                        'departement_id' => $departementUuid->id,
                        'entreprise_id' => $entrepriseUuid,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }
    }
}
