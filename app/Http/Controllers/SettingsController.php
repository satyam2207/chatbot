<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:light,dark,system',
            'language' => 'required|in:english,gujarati',
            'email_notifications' => 'nullable|boolean',
            'sound_notifications' => 'nullable|boolean',
        ]);

        $user = Auth::user();

        $user->update([
            'theme' => $request->theme,
            'language' => $request->language,
            'email_notifications' => $request->boolean('email_notifications'),
            'sound_notifications' => $request->boolean('sound_notifications'),
        ]);

        return back()->with('success', 'Settings saved successfully.');
    }
}