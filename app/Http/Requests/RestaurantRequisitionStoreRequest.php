<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequisitionStoreRequest extends FormRequest
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
            'dateofDelivery' => ['required', 'max:255', 'string'],
            'status' => ['required', 'max:255', 'string'],
            'Particulars' => ['required', 'max:255', 'string'],
        ];
    }
}
