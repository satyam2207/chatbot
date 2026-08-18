<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatAnalyticsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalChats = ChatSession::where('user_id', $userId)->count();

        $totalMessages = Message::whereHas('chatSession', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();

        $userMessages = Message::whereHas('chatSession', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('sender', 'user')->count();

        $assistantMessages = Message::whereHas('chatSession', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('sender', 'assistant')->count();

        $pinnedChats = ChatSession::where('user_id', $userId)
            ->where('is_pinned', true)
            ->count();

        $archivedChats = ChatSession::where('user_id', $userId)
            ->where('is_archived', true)
            ->count();

        return view('chat.analytics', compact(
            'totalChats',
            'totalMessages',
            'userMessages',
            'assistantMessages',
            'pinnedChats',
            'archivedChats'
        ));
    }
}