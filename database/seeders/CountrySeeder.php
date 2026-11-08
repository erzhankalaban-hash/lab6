<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('country')->insert([
            ['code' => 'AU', 'name' => 'Australia',      'population' => 24016400,   'phone_code' => '+61'],
            ['code' => 'BR', 'name' => 'Brazil',         'population' => 206135893,  'phone_code' => '+55'],
            ['code' => 'CA', 'name' => 'Canada',         'population' => 35985751,   'phone_code' => '+1'],
            ['code' => 'CN', 'name' => 'China',          'population' => 1375210000, 'phone_code' => '+86'],
            ['code' => 'DE', 'name' => 'Germany',        'population' => 81459000,   'phone_code' => '+49'],
            ['code' => 'FR', 'name' => 'France',         'population' => 64513242,   'phone_code' => '+33'],
            ['code' => 'GB', 'name' => 'United Kingdom', 'population' => 65097000,   'phone_code' => '+44'],
            ['code' => 'IN', 'name' => 'India',          'population' => 1285400000, 'phone_code' => '+91'],
            ['code' => 'UA', 'name' => 'Ukraine',        'population' => 41167335,   'phone_code' => '+380'],
            ['code' => 'US', 'name' => 'United States',  'population' => 323995528,  'phone_code' => '+1'],
            ['code' => 'PL', 'name' => 'Poland',         'population' => 38000000,   'phone_code' => '+48'],
            ['code' => 'IT', 'name' => 'Italy',          'population' => 60300000,   'phone_code' => '+39'],
            ['code' => 'ES', 'name' => 'Spain',          'population' => 47400000,   'phone_code' => '+34'],
            ['code' => 'PT', 'name' => 'Portugal',       'population' => 10300000,   'phone_code' => '+351'],
            ['code' => 'NL', 'name' => 'Netherlands',    'population' => 17600000,   'phone_code' => '+31'],
            ['code' => 'BE', 'name' => 'Belgium',        'population' => 11600000,   'phone_code' => '+32'],
            ['code' => 'SE', 'name' => 'Sweden',         'population' => 10500000,   'phone_code' => '+46'],
            ['code' => 'NO', 'name' => 'Norway',         'population' => 5400000,    'phone_code' => '+47'],
            ['code' => 'DK', 'name' => 'Denmark',        'population' => 5900000,    'phone_code' => '+45'],
            ['code' => 'FI', 'name' => 'Finland',        'population' => 5500000,    'phone_code' => '+358'],
            ['code' => 'CZ', 'name' => 'Czechia',        'population' => 10700000,   'phone_code' => '+420'],
            ['code' => 'AT', 'name' => 'Austria',        'population' => 9000000,    'phone_code' => '+43'],
            ['code' => 'CH', 'name' => 'Switzerland',    'population' => 8700000,    'phone_code' => '+41'],
            ['code' => 'TR', 'name' => 'Turkey',         'population' => 85000000,   'phone_code' => '+90'],
            ['code' => 'JP', 'name' => 'Japan',          'population' => 125000000,  'phone_code' => '+81'],
            ['code' => 'KR', 'name' => 'South Korea',    'population' => 51700000,   'phone_code' => '+82'],
            ['code' => 'MX', 'name' => 'Mexico',         'population' => 128900000,  'phone_code' => '+52'],
            ['code' => 'AR', 'name' => 'Argentina',      'population' => 45800000,   'phone_code' => '+54'],
            ['code' => 'GR', 'name' => 'Greece',         'population' => 10400000,   'phone_code' => '+30'],
            ['code' => 'HR', 'name' => 'Croatia',        'population' => 3900000,    'phone_code' => '+385'],
            ['code' => 'RS', 'name' => 'Serbia',         'population' => 6800000,    'phone_code' => '+381'],
            ['code' => 'SK', 'name' => 'Slovakia',       'population' => 5400000,    'phone_code' => '+421'],
            ['code' => 'LT', 'name' => 'Lithuania',      'population' => 2800000,    'phone_code' => '+370'],
            ['code' => 'LV', 'name' => 'Latvia',         'population' => 1900000,    'phone_code' => '+371'],
            ['code' => 'EE', 'name' => 'Estonia',        'population' => 1300000,    'phone_code' => '+372'],
        ]);
    }
}
