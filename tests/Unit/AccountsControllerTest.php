<?php

namespace Tests\Unit;

use App\Models\Accounts;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

class AccountsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testDepositMethod()
    {
        // Create a dummy customer
        $customer = Customer::factory()->create();

        // Create a dummy account for the customer
        $account = Accounts::factory()->create(['customer_id' => $customer->id]);

        // Generate dummy data for the deposit request
        $requestData = [
            'account_id' => $account->id,
            'amount' => 100,
        ];

        // Send a POST request to the deposit route with the dummy data
        $response = $this->post('/deposit', $requestData);

        // Assert that the response is redirected back
        $response->assertRedirect();

        // Assert that the account balance has been updated correctly
        $updatedAccount = Accounts::search($account->id);
        $this->assertEquals(round($account->balance + $requestData['amount'], 2), $updatedAccount->balance);

        // Assert that a new transaction record has been created
        $this->assertDatabaseHas('transactions', [
            'account_id' => $account->id,
            'amount' => $requestData['amount'],
            'type' => 'deposit',
        ]);
    }

    /**
     * Sets up environment for testing.
     *
     * @return mixed
     */
    public function createApplication(): mixed
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }
}
