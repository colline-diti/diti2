<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResProductUpdateRequest extends FormRequest
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
            'product_name' => ['required', 'max:255', 'string'],
            'res_category_id' => ['required', 'exists:res_categories,id'],
        ];
    }
}
