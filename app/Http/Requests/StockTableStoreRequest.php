<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockTableStoreRequest extends FormRequest
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
            'Name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'max:255'],
            'item_category_id' => ['required', 'exists:item_categories,id'],
            'unit_id' => ['required', 'exists:units,id'],
            'remarks' => ['required', 'max:255', 'string'],
        ];
    }
}
