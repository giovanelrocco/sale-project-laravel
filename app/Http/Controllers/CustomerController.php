<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index', [
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): RedirectResponse
    {
        $customer = new Customer;

        $customer->name = $request->name;

        $customer->save();

        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer, string $id)
    {
        $customer = Customer::find($id);

        return view('customer.update', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        $customer = Customer::find($request->id);

        $customer->id = $request->id;
        $customer->name = $request->name;

        $return = $customer->save();

        return redirect('/customer' . '/' . $customer->id)->with('status', 'customer-updated');
    }
}
