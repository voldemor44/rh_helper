<?php

namespace Database\Factories;

use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use App\Models\Departement;
use App\Models\Fonctions;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Faker\Provider\fr_FR\Person;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new Person($faker));
        $entrepriseUuid = Entreprise::first()->id;
        $departementUuid = Departement::where('nom', 'Web')->first();
        $fonctionUuid = Fonctions::where('departement_id', $departementUuid->id)->first()->id;

        return [
            // 'name' => fake()->name(),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
            "id" => Uuid::uuid4()->toString(),
            'name' => $faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'telephone' => $this->faker->unique()->phoneNumber,
            'date_naissance' => $this->faker->dateTime(),
            'statut_utilisateur_id' => 1,
            'departement_id' => $departementUuid->id,
            'entreprise_id' => $entrepriseUuid,
            'fonction_id' => $fonctionUuid,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
