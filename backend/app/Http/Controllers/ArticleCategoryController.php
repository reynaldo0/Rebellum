<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ArticleCategory::all();

        return view('pages.admin.category_artikel', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100'
        ]);

        $data = ArticleCategory::create($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'kategori gagal ditambahkan');
        }

        return redirect()->back()->with('success', 'kategori berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articleCategory = ArticleCategory::find($id);

        if (!$articleCategory) {
            return redirect()->route('category-article.index')->with('error', 'Kategori tidak ditemukan');
        }

        $validated = $request->validate([
            'name' => 'required|max:100'
        ]);

        $data = $articleCategory->update($validated);

        if (!$data) {
            return redirect()->back()->with('error', 'kategori gagal diupdate');
        }

        return redirect()->back()->with('success', 'kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $articleCategory = ArticleCategory::find($id);

        if (!$articleCategory) {
            return redirect()->route('category-article.index')->with('error', 'Kategori tidak ditemukan');
        }

        $data = $articleCategory->delete();

        if (!$data) {
            return redirect()->back()->with('error', 'kategori gagal dihapus');
        }

        return redirect()->back()->with('success', 'kategori berhasil dihapus');
    }
}
