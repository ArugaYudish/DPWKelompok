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
        $requestedQuantity = $this->quantity_product;

        $soldQuantity = Transaction::where('status', 'close')->sum('quantity_product');

        $availableQuantity = Product::sum('quantity') - $soldQuantity;

        if ($requestedQuantity > $availableQuantity) {
            throw ValidationException::withMessages([
                'quantity_product' => 'The requested quantity exceeds the available quantity of the product.',
            ]);
        }

        return true;
    }

    public function save(array $options = [])
    {
        
        $this->validateQuantityProduct();

        parent::save($options);
    }
}
