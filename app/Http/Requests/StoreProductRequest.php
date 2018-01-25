<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'           => 'required|unique:products,name',
            'count'          => 'required|numeric|min:1|max:10000',
            'price'          => 'required|numeric|min:1|max:1000000000',
            'id_counterpaty' => 'required'
        ];
    }
}
