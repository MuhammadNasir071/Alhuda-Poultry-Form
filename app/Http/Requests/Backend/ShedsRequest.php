<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ShedsRequest extends FormRequest
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
            'name' => ['required', 'min:2', 'string'],
            'is_active' => ['boolean', 'nullable'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'company_id' => ['required']
        ];
    }
}
