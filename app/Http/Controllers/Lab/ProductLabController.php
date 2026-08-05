<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductLabController extends Controller
{
    public function index()
    {
        return Product::orderByDesc('id')->paginate(10);
    }

    public function show(int $id)
    {
        return Product::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'sku' => ['required', 'string', 'max:30', 'unique:products,sku'],
            'name' => ['required', 'string', 'max:150'],
            'price' => ['required', 'integer', 'min:0'],
            'qty' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'category_id' => ['sometimes', 'exists:categories,id'],
            'sku' => ['sometimes', 'string', 'max:30', 'unique:products,sku,' . $id],
            'name' => ['sometimes', 'string', 'max:150'],
            'price' => ['sometimes', 'integer', 'min:0'],
            'qty' => ['sometimes', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        $product->update($data);
        return $product;
    }

    public function destroy(int $id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}