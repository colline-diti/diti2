<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecieptStoreRequest extends FormRequest
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
            'quantity' => ['required', 'numeric'],
            'cash' => ['required', 'numeric'],
            'change' => ['required', 'numeric'],
            'balance' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'served_by' => ['required', 'max:255', 'string'],
            'res_product_id' => ['required', 'exists:res_products,id'],
        ];
    }
}
