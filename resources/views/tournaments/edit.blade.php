@extends('layouts.app')

@section('title', 'Редагування турніру')

@section('content')
    <h1>Редагування турніру</h1>

    <form method="POST" action="{{ route('tournaments.update', $tournament) }}">
        @csrf
        @method('PUT')
        @include('tournaments._form')
        <button type="submit">Оновити</button>
        <a href="{{ route('tournaments.index') }}">Скасувати</a>
    </form>
@endsection
