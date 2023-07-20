<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'issue_date', 'total_amount', 'payment_method', 'due_date', 'status', 'quantity_product'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function validateQuantityProduct()
    {
        // Get the total quantity of the product requested in this transaction
        $requestedQuantity = $this->quantity_product;

        // Get the total quantity of the product already sold in previous transactions
        $soldQuantity = Transaction::where('status', 'close')->sum('quantity_product');

        // Get the total quantity of the product available in the products table
        $availableQuantity = Product::sum('quantity') - $soldQuantity;

        // Check if the requested quantity exceeds the available quantity
        if ($requestedQuantity > $availableQuantity) {
            throw ValidationException::withMessages([
                'quantity_product' => 'The requested quantity exceeds the available quantity of the product.',
            ]);
        }

        return true;
    }

    public function save(array $options = [])
    {
        // Perform the validation before saving the transaction
        $this->validateQuantityProduct();

        parent::save($options);
    }
}
