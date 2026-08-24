<x-app-layout>
    <div class="chat-app">

        <!-- SIDEBAR -->
        <aside class="chat-sidebar" id="chatSidebar">

            <div class="chat-brand">
                <div class="brand-logo">✦</div>

                <div>
                    <strong>College AI</strong>
                    <small>Student Assistant</small>
                </div>
            </div>

            <form method="POST" action="{{ route('chat.new') }}">
    @csrf
    <button type="submit" class="new-chat-btn">
        <span>＋</span>
        New chat
    </button>
</form>

            <a href="{{ route('chat.analytics') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-gray-100 transition">
    <span class="text-xl">📊</span>
    <span class="font-medium">Chat Analytics</span>
</a>

            <div class="sidebar-title">Chats</div>

            <div class="chat-list">
    @php
       $sidebarChats = \App\Models\ChatSession::where('user_id', auth()->id())
    ->latest('updated_at')
    ->take(8)
    ->get();

if ($session && !$sidebarChats->contains('id', $session->id)) {
    $sidebarChats->push($session);
}
    @endphp

    @forelse ($sidebarChats as $chat)
        <a
            href="{{ route('chat', ['session' => $chat->id]) }}"
           class="chat-list-item {{ $chat->id == $session->id ? 'active' : '' }}"
        >
            <div class="chat-list-icon">
    {{ $chat->is_pinned ? '📌' : '💬' }}
</div>

            <div class="chat-list-content">
                <strong>{{ $chat->title }}</strong>
                <div class="chat-actions">

    <form method="POST" action="{{ route('chat.pin', $chat->id) }}">
        @csrf
        @method('PATCH')

        <button type="submit" title="{{ $chat->is_pinned ? 'Unpin chat' : 'Pin chat' }}">
            {{ $chat->is_pinned ? '📌' : '📍' }}
        </button>
    </form>

    <form method="POST" action="{{ route('chat.archive', $chat->id) }}">
        @csrf
        @method('PATCH')

        <button type="submit" title="{{ $chat->is_archived ? 'Restore chat' : 'Archive chat' }}">
            {{ $chat->is_archived ? '↩️' : '📦' }}
        </button>
    </form>

    <form method="POST"
          action="{{ route('chat.delete', $chat->id) }}"
          onsubmit="return confirm('Delete this chat permanently?');">
        @csrf
        @method('DELETE')

        <button type="submit" title="Delete chat">
            🗑️
        </button>
    </form>

</div>

                <small>
                    {{ optional($chat->updated_at)->diffForHumans() }}
                </small>
            </div>
        </a>
    @empty
        <div class="chat-list-empty">
            No previous conversations yet.
        </div>
    @endforelse
</div>

            <div class="sidebar-bottom">

                <button type="button" class="settings-btn">
                    <span>⚙</span>
                    <span>Settings</span>
                </button>

                <div class="profile">

                    <div class="profile-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="profile-info">
                        <strong>{{ auth()->user()->name ?? 'Student' }}</strong>
                        <small>Student</small>
                    </div>

                </div>

            </div>
        </aside>


        <!-- MAIN CHAT -->
        <main class="chat-main">

            <!-- HEADER -->
            <header class="chat-header">

                <div class="chat-title">

                    <button
                        class="mobile-menu"
                        type="button"
                        id="mobileMenu"
                    >
                        ☰
                    </button>

                    <div>
                        <h1>College AI</h1>

                        <span class="online-status">
                            <i></i>
                            Online
                        </span>
                    </div>

                </div>

                <button class="header-action" type="button">
                    ⋯
                </button>

            </header>


            <!-- CHAT CONTENT -->
            <section class="chat-content" id="chatContent">


    <div class="messages-container" data-chat-messages>

        @if ($messages->count() > 0)

            @foreach ($messages as $message)

                <div class="message-row {{ $message->sender === 'user' ? 'user-message' : 'assistant-message' }}">

                    @if ($message->sender === 'assistant')
                        <div class="message-avatar">✦</div>
                    @endif

                    <div class="message-bubble markdown-message">
    {{ $message->message }}
</div>

                </div>

            @endforeach

    @else

        <div class="chat-empty" id="chatEmpty">

            <div class="ai-logo">
                ✦
            </div>

            <h2>How can I help you?</h2>

            <p>
                Ask me anything about your college, academics,
                courses, exams and student services.
            </p>

        <div class="suggestions">

    <button type="button"
        onclick="document.querySelector('textarea[name=message]').value='Help me with my studies'; document.querySelector('textarea[name=message]').focus();">
        📚 Help me with my studies
    </button>

    <button type="button"
        onclick="document.querySelector('textarea[name=message]').value='Explain a topic'; document.querySelector('textarea[name=message]').focus();">
        📝 Explain a topic
    </button>

    <button type="button"
        onclick="document.querySelector('textarea[name=message]').value='Tell me about my college'; document.querySelector('textarea[name=message]').focus();">
        🎓 College information
    </button>

</div>
        </div>

    @endif

    </div>

</section>

            <!-- COMPOSER -->
            <div class="composer-area">

                <form
                    method="POST"
                    action="{{ route('chat.send') }}"
                    class="chat-composer"
                    id="chatForm"
                    data-chat-form
                    data-chat-session-id="{{ $session->id }}"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="chat_session_id"
                        value="{{ $session->id }}"
                    >

                    <button
                        type="button"
                        class="attach-btn"
                        aria-label="Attach"
                    >
                        ＋
                    </button>

                    <textarea
                        name="message"
                        rows="1"
                        placeholder="Ask College AI anything..."
                        required
                        data-chat-input
                    ></textarea>

                    <button
                        type="submit"
                        class="send-btn"
                        aria-label="Send message"
                        data-chat-send
                    >
                        ↑
                    </button>

                </form>

                <p class="composer-note">
                    College AI may make mistakes. Verify important information.
                </p>

            </div>

        </main>

    </div>


    <style>


.markdown-message p {
    margin: 0 0 12px;
}

.markdown-message p:last-child {
    margin-bottom: 0;
}

.markdown-message h1,
.markdown-message h2,
.markdown-message h3 {
    font-weight: 700;
    line-height: 1.3;
    margin: 18px 0 8px;
}

.markdown-message h1 {
    font-size: 22px;
}

.markdown-message h2 {
    font-size: 19px;
}

.markdown-message h3 {
    font-size: 16px;
}

.markdown-message ul,
.markdown-message ol {
    margin: 8px 0 14px 22px;
    padding-left: 18px;
}

.markdown-message li {
    margin: 5px 0;
}

.markdown-message strong {
    font-weight: 700;
}

.markdown-message em {
    font-style: italic;
}

.markdown-message code {
    padding: 2px 5px;
    border-radius: 5px;
    background: #f3f4f6;
    font-family: monospace;
    font-size: 0.9em;
}

.markdown-message .md-code {
    margin: 12px 0;
    padding: 12px;
    overflow-x: auto;
    border-radius: 8px;
    background: #111827;
    color: #f9fafb;
}

.markdown-message .md-code code {
    padding: 0;
    background: transparent;
    color: inherit;
}



/* =========================
   CHAT MESSAGES
========================= */

.messages-container {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    padding: 28px 24px 140px;
}

.message-row {
    display: flex;
    width: 100%;
    margin-bottom: 20px;
    align-items: flex-end;
    gap: 10px;
}

.user-message {
    justify-content: flex-end;
}

.assistant-message {
    justify-content: flex-start;
}

.message-bubble {
    display: inline-block;
    width: fit-content;
    max-width: 72%;
    padding: 11px 15px;
    margin: 0;
    border-radius: 17px;
    font-size: 15px;
    line-height: 1.5;
    white-space: pre-wrap;
    word-break: break-word;
    overflow-wrap: anywhere;
}

.user-message .message-bubble {
    background: #2563eb;
    color: #ffffff;
    border-bottom-right-radius: 5px;
}

.assistant-message .message-bubble {
    background: #ffffff;
    color: #1f2937;
    border: 1px solid #e5e7eb;
    border-bottom-left-radius: 5px;
}

.message-avatar {
    width: 30px;
    height: 30px;
    flex: 0 0 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #4f46e5;
    color: white;
    font-size: 14px;
}

.typing-message {
    display: flex;
    align-items: center;
    gap: 10px;
}

.typing-dots {
    display: flex;
    gap: 4px;
}

.typing-dots span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #9ca3af;
    animation: typing 1.2s infinite;
}

.typing-dots span:nth-child(2) {
    animation-delay: 0.15s;
}

.typing-dots span:nth-child(3) {
    animation-delay: 0.3s;
}

@keyframes typing {
    0%, 60%, 100% {
        opacity: 0.3;
        transform: translateY(0);
    }

    30% {
        opacity: 1;
        transform: translateY(-3px);
    }
}

@media (max-width: 768px) {
    .messages-container {
        padding: 20px 14px 130px;
    }

    .message-bubble {
        max-width: 85%;
        font-size: 14px;
    }
}

        * {
            box-sizing: border-box;
        }

        .chat-app {
            display: flex;
            width: 100%;
            height: calc(100vh - 64px);
            min-height: 600px;
            background: #f8fafc;
            color: #111827;
            overflow: hidden;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .chat-sidebar {
            width: 280px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 20px 14px;
        }

        .chat-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 8px 22px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #111827;
            color: white;
            font-size: 22px;
        }

        .chat-brand strong,
        .profile strong {
            display: block;
            font-size: 14px;
            font-weight: 700;
        }

        .chat-brand small,
        .profile small {
            display: block;
            margin-top: 2px;
            color: #6b7280;
            font-size: 12px;
        }

        .new-chat-btn {
            width: 100%;
            height: 44px;
            border: 0;
            border-radius: 10px;
            background: #111827;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .new-chat-btn:hover {
            background: #1f2937;
        }

        .new-chat-btn span {
            font-size: 19px;
            margin-right: 5px;
        }

        .sidebar-title {
            margin: 25px 10px 10px;
            color: #9ca3af;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .chat-list {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
        }

        .chat-list-empty {
            padding: 12px 10px;
            color: #9ca3af;
            font-size: 13px;
            line-height: 1.5;
        }

        .sidebar-bottom {
            border-top: 1px solid #f0f0f0;
            padding-top: 14px;
        }

        .settings-btn {
            width: 100%;
            border: 0;
            background: transparent;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 8px;
            color: #4b5563;
            cursor: pointer;
            text-align: left;
        }

        .settings-btn:hover {
            background: #f3f4f6;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 8px 2px;
        }

        .profile-avatar {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e5e7eb;
            color: #374151;
            font-size: 14px;
            font-weight: 700;
        }

        /* =========================
           MAIN
        ========================= */

        .chat-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            height: 100%;
            background: #f8fafc;
        }

        .chat-header {
            height: 68px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid #e5e7eb;
        }

        .chat-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-title h1 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
        }

        .online-status {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 2px;
            color: #6b7280;
            font-size: 12px;
        }

        .online-status i {
            width: 7px;
            height: 7px;
            display: inline-block;
            border-radius: 50%;
            background: #22c55e;
        }

        .header-action {
            width: 36px;
            height: 36px;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #6b7280;
            font-size: 22px;
            cursor: pointer;
        }

        .header-action:hover {
            background: #f3f4f6;
        }

        .mobile-menu {
            display: none;
            width: 36px;
            height: 36px;
            border: 0;
            background: transparent;
            font-size: 20px;
            cursor: pointer;
        }

        /* =========================
           CHAT AREA
        ========================= */

        .chat-content {
            flex: 1;
            min-height: 0;
            overflow-y: auto;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 40px 24px;
        }

        .chat-empty {
            width: 100%;
            max-width: 650px;
            text-align: center;
            margin-bottom: 30px;
        }

        .ai-logo {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border-radius: 18px;
            background: #111827;
            color: white;
            font-size: 34px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .chat-empty h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .chat-empty p {
            max-width: 520px;
            margin: 12px auto 0;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }

        .suggestions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 28px;
        }

        .suggestions button {
            min-height: 58px;
            padding: 10px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            color: #374151;
            font-size: 12px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .suggestions button:hover {
            border-color: #cbd5e1;
            background: #f9fafb;
            transform: translateY(-1px);
        }

        /* =========================
           COMPOSER
        ========================= */

        .composer-area {
            flex-shrink: 0;
            padding: 10px 24px 20px;
            background: #f8fafc;
        }

        .chat-composer {
            width: 100%;
            max-width: 850px;
            min-height: 58px;
            margin: 0 auto;
            display: flex;
            align-items: flex-end;
            gap: 8px;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 16px;
            background: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .chat-composer textarea {
            flex: 1;
            min-width: 0;
            max-height: 150px;
            resize: none;
            border: 0 !important;
            outline: none !important;
            box-shadow: none !important;
            background: transparent !important;
            padding: 10px 4px;
            color: #111827;
            font-size: 14px;
            line-height: 20px;
        }

        .chat-composer textarea::placeholder {
            color: #9ca3af;
        }

        .attach-btn,
        .send-btn {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 10px;
            cursor: pointer;
        }

        .attach-btn {
            background: transparent;
            color: #6b7280;
            font-size: 22px;
        }

        .attach-btn:hover {
            background: #f3f4f6;
        }

        .send-btn {
            width: 40px;
            height: 40px;
            background: #111827;
            color: #ffffff;
            border: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            font-weight: 500;
            line-height: 1;
            padding: 0;
            cursor: pointer;
            transition: transform 0.15s ease, background 0.15s ease, opacity 0.15s ease;
        }

        .send-btn:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .send-btn:active {
            transform: translateY(0);
        }

        .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .send-spinner {
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: sendSpin 0.7s linear infinite;
        }

        @keyframes sendSpin {
            to {
                transform: rotate(360deg);
            }
        }

        .composer-note {
            margin: 8px 0 0;
            text-align: center;
            color: #9ca3af;
            font-size: 11px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .chat-app {
                height: calc(100vh - 64px);
            }

            .chat-sidebar {
                position: fixed;
                top: 64px;
                bottom: 0;
                left: 0;
                z-index: 50;
                width: 270px;
                transform: translateX(-100%);
                transition: transform 0.25s ease;
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.12);
            }

            .chat-sidebar.open {
                transform: translateX(0);
            }

            .mobile-menu {
                display: block;
            }

            .chat-header {
                padding: 0 14px;
            }

            .chat-content {
                padding: 30px 16px;
            }

            .chat-empty h2 {
                font-size: 24px;
            }

            .chat-empty p {
                font-size: 13px;
            }

            .suggestions {
                grid-template-columns: 1fr;
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            }

            .composer-area {
                padding: 8px 12px 14px;
            }

            .chat-composer {
                border-radius: 14px;
            }
        }

        @media (max-width: 480px) {

            .chat-app {
                min-height: 500px;
            }

            .chat-title h1 {
                font-size: 15px;
            }

            .chat-empty {
                margin-bottom: 10px;
            }

            .ai-logo {
                width: 56px;
                height: 56px;
                font-size: 28px;
            }

            .chat-empty h2 {
                font-size: 22px;
            }

            .attach-btn,
            .send-btn {
                width: 36px;
                height: 36px;
            }
        }

        /* =========================
   PRESENTATION UI UPGRADE
========================= */

.chat-app {
    background: #f8fafc;
}

/* Sidebar branding */
.chat-brand {
    padding: 22px 20px;
    border-bottom: 1px solid #e5e7eb;
}

.brand-logo,
.ai-logo,
.message-avatar {
    background: linear-gradient(135deg, #2563eb, #7c3aed);
    color: white;
    box-shadow: 0 6px 18px rgba(37, 99, 235, 0.20);
}

/* Main header */
.chat-header {
    background: rgba(255, 255, 255, 0.96);
    border-bottom: 1px solid #e5e7eb;
    backdrop-filter: blur(10px);
}

.chat-title h1 {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
}

.online-status {
    color: #16a34a;
    font-size: 13px;
    font-weight: 600;
}

.online-status i {
    background: #22c55e;
    box-shadow: 0 0 0 4px #dcfce7;
}

/* Empty welcome screen */
.chat-empty {
    max-width: 720px;
    margin: auto;
    text-align: center;
    padding: 40px 20px;
}

.chat-empty .ai-logo {
    width: 72px;
    height: 72px;
    margin: 0 auto 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 22px;
    font-size: 32px;
}

.chat-empty h2 {
    font-size: 32px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 10px;
}

.chat-empty p {
    max-width: 600px;
    margin: 0 auto;
    color: #6b7280;
    line-height: 1.7;
}

/* Suggestion cards */
.suggestions {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
    margin-top: 28px;
}

.suggestions button {
    padding: 16px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    color: #374151;
    font-weight: 600;
    transition: all 0.2s ease;
    box-shadow: 0 3px 10px rgba(0,0,0,0.04);
}

.suggestions button:hover {
    border-color: #93c5fd;
    background: #eff6ff;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(37,99,235,0.10);
}

/* Messages */

.message-bubble {
    display: block !important;
    width: max-content !important;
    max-width: 72% !important;
    height: auto !important;
    min-height: 0 !important;
    padding: 8px 13px !important;
    margin: 0 !important;
    line-height: 1.4 !important;
    font-size: 15px !important;
    white-space: normal !important;
    overflow-wrap: anywhere !important;
    word-break: break-word !important;
}

.user-message .message-bubble {
    background: linear-gradient(135deg, #2563eb, #4f46e5);
    color: white;
    border-radius: 18px 18px 5px 18px;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12);
}

.assistant-message .message-bubble {
    background: white;
    color: #1f2937;
    border: 1px solid #e5e7eb;
    border-radius: 5px 18px 18px 18px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

/* Composer */
.composer-area {
    background: linear-gradient(to top, #f8fafc 75%, transparent);
    padding-top: 18px;
}

.chat-composer {
    background: white;
    border: 1px solid #dbe3ef;
    border-radius: 18px;
    box-shadow: 0 8px 30px rgba(15,23,42,0.08);
    transition: all 0.2s ease;
}

.chat-composer:focus-within {
    border-color: #60a5fa;
    box-shadow: 0 8px 30px rgba(37,99,235,0.12);
}

.chat-composer textarea {
    color: #111827;
}

.chat-composer textarea::placeholder {
    color: #9ca3af;
}

.send-btn {
    background: linear-gradient(135deg, #2563eb, #4f46e5);
    border-radius: 12px;
    transition: all 0.2s ease;
}

.send-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(37,99,235,0.25);
}

.composer-note {
    color: #9ca3af;
    font-size: 11px;
}

/* Mobile */
@media (max-width: 700px) {
    .suggestions {
        grid-template-columns: 1fr;
    }

    .chat-empty h2 {
        font-size: 26px;
    }

    .chat-empty {
        padding: 25px 15px;
    }
}

.chat-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding: 8px;
}

.chat-list-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    color: #374151;
    transition: 0.2s ease;
}

.chat-list-item:hover {
    background: #eff6ff;
}
.chat-list-item.active {
    background: #eef2ff;
    color: #3730a3;
    font-weight: 600;
}

.chat-list-item.active .chat-list-icon {
    background: #e0e7ff;
}

.chat-list-icon {
    width: 34px;
    height: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f3f4f6;
    border-radius: 10px;
}

.chat-list-content {
    min-width: 0;
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.chat-list-content strong {
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat-list-content small {
    font-size: 11px;
    color: #9ca3af;
}
    

/* =========================
   FINAL CLEAN AI CHAT STYLE
========================= */

.message-row {
    width: 100%;
    margin-bottom: 18px;
    align-items: flex-end !important;
}

.user-message {
    justify-content: flex-end;
}

.assistant-message {
    justify-content: flex-start;
}

.message-bubble {
    display: block !important;
    width: max-content !important;
    max-width: min(72%, 700px) !important;
    height: auto !important;
    min-height: 0 !important;
    padding: 9px 14px !important;
    margin: 0 !important;
    font-size: 15px !important;
    line-height: 1.55 !important;
    white-space: normal !important;
    overflow-wrap: anywhere !important;
    word-break: break-word !important;
}

.user-message .message-bubble {
    max-width: min(72%, 600px) !important;
    background: linear-gradient(135deg, #2563eb, #4f46e5) !important;
    color: #ffffff !important;
    border: none !important;
    border-radius: 18px 18px 5px 18px !important;
    box-shadow: 0 3px 10px rgba(37, 99, 235, 0.12) !important;
}

.assistant-message .message-bubble {
    max-width: min(72%, 700px) !important;
    background: #ffffff !important;
    color: #1f2937 !important;
    border: 1px solid #e5e7eb !important;
    border-radius: 5px 18px 18px 18px !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.035) !important;
}

/* AI Markdown */

.ai-heading {
    margin: 4px 0 8px;
    font-weight: 700;
    line-height: 1.35;
}

h2.ai-heading {
    font-size: 18px;
}

h3.ai-heading {
    font-size: 16px;
}

h4.ai-heading {
    font-size: 15px;
}

.ai-list {
    margin: 6px 0;
    padding-left: 20px;
}

.ai-list li {
    margin: 3px 0;
}

.ai-inline-code {
    padding: 2px 5px;
    border-radius: 5px;
    background: #f3f4f6;
    font-family: monospace;
    font-size: 13px;
}

.ai-code-block {
    margin: 8px 0;
    padding: 10px 12px;
    overflow-x: auto;
    border-radius: 8px;
    background: #111827;
    color: #f9fafb;
    font-size: 13px;
    line-height: 1.5;
}

@media (max-width: 768px) {
    .message-bubble,
    .assistant-message .message-bubble,
    .user-message .message-bubble {
        max-width: 85% !important;
    }
}

</style>


   

</x-app-layout>