<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest
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
            'title'                         => 'required|max:255|min:3',
            'local'                         => 'required|max:255',
            'data'                          => 'required|max:20',
            'description'                   => 'required|min:10',
            'image_01'                      => 'required|mimes:jpeg,jpg,png|max:900',
            'image_02'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_03'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_04'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_05'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_06'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_07'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_08'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_09'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_010'                     => 'mimes:jpeg,jpg,png|max:900',
            'image_011'                     => 'mimes:jpeg,jpg,png|max:900',
            'image_012'                     => 'mimes:jpeg,jpg,png|max:900',

        ];
    }
}
