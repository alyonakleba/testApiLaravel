<?php

namespace App\Http\Requests;

use Modules\Product\Models\Product;

class ProductRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Product::NAME => 'required|string|unique:products,name',
            Product::CATEGORY_ID => 'required|integer|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            Product::NAME.'.required' => 'A name is required',
            Product::NAME.'.unique'  => 'This name is already taken',
            Product::CATEGORY_ID.'.exists'  => 'This category doesn\'t exists',
        ];
    }

}
