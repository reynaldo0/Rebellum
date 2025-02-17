<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = Auth::user()->role;
        if ($userRole == 'admin') {
            $articles = Article::all();
        } else {
            $articles = Article::where('user_id', Auth::user()->id)->get();
        }

        return view('pages.admin.artikel', compact('articles'));
    }

    public function indexApi()
    {
        $articles = Article::with('category')->get(); // Mengambil kategori terkait

        foreach ($articles as $article) {
            // Pastikan URL gambar benar
            $article->image = asset('storage/' . $article->image);
        }

        return response()->json($articles);
    }



    public function create()
    {
        $categories = ArticleCategory::all();
        return view('pages.admin.create_artikel', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'category_id' => 'required|exists:article_categories,id'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validated['image'] = $image->store('articles', 'public');
        }

        $validated['user_id'] = Auth::user()->id;

        // Jika user adalah admin, langsung "approved", jika tidak, "pending"
        $validated['status'] = Auth::user()->role == 'admin' ? 'approved' : 'pending';

        $article = Article::create($validated);

        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Artikel gagal ditambahkan');
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dibuat' . (Auth::user()->role == 'admin' ? '' : ' dan menunggu persetujuan admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('comments')->findOrFail($id);
        return view('pages.admin.show_artikel', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = ArticleCategory::all();
        return view('pages.admin.edit_artikel', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable',
            'category_id' => 'required|exists:article_categories,id'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            Storage::disk('public')->delete($article->image);

            $validated['image'] = $image->store('articles', 'public');
        }

        $update = $article->update($validated);

        if (!$update) {
            return redirect()->route('articles.index')->with('error', 'Artikel gagal diupdate');
        }

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Artikel tidak ditemukan');
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus');
    }

    public function approve($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Artikel disetujui dan telah dipublikasikan.');
    }

    public function reject($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Artikel berhasil ditolak.');
    }

    public function history()
    {
        $articles = Article::orderByRaw("status = 'pending' DESC")->orderBy('created_at', 'desc')->get();
        return view('pages.admin.history_articles', compact('articles'));
    }

    public function submissions()
    {
        $user = Auth::user(); // Ambil user yang login

        if (!$user) {
            abort(403, 'Anda harus login untuk melihat halaman ini.');
        }

        $articles = Article::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.user.submissions', compact('articles'));
    }
}
