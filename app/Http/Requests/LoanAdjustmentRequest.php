<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanAdjustmentRequest extends FormRequest
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
           'loan_id'=>'required|numeric',
            'amount'=>'required|numeric',
            'note'=>'nullable|string'
        ];
    }
}
