<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'shipping_full_name' => 'required|min:3|max:191',
            'shipping_state' => 'required|min:2|max:191',
            'shipping_city' => 'nullable|min:2|max:191',
            'shipping_address' => 'required|min:2',
            'shipping_phone' => 'required|max:36',
            'shipping_avenue' => 'required|min:2|max:191',
            'shipping_street' => 'required|min:2|max:191',
            'shipping_country' => 'required|min:2',
            'shipping_area' => 'required|max:36',
            'shipping_avenue' => 'required|max:36',
            'shipping_zip_code' => 'required|max:24',
            'notes' => ['nullable', 'min:3'],

            'payment_method' => ['required', 'in:credit,payzah'],

            'billing_full_name' => ['required', 'max:199'],
            'billing_country' => ['required', 'max:199'],
            'billing_area' => ['nullable', 'max:199'],
            'billing_avenue' => 'required|max:199',
            'billing_street' => 'required|max:199',
            'billing_state' => ['required', 'max:199'],
            'billing_city' => ['nullable', 'max:199'],
            'billing_address' => ['required', 'max:199'],
            'billing_phone' => ['required','max:199'],
            'billing_zip_code' => ['required', 'max:24'],
        ];
    }
}
