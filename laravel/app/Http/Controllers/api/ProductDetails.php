<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class ProductDetails extends Controller
{
    public function index()
    {
        return ProductDetail::all();
    }
    public function store(Request $request)
    {
        return ProductDetail::create($request->all());
    }

    public function show(string $id)
    {
        return ProductDetail::findOrFail($id);
    }
    
    public function update(Request $request, string $id)
    {
        $productDetail = ProductDetail::findOrFail($id);
        return $productDetail->update($request->all());
    }
}
