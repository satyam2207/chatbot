<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChatSession;
use App\Models\Message;
use App\Models\Document;
use App\Models\Department;
use App\Models\Notice;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            'students' => User::count(),
            'departments' => Department::where('is_active', true)->count(),
            'faculty' => \App\Models\Faculty::where('is_active', true)->count(),
            'notices' => Notice::where('is_active', true)->count(),
            'chat_sessions' => ChatSession::count(),
            'messages' => Message::count(),
            'documents' => Document::count(),
        ];

        $latestNotices = Notice::where('is_active', true)
            ->latest('notice_date')
            ->take(4)
            ->get();

        $departments = Department::where('is_active', true)
            ->withCount('faculties')
            ->get();

        $recentChats = ChatSession::with('user')
            ->withCount('messages')
            ->latest('updated_at')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'statistics',
            'recentChats',
            'latestNotices',
            'departments'
        ));
    }
}
