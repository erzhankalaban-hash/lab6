@extends('layouts.app')

@section('title', 'Головна')

@section('content')
    <h1>Спортивний клуб</h1>
    <p>Облік гравців клубу: позиції, країни та контактні телефони.</p>
    <p><a href="{{ route('players.index') }}">Перейти до списку гравців</a></p>
@endsection
