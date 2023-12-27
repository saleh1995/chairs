<?php

namespace App\Http\Requests\Title;

use Illuminate\Foundation\Http\FormRequest;

class StoreTitleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => ['required', 'string', 'max:255', 'unique:title_translations,name'],
            'name_en' => ['required', 'string', 'max:255', 'unique:title_translations,name'],
            // 'locale' => ['required', 'string', 'in:ar,en'],
        ];
    }
}
