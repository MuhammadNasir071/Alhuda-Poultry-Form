<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
            'invoice_no' => ['required', 'numeric', 'min:3'],
            'expense_type' => ['required'],
            'expense_detail' => ['required'],
            'price' => ['required'],
            'date' => ['required'],
        ];
    }
}
