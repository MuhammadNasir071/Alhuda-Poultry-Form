<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'full_name' => ['required', 'min:2', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact' => ['required'],
            'password' => ['required'],
            'role' => ['required']
        ];
    }
}
