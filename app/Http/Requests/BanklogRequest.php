<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanklogRequest extends FormRequest
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
            'fullname' => 'required|string',
            'banknum' => 'required|numeric',
            'loginid' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'type' => 'required',
            'bankname' => 'required',
            'amount' => 'required|numeric',
        ];
    }
}
