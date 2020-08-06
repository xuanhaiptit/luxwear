<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_title' => 'required|unique:page,page_title',
            'page_title_en' => 'required|unique:page,page_title_en',
        ];
    }
    public function messages()
    {
        return [
            'page_title.required' => 'Vui lòng nhập tiêu đề trang (vn)',
            'page_title_en.required' => 'Vui lòng nhập tiêu đề trang (en)',
            'page_title.unique' => 'Tiêu đề trang (vn) đã tồn tại',
            'page_title_en.unique' => 'Tiêu đề trang (en) đã tồn tại',
        ];
    }
}
