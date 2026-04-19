<?php

namespace Database\Seeders;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProjetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cp1 = User::findOrFail(1);
        $cp2 = User::findOrFail(2);

        for ($i = 1; $i < 4; $i++) {

            if ($i >= 2) {
                DB::table('projets')->insert(
                    [
                        "id" => Uuid::uuid4()->toString(),
                        'titre' => 'projet n°' . $i,
                        'priorite' => 'Moyenne',
                        'date_debut'  =>  $faker->dateTimeBetween('2023-01-01', '2023-03-01')->format('Y-m-d'),
                        'date_fin_prevue'  => $faker->dateTimeBetween('2023-04-01', 'now')->format('Y-m-d'),
                        'chef_projet' => $cp2->name,
                        'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac vulputate sem. Morbi vel pulvinar odio, vitae ultricies est. Proin malesuada lectus sit amet libero cursus, ac aliquam metus sollicitudin. Curabitur malesuada semper eros sed varius. Nam eget cursus sapien. Etiam nec erat condimentum, mattis odio vel, sollicitudin risus. Fusce vestibulum justo at mi eleifend, in commodo sem aliquam. Aliquam eget finibus turpis. Curabitur faucibus ultrices metus, a suscipit tellus vestibulum at.",
                        'entreprise_id' => 3,
                        'created_at' => now(),
                        'updated_at' => now()

                    ]
                );
            } else {
                DB::table('projets')->insert(
                    [
                        "id" => Uuid::uuid4()->toString(),
                        'titre' => 'projet n°' . $i,
                        'priorite' => 'Moyenne',
                        'date_debut'  =>  $faker->dateTimeBetween('2023-01-01', '2023-03-01')->format('Y-m-d'),
                        'date_fin_prevue'  => $faker->dateTimeBetween('2023-04-01', 'now')->format('Y-m-d'),
                        'chef_projet' => $cp1->name,
                        'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac vulputate sem. Morbi vel pulvinar odio, vitae ultricies est. Proin malesuada lectus sit amet libero cursus, ac aliquam metus sollicitudin. Curabitur malesuada semper eros sed varius. Nam eget cursus sapien. Etiam nec erat condimentum, mattis odio vel, sollicitudin risus. Fusce vestibulum justo at mi eleifend, in commodo sem aliquam. Aliquam eget finibus turpis. Curabitur faucibus ultrices metus, a suscipit tellus vestibulum at.",
                        'entreprise_id' => $i,
                        'created_at' => now(),
                        'updated_at' => now()

                    ]
                );
            }
        }
    }
}
