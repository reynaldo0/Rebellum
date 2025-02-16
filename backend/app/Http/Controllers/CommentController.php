<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request, string $id)
    {
        Log::info($request->all());
        $request->validate([
            'username' => 'required',
            'content' => 'required',
            'type' => 'required|in:article,post',
        ]);

        $model = $request->type === 'article' ? Article::findOrFail($id) : Article::findOrFail($id);

        $create = $model->comments()->create([
            'username' => $request->username,
            'content' => $request->content
        ]);

        if (!$create) {
            return redirect()->back()->with('error', 'komentar gagal di tambahkan');
        }

        return redirect()->back()->with('success', 'komentar berhasil di tambahkan');
    }
}
