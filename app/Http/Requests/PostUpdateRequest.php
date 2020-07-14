<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title_ar'       => 'nullable',
            'title_en'       => 'nullable',
            'body_ar'        => 'nullable',
            'body_en'        => 'nullable',
            'desc_ar'        => 'nullable',
            'desc_en'        => 'nullable',
            'category_id'    => 'required',
            'tag_name'       => 'required',
            'slug'           => 'nullable',
            'meta_keywords'    => 'nullable',
            'meta_description' => 'nullable',
            'image'          => 'nullable|file|max:25000|mimes:jpeg,png,jpg,gif',
            'cover'          => 'nullable|file|max:25000|mimes:jpeg,png,jpg,gif'
        ];
    }
}
