@extends('layouts.app')

@section('title', 'Популярні гравці')

@section('content')
    <h1>Додаткова статистика</h1>

    <p><a href="{{ route('stats.pages') }}">Назад до статистики</a></p>

    <h2>Найпопулярніші гравці (перегляди сторінки гравця)</h2>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Гравець</th>
            <th>Позиція</th>
            <th>Переглядів</th>
            <th>Останній перегляд</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($playerHits as $i => $row)
            @php($player = $players[$row->player_id] ?? null)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>
                    @if ($player)
                        <a href="{{ route('players.show', $player) }}">{{ $player->first_name }} {{ $player->last_name }}</a>
                    @else
                        #{{ $row->player_id }} (видалено)
                    @endif
                </td>
                <td>{{ $player->position ?? '-' }}</td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Даних ще немає. Відкрийте кілька сторінок гравців.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <h2>Використання фільтра за країною</h2>
    <table>
        <thead>
        <tr>
            <th>Країна</th>
            <th>Використань фільтра</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($filterHits as $row)
            <tr>
                <td>{{ $countries[$row->code] ?? $row->code }} ({{ $row->code }})</td>
                <td>{{ $row->hits }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Фільтр ще не використовувався.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
