<?php

namespace App\Http\Controllers\api;

use ProductService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request, Product $product)
    {
        $newProduct = $product->create($request->validated());

        return response()->json($newProduct, 201);
    }



    public function show(string $id)
    {
        return Product::findOrFail($id);
    }

    public function update(UpdateProductRequest $request, Product $product) 
    {
        \Log::debug('resultado:', $request->updateFields());
        $product->update($request->updateFields());

        return response()->json([
            'message' => 'Produto atualizado com sucesso!',
            'product' => $product,
        ], 201);
    }
}
