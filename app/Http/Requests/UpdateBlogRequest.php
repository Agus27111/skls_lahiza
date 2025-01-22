<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            // 'slug'=>[
            //     'required',
            //     'string',
            //     'max:255',
            // ],
            'title'=>[
                'sometimes',
                'string',
                'max:255',
            ],
            'author'=>[
                'sometimes',
                'string',
                'max:255',
            ],
            'content'=>[
                'sometimes',
                'string',
                'max:65535',
            ],
            'image'=>[
                'sometimes',
                'image',
                'mimes:png,jpg,jpeg,webp',
            ],
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }
}
