@extends('layouts.app')

@section('title', 'Редагування гравця')

@section('content')
    <h1>Редагування гравця</h1>

    <form method="POST" action="{{ route('players.update', $player) }}">
        @csrf
        @method('PUT')
        @include('players._form')
        <button type="submit">Зберегти зміни</button>
    </form>

    <p><a href="{{ route('players.index') }}">Повернутися до списку</a></p>
@endsection
