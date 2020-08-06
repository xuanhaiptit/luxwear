<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
    public function rules()
    {
        return [
            'fullname'=>'required',
            'username' => 'required|unique:admin,username',
            'email' => 'required|unique:admin,email',
            'password' => 'required|min:6|max:20',
            'phone'=>'required|unique:admin,phone|min:10|max:10',
            'address'=>'required',
            'sltgender'=>'required',
            'confirm_password' => 'required|same:password',
            'fimage' =>'required|image',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập Tên hiển thị',
            'username.required' => 'Vui lòng nhập Tên đăng nhập',
            'username.unique' => 'Tên đăng nhập này đã tồn tại',
            'email.required' => 'Vui lòng nhập Email',
            'email.unique'=>'Email đã tồn tại',
            'phone.required'=>'Vui lòng nhập Số điện thoại',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'phone.min'=>'Độ dài gồm 10 kí tự',
            'phone.max'=>'Độ dài gồm 10 kí tự',
            'address.required'=>'Vui lòng nhập Địa chỉ',
            'password.required' => 'Vui lòng nhập Mật khẩu',
            'sltgender.required' => 'Vui lòng chọn Giới tính',

            'confirm_password.required' => 'Vui lòng nhập lại Mật khẩu',
            'confirm_password.same'=>'Nhập lại mật khẩu không chính xác',

            'fimage.required' => 'Vui lòng upload image',
            'fimage.image' => 'File này không phải là image',
        ];
    }
}
