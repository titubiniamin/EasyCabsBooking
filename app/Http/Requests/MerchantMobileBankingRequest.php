<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MerchantMobileBankingRequest extends FormRequest
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
            'mobile_banking_id'=>'required|numeric',
            'mobile_number' => "required|regex:/(01)[0-9]{9}/",
            'status'=>'nullable',Rule::in(['active', 'inactive'])
        ];
    }
}
