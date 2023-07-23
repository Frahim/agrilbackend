<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'content' => [
                'nullable',
                'string'
            ],
            'featured_image' => [
                'nullable',
                'mimes:jpg,jpeg,png,webmp'
            ],
            'seo_title' => [
                'nullable',
                'string'
            ],
            'seo_description' =>  [
                'nullable',
                'string'
            ],            

        ];
    }
}
