<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSalesRequest extends FormRequest
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
            'client_id' => ['required'],
            'vehicle_no' => ['required'],
            'initial_weight' => ['required'],
            'final_weight' => ['required'],
            'rate' => ['required'],
            'payment_type' => ['required'],
            'payment_status' => ['required'],
        ];
    }
}
