<?php

namespace Database\Factories;

use App\Models\RegisteredUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegisteredUserFactory extends Factory
{
    protected $model = RegisteredUser::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile_number' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address()
        ];
    }
}
