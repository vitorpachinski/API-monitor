<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('price') && str_contains($this->price, ',')) {
            $this->merge([
                'price' => str_replace(',', '.', $this->price),
            ]);
        }
    }

    public function rules(): array
    {
        return [
            'code'  => ['required', 'string', 'unique:products,code'],
            'name'  => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],        ];
    }
}
