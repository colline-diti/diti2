<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockTableUpdateRequest extends FormRequest
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
            'item_name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'unit' => ['required', 'max:255', 'string'],
            'item_category_id' => ['required', 'exists:item_categories,id'],
            'buying_price' => ['required', 'max:255'],            
            'remarks' => ['required', 'max:255', 'string'],
        ];
    }
}
