<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('players', PlayerController::class);

Route::get('/stats', [StatsController::class, 'pages'])->name('stats.pages');
Route::get('/stats/detail', [StatsController::class, 'detail'])->name('stats.detail');
Route::get('/stats/popular', [StatsController::class, 'popular'])->name('stats.popular');

// Новини з перекладами
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->whereNumber('news')->name('news.show');

Route::get('/admin/news', [NewsController::class, 'admin'])->name('news.admin');
Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
