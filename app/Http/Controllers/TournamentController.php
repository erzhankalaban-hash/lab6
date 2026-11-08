<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    private function rules(): array
    {
        return [
            'name'       => ['required', 'string', 'max:100'],
            'city'       => ['nullable', 'string', 'max:100'],
            'start_date' => ['nullable', 'date'],
        ];
    }

    public function index()
    {
        $tournaments = Tournament::withCount('players')
            ->orderBy('name')
            ->paginate(10);

        return view('tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        Tournament::create($request->validate($this->rules()));

        return redirect()->route('tournaments.index');
    }

    public function edit(Tournament $tournament)
    {
        return view('tournaments.edit', compact('tournament'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $tournament->update($request->validate($this->rules()));

        return redirect()->route('tournaments.index');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournaments.index');
    }
}
