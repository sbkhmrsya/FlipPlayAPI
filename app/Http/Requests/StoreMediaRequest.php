<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => ['required', 'string', 'max:255', Rule::unique('media', 'judul')],
            'jenis' => ['required', 'string', 'max:100'],
            'genre' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'episodes' => ['nullable', 'integer', 'min:1'],
            'score' => ['nullable', 'numeric', 'between:0,10'],
            'country' => ['nullable', 'string', 'max:255'],
            'chapters' => ['nullable', 'integer', 'min:1'],
            'volumes' => ['nullable', 'integer', 'min:1'],
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
