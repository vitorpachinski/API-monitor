<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        return Offer::all();
    }
    public function store(Request $request)
    {
        return Offer::create($request->all());
    }

    public function show(string $id)
    {
        return Offer::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $offer = Offer::findOrFail($id);
        return $offer->update($request->all());
    }
}
