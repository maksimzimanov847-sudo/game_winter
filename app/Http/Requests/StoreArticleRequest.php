<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required|string|max:15000',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'rating' => 'required|integer|min:0|max:10',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Название статьи обязательно для заполнения',
            'title.max' => 'Название статьи не должно превышать 15000 символов',
            'description.required' => 'Описание статьи обязательно для заполнения',
            'author.required' => 'Автор статьи обязателен для указания',
            'rating.required' => 'Рейтинг статьи обязателен для указания',
            'rating.integer' => 'Рейтинг должен быть целым числом',
            'rating.min' => 'Рейтинг не может быть меньше 0',
            'rating.max' => 'Рейтинг не может быть больше 10',
        ];
    }
}
