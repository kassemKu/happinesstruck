<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreToolRequest extends FormRequest
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
            'ar_short_description' => ['nullable','min:6','string'],
            'en_name' => ['required','min:6','max:191','string'],
            'en_short_description' => ['nullable','min:6','string'],
            'status' => ['required', 'in:active,inactive'],
            'ar_slug' => ['nullable', 'alpha_dash', 'unique:products,ar_slug,', $this->id],
            'en_slug' => ['nullable', 'alpha_dash', 'unique:products,en_slug,', $this->id],
            'price' => ['required', 'numeric'],
            'stock_status' => ['nullable', 'in:in_stock,out_stock,low_in_stock'],
            'quantity' => ['required', 'numeric'],
            'SKU' => ['required'],
            'mediaIds.*' => [
                'nullable', 'numeric'
            ]
        ];
    }
}
