<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Rules\ProductCodeExists;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('price') && str_contains($this->price, ',')) {
            $this->merge(['price' => str_replace(',', '.', $this->price)]);
        }
    }

    public function updateFields(): array
    {
        return $this->updateFields ?? [];
    }

    public function rules(): array
    {
        return [
            'code'         => ['required', 'integer', new ProductCodeExists()],
            'name'         => ['sometimes', 'string', 'max:255'],
            'price'        => ['sometimes', 'numeric'],
            'offer_price'  => ['sometimes', 'numeric'],
            'category_id'  => ['sometimes', 'exists:categories,id'],
            'is_offer'     => ['sometimes', 'boolean'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Erro de validação',
            'errors'  => $validator->errors(),
        ], 422));
    }

    protected function passedValidation(): void
    {
        $product = $this->route('product');
        $this->updateFields = collect($this->validated())
            ->except('code')
            ->filter(fn($value, $key) => data_get($product, $key) != $value)
            ->all();

        if (empty($this->updateFields)) {
            throw new HttpResponseException(response()->json([
                'message' => 'Nenhuma alteração detectada nos dados do produto.'
            ], 200));
        }
    }

    
}
