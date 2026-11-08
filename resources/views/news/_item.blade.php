@php($t = $news->translation())
@php($isFallback = $t && $t->locale !== app()->getLocale())

<article class="card {{ $isFallback ? 'fallback' : '' }}">
    <h2><a href="{{ route('news.show', $news) }}">{{ $t?->title }}</a></h2>
    <p class="meta">
        {{ $news->published_at->format('d.m.Y') }}
        @if ($isFallback)
            &middot; <span class="badge">{{ strtoupper($t->locale) }}</span>
        переклад мовою {{ strtoupper(app()->getLocale()) }} відсутній
        @endif
    </p>
    <p>{{ $t?->description }}</p>
</article>
