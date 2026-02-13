<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        $articles = Article::withCount('reviews')
            ->with('reviews')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('game.index', compact('articles'));
    }
}
