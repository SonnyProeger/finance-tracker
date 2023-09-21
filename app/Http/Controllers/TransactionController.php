<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    protected TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Show the dashboard page with transactions data.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showDashboard(Request $request)
    {
        // Find the user
        $user = auth()->user();

        // Fetch the transactions data
        $transactions = Transaction::where('user_id', $user->id)->select('*')->addSelect(['user_id'])->get();

        // Calculate income using the service
        $income = $this->transactionService->calculateIncome($transactions);

        $expenses = $this->transactionService->calculateExpenses($transactions);

        $balance = $this->transactionService->calculateBalance($transactions);

        // Return the Inertia view with data
        return Inertia::render('Dashboard', [
            'transactions' => $transactions,
            'income' => $income,
            'expenses' => $expenses,
            'balance' => $balance
        ]);
    }

    /**
     * Show the transactions page with transactions data.
     *
     * @param  Request  $request
     * @return Response
     */
    public function showTransactions(Request $request)
    {
        // Find the user
        $user = auth()->user();

        // Fetch the transactions data
        $transactions = Transaction::where('User_id', $user->id)->select('*')->addSelect(['user_id'])->get();


        // Return the Inertia view with data
        return Inertia::render('Transactions', [
            'transactions' => $transactions,
        ]);
    }


}
