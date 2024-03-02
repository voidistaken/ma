<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 * 
 * 
 * $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email',60)->unique();
            $table->string('phone', 10)->unique();
            $table->string('password');
            $table->smallInteger('age');
            $table->string('cin', 8)->unique();
            $table->string('license_number', 8)->unique();
            $table->string('license_expires_at');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => "Sara",
            'last_name' => "Driver",
            'email' => "driver@driver.com",
            "phone" => "0999999999",
            "password" => Hash::make("pass123456"),
            "age" => 31,
            "cin" => "AB12345",
            "license_number" => "AB12345",
            "license_expires_at" => "08/36"
        ];
    }
}
