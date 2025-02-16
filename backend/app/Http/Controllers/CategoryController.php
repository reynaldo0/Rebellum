<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.quiz.categories.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'max_score' => 'required|numeric|min:100'
        ]);

        Category::create($request->all());

        return redirect()->route('admin.quiz.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function show($id)
    {
        $category = Category::with('quizzes')->findOrFail($id);
        return view('pages.admin.quiz.categories.show', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'max_score' => 'required|numeric|min:100'
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Cek jika kategori memiliki soal
        if ($category->quizzes()->count() > 0) {
            return redirect()->route('admin.quiz.index')
                ->with('error', 'Kategori tidak bisa dihapus karena memiliki soal.');
        }

        $category->delete();

        return redirect()->route('admin.quiz.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
