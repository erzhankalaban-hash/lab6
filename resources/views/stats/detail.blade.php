@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')
    <h1>Детальна статистика</h1>

    <p>
        Фільтр: <strong>{{ $type }}</strong> = <strong>{{ $item ?? 'усі' }}</strong>
        | <a href="{{ route('stats.pages', ['type' => $type]) }}">Назад до зведення</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>Дата і час</th>
            <th>Сторінка</th>
            <th>Метод</th>
            <th>IP</th>
            <th>Статус</th>
            <th>Маршрут</th>
            <th>Пристрій</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{ $row->visited_at->format('d.m.Y H:i:s') }}</td>
                <td>{{ $row->page }}</td>
                <td>{{ $row->method }}</td>
                <td>{{ $row->ip }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->meta['route_name'] ?? '-' }}</td>
                <td>{{ $row->meta['device'] ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Записів не знайдено.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $rows->links() }}
@endsection
