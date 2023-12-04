<?php

namespace App\Http\Requests\Unit;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'Plant_id' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'Name.required' => 'Это поле необходимо заполнить',
            'Name.string' => 'Введенные данные должны бать строкой',

            'Description.string' => 'Введенные данные должны бать строкой',

            'Plant_id.required' => 'Это поле необходимо заполнить',
            'Plant_id.string' => 'Введенные данные должны бать строкой',
        ];
    }
}
