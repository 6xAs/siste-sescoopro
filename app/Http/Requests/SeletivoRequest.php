<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeletivoRequest extends FormRequest
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
            // validações campos Processo Seletivo
            'number_edital'                  => 'required|max:255',
            'title'                          => 'required|max:255',
            'subtitle'                       => 'max:255|',
            'observacao'                     => 'max:300',
            'data'                           => 'required|date',
        
        ];
    }
}
