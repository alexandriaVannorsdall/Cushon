<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\Accounts;

class AccountsSeeder extends Seeder
{
    public function run()
    {
        $count = 10;

        $customers = Customer::all();

        Accounts::factory()->count($count)->create([
            'customer_id' => $customers->random()->id,
        ]);
    }
}
