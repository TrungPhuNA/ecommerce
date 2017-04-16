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
            'name'        => 'required',
            'price'       => 'required',
            'thunbar'     => 'required',
            'category_id' => 'required',
            'number'      => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Mời bạn nhập đầy đủ thông tin',
            'price.required'       => 'Mời bạn nhập đầy đủ thông tin',
            'thunbar.required'     => 'Mời bạn nhập đầy đủ thông tin',
            'category_id.required' => 'Mời bạn nhập đầy đủ thông tin',
            'number.required'      => 'Mời bạn nhập đầy đủ thông tin',
            'description.required' => 'Mời bạn nhập đầy đủ thông tin'
        ];
    }
}
