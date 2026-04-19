<?php

namespace Database\Factories;

use Ramsey\Uuid\Uuid;
use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $entrepriseUuid = Entreprise::first()->id;
        return [
            //
            "id" => Uuid::uuid4()->toString(),
            'nom' => $this->faker->name(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'fonction' => $this->faker->jobTitle(),
           'Entreprise' => $this->faker->company(),
            'type_contact_id' => 2,
            'entreprise_id' => $entrepriseUuid,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
