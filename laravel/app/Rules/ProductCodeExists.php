<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;

class ProductCodeExists implements Rule
{
    public function passes($attribute, $value): bool
    {
        return Product::where('code', $value)->exists();
    }

    public function message(): string
    {
        return 'Produto com o código informado não foi encontrado.';
    }
}
