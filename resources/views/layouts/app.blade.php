<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Спортивний клуб')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f6f8; color: #222; }
        .topnav { background: #2d3748; padding: 14px 24px; display: flex; justify-content: space-between; }
        .topnav a { color: #fff; text-decoration: none; margin-right: 20px; }
        .topnav a:hover { text-decoration: underline; }
        .topnav .lang a { margin: 0 0 0 10px; padding: 2px 8px; border: 1px solid #718096; border-radius: 4px; }
        .topnav .lang a.active { background: #fff; color: #2d3748; }
        main { max-width: 900px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; margin: 16px 0; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #e2e8f0; }
        th { background: #f7fafc; }
        label { display: block; margin-top: 12px; }
        input, select, textarea { padding: 6px; width: 300px; font-family: inherit; }
        textarea { width: 500px; }
        button { padding: 6px 14px; margin-top: 12px; cursor: pointer; }
        .error { color: #c53030; margin: 4px 0 0; }
        .inline { display: inline; }
        .footer { text-align: center; padding: 16px; color: #4a5568; border-top: 1px solid #e2e8f0; margin-top: 32px; }
        .card { border: 1px solid #e2e8f0; border-radius: 6px; padding: 12px 16px; margin: 12px 0; }
        .card h2 { margin: 0 0 6px; font-size: 20px; }
        .meta { color: #718096; font-size: 14px; margin: 0 0 8px; }
        .badge { background: #edf2f7; border-radius: 4px; padding: 1px 6px; font-size: 12px; margin-right: 4px; }
        .fallback { background: #fefcbf; }
        fieldset { border: 1px solid #e2e8f0; margin: 12px 0; padding: 8px 14px; }

        .pagination { display: flex; list-style: none; padding: 0; gap: 6px; }
        .pagination li a, .pagination li span { display: block; padding: 6px 12px; border: 1px solid #cbd5e0; text-decoration: none; color: #2d3748; border-radius: 4px; }
        .pagination li.active span { background: #2d3748; color: #fff; }
        .pagination li.disabled span { color: #a0aec0; }
    </style>
</head>
<body>
@php
    $locales = \App\Models\NewsTranslation::query()->distinct()->orderBy('locale')->pluck('locale');
@endphp
<nav class="topnav">
    <div>
        <a href="{{ route('home') }}">Головна</a>
        <a href="{{ route('players.index') }}">Гравці</a>
        <a href="{{ route('news.index') }}">Новини</a>
        <a href="{{ route('news.admin') }}">Керування новинами</a>
        <a href="{{ route('stats.pages') }}">Статистика</a>
    </div>
    <div class="lang">
        @foreach ($locales as $l)
            <a href="{{ request()->fullUrlWithQuery(['lang' => $l]) }}"
               class="{{ app()->getLocale() === $l ? 'active' : '' }}">{{ strtoupper($l) }}</a>
        @endforeach
    </div>
</nav>
<main>
    @yield('content')
</main>
<footer class="footer">
    &copy; 2026 Спортивний клуб &middot; Шиш Іван, група РС-41
</footer>
</body>
</html>
