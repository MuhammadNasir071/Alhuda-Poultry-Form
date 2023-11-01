<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MortalityRequest extends FormRequest
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
            'day_mortality' => ['required', 'numeric'],
            'night_mortality' => ['required', 'numeric'],
            'date' => ['required'],
            'company_id' => ['required'],
            'shed_id' => ['required']
        ];
    }
}
