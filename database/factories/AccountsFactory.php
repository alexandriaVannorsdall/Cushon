<?php

namespace Database\Factories;

use App\Models\Accounts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Accounts>
 */
class AccountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 100),
            'account_name' => $this->faker->word,
            'account_id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['Savings', 'Checking']),
            'balance' => $this->faker->randomFloat(),
            'opened_at' => $this->faker->dateTime(),
        ];
    }
}
