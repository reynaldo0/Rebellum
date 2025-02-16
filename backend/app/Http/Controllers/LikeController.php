<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likeArticle(Article $article)
    {
        $existingLike = Like::where('user_id', Auth::id())
            ->where('article_id', $article->id)
            ->first();

        if ($existingLike) {
            $existingLike->delete();

            return redirect()->back()->with('success', 'Berhasil unlike artikel');
        }

        $article->likes()->create([
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Berhasil like artikel');
    }
}
