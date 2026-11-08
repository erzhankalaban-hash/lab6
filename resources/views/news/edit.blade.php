@extends('layouts.app')

@section('title', 'Редагування новини')

@section('content')
    <h1>Редагування новини №{{ $news->id }}</h1>
    <p>Щоб додати нову мову, заповніть порожній блок унизу: вкажіть код мови та заголовок.</p>

    <form method="POST" action="{{ route('news.update', $news) }}">
        @csrf
        @method('PUT')
        @include('news._form')
        <button type="submit">Зберегти зміни</button>
    </form>

    <p><a href="{{ route('news.admin') }}">Повернутися до списку</a></p>
@endsection
