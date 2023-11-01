<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            'shed_id' => ['required'],
            'company_id' => ['required'],
            'invoice_no' => ['required', 'numeric', 'min:3'],
            'expense_type' => ['required'],
            'expense_detail' => ['required'],
            'price' => ['required'],
            'date' => ['required'],
        ];
    }
}
