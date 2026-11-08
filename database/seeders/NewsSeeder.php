<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        if (News::count() > 0) {
            return;
        }

        $items = [
            ['2026-10-01',
                ['Старт нового сезону', 'Клуб починає сезон домашнім матчем.', 'Перший матч сезону відбудеться на домашньому стадіоні.'],
                ['New season kicks off', 'The club starts the season with a home match.', 'The first match of the season is at the home stadium.']],
            ['2026-10-03',
                ['Новий нападник', 'До команди приєднався досвідчений нападник.', 'Клуб підписав контракт з нападником на два сезони.'],
                ['New striker signed', 'An experienced forward has joined the team.', 'The club signed a forward for two seasons.']],
            ['2026-10-06',
                ['Набір до академії', 'Академія запрошує дітей віком 8-14 років.', 'Пробні тренування проходять щосуботи.'],
                ['Academy enrollment', 'The academy invites children aged 8-14.', 'Trial sessions are held every Saturday.']],
            ['2026-10-10',
                ['Перемога в кубку', 'Команда виграла 3:1 у чвертьфіналі кубка.', 'Двічі відзначився капітан, ще один гол забив новачок.'],
                ['Cup victory', 'The team won 3-1 in the cup quarter-final.', 'The captain scored twice and a newcomer added another.']],
            ['2026-10-14',
                ['Оновлення стадіону', 'Завершено реконструкцію трибун стадіону.', 'Для вболівальників доступні нові сидіння та освітлення.'],
                ['Stadium upgrade', 'Reconstruction of the stands is complete.', 'New seats and lighting are available to fans.']],
            ['2026-10-18',
                ['Товариський матч', 'Клуб зустрінеться з командою з Польщі.', 'Матч відбудеться в пятницю, вхід вільний.'],
                ['Friendly match', 'The club will meet a team from Poland.', 'The match is on Friday, admission is free.']],
            ['2026-10-20',
                ['Новий тренер воротарів', 'Тренерський штаб клубу поповнився.', 'Фахівець має великий досвід роботи з молодіжними командами.'],
                ['New goalkeeping coach', 'The coaching staff has expanded.', 'The specialist has wide experience with youth teams.']],
            ['2026-10-22',
                ['Гравець місяця', 'Вболівальники обрали найкращого гравця жовтня.', 'Переміг півзахисник, який віддав п\'ять передач.'],
                ['Player of the month', 'Fans chose the best player of October.', 'A midfielder with five assists won the vote.']],
        ];

        foreach ($items as [$date, $uk, $en]) {
            $news = News::create(['published_at' => $date]);

            foreach (['uk' => $uk, 'en' => $en] as $locale => [$title, $description, $text]) {
                $news->translations()->create([
                    'locale'      => $locale,
                    'title'       => $title,
                    'description' => $description,
                    'text'        => $text,
                ]);
            }
        }
    }
}
