@extends('layouts.app')

@section('title', 'Новини')

@section('content')
    <h1>Новини клубу</h1>

    @forelse ($news as $item)
        @include('news._item', ['news' => $item])
    @empty
        <p>Новин немає.</p>
    @endforelse

    {{ $news->links() }}
@endsection
