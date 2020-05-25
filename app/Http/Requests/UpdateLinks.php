<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLinks extends FormRequest
{
    public function authorize(): bool
    {
        return (bool)$this->user();
    }

    public function rules(): array
    {
        return [
            'link' => 'required|url|exists:links,link',
            'name' => 'required',
            'type' => [
                'required',
                Rule::in(['Nacional', 'Internacional', 'Geral']),
            ],
            'section_id' => 'required|exists:sections,id',
            'sourceName' => 'required',
            'via' => 'nullable',
            'edition' => 'required|exists:weeklies,id'
        ];
    }
}
