<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => ['nullable' , 'exists:products,id'],
           
            'order_type_id' => ['required' , 'exists:order_types,id'],
            'name' => ['nullable' , 'string'],
            'phone' => ['nullable' , 'string'],
            'area' => ['nullable' , 'string'],
            'city' => ['nullable' , 'string'],
            'street' => ['nullable' , 'string'],
            'morning' => ['nullable' , 'string'],
            'night' => ['nullable' , 'string'],
            'morning_night' => ['nullable' , 'string'],
            'address' => ['nullable' , 'string'],
            'image' => ['nullable'],
            'battary' => ['nullable' , 'string'],
            'inverter' => ['nullable' , 'string'],
            'solar' => ['nullable' , 'string'],
            'problem' => ['nullable' , 'string'],
            'extra_des' => ['nullable' , 'string'],
          
        ];
    }
}
