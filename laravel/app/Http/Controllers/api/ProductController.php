<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Products;

class ProductController extends Controller
{
    public function index()
    {
        return Products::all();
        // return response()->json($products);
    }

    public function store(Request $request)
    {
        Log::debug($request);

        if(str_contains($request->price, ',')){
            $request->merge(['price' => str_replace(',', '.', $request->price)]);
        }
        
        die($request->price);

        Products::create($request->all());
    }

    public function show(string $id)
    {
        return Products::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
    }

    // public function destroy(string $id)
    // {
    //     //
    // }
}
