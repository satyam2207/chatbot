<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile and activity statistics.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        $chatSessions = $user->chatSessions();

        $statistics = [
            'total_chats' => (clone $chatSessions)->count(),

            'active_chats' => (clone $chatSessions)
                ->where('is_archived', false)
                ->count(),

            'pinned_chats' => (clone $chatSessions)
                ->where('is_pinned', true)
                ->count(),

            'total_messages' => $user->chatSessions()
                ->withCount('messages')
                ->get()
                ->sum('messages_count'),
        ];

        return view('profile.edit', [
            'user' => $user,
            'statistics' => $statistics,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}