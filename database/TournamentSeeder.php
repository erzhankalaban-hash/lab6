<?php

namespace database;

use App\Models\Player;
use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['Кубок України', 'Київ', '2026-03-15'],
            ['Ліга чемпіонів', 'Лондон', '2026-04-10'],
            ['Чемпіонат Європи', 'Берлін', '2026-06-12'],
            ['Товариський турнір', 'Львів', '2026-07-05'],
            ['Зимовий кубок', 'Харків', '2026-12-01'],
            ['Кубок дружби', 'Одеса', '2026-09-20'],
        ];

        foreach ($items as [$name, $city, $date]) {
            Tournament::firstOrCreate(
                ['name' => $name],
                ['city' => $city, 'start_date' => $date]
            );
        }

        $ids = Tournament::pluck('id')->all();

        foreach (Player::all() as $player) {
            $count = random_int(0, 3);
            $pick = $count ? (array) array_rand(array_flip($ids), $count) : [];
            $player->tournaments()->sync($pick);
        }
    }
}
