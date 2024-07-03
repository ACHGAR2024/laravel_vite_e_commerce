<?php

namespace Database\Factories;

use App\Models\Adresse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Adresse::class;

    /** 
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_adresse' => $this->faker->streetName,
            'adresse' => $this->faker->streetAddress,
            'ville' => $this->faker->city,
            'code_postal' => $this->faker->postcode,
            'pays' => $this->faker->country,
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => user::factory(), 
        ];
    }
}
