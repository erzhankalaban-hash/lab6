@php($rows = old('translations', $rows))

<div>
    <label for="published_at">Дата публікації</label>
    <input id="published_at" name="published_at" type="date"
           value="{{ old('published_at', isset($news) ? $news->published_at->format('Y-m-d') : now()->format('Y-m-d')) }}">
    @error('published_at')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

@error('translations')
<p class="error">{{ $message }}</p>
@enderror

@foreach ($rows as $i => $row)
    <fieldset>
        <legend>Переклад {{ $i + 1 }}</legend>

        <label for="locale{{ $i }}">Код мови (uk, en, pl ...)</label>
        <input id="locale{{ $i }}" name="translations[{{ $i }}][locale]" type="text" maxlength="5"
               value="{{ $row['locale'] ?? '' }}">
        @error("translations.$i.locale")
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="title{{ $i }}">Заголовок</label>
        <input id="title{{ $i }}" name="translations[{{ $i }}][title]" type="text" maxlength="200"
               value="{{ $row['title'] ?? '' }}">
        @error("translations.$i.title")
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="description{{ $i }}">Короткий опис</label>
        <input id="description{{ $i }}" name="translations[{{ $i }}][description]" type="text" maxlength="500"
               value="{{ $row['description'] ?? '' }}">

        <label for="text{{ $i }}">Текст</label>
        <textarea id="text{{ $i }}" name="translations[{{ $i }}][text]" rows="4">{{ $row['text'] ?? '' }}</textarea>
    </fieldset>
@endforeach
