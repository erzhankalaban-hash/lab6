@extends('layouts.app')

@php($t = $news->translation())

@section('title', $t?->title)

@section('content')
    <h1>{{ $t?->title }}</h1>
    <p class="meta">
        {{ $news->published_at->format('d.m.Y') }}
        &middot; Доступні мови:
        @foreach ($news->translations as $tr)
            <span class="badge">{{ strtoupper($tr->locale) }}</span>
        @endforeach
    </p>

    @if ($t && $t->locale !== app()->getLocale())
        <p class="fallback card">
            Переклад мовою {{ strtoupper(app()->getLocale()) }} відсутній,
            показано мовою {{ strtoupper($t->locale) }}.
        </p>
    @endif

    <p><strong>{{ $t?->description }}</strong></p>
    <p>{{ $t?->text }}</p>

    <p><a href="{{ route('news.index') }}">Повернутися до новин</a></p>
@endsection
