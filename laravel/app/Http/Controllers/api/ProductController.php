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
        // return response()->json($Product);
    }

    public function store(Request $request)
    {
        Log::debug($request);

        if(str_contains($request->price, ',')){
            $request->merge(['price' => str_replace(',', '.', $request->price)]);
        }
        
        die($request->price);

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

    // public function destroy(string $id)
    // {
    //     //
    // }
}
