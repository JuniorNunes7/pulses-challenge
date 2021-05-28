<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DimensionRequest extends FormRequest
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
            'title' => ['required', 'max:255']
        ];

        if ($this->isMethod('post')) {
            $rules['title'][] = 'unique:dimensions';
        } else if ($this->isMethod('put')) {
            $rules['title'][] = Rule::unique('dimensions')->ignore($this->dimension);
        }

        return $rules;
    }
}
