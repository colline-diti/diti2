<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => ['required', 'max:255', 'string'],
            'unit_price' => ['required', 'numeric'],
            'total_price' => ['required', 'numeric'],
            'discounts' => ['required', 'numeric'],
            'clients_id' => ['required', 'exists:clients,id'],
            'payment_types_id' => ['required', 'exists:payment_types,id'],
        ];
    }
}
