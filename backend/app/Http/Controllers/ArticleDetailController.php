<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $categories = ArticleCategory::all();

        $query = Article::where('status', 'approved')->latest();

        if ($category) {
            $query->where('category_id', $category);
        }

        $articles = $query->get();

        return view('pages.admin.detail_artikel', compact('articles', 'categories'));
    }

    public function show($id)
    {
        $article = Article::with('comments')->findOrFail($id);
        return view('pages.admin.show_artikel', compact('article'));
    }
}
