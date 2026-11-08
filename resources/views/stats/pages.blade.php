@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')
    <h1>Статистика відвідувань</h1>

    <p>
        <a href="{{ route('stats.pages', ['type' => 'page']) }}">За сторінками</a> |
        <a href="{{ route('stats.pages', ['type' => 'ip']) }}">За IP-адресами</a> |
        <a href="{{ route('stats.pages', ['type' => 'method']) }}">За HTTP-методами</a> |
        <a href="{{ route('stats.popular') }}">Популярні гравці та фільтри</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>
                @if ($type === 'page') Сторінка
                @elseif ($type === 'ip') IP-адреса
                @else HTTP-метод
                @endif
            </th>
            <th>Звернень</th>
            <th>Унікальних IP</th>
            <th>Останній візит</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
                    <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}">
                        {{ $row->{$type} }}
                    </a>
                </td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->visitors }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Даних ще немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
