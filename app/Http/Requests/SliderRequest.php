<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title' =>'required|unique:slider,name',
            'fimage' =>'required',
        ];
    }
    public function messages(){
        return[
            'title.required'=>'Vui lòng nhập tên slider',
            'title.unique'=>'Tên slider đã tồn tại',
            'fimage.required'=>'Vui lòng upload image',
        ];
    }
}
