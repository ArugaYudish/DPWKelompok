<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'quantity'];

    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterial::class, 'raw_materials_products', 'product_id', 'raw_material_id')
            ->withPivot('quantity_raw_materials');
    }
}
