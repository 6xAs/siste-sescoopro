<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrutorRequest extends FormRequest
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
            'name'                  => 'required|max:255|min:3',
            'email'                 => 'required|max:255|',
            'data_nascimento'       => 'required|max:20|min:3',
            'sexo'                  => 'required|max:10|min:3',
            'estado_civil'          => 'required|max:15|min:3',
            'rua'                   => 'max:250|min:3',
            'bairro'                => 'max:250|min:3',
            'number'                => 'max:8|min:1',
            'objetivo'              => 'min:10',
            'experiêncy'            => 'max:255|min:3',
            'formation'             => 'max:255|min:3',
            'idiomas'               => 'max:255|min:3',
            'informatica'           => 'max:255|min:3',
        ];
    }
}
