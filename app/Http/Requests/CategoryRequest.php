<?php

namespace App\Http\Requests;

use Modules\Category\Models\Category;

class CategoryRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            Category::NAME => 'required|string|unique:categories,name',
            Category::IS_ACTIVE => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            Category::NAME.'.required' => 'A name is required',
            Category::NAME.'.unique'  => 'This name is already taken'
        ];
    }
}
