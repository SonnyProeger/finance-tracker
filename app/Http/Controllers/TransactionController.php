<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TransactionController extends Controller
{
    protected TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }


    /**
     * Show the dashboard page with transactions data.
     *
     * @param Request $request
     * @return \Inertia\Response
     */
    public function showDashboard(Request $request)
    {
        // Fetch the transactions data (you can get it from your database)
        $transactions = Transaction::all(); // Replace with your actual retrieval logic

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
}
