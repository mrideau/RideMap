<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkateparkRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'address' => ['nullable', 'string'],
            'city' => ['required', 'string'],
            'postcode' => ['required', 'numeric'],
            'coordinates' => ['required'],
            'email' => ['nullable', 'email'],
            'image' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048'],
            'gallery' => ['nullable'],
            'gallery.*' => ['image', 'mimes:png,jpg', 'max:2048'],
        ];
    }
}
