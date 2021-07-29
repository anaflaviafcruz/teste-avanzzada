<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'unique:users,email,'.$this->request->all()['id']]
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O nome é um campo obrigatório.',
            'name.max' => 'O nome deve ter no máximo 10 caracteres.',
            'email.required' => 'O email é um campo obrigatório.',
            'email.unique' => 'Este email já foi cdastrado.',
            'email.email' => 'O email deve ser um endereço de email válido.'
        ];
    }
}
