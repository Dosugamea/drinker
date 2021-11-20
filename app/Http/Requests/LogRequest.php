<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'janCode' => 'required',
            'productName' => 'required',
            'productCompany' => 'required',
            'productVolume' => 'required',
            'logPrice' => 'required',
            'logCount' => 'required',
            'logBody' => 'required'
        ];
    }
}
