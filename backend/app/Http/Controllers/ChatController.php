<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private function generateAnonymousName()
    {
        $adjectives = ['Misterius', 'Lincah', 'Ganteng', 'Keren', 'Cepat', 'Bijaksana'];
        $animals = ['Panda', 'Harimau', 'Serigala', 'Burung', 'Kelinci', 'Kucing'];

        return $adjectives[array_rand($adjectives)] . ' ' . $animals[array_rand($animals)];
    }

    public function index()
    {
        $messages = ChatMessage::latest()->take(50)->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $request->validate(['message' => 'required|string']);

        if (!session()->has('nickname')) {
            session(['nickname' => $this->generateAnonymousName()]);
        }

        $nickname = session('nickname');

        $message = ChatMessage::create([
            'nickname' => $nickname,
            'message' => $request->message,
        ]);

        broadcast(new NewChatMessage($message))->toOthers();

        return response()->json($message);
    }
}
