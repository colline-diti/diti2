<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequisitionDeliveryStoreRequest extends FormRequest
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
            'item_quantity' => ['required', 'max:255', 'string'],
            'delivery_date' => ['required', 'date'],
            'remarks' => ['required', 'max:255', 'string'],
            'requisition_item_id' => [
                'required',
                'exists:requisition_items,id',
            ],
        ];
    }
}
