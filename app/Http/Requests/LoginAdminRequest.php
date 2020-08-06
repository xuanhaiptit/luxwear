<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
            'username' =>'required',
            'password' =>'required|min:6|max:20'
        ];
    }
    public function messages()
    {
        return [
            'username.required' =>'Vui lòng nhập tên đăng nhập',
            'password.required' =>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập Password từ 6 đến 20 kí tự',
            'password.max'=>'Vui lòng nhập Password từ 6 đến 20 kí tự',
        ];
    }
}
