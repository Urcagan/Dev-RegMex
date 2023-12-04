<?php

namespace App\Http\Requests\UOMUnit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Name' => 'required|string',
            'Description' => 'nullable|string',
            'Abbreviation' => 'required|string',
            'Factor' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Это поле необходимо заполнить',
            'Name.string' => 'Введенные данные должны бать строкой',

            'Description.string' => 'Введенные данные должны бать строкой',

            'Abbreviation.required' => 'Это поле необходимо заполнить',
            'Abbreviation.string' => 'Введенные данные должны бать строкой',

            'Factor.required' => 'Это поле необходимо заполнить',
            'Factor.string' => 'Введенные данные должны бать строкой',
        ];
    }
}
