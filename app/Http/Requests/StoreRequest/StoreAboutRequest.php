<?php

namespace App\Http\Requests\StoreRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
            'about_project' => 'required|array',
            'teams' => 'required|array',
            'social_media' => 'required|array',
            'mission' => 'nullable|array',
            'contacts' => 'nullable|array',
            'partners' => 'nullable|array',
            'faq' => 'nullable|array',
            'policies' => 'nullable|array',
        ];
    }
}
