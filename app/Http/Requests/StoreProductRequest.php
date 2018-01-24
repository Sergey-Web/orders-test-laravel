<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name'        => 'required|unique:products,name',
            'count'       => 'required|numeric|digits_between:1,5',
            'price'       => 'required|numeric|digits_between:1,10',
            'counterpaty' => 'required'
        ];
    }
}
