<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTruckRequest extends FormRequest
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
    public function rules()
    {
        return [
            'ar_name' => ['required','min:2','max:191','string'],
            'ar_note' => ['nullable','min:6','string'],
            'en_name' => ['required','min:6','max:191','string'],
            'en_note' => ['nullable','min:6','string'],
            'ar_slug' => ['nullable', 'alpha_dash', 'unique:products,ar_slug,', $this->id],
            'en_slug' => ['nullable', 'alpha_dash', 'unique:products,en_slug,', $this->id],
            'ar_type' => ['nullable'],
            'en_type' => ['nullable'],
            'size' => ['nullable'],
            'min_price_per_event' => ['required', 'numeric'],
            'status' => ['required', 'in:active,inactive'],
            'mediaIds.*' => [
                'nullable', 'numeric'
            ]
        ];
    }
}
