<?php

namespace Database\Seeders;

use App\Models\Accounts;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use RuntimeException;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $count = 10;


        $customers = Customer::all();
        $accounts = Accounts::all();

        if ($customers->isEmpty() || $accounts->isEmpty()) {
            throw new RuntimeException("There are no customers or accounts available.");
        }

        for ($i = 0; $i < $count; $i++) {
            Transaction::factory()->create([
                'account_id' => $accounts->random()->id,
                'type' => $accounts->random(),
            ]);
        }
    }

}
