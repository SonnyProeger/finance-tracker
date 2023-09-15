<?php

namespace App\Http\Controllers;

use App\Imports\TransactionImport;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class TransactionImportController extends Controller
{
    //
    public function showUploadForm()
    {
        return Inertia::render('UploadPage');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new TransactionImport(), $file);
            return to_route('dashboard')->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            return to_route('upload')->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
}
