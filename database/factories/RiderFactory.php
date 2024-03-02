<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rider>
 */
class RiderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => "Lana",
            'last_name' => "Del Rey",
            'email' => "lana@lana.com",
            "phone" => "0999999999",
            "password" => Hash::make("pass123456"),
            "age" => 31,
        ];
    }
}
