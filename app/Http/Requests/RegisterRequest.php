<?php

namespace App\Http\Requests;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname'=>'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:20',
            'phone'=>'required|unique:users,phone|min:10|max:10',
            'address'=>'required',
            'gender'=>'required',
            'confirm_password' => 'required|same:password',
        ];
    }
}
