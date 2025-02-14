<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $users = User::all();

        return view('pages.admin.users', compact('articles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ada');
        }

        $updated = $user->update($validated);

        if (!$updated) {
            return redirect()->back()->with('error', 'User gagal diupdate');
        }

        return redirect()->back()->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ada');
        }

        $deleted = $user->delete();

        if (!$deleted) {
            return redirect()->back()->with('error', 'User gagal dihapus');
        }

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}
