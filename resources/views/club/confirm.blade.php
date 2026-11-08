@extends('layouts.app')

@section('title', 'Підтвердження заявки')

@section('content')
    <div class="container mt-4">
        <div class="alert alert-success">
            <h2>Дякуємо, вашу заявку успішно надіслано!</h2>
        </div>

        <p>Отримані дані:</p>

        <ul>
            <li><strong>Ім'я:</strong> {{ $name }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
            <li><strong>Номер телефону:</strong> {{ $phone }}</li>
            <li><strong>Повідомлення:</strong> {{ $message }}</li>
        </ul>

        <a href="{{ route('club.contact') }}" class="btn btn-primary">Повернутися на головну</a>
    </div>
@endsection
