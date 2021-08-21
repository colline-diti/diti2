<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockDischargeStoreRequest extends FormRequest
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
            'quantity_issued' => ['required', 'max:255'],
            'stock_table_id' => ['required', 'exists:stock_tables,id'],
            'unit_id' => ['required', 'exists:units,id'],
            'res_section_id' => ['required', 'exists:res_sections,id'],
            'return_date' => ['required', 'date'],
            'remarks' => ['required', 'max:255', 'string'],
            'issued_by' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
