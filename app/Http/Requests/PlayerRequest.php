<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'   => ['required', 'string', 'max:50'],
            'last_name'    => ['required', 'string', 'max:50'],
            'position'     => ['required', 'string', 'in:Goalkeeper,Defender,Midfielder,Forward'],
            'birth_date'   => ['required', 'date', 'before:today'],
            'phone'        => ['required', 'string', 'max:20', 'regex:/^\+?[0-9]{7,15}$/'],
            'country_code' => ['required', 'string', 'size:2', 'exists:country,code'],
        ];
    }
}
