<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoopRequest extends FormRequest
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
            'nome_cooperativa'                  => 'required|max:255|min:3',
            'nome_fantasia'                     => 'required|max:255|min:3',
            'cnpj'                              => 'required|max:14|min:14',
            'data_contribuicao'                 => 'required|date|max:10|min:10',
            'numero_registro'                   => 'required|max:10|min:1',
            'data_registro'                     => 'required|date|max:10|min:10',
            'numero_cooperados'                 => 'required|max:9|min:1',
            'numero_funcionarios'               => 'required|max:9|min:1',
            'nome_presidente'                   => 'required|max:255|min:6',
            'cpf_presidente'                    => 'required|max:11|min:11',
            'cel_presidente'                    => 'max:12|min:8',
            'mandato'                           => 'max:20|min:4',
            'rua'                               => 'max:255|min:4',
            'bairro'                            => 'max:255|min:4',
            'numero'                            => 'max:6|min:1',
            'cep'                               => 'max:8|min:8',
            'telefone_empresarial_1'            => 'max:10|min:10',
            'telefone_empresarial_1'            => 'max:10|min:10',
            'email'                             => 'max:50|min:6',
            'cidade'                            => 'max:50|min:6',
            'estado'                            => 'max:50|min:6',
            'atividade_economica'               => 'max:50|min:6',
            'status_cooperativa'                => 'max:50|min:6',
        ];
    }
}
