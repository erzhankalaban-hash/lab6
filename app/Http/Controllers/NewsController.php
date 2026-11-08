<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    // Публічний перелік: картки
    public function index()
    {
        $news = News::with('translations')
            ->orderByDesc('published_at')
            ->paginate(6)
            ->withQueryString();

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $news->load('translations');

        return view('news.show', compact('news'));
    }

    // Адміністративний перелік: таблиця
    public function admin()
    {
        $news = News::with('translations')
            ->orderByDesc('published_at')
            ->paginate(10)
            ->withQueryString();

        return view('news.admin', compact('news'));
    }

    public function create()
    {
        $rows = [
            ['locale' => 'uk', 'title' => '', 'description' => '', 'text' => ''],
            ['locale' => 'en', 'title' => '', 'description' => '', 'text' => ''],
            ['locale' => '', 'title' => '', 'description' => '', 'text' => ''],
        ];

        return view('news.create', compact('rows'));
    }

    public function store(NewsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $news = News::create(['published_at' => $request->input('published_at')]);
            $this->saveTranslations($news, $request->input('translations', []));
        });

        return redirect()->route('news.admin');
    }

    public function edit(News $news)
    {
        $news->load('translations');

        $rows = $news->translations
            ->sortBy(fn ($t) => $t->locale === News::MAIN_LOCALE ? 0 : 1)
            ->map(fn ($t) => $t->only(['locale', 'title', 'description', 'text']))
            ->values()
            ->all();

        // Порожній рядок для додавання нової мови
        $rows[] = ['locale' => '', 'title' => '', 'description' => '', 'text' => ''];

        return view('news.edit', compact('news', 'rows'));
    }

    public function update(NewsRequest $request, News $news)
    {
        DB::transaction(function () use ($request, $news) {
            $news->update(['published_at' => $request->input('published_at')]);
            $this->saveTranslations($news, $request->input('translations', []));
        });

        return redirect()->route('news.admin');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.admin');
    }

    // Зберігає переклади: нова мова = новий рядок у news_translations
    private function saveTranslations(News $news, array $rows): void
    {
        foreach ($rows as $row) {
            $locale = trim($row['locale'] ?? '');

            if ($locale === '') {
                continue;
            }

            $news->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title'       => $row['title'],
                    'description' => $row['description'] ?? null,
                    'text'        => $row['text'] ?? null,
                ]
            );
        }
    }
}
