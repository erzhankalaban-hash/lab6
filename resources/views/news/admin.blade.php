@extends('layouts.app')

@section('title', 'Керування новинами')

@section('content')
    <h1>Керування новинами</h1>

    <p><a href="{{ route('news.create') }}">Додати новину</a></p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Мови</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($news as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->published_at->format('d.m.Y') }}</td>
                <td><a href="{{ route('news.show', $item) }}">{{ $item->title }}</a></td>
                <td>
                    @foreach ($item->translations as $tr)
                        <span class="badge">{{ strtoupper($tr->locale) }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('news.edit', $item) }}">Редагувати</a>
                    <form method="POST" action="{{ route('news.destroy', $item) }}" class="inline"
                          onsubmit="return confirm('Видалити новину разом з усіма перекладами?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Новин немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $news->links() }}
@endsection
