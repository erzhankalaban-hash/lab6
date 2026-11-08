@extends('layouts.app')

@section('title', 'Записатися на тренування')

@section('content')
    <div class="container mt-4">
        <h2>Записатися на тренування</h2>

        <form method="POST" action="{{ route('club.contact.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Ім'я</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефону</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+380XXXXXXXXX">
                @error('phone')
                <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Текст повідомлення / Побажання</label>
                <textarea class="form-control" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                @error('message')
                <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Надіслати заявку</button>
        </form>
    </div>
@endsection
