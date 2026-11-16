<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Country;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $countryCode = $request->query('country_code');

        $players = Player::query()
            ->with('country')
            ->when($countryCode, function ($query, $countryCode) {
                $query->where('country_code', $countryCode);
            })
            ->orderBy('last_name')
            ->paginate(5)
            ->withQueryString();

        $countries = Country::orderBy('name')->pluck('name', 'code');

        return view('players.index', compact('players', 'countries', 'countryCode'));
    }

    public function create()
    {
        $countries = Country::orderBy('name')->get();

        return view('players.create', compact('countries'));
    }

    public function store(PlayerRequest $request)
    {
        Player::create($request->validated());

        return redirect()->route('players.index');
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $countries = Country::orderBy('name')->get();

        return view('players.edit', compact('player', 'countries'));
    }

    public function update(PlayerRequest $request, Player $player)
    {
        $player->update($request->validated());

        return redirect()->route('players.index');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index');
    }
}
