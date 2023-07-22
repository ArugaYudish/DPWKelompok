<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RawMaterial;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('rawMaterials')->get();
        $totalQuantity = $products->sum('quantity');
        return view('products.index', compact('products', 'totalQuantity'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $rawMaterials = RawMaterial::all();
        return view('products.create', compact('rawMaterials'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'raw_materials' => 'required|array', // Array of raw_material_id => quantity_raw_materials
            'raw_materials.*' => 'required|integer|min:0',
        ]);

        $product = Product::create([
            'date' => $validatedData['date'],
            'quantity' => $validatedData['quantity'],
        ]);

        foreach ($validatedData['raw_materials'] as $rawMaterialId => $quantity) {
            $product->rawMaterials()->attach($rawMaterialId, ['quantity_raw_materials' => $quantity]);
        }

        return redirect()->route('products.index')->with('success', 'Produksi bricket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $rawMaterials = RawMaterial::all();
        return view('products.edit', compact('product', 'rawMaterials'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'raw_materials' => 'required|array',
            'raw_materials.*' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'date' => $validatedData['date'],
            'quantity' => $validatedData['quantity'],
        ]);

        $product->rawMaterials()->detach();
        foreach ($validatedData['raw_materials'] as $rawMaterialId => $quantity) {
            $product->rawMaterials()->attach($rawMaterialId, ['quantity_raw_materials' => $quantity]);
        }

        return redirect()->route('products.index')->with('success', 'Produksi bricket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->rawMaterials()->detach();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produksi bricket berhasil dihapus.');
    }
}
