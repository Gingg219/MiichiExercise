<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginHandlerRequest extends FormRequest
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
            'email'=>['required',
                        'email',
                        'exists:admins,email',
            ],
            'password'=>['required',
            ],
        ];
        
    }
    public function messages()
    {
        return [
            'email' => [
                'required' => ':attributes Ohai dion vao chu bro',
            ],
            'password' => [
                'required' => ':attributes Ohai dion vao chuaaa bro',
            ],
        ];
    }
    public function attributes()
    {
        return [
            'email'=> 'Email',
            'password'=> 'Password'
        ];
    }
}
