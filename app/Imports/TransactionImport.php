<?php

namespace App\Imports;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TransactionImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2; // Change this to the appropriate starting row number
    }

    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        $transactiedatum = Carbon::createFromFormat('Ymd', $row[2]);

        $rentedatum = Carbon::createFromFormat('Ymd', $row[3]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user is authenticated
        if ($user) {
            return new Transaction([
                'User_id' => $user->id,
                'Rekeningnummer' => $row[0],
                'Muntsoort' => $row[1],
                'Transactiedatum' => $transactiedatum,
                'Rentedatum' => $rentedatum,
                'Beginsaldo' => $row[4],
                'Eindsaldo' => $row[5],
                'Transactiebedrag' => $row[6],
                'Omschrijving' => $row[7],
            ]);
        }

        return null;
    }
}
