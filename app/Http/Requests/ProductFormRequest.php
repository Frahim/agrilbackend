<?php

namespace App\Http\Requests;

use Ramsey\Uuid\Type\Integer;
use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'brand_id' => [
                'required',
                'integer'
            ],
            'category' => [
                'nullable',
            ],
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
            'type' => [
                'nullable',
                'string'
            ],
            'disease' => [
                'nullable',
                'string'
            ],
            'variety' => [
                'nullable',
                'string'
            ],
            'sorting' => [
                'nullable',
                'string'
            ],
            'pod' => [
                'nullable',
                'string'
            ],
            'plant' => [
                'nullable',
                'string'
            ],
            'pf_image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'orginal_price' => [
                'nullable',
                'integer'
            ],
            'selling_price' => [
                'nullable',
                'integer'
            ],
            'quantity' => [
                'nullable',
                'integer'
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

            'image' => [
                'nullable',
                //'mimes:jpg,jpeg,png,mp4'
            ],

        ];
    }
}
