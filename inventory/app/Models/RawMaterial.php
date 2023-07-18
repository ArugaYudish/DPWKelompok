<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'raw_materials_products', 'raw_material_id', 'product_id')
            ->withPivot('quantity_raw_materials');
    }
}
