<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleDetailController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(6); // Menampilkan 6 artikel per halaman
        return view('pages.admin.detail_artikel', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.admin.show_artikel', compact('article'));
    }
}
