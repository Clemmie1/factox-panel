<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SmtpUser>
 */
class SmtpUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => 1,
            'smtp_name' => fake()->companySuffix(),
            'smtp_user_name' => Uuid::uuid4(),
            'smtp_user_password' => Uuid::uuid4(),
        ];
    }
}
