<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployFormRequest extends FormRequest
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
            'email' => [
                'required',
                'string'
            ],
            'phonenumber' => [
                'string'
            ],
            'mobile' => [
                'string'
            ],
            'bio' => [
                'string'
            ],
            'designeation' => [
                'string'
            ],
            'department' => [
                'string'
            ],
            'picture' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'brand_id' => [
                'string'
            ]
        ];
    }
}
