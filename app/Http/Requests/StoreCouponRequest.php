<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
            'code' => ['required','min:16','max:16','string', 'unique:coupons,code'],
            'value' => ['required', 'numeric'],
            'type' => ['required', 'in:fixed,percent'],
            'date.*' => [
                ['required', 'strtotime']
            ]
        ];
    }
}
