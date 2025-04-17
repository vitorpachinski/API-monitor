<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'code'  => ['required', 'int', 'unique:products,code'],
            'name'  => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'is_offer' => ['sometimes', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'        => 'O código do produto é obrigatório.',
            'code.unique'          => 'Já existe outro produto com esse código.',
            'name.required'        => 'O nome do produto é obrigatório.',
            'price.required'       => 'O preço é obrigatório.',
            'price.numeric'        => 'O preço deve ser um valor numérico.',
            'category_id.required' => 'A categoria é obrigatória.',
            'category_id.exists'   => 'A categoria selecionada não existe.',
            'is_offer.boolean'     => 'is_offer deve ser verdadeiro ou falso.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Erro de validação',
            'errors'  => $validator->errors(),
        ], 422));
    }
}
