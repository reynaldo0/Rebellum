<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('pages.artikel', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $validated['user_id'] = Auth::user()->id;

        $article = Article::create($validated);

        if (!$article) {
            return redirect()->back()->with('error', 'Artikel gagal ditambahkan');
        }

        return redirect()->back()->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $update = $article->update($validated);

        if (!$update) {
            return redirect()->back()->with('error', 'Artikel gagal diupdate');
        }

        return redirect()->back()->with('success', 'Artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (!$article) {
            return redirect()->back()->with('error', 'Artikel tidak ditemukan');
        }

        $article->delete();

        return redirect()->back()->with('success', 'Artikel berhasil dihapus');
    }
}
