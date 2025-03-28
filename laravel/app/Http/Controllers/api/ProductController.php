<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $products = Product::all();
        $code = $request->get('code');
        
        if (!empty($products)) {
            foreach ($products as $product) {
                if ($product->code == $code) {
                    return response()->json(['message' => 'Product with the same code already exists'], 409);
                }
            }
        }

        if (str_contains($request->price, ',')) {
            $request->merge(['price' => str_replace(',', '.', $request->price)]);
        }
        Product::create($request->all());
    }

    public function show(string $id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
    }
}
