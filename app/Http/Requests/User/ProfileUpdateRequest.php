<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=> ['required', 'max:50',Rule::unique('users')->ignore($this->id) ],
           // 'mobile'=> ['required', "regex:/^[0-9]*$/", 'max:10',Rule::unique('users')->ignore($this->id) ],
            'name'=> ['required', "regex:/^[A-Za-z,'-]*$/", 'max:50', 'min:3'],


        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            /*'last_name.required' => 'Last name  is required!',
            'last_name.max' => 'Last name  max length should be :max !',
            'last_name.regex' => 'Last name is invalid!',*/
            'email.unique' => 'Email should be unique!',
            'mobile.unique' => 'Phone-number should be unique!',
            'name.required' => 'First name  is required!',
            'name.max' => 'First name  max length should be :max !',
            'name.regex' => 'First name is invalid!',
        ];
    }
}
