<?php

namespace App\Http\Requests\Title2;

use App\Models\Title2;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTitle2Request extends FormRequest
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
        $title = Title2::find($this->route('second_title'));

        return [
            'name_ar' => ['required', 'string', 'max:255', 'unique:title2_translations,name,' . $title->translate('ar')->id],
            'name_en' => ['required', 'string', 'max:255', 'unique:title2_translations,name,' . $title->translate('en')->id],
            // 'locale' => ['required', 'string', 'in:ar,en'],
        ];
    }
}
