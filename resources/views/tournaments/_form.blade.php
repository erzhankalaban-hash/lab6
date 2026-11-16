<div>
    <label for="name">Назва</label>
    <input id="name" name="name" type="text" maxlength="100"
           value="{{ old('name', $tournament->name ?? '') }}">
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="city">Місто</label>
    <input id="city" name="city" type="text" maxlength="100"
           value="{{ old('city', $tournament->city ?? '') }}">
    @error('city')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="start_date">Дата початку</label>
    <input id="start_date" name="start_date" type="date"
           value="{{ old('start_date', isset($tournament) && $tournament->start_date ? $tournament->start_date->format('Y-m-d') : '') }}">
    @error('start_date')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
