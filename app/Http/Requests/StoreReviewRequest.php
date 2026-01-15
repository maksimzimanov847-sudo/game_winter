<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'comment' => 'required|string|min:10|max:1000',
            'author' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок отзыва обязателен для заполнения',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'comment.required' => 'Текст отзыва обязателен для заполнения',
            'comment.min' => 'Текст отзыва должен содержать минимум 10 символов',
            'comment.max' => 'Текст отзыва не должен превышать 1000 символов',
            'author.required' => 'Автор отзыва обязателен для указания',
            'author.max' => 'Имя автора не должно превышать 100 символов',
            'rating.required' => 'Рейтинг обязателен для указания',
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
