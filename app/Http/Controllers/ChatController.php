<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display the user's chat workspace.
     */
    public function chat(Request $request)
    {
        $user = Auth::user();

        $sessions = ChatSession::where('user_id', $user->id)
            ->with('latestMessage')
            ->orderByDesc('is_pinned')
            ->orderByDesc('last_message_at')
            ->orderByDesc('updated_at')
            ->get();

        if ($request->filled('session')) {
            $session = $sessions->firstWhere(
                'id',
                $request->integer('session')
            );

            if (!$session) {
                abort(404);
            }
        } else {
            $session = $sessions->first();

            if (!$session) {
                $session = $this->createNewSession($user->id);
                $sessions = collect([$session]);
            }
        }

        $messages = Message::where('chat_session_id', $session->id)
            ->orderBy('created_at')
            ->get();

        return view('chat', [
            'session' => $session,
            'sessions' => $sessions,
            'messages' => $messages,
        ]);
    }

    /**
     * Create a new chat session.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
        ]);

        $session = ChatSession::create([
            'user_id' => Auth::id(),
            'title' => $request->input('title', 'New Chat'),
            'description' => 'College AI conversation',
            'is_pinned' => false,
            'is_archived' => false,
        ]);

        return redirect()
            ->route('chat', ['session' => $session->id])
            ->with('success', 'New chat created.');
    }

    /**
     * Rename an existing chat.
     */
    public function update(Request $request, ChatSession $chatSession)
    {
        $this->authorizeSession($chatSession);

        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $chatSession->update([
            'title' => $request->title,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Chat renamed successfully.');
    }

    /**
     * Delete a chat and its messages.
     */
    public function destroy(ChatSession $chatSession)
    {
        $this->authorizeSession($chatSession);

        $chatSession->delete();

        return redirect()
            ->route('chat')
            ->with('success', 'Chat deleted successfully.');
    }

    /**
     * Pin or unpin a chat.
     */
    public function togglePin(ChatSession $chatSession)
    {
        $this->authorizeSession($chatSession);

        $chatSession->update([
            'is_pinned' => !$chatSession->is_pinned,
        ]);

        return redirect()->back();
    }

    /**
     * Archive or restore a chat.
     */
    public function toggleArchive(ChatSession $chatSession)
    {
        $this->authorizeSession($chatSession);

        $chatSession->update([
            'is_archived' => !$chatSession->is_archived,
        ]);

        return redirect()->back();
    }

    /**
     * Store a user message.
     *
     * AI generation is intentionally kept separate from the
     * database layer so the chat system remains functional
     * even when an AI provider is unavailable.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
            'chat_session_id' => 'required|exists:chat_sessions,id',
        ]);

        $session = ChatSession::where('id', $request->chat_session_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $message = Message::create([
            'chat_session_id' => $session->id,
            'sender' => 'user',
            'message' => $request->message,
            'is_read' => true,
        ]);

        $session->update([
            'last_message_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => [
                'id' => $message->id,
                'sender' => $message->sender,
                'message' => $message->message,
                'created_at' => $message->created_at->toISOString(),
            ],
        ]);
    }

    /**
     * Return chat history for the authenticated user.
     */
    public function history(Request $request)
    {
        $sessions = ChatSession::where('user_id', Auth::id())
            ->withCount('messages')
            ->with('latestMessage')
            ->orderByDesc('is_pinned')
            ->orderByDesc('last_message_at')
            ->orderByDesc('updated_at')
            ->get();

        return response()->json([
            'success' => true,
            'sessions' => $sessions,
        ]);
    }

    /**
     * Verify that the current user owns the chat session.
     */
    private function authorizeSession(ChatSession $chatSession): void
    {
        if ($chatSession->user_id !== Auth::id()) {
            abort(403, 'You are not authorized to modify this chat.');
        }
    }

    /**
     * Create the first chat for a user.
     */
    private function createNewSession(int $userId): ChatSession
    {
        return ChatSession::create([
            'user_id' => $userId,
            'title' => 'New Chat',
            'description' => 'College AI conversation',
            'is_pinned' => false,
            'is_archived' => false,
        ]);
    }
}