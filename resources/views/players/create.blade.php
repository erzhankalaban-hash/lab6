@extends('layouts.app')

@section('title', 'Додати гравця')

@section('content')
    <h1>Додати гравця</h1>

    <form method="POST" action="{{ route('players.store') }}">
        @csrf
        @include('players._form')
        <button type="submit">Зберегти</button>
    </form>

    <p><a href="{{ route('players.index') }}">Повернутися до списку</a></p>
@endsection
