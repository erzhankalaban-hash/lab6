<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubContactRequest;

class ClubController extends Controller
{
    // Лендінг клубу з передачею даних
    public function index()
    {
        $clubName = 'СК "Олімп"';
        $trainings = [
            'Функціональний тренінг',
            'Бойові мистецтва',
            'CrossFit та важка атлетика'
        ];

        return view('club.index', compact('clubName', 'trainings'));
    }

    // Сторінка з формою зворотного зв'язку / запису
    public function contactForm()
    {
        return view('club.contact');
    }

    // Обробка форми та перехід на сторінку підтвердження
    public function contactStore(ClubContactRequest $request)
    {
        $validatedData = $request->validated();

        return view('club.confirm', $validatedData);
    }
}
