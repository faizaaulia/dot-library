<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
        $rules = ['name' => 'required'];

        if ($this->getMethod() == 'PUT') {
            $rules += ['book_id' => 'required'];
        }

        return $rules;
    }

    public function messages()
    {
        return ['book_id.required' => 'The book field is required'];
    }
}
