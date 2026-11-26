<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('media', 'judul')->ignore($this->route('media')),
            ],
            'jenis' => ['sometimes', 'required', 'string', 'max:100'],
            'genre' => ['sometimes', 'required', 'string', 'max:100'],
            'deskripsi' => ['sometimes', 'nullable', 'string'],
            'episodes' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'score' => ['sometimes', 'nullable', 'numeric', 'between:0,10'],
            'country' => ['sometimes', 'nullable', 'string', 'max:255'],
            'chapters' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'volumes' => ['sometimes', 'nullable', 'integer', 'min:1'],
            'is_available' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul media wajib diisi.',
            'judul.unique' => 'Judul media sudah digunakan.',
            'jenis.required' => 'Jenis media wajib diisi.',
            'genre.required' => 'Genre media wajib diisi.',
        ];
    }
}
