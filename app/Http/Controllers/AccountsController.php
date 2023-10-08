<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function deposit(Request $request): RedirectResponse
    {
        // Validate the form input
        $request->validate([
            'account_id' => 'required|exists:accounts,id|unique:transactions,account_id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the account based on the provided ID
        $account = Accounts::findOrFail($request->input('account_id'));

        // Update the account balance
        $account->balance += $request->input('amount');

        // Save the changes to the database
        $account->save();

        // Create a new transaction record
        Transaction::create([
            'account_id' => $account->id,
            'amount' => $request->input('amount'),
            'type' => 'deposit',
        ]);

        // Redirect back or show success message
        return redirect()->back()->with('success', 'Money deposited successfully.');
    }


}
