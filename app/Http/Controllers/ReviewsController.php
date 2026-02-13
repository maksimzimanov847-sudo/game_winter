<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Article;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reviews = Review::with(['user', 'article'])
            ->latest()
            ->paginate(10);

        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Передаём список статей для выпадающего списка
        $articles = Article::all();
        return view('reviews.create', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request): RedirectResponse
    {
        Review::create($request->validated() + [
                'user_id' => $request->user()->id,
            ]);

        return redirect()->route('reviews.index')
            ->with('success', 'Отзыв успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review): View
    {
        $review->load(['user', 'article']);
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review): View
    {
        $this->authorize('update', $review); // если используете Policy

        $articles = Article::all();
        return view('reviews.edit', compact('review', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review): RedirectResponse
    {
        $review->update($request->validated());

        return redirect()->route('reviews.index')
            ->with('success', 'Отзыв успешно обновлён!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review): RedirectResponse
    {
        $this->authorize('delete', $review);

        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Отзыв успешно удалён!');
    }
}
