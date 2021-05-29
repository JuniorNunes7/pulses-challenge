<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
        $rules = [
            'title' => ['max:255'],
            'dimension_id' => ['exists:dimensions,id'],
            'active' => ['boolean']
        ];

        if ($this->isMethod('post')) {
            $rules['title'][] = 'required';
            $rules['dimension_id'][] = 'required';
        }

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'dimension_id' => 'dimensão',
        ];
    }
}
