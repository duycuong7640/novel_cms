<?php

namespace Modules\Api\Http\Requests\ProductUserLibrary;

use App\Helpers\ResponseHelpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required',
            'product_chapter_id' => '',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [];
    }

    public function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(ResponseHelpers::reponseValidatorData($validator->errors()->getMessages()));
    }
}
