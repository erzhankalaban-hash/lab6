@extends('layouts.app')

@section('title', 'Додати новину')

@section('content')
    <h1>Додати новину</h1>

    <form method="POST" action="{{ route('news.store') }}">
        @csrf
        @include('news._form')
        <button type="submit">Зберегти</button>
    </form>

    <p><a href="{{ route('news.admin') }}">Повернутися до списку</a></p>
@endsection
