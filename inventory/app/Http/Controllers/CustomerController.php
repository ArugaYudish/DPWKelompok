<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = auth()->user()->customers;
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $customer = new Customer([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
        ]);

        auth()->user()->customers()->save($customer);

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $customer->update([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}