<?php

namespace SescoopRO\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'subtitle'                      => 'max:255',
            'editoria'                      => 'required|max:255|min:3',
            'data'                          => 'max:20',
            'description'                   => 'required|min:20',
            'image_01'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_02'                      => 'mimes:jpeg,jpg,png|max:900',
            'image_03'                      => 'mimes:jpeg,jpg,png|max:900',
            'video'                         => 'max:300',
        ];
    }
}
