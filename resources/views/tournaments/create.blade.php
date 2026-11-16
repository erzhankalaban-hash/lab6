@extends('layouts.app')

@section('title', 'Новий турнір')

@section('content')
    <h1>Новий турнір</h1>

    <form method="POST" action="{{ route('tournaments.store') }}">
        @csrf
        @include('tournaments._form')
        <button type="submit">Зберегти</button>
        <a href="{{ route('tournaments.index') }}">Скасувати</a>
    </form>
@endsection
