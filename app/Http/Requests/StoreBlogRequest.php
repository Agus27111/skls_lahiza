<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreBlogRequest extends FormRequest
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
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('blogs'), // Validasi agar slug unik
            ],
            'title'=>[
                'required',
                'string',
                'max:255',
            ],
            'author'=>[
                'required',
                'string',
                'max:255',
            ],
            'content'=>[
                'required',
                'string',
                'max:65535',
            ],
            'image'=>[
                'required',
                'image',
                'mimes:png,jpg,jpeg,webp',
            ],
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
