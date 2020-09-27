<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSourceTwitter extends FormRequest
{
    public function authorize(): bool
    {
        return (bool)$this->user();
    }

    public function rules(): array
    {
        return [
            '',
        ];
    }
}
