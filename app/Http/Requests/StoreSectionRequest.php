<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'ar_name' => ['required','min:2','max:191','string'],
            'ar_description' => ['nullable','min:6','string'],
            'en_name' => ['required','min:6','max:191','string'],
            'en_description' => ['nullable','min:6','string'],
            'published' => ['nullable'],
            'slug' => ['nullable'],
            'image_url' => ['nullable'],
        ];
    }
}
