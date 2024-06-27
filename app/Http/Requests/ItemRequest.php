<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|unique:items,name',
            'sale_price'  => 'nullable|numeric|min:0',
            'pay_price'   => 'nullable|numeric|min:0',
            'images' => 'nullable|array'
            
        ];
    }

    public function attributes(): array
    {
        return [
            'category_id' => trans('menu.the category'),
            'name'        => trans('items.name'),
            'sale_price'  => trans('items.sale_price'),
            'pay_price'   => trans('items.pay_price'),
        ];
    }
}
