<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterialProduct extends Model
{
    use HasFactory;

    protected $table = 'raw_materials_products';
    protected $fillable = ['raw_material_id', 'product_id', 'quantity_raw_materials'];

    public function rawMaterial()
    {
        return $this->belongsTo(RawMaterial::class, 'raw_material_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
