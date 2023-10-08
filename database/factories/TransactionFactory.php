<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['deposit', 'withdrawal']),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
