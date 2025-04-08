<?php
use App\Models\Product;
class EloquentProductRepository implements ProductRepositoryInterface
{
    public function findByCode(string $code)
    {
        return Product::where('code', $code)->first();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }
}
