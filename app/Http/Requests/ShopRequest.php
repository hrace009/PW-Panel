<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name' => 'required|min:3|max:255',
            'image' => 'required|image',
            'icon' => 'required|image',
            'price' => 'required|numeric|min:1',
            'item_id' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:1',
            'max_count' => 'required|numeric|min:1',
            'protection_type' => 'numeric|min:0',
            'expire_date' => 'numeric',
            'discount' => 'numeric',
            'shareable' => 'required',
            'description' => 'required|min:20',
        ];
    }
}
