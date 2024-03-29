<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranspRequest extends FormRequest
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
            'docMain'                       => 'required|max:255',
            'subDoc'                        => 'required|max:255',
            'document_name'                 => 'required|max:255|',
            'ano'                           => 'required|max:20',
            'file_01'                       => 'max:50000',
            'file_02'                       => 'max:50000',
            'file_03'                       => 'max:50000',

        ];
    }
}
