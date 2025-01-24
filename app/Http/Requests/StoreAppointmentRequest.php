<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'phone_number' => [
                'required',
                'regex:/^62\d{9,13}$/',
            ],
            'gender' => [
                'required',
                'in:laki-laki,perempuan', // Hanya menerima nilai "laki-laki" atau "perempuan"
            ],
            'date_of_birth' => [
                'required',
                'date',
                'before:today', // Harus tanggal sebelum hari ini
            ],
            'birth_place' => [
                'required',
                'string',
                'max:255',
            ],
            'address' => [
                'required',
                'string',
                'max:65535',
            ],
            'father' => [
                'required',
                'string',
                'max:255',
            ],
            'mother' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
            ],
            'message' => [
                'nullable',
                'string',
                'max:65535',
            ],
            'product_id' => [
                'required',
                'integer',
                'exists:products,id', // Memastikan bahwa `product_id` ada di tabel `products`
            ],
        ];


    }
}
