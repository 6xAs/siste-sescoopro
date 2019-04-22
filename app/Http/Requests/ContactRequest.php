<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // validações campos Filme
            'name'          => 'required|max:100|min:5',
            'email'         => 'required|max:50|',
            'assunto'       => 'required|max:50|',
            'message'       => 'required|',

        ];
    }
}
