<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'curso'                      => 'required|max:255',
            'instrutor'                  => 'required|max:255',
            'carga_h'                    => 'required|max:255|',
            'horario'                    => 'required|max:20',
            'cidade'                     => 'required|max:255',
            'local'                      => 'required|max:255',
            'publico_alvo'               => 'required',
            'conteudo_programatico'      => 'required',
            'data'                       => 'required',
        ];
    }
}
