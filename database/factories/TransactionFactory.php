<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $currentBalance = 1000.00; // Starting balance
    protected $currentDate = '20220101'; // Starting date

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random debit or credit transaction
        $isDebit = $this->faker->boolean;
        $transactionAmount = $this->faker->randomFloat(2, 10, 500);

        if ($isDebit) {
            $this->currentBalance -= $transactionAmount;
        } else {
            $this->currentBalance += $transactionAmount;
        }

        // Increment the date to ensure it's on or after the previous date
        $this->currentDate = $this->faker->dateTimeBetween($this->currentDate, 'now')->format('Ymd');

        return [
            'Rekeningnummer' => $this->faker->bankAccountNumber,
            'Muntsoort' => 'EUR',
            'Transactiedatum' => $this->currentDate,
            'Rentedatum' => $this->faker->dateTimeBetween($this->currentDate, 'now')->format('Ymd'),
            'Beginsaldo' => number_format($this->currentBalance - $transactionAmount, 2, '.', ''),
            'Eindsaldo' => number_format($this->currentBalance, 2, '.', ''),
            'Transactiebedrag' => number_format($transactionAmount, 2, '.', ''),
            'Omschrijving' => $this->faker->sentence,
        ];
    }
}
