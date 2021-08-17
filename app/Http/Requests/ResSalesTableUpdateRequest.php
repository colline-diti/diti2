<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResSalesTableUpdateRequest extends FormRequest
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
            'price' => ['required', 'numeric'],
            'res_product_id' => ['required', 'exists:res_products,id'],
        ];
    }
}
