<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'issue_date', 'total_amount', 'payment_method', 'due_date', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
