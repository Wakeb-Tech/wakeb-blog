<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SittingRequest extends FormRequest
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
            'sitename_ar'   => 'required',
            'sitename_en'   => 'required',
            'main_lang'     => 'nullable|string',
            'description'   => 'nullable|string',
            'keywords'      => 'nullable|string',
            'googleAnalytics'   => 'nullable|string',
            'icon'          => 'file|max:25000|mimes:jpeg,png,jpg,gif',
            'logo'          => 'file|max:25000|mimes:jpeg,png,jpg,gif'
        ];
    }
}
