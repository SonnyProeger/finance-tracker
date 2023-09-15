<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $existingRecordsCount = Transaction::query()->count();

        if ($existingRecordsCount === 0) {
            // If no records exist, seed the database
            Transaction::factory()->count(30)->create();
        }
    }
}

