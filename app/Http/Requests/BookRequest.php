<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required',
            'author_id' => 'required|exists:authors,id',
            'content' => 'required',
            'pages' => 'required|numeric',
            'published_on' => 'required'
        ];
    }
    
    /**
     * Customize validation message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'author_id.required' => 'The authors field is required',
            'published_on.required' => 'The publish date is required'
        ];
    }
}
