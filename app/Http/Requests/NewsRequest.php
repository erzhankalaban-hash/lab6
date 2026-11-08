<?php

namespace App\Http\Requests;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class NewsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_at'           => ['required', 'date'],
            'translations'           => ['required', 'array'],
            'translations.*.locale'  => ['nullable', 'string', 'regex:/^[a-z]{2,5}$/'],
            'translations.*.title'   => ['nullable', 'string', 'max:200'],
            'translations.*.description' => ['nullable', 'string', 'max:500'],
            'translations.*.text'    => ['nullable', 'string'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $rows = $this->input('translations', []);
            $locales = [];

            foreach ($rows as $i => $row) {
                $locale = trim($row['locale'] ?? '');

                if ($locale === '') {
                    continue;
                }

                if (in_array($locale, $locales, true)) {
                    $validator->errors()->add("translations.$i.locale", "Мову {$locale} вказано двічі.");
                }

                $locales[] = $locale;

                if (trim($row['title'] ?? '') === '') {
                    $validator->errors()->add("translations.$i.title", "Вкажіть заголовок для мови {$locale}.");
                }
            }

            if (!in_array(News::MAIN_LOCALE, $locales, true)) {
                $validator->errors()->add('translations', 'Переклад основною мовою (' . News::MAIN_LOCALE . ') обов\'язковий.');
            }
        });
    }
}
