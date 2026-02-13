<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Проверяем, что пользователь — автор отзыва или админ
        return $this->user()->can('update', $this->route('review'));
    }

    public function rules(): array
    {
        return [
            'article_id' => [
                'sometimes',
                'exists:articles,id',
                Rule::unique('reviews')->where(function ($query) {
                    return $query->where('user_id', $this->user()->id);
                })->ignore($this->route('review')),
            ],
            'rating'     => 'sometimes|integer|min:1|max:5',
            'comment'    => 'sometimes|nullable|string|min:10|max:1000',
        ];
    }

    public function messages(): array
    {
        return (new \App\Models\Review)->validationMessages();
    }
}
