<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Services\PhotoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticlerticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = Article::with('photos')->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request, PhotoService $photoService): RedirectResponse
    {
        $article = Article::create($request->validated());

        if ($request->hasFile('photo')) {
            $photoService->uploadPhoto($request->file('photo'), $article, order: 0);
        }

        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View
    {
        $article->load('photos');
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View
    {
        $article->load('photos');
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article, PhotoService $photoService): RedirectResponse
    {
        $article->update($request->validated());

        // Удаление старого фото, если отмечен чекбокс
        if ($request->input('delete_photo')) {
            $mainPhoto = $article->mainPhoto;
            if ($mainPhoto) {
                $photoService->deletePhoto($mainPhoto);
            }
        }

        // Загрузка нового фото
        if ($request->hasFile('photo')) {
            // Удаляем старое главное фото, если есть
            $mainPhoto = $article->mainPhoto;
            if ($mainPhoto) {
                $photoService->deletePhoto($mainPhoto);
            }

            $photoService->uploadPhoto($request->file('photo'), $article, order: 0);
        }

        return redirect()->route('articles.show', $article)
            ->with('success', 'Статья успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно удалена!');
    }

    /**
     * Увеличить рейтинг статьи
     */
    public function incrementRating(Article $article): RedirectResponse
    {
        $article->incrementRating();
        return back()->with('success', 'Рейтинг увеличен!');
    }

    /**
     * Уменьшить рейтинг статьи
     */
    public function decrementRating(Article $article): RedirectResponse
    {
        $article->decrementRating();
        return back()->with('success', 'Рейтинг уменьшен!');
    }
}
