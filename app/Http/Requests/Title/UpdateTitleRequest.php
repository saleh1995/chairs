<?php

namespace App\Http\Requests\Title;

use App\Models\Title;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTitleRequest extends FormRequest
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
        $title = Title::find($this->route('first_title'));
        return [
            'name_ar' => ['required', 'string', 'max:255', 'unique:title_translations,name,' . $title->translate('ar')->id],
            'name_en' => ['required', 'string', 'max:255', 'unique:title_translations,name,' . $title->translate('en')->id],
            // 'locale' => ['required', 'string', 'in:ar,en'],
        ];
    }
}
