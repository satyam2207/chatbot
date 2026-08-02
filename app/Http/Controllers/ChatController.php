<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $sessions = ChatSession::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('chat-history', compact('sessions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        ChatSession::create([
            'user_id' => Auth::id(),
            'title' => $request->title ?? 'New Chat',
        ]);

        return redirect()->back()->with('success', 'Chat session created.');
    }

    public function update(Request $request, ChatSession $chatSession)
    {
        if ($chatSession->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $chatSession->update([
            'title' => $request->title,
        ]);

        return redirect()->back()->with('success', 'Chat renamed.');
    }

    public function destroy(ChatSession $chatSession)
    {
        if ($chatSession->user_id != Auth::id()) {
            abort(403);
        }

        $chatSession->delete();

        return redirect()->back()->with('success', 'Chat deleted.');
    }
}