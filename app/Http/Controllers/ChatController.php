<?php

namespace App\Http\Controllers;

use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Content;
use Gemini\Enums\Role;
use App\Models\Message;
use App\Models\ChatSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    private const CONTEXT_MESSAGE_LIMIT = 20;

    private const SYSTEM_INSTRUCTION = <<<'PROMPT'
You are KDP Connect AI, a helpful assistant for K.D. Polytechnic.

Prioritize clear, accurate, student-friendly help about K.D. Polytechnic, diploma courses, departments, admissions, fees, facilities, college services, academic information, student matters, and general educational questions. Use the conversation history to understand follow-up questions.

Do not invent or assume K.D. Polytechnic-specific facts. When verified college-specific information is not available in the conversation, say so clearly and suggest checking the official college source or contacting the college office. Distinguish general educational or admission guidance from verified K.D. Polytechnic information.

For unrelated questions, you may answer briefly when useful, while politely noting that your primary purpose is college and education assistance.
PROMPT;

    public function chat(Request $request)
    {
        $sessions = ChatSession::where('user_id', Auth::id());

        if ($request->boolean('new')) {
            $session = ChatSession::create([
                'user_id' => Auth::id(),
                'title' => 'New Chat',
            ]);

            return redirect()->route('chat', ['session' => $session->id]);
        } elseif ($request->filled('session')) {
            $session = $sessions->whereKey($request->integer('session'))->firstOrFail();
        } else {
            $session = $sessions
                ->orderByDesc('last_message_at')
                ->latest('updated_at')
                ->first();

            if (! $session) {
                $session = ChatSession::create([
                    'user_id' => Auth::id(),
                    'title' => 'New Chat',
                ]);

                return redirect()->route('chat', ['session' => $session->id]);
            }
        }

        $messages = $session->messages()->orderBy('id')->get();

        return view('chat', compact('session', 'messages'));
    }

    public function index()
    {
        $sessions = ChatSession::where('user_id', Auth::id())
            ->orderByDesc('last_message_at')
            ->latest('updated_at')
            ->with('latestMessage')
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
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
            'chat_session_id' => 'required|exists:chat_sessions,id',
        ]);

        $session = ChatSession::where('id', $request->chat_session_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Save user's message
        $currentMessage = Message::create([
            'chat_session_id' => $session->id,
            'sender' => 'user',
            'message' => $request->message,
            'is_read' => true,
        ]);

        // Keep the newest prior turns from this authenticated session in chronological order.
        $history = $session->messages()
            ->where('id', '<', $currentMessage->id)
            ->latest('id')
            ->take(self::CONTEXT_MESSAGE_LIMIT)
            ->get()
            ->reverse()
            ->map(fn (Message $message) => Content::parse(
                part: $message->message,
                role: $message->sender === 'assistant' ? Role::MODEL : Role::USER,
            ))
            ->all();

        try {
            $model = Gemini::generativeModel(model: 'gemini-3.6-flash')
                ->withSystemInstruction(Content::parse(self::SYSTEM_INSTRUCTION));

            $response = $model
                ->startChat(history: $history)
                ->sendMessage($currentMessage->message);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json([
                'success' => false,
                'message' => 'The AI service is temporarily unavailable. Please try again.',
            ], 502);
        }

        $reply = $response->text();

        // Save Gemini's response
        Message::create([
            'chat_session_id' => $session->id,
            'sender' => 'assistant',
            'message' => $reply,
            'is_read' => true,
        ]);

        // Update latest message time
        $session->update([
            'last_message_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'reply' => $reply,
        ]);
    }
}
