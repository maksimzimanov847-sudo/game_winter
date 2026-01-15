<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'comment' => 'sometimes|string|min:10|max:1000',
            'author' => 'sometimes|string|max:100',
            'rating' => 'sometimes|integer|min:1|max:5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.string' => 'Заголовок должен быть строкой',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'comment.string' => 'Текст отзыва должен быть строкой',
            'comment.min' => 'Текст отзыва должен содержать минимум 10 символов',
            'comment.max' => 'Текст отзыва не должен превышать 1000 символов',
            'author.string' => 'Имя автора должно быть строкой',
            'author.max' => 'Имя автора не должно превышать 100 символов',
            'rating.integer' => 'Рейтинг должен быть целым числом',
            'rating.min' => 'Рейтинг не может быть меньше 1',
            'rating.max' => 'Рейтинг не может быть больше 5',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'title' => 'заголовок',
            'comment' => 'комментарий',
            'author' => 'автор',
            'rating' => 'рейтинг',
        ];
    }
}
