<?php

namespace Modules\Admins\Http\Requests\Point;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'    => 'required|min:2',
            'category_id'    => 'required',
//            'thumbnail'    => 'required',
//            'slug'    => 'required|unique:posts',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
