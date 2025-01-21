<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title'=>[
                'required',
                'string',
                'max:255',
            ],
            'pdf' => 'sometimes|mimes:pdf|max:10240',
            'thubmnail'=>[
                'sometimes',
                'image',
                'mimes:png,jpg,jpeg,webp',
            ],
              'class_model_id' => 'sometimes|exists:class_models,id'
        ];
    }
}
