@extends('layouts.app')

@section('title', 'Гравці')

@section('content')
    <h1>Гравці</h1>

    <p><a href="{{ route('players.create') }}">Додати гравця</a></p>

    <form method="GET" action="{{ route('players.index') }}">
        <label for="country_code">Країна</label>
        <select id="country_code" name="country_code">
            <option value="">Усі країни</option>
            @foreach ($countries as $code => $name)
                <option value="{{ $code }}" @selected($countryCode === $code)>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Фільтрувати</button>
        <a href="{{ route('players.index') }}">Скинути</a>
    </form>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Прізвище</th>
            <th>Ім'я</th>
            <th>Позиція</th>
            <th>Країна</th>
            <th>Телефон</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($players as $i => $player)
            <tr>
                <td>{{ $players->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('players.show', $player) }}">{{ $player->last_name }}</a>
                </td>
                <td>{{ $player->first_name }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->country->name }} ({{ $player->country_code }})</td>
                <td>{{ $player->phone }}</td>
                <td>
                    <a href="{{ route('players.edit', $player) }}">Редагувати</a>
                    <form method="POST" action="{{ route('players.destroy', $player) }}" class="inline"
                          onsubmit="return confirm('Видалити гравця?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Гравців не знайдено.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $players->links() }}
@endsection
