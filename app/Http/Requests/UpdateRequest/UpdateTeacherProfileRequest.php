<?php

namespace App\Http\Requests\UpdateRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherProfileRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'education' => ['nullable', 'array'],
            'education.*.degree' => ['required', 'string'],
            'education.*.field' => ['required', 'string'],
            'education.*.year' => ['required', 'integer'],
            'certificates' => ['nullable', 'array'],
            'certificates.*.title' => ['required', 'string'],
            'certificates.*.description' => ['required', 'string'],
            'certificates.*.file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png'],
            'experience' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
        ];
    }
}
