<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
}
