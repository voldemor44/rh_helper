<?php

namespace Database\Seeders;

use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types = ['Client', 'Fournisseur', 'Partenaire'];
        $entreprises = ['Entreprise A', 'Entreprise B', 'Entreprise C'];
        $entrepriseUuid = Entreprise::first()->id;


        foreach ($types as $type) {
            foreach ($entreprises as $entreprise) {
                DB::table('contacts')->insert([
                    "id" => Uuid::uuid4()->toString(),
                    'nom' => 'Nom ' . $type . ' de ' . $entreprise,
                    'telephone' => '123456789',
                    'email' => strtolower($type) . '@' . strtolower($entreprise) . '.com',
                    'fonction' => 'Fonction ' . $type,
                    'Entreprise' => $entreprise,
                    'type_contact_id' => random_int(1, count($types)),
                    'entreprise_id' => $entrepriseUuid,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
