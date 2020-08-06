<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|unique:product,product_name',
            'product_name_en' => 'required|unique:product,product_name_en',
            'price_new' => 'required',
            'fimage' =>'required|image',
            'selling_product'=>'required',
            'featured_product'=>'required',
            'qty_product' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm (vn)',
            'product_name.unique' => 'Tên sản phẩm (vn) này đã tồn tại',
            'product_name_en.required' => 'Vui lòng nhập tên sản phẩm (en)',
            'product_name_en.unique' => 'Tên sản phẩm (en) này đã tồn tại',
            'price_new.required' => 'Vui lòng nhập giá mới',
            'fimage.required' => 'Vui lòng upload image',
            'fimage.image' => 'File này không phải là image',
            'selling_product.required' =>'Vui lòng chọn sản phẩm bán chạy',
            'featured_product.required' =>'Vui lòng chọn sản phẩm nổi bật',
            'qty_product.required' => 'Vui lòng nhập số lượng tồn kho',
        ];
    }
}
