@extends('layouts.app')

@section('title', 'Турніри')

@section('content')
    <h1>Турніри</h1>

    <p><a href="{{ route('tournaments.create') }}">Додати турнір</a></p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Назва</th>
            <th>Місто</th>
            <th>Дата початку</th>
            <th>Гравців</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($tournaments as $i => $tournament)
            <tr>
                <td>{{ $tournaments->firstItem() + $i }}</td>
                <td>{{ $tournament->name }}</td>
                <td>{{ $tournament->city }}</td>
                <td>{{ $tournament->start_date?->format('d.m.Y') }}</td>
                <td>{{ $tournament->players_count }}</td>
                <td>
                    <a href="{{ route('tournaments.edit', $tournament) }}">Редагувати</a>
                    <form method="POST" action="{{ route('tournaments.destroy', $tournament) }}" class="inline"
                          onsubmit="return confirm('Видалити турнір? Зв\'язки з гравцями буде видалено, самі гравці залишаться.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Турнірів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $tournaments->links() }}
@endsection
