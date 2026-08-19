<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notice;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Course;
use App\Models\ChatSession;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        $statistics = [
            'students' => User::where('role', 'student')->count(),
            'notices' => Notice::count(),
            'departments' => Department::count(),
            'faculty' => Faculty::count(),
            'courses' => Course::count(),
            'chat_sessions' => ChatSession::count(),
            'messages' => Message::count(),
        ];

        return view('admin.dashboard', compact('statistics'));
    }
}