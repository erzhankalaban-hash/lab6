<div>
    <label for="first_name">Ім'я</label>
    <input id="first_name" name="first_name" type="text" maxlength="50"
           value="{{ old('first_name', $player->first_name ?? '') }}">
    @error('first_name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="last_name">Прізвище</label>
    <input id="last_name" name="last_name" type="text" maxlength="50"
           value="{{ old('last_name', $player->last_name ?? '') }}">
    @error('last_name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="position">Позиція</label>
    <select id="position" name="position">
        @foreach (['Goalkeeper', 'Defender', 'Midfielder', 'Forward'] as $pos)
            <option value="{{ $pos }}" @selected(old('position', $player->position ?? '') === $pos)>
                {{ $pos }}
            </option>
        @endforeach
    </select>
    @error('position')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="birth_date">Дата народження</label>
    <input id="birth_date" name="birth_date" type="date"
           value="{{ old('birth_date', isset($player) ? $player->birth_date->format('Y-m-d') : '') }}">
    @error('birth_date')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="phone">Телефон</label>
    <input id="phone" name="phone" type="text" maxlength="20" placeholder="+380501234567"
           value="{{ old('phone', $player->phone ?? '') }}">
    @error('phone')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="country_code">Країна</label>
    <select id="country_code" name="country_code">
        @foreach ($countries as $country)
            <option value="{{ $country->code }}"
                @selected(old('country_code', $player->country_code ?? '') === $country->code)>
                {{ $country->name }} ({{ $country->code }}, {{ $country->phone_code }})
            </option>
        @endforeach
    </select>
    @error('country_code')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
