<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('players')->insert([
            ['first_name' => 'Andriy',   'last_name' => 'Shevchenko', 'position' => 'Forward',    'birth_date' => '1995-03-12', 'phone' => '+380501234567', 'country_code' => 'UA', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Oleksandr','last_name' => 'Zinchenko',  'position' => 'Defender',   'birth_date' => '1996-12-15', 'phone' => '+380671112233', 'country_code' => 'UA', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Robert',   'last_name' => 'Lewandowski','position' => 'Forward',    'birth_date' => '1988-08-21', 'phone' => '+48501234567',  'country_code' => 'PL', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Hans',     'last_name' => 'Muller',     'position' => 'Midfielder', 'birth_date' => '1993-05-04', 'phone' => '+491701234567', 'country_code' => 'DE', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Pierre',   'last_name' => 'Dubois',     'position' => 'Goalkeeper', 'birth_date' => '1991-11-30', 'phone' => '+33612345678',  'country_code' => 'FR', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Marco',    'last_name' => 'Rossi',      'position' => 'Defender',   'birth_date' => '1994-02-18', 'phone' => '+393331234567', 'country_code' => 'IT', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Carlos',   'last_name' => 'Garcia',     'position' => 'Midfielder', 'birth_date' => '1997-07-09', 'phone' => '+34612345678',  'country_code' => 'ES', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Lucas',    'last_name' => 'Silva',      'position' => 'Forward',    'birth_date' => '1999-01-25', 'phone' => '+5511987654321','country_code' => 'BR', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'John',     'last_name' => 'Smith',      'position' => 'Goalkeeper', 'birth_date' => '1990-09-14', 'phone' => '+447911123456', 'country_code' => 'GB', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Erik',     'last_name' => 'Johansson',  'position' => 'Defender',   'birth_date' => '1992-06-02', 'phone' => '+46701234567',  'country_code' => 'SE', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Mykola',   'last_name' => 'Melnyk',     'position' => 'Midfielder', 'birth_date' => '1998-10-07', 'phone' => '+380931234567', 'country_code' => 'UA', 'created_at' => $now, 'updated_at' => $now],
            ['first_name' => 'Jakub',    'last_name' => 'Novak',      'position' => 'Forward',    'birth_date' => '1996-04-19', 'phone' => '+420601234567', 'country_code' => 'CZ', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
