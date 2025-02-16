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
        $userRole = Auth::user()->role;
        if ($userRole == 'admin') {
            $articles = Article::where('status', 'approved')->get();
        }else {
            $articles = Article::where('user_id', Auth::user()->id)->get();
        }

        return view('pages.admin.artikel', compact('articles'));
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
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validated['image'] = $image->store('articles', 'public');
        }

        $validated['user_id'] = Auth::user()->id;

        // Jika user adalah admin, langsung "approved", jika tidak, "pending"
        $validated['status'] = Auth::user()->is_admin ? 'approved' : 'pending';

        $article = Article::create($validated);

        if (!$article) {
            return redirect()->back()->with('error', 'Artikel gagal ditambahkan');
        }

        return redirect()->back()->with('success', 'Artikel berhasil diajukan' . (Auth::user()->is_admin ? '' : ' dan menunggu persetujuan admin'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::with('comments')->findOrFail($id);
        return view('pages.admin.show_artikel', compact('article'));
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
        $articles = Article::orderBy('created_at', 'desc')->get();
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
