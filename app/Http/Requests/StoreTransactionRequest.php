<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'transaction_date' => ['required', 'date'],
            'status' => ['required', 'in:pending,paid,cancelled'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.laptop_id' => ['required', 'distinct', 'exists:laptops,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }
}
