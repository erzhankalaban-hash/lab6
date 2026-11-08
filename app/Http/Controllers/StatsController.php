<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Player;
use App\Models\Tracker;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    private const TYPES = ['page', 'ip', 'method'];

    // Зведена статистика: групування за page / ip / method
    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');

        if (!in_array($type, self::TYPES, true)) {
            abort(400, 'Невідомий тип групування.');
        }

        $rows = Tracker::query()
            ->selectRaw("{$type}, count(*) as hits, count(distinct ip) as visitors, max(visited_at) as last_visit")
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();

        return view('stats.pages', compact('rows', 'type'));
    }

    // Детальна статистика з посторінковим виведенням
    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');

        if (!in_array($type, self::TYPES, true)) {
            abort(400, 'Невідомий тип фільтрації.');
        }

        $rows = Tracker::query()
            ->when($item, fn ($query, $value) => $query->where($type, $value))
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();

        return view('stats.detail', compact('rows', 'type', 'item'));
    }

    // Додаткова статистика: найпопулярніші гравці та використання фільтра за країною
    public function popular()
    {
        // Скільки разів переглядали сторінку конкретного гравця
        $playerHits = Tracker::query()
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.player_id')) as player_id, count(*) as hits, max(visited_at) as last_visit")
            ->whereRaw("JSON_EXTRACT(meta, '$.player_id') IS NOT NULL")
            ->where('method', 'GET')
            ->where('status', 200)
            ->groupBy('player_id')
            ->orderByDesc('hits')
            ->limit(10)
            ->get();

        $players = Player::query()
            ->whereIn('id', $playerHits->pluck('player_id'))
            ->get()
            ->keyBy('id');

        // Скільки разів використовували фільтр за країною
        $filterHits = Tracker::query()
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.country_code')) as code, count(*) as hits")
            ->whereRaw("JSON_EXTRACT(meta, '$.country_code') IS NOT NULL")
            ->groupBy('code')
            ->orderByDesc('hits')
            ->get();

        $countries = Country::pluck('name', 'code');

        return view('stats.popular', compact('playerHits', 'players', 'filterHits', 'countries'));
    }
}
