<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest; 

class BrandFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'other_description' => [
                'nullable',
                'string'
            ],
            'about_brand' =>  [
                'nullable',
                'string'
            ],
            'short_description' => [
                'nullable',
                'string'
            ],
            'address' => [
                'nullable',
                'string'
            ],
            'housenumber' => [
                'nullable',
                'string'
            ],           
            'postalcode' => [
                'nullable',
                'string'
            ],
            'city' => [
                'nullable',
                'string'
            ],
            'phonenumber' => [
                'nullable',
                'string'
            ],
            'mobile' => [
                'nullable',
                'string'
            ],
            'email' => [
                'nullable',
                'string'
            ],
            'logo' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'bandr_image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'Vedio' => [
                'nullable',
                'string'
            ],

            'meta_title' => [
                'nullable',
                'string'
            ],
            'meta_keyword' => [
                'nullable',
                'string'
            ],
            'meta_description' => [
                'nullable',
                'string'
            ],
            'category' => [
                'nullable',
               'array'
            ],

        ];
    }
}
