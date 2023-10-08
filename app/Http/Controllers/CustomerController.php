<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    /**
     * Gets all the customers from the database and displays them.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Displays a form for creating a new customer.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customers.create');
    }

    /**
     * Creates a new customer in the database and validates it.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'account_name' => 'required',
            'account_id' => 'required'
        ]);

        (new Customer)->create($validatedData);

        return redirect()->route('customers.index');
    }

    /**
     * Gets a specific customer and their record and displays it.
     *
     * @param Customer $customer
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show(Customer $customer): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Gets the corresponding customer in the database and validates it.
     *
     * This I thought would be important if someone was changed their name
     * there would need to be a way to update that information.
     *
     * @param Request $request
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $validatedData = $request->validate([
            'account_name' => 'required',
            'account_id' => 'required'
        ]);

        $customer->update($validatedData);

        return redirect()->route('customers.index');
    }

    /**
     * Deletes a specific customer from the database.
     *
     * @param Customer $customer
     * @return RedirectResponse
     */
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index');
    }
}

