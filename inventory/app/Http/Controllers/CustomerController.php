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
        return view('customers.create', [
            'customerTypes' => ['personal', 'company'] 
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'customer_type' => 'required|in:personal,company', 
        ]);

        $customer = new Customer([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'customer_type' => $request->get('customer_type'),
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
        return view('customers.edit', [
            'customer' => $customer,
            'customerTypes' => ['personal', 'company'] 
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'customer_type' => 'required|in:personal,company',
        ]);

        $customer->update([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'customer_type' => $request->get('customer_type'),
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