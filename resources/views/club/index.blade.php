@extends('layouts.app')

@section('title', 'Головна — Спортивний клуб')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Вітаємо у {{ $clubName }}!</h1>
            <p class="col-md-8 fs-4">Досягайте нових спортивних вершин разом із нами. Сучасне обладнання, професійні тренери та індивідуальний підхід.</p>

            <h3 class="mt-4">Наші популярні напрямки:</h3>
            <ul>
                @foreach($trainings as $training)
                    <li>{{ $training }}</li>
                @endforeach
            </ul>

            <a href="{{ route('club.contact') }}" class="btn btn-primary btn-lg mt-3">Записатися на тренування</a>
        </div>
    </div>
@endsection
