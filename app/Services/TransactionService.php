<?php

namespace App\Services;

use Illuminate\Support\Collection;

class TransactionService
{
    /**
     * Calculate the total income based on transactions data.
     *
     * @param  Collection  $transactions
     * @return float
     */
    public function calculateIncome(Collection $transactions)
    {
        // Filter transactions to consider only income (positive transactions)
        $incomeTransactions = $transactions->filter(function ($transaction) {
            return $transaction->Transactiebedrag > 0;
        });

        // Calculate the total income
        $totalIncome = $incomeTransactions->sum('Transactiebedrag');

        $formattedIncome = '€'.number_format(abs($totalIncome), 2, '.', ',');

        return $formattedIncome;
    }

    public function calculateExpenses(Collection $transactions)
    {
        // Filter transactions to consider only expenses (negative transactions)
        $incomeTransactions = $transactions->filter(function ($transaction) {
            return $transaction->Transactiebedrag < 0;
        });

        // Calculate the total income
        $totalExpenses = $incomeTransactions->sum('Transactiebedrag');

        $formattedExpenses = '€'.number_format(abs($totalExpenses), 2, '.', ',');

        return $formattedExpenses;
    }

    public function calculateBalance(Collection $transactions)
    {
        // Get the latest transaction based on the transaction date
        $latestTransaction = $transactions->sortByDesc('Transactiedatum')->first();

        if ($latestTransaction) {
            // Extract the ending balance from the latest transaction
            $balance = $latestTransaction->Eindsaldo;

            // Format the balance as currency
            $formattedBalance = '€'.number_format($balance, 2);

            return $formattedBalance;
        }

        // Return a default value if there are no transactions
        return '€0.00';
    }
}
