<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicitacaoRequest extends FormRequest
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
            // validações campos Notice
            'ano'                             => 'required|max:10',
            'number_process'                  => 'required|max:255',
            'modalidade'                      => 'required|max:255',
            'edital'                          => 'required|max:255|',
            'tipo_licitacao'                  => 'required|max:255|',
            'objeto'                          => 'required|min:10',
            'local'                           => 'required|min:10',
            'status'                          => 'required|min:2',
            'telefone_fixo'                   => 'max:15',
            'telefone_celular'                => 'max:15',
            'telefone_celular'                => 'required|max:15',
            'hora_abertura'                   => 'required|max:10',
            'data'                            => 'required|max:12',


        ];
    }
}
