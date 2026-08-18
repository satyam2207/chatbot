<?php

namespace App\Http\Controllers;

use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expiry_date')
                      ->orWhereDate('expiry_date', '>=', today());
            })
            ->orderByDesc('notice_date')
            ->get();

        return view('notices', compact('notices'));
    }
}