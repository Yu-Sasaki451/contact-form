<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'gender'     => $this->faker->numberBetween(1,3),
            'email'      => $this->faker->unique()->safeEmail(),
            'tel'        => $this->faker->phoneNumber(),
            'address'    => $this->faker->address(),
            'building'   => $this->faker->optional()->secondaryAddress(),
            'detail'     => $this->faker->realText(150),
        ];
    }
}
