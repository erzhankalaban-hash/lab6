<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    // Основна мова: показується, коли переклад обраною мовою відсутній
    public const MAIN_LOCALE = 'uk';

    protected $table = 'news';

    protected $fillable = ['published_at'];

    protected function casts(): array
    {
        return ['published_at' => 'date'];
    }

    public function translations(): HasMany
    {
        return $this->hasMany(NewsTranslation::class, 'news_id');
    }

    // Переклад обраною мовою, інакше основною мовою, інакше будь-який наявний
    public function translation(?string $locale = null): ?NewsTranslation
    {
        $locale ??= app()->getLocale();
        $all = $this->translations;

        return $all->firstWhere('locale', $locale)
            ?? $all->firstWhere('locale', self::MAIN_LOCALE)
            ?? $all->first();
    }

    public function hasTranslation(string $locale): bool
    {
        return $this->translations->contains('locale', $locale);
    }

    public function getTitleAttribute(): ?string
    {
        return $this->translation()?->title;
    }

    public function getDescriptionAttribute(): ?string
    {
        return $this->translation()?->description;
    }

    public function getTextAttribute(): ?string
    {
        return $this->translation()?->text;
    }
}
