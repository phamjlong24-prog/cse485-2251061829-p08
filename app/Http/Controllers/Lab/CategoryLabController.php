<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryLabController extends Controller
{
    public function index()
    {
        return Category::orderBy('name')->get();
    }

    public function show(int $id)
    {
        return Category::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        $category = Category::create($data);
        return response()->json($category, 201);
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:100', 'unique:categories,name,' . $id],
            'description' => ['nullable', 'string'],
        ]);

        $category->update($data);
        return $category;
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);

        if ($category->products()->exists()) {
            return response()->json([
                'message' => 'Khong the xoa danh muc con san pham',
            ], 422);
        }

        $category->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}