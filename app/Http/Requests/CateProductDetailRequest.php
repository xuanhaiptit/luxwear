<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateProductDetailRequest extends FormRequest
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
            'txtname_cate' => 'required|unique:cate_product_detail,name',
            'txtname_cate_en' => 'required|unique:cate_product_detail,name_detail_en',
        ];
    }
    public function messages()
    {
        return [
            'txtname_cate.required' => 'Vui lòng nhập tên loại sản phẩm',
            'txtname_cate.unique' => 'Tên loại sản phẩm đã tồn tại',
            'txtname_cate_en.required' => 'Vui lòng nhập tên loại sản phẩm (en)',
            'txtname_cate_en.unique' => 'Tên loại sản phẩm (en) đã tồn tại',
        ];
    }
}
