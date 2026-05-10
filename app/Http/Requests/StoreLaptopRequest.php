<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaptopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'brand_id' => ['required', 'exists:brands,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'laptop_name' => ['required', 'string', 'max:150'],
            'processor' => ['required', 'string', 'max:100'],
            'ram' => ['required', 'string', 'max:50'],
            'storage' => ['required', 'string', 'max:50'],
            'vga' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
        ];
    }
}
