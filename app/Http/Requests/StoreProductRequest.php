<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
            'ar_short_description' => ['nullable','min:6','string'],
            'ar_description' => ['nullable','min:6','string'],
            'en_name' => ['required','min:6','max:191','string'],
            'en_short_description' => ['nullable','min:6','string'],
            'en_description' => ['nullable','min:6','string'],
            'published' => ['nullable'],
            'ar_slug' => ['nullable', 'alpha_dash', 'unique:products,ar_slug,', $this->id],
            'en_slug' => ['nullable', 'alpha_dash', 'unique:products,en_slug,', $this->id],
            'price' => ['required', 'numeric'],
            'sale_price' => ['required', 'numeric'],
            'supplier_percent_discount' => ['nullable', 'numeric'],
            'SKU' => ['required', 'string', 'max:50'],
            'stock_status' => ['nullable', 'in:in_stock,out_stock,low_in_stock'],
            'featured' => ['nullable', 'boolean'],
            'quantity' => ['required', 'numeric'],
            'review' => ['nullable', 'numeric'],
            'mediaIds.*' => [
                'nullable', 'numeric'
            ]
        ];
    }
}
