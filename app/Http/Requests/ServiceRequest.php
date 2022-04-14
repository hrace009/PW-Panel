<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'teleport_world_tag' => 'required|numeric|between:0,9999',
            'teleport_x' => 'required|numeric|between:-999999,999999',
            'teleport_y' => 'required|numeric|between:-999999,999999',
            'teleport_z' => 'required|numeric|between:-999999,999999',
            'level_up_cap' => 'required|numeric|between:1,150',
        ];
    }
}
