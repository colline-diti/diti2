<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetsAccountsUpdateRequest extends FormRequest
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
            'asset_name' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'supplier' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'asset_types_id' => ['required', 'exists:asset_types,id'],
        ];
    }
}
