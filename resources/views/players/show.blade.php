@extends('layouts.app')

@section('title', $player->first_name . ' ' . $player->last_name)

@section('content')
    <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>

    <p><strong>Позиція:</strong> {{ $player->position }}</p>
    <p><strong>Дата народження:</strong> {{ $player->birth_date->format('d.m.Y') }}</p>
    <p><strong>Телефон:</strong> {{ $player->phone }}</p>
    <p>
        <strong>Країна:</strong>
        {{ $player->country->name }} ({{ $player->country_code }}, {{ $player->country->phone_code }})
    </p>

    <p><a href="{{ route('players.edit', $player) }}">Редагувати</a></p>

    <form method="POST" action="{{ route('players.destroy', $player) }}"
          onsubmit="return confirm('Видалити гравця?')">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>

    <p><a href="{{ route('players.index') }}">Повернутися до списку</a></p>
@endsection
