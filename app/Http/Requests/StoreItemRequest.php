<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $input = $this->all();

        array_walk($input, function (&$value) {
            if (is_string($value)) {
                $value = trim(strip_tags($value));
            }
        });

        $this->merge($input);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer',
        ];
    }
}