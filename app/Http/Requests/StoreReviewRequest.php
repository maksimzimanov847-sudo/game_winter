<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // или проверка: может ли пользователь оставлять отзывы
    }

    public function rules(): array
    {
        return [
            'article_id' => [
                'required',
                'exists:articles,id',
                Rule::unique('reviews')->where(function ($query) {
                    return $query->where('user_id', $this->user()->id);
                }),
            ],
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|min:10|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
                'article_id.unique' => 'Вы уже оставляли отзыв на эту статью.',
            ] + (new \App\Models\Review)->validationMessages();
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->user()->id,
        ]);
    }
}
