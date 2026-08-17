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

            <button class="new-chat-btn" type="button">
                <span>＋</span>
                New chat
            </button>

            <div class="sidebar-title">Chats</div>

            <div class="chat-list">
                <div class="chat-list-empty">
                    Your conversations will appear here.
                </div>
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

    @if ($messages->count() > 0)

        <div class="messages-container">

            @foreach ($messages as $message)

                <div class="message-row {{ $message->sender === 'user' ? 'user-message' : 'assistant-message' }}">

                    @if ($message->sender === 'assistant')
                        <div class="message-avatar">✦</div>
                    @endif

                    <div class="message-bubble">
                        {!! nl2br(e($message->message)) !!}
                    </div>

                </div>

            @endforeach

        </div>

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

                <button type="button">
                    📚 Help me with my studies
                </button>

                <button type="button">
                    📝 Explain a topic
                </button>

                <button type="button">
                    🎓 College information
                </button>

            </div>

        </div>

    @endif

</section>

            <!-- COMPOSER -->
            <div class="composer-area">

                <form
                    method="POST"
                    action="{{ route('chat.send') }}"
                    class="chat-composer"
                    id="chatForm"
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
                    ></textarea>

                    <button
                        type="submit"
                        class="send-btn"
                        aria-label="Send message"
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




/* =========================
   CHAT MESSAGES
========================= */

.messages-container {
    width: 100%;
    max-width: 850px;
    margin: 0 auto;
    padding: 30px 0;
}

.message-row {
    display: flex;
    width: 100%;
    margin-bottom: 22px;
    align-items: flex-start;
    gap: 10px;
}

.user-message {
    justify-content: flex-end;
}

.assistant-message {
    justify-content: flex-start;
}

.message-bubble {
    max-width: 75%;
    padding: 12px 16px;
    border-radius: 16px;
    font-size: 14px;
    line-height: 1.6;
    white-space: normal;
    word-wrap: break-word;
}

.user-message .message-bubble {
    background: #111827;
    color: white;
    border-bottom-right-radius: 5px;
}

.assistant-message .message-bubble {
    background: white;
    color: #1f2937;
    border: 1px solid #e5e7eb;
    border-bottom-left-radius: 5px;
}

.message-avatar {
    width: 32px;
    height: 32px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #111827;
    color: white;
    font-size: 16px;
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
        padding: 20px 0;
    }

    .message-bubble {
        max-width: 85%;
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
            width: 270px;
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
            justify-content: center;
            align-items: center;
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
            background: #111827;
            color: white;
            font-size: 20px;
            font-weight: 600;
        }

        .send-btn:hover {
            background: #1f2937;
        }

        .send-btn:disabled {
            opacity: 0.55;
            cursor: not-allowed;
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
    </style>


   <script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('chatForm');
    const textarea = form?.querySelector('textarea');
    const sendButton = form?.querySelector('.send-btn');
    const mobileMenu = document.getElementById('mobileMenu');
    const sidebar = document.getElementById('chatSidebar');
    const chatContent = document.getElementById('chatContent');

    if (!form || !textarea || !sendButton || !chatContent) {
        return;
    }


    /* =========================
       MOBILE SIDEBAR
    ========================= */

    if (mobileMenu && sidebar) {
        mobileMenu.addEventListener('click', function () {
            sidebar.classList.toggle('open');
        });
    }


    /* =========================
       ADD MESSAGE
    ========================= */

    function addMessage(message, sender) {

        let container =
            chatContent.querySelector('.messages-container');

        /*
         * Remove welcome screen
         */
        const empty =
            chatContent.querySelector('.chat-empty');

        if (empty) {
            empty.remove();
        }


        /*
         * Create message container
         */
        if (!container) {

            container = document.createElement('div');

            container.className = 'messages-container';

            chatContent.appendChild(container);
        }


        /*
         * Message row
         */
        const row = document.createElement('div');

        row.className =
            'message-row ' +
            (sender === 'user'
                ? 'user-message'
                : 'assistant-message');


        /*
         * AI avatar
         */
        if (sender === 'assistant') {

            const avatar = document.createElement('div');

            avatar.className = 'message-avatar';

            avatar.textContent = '✦';

            row.appendChild(avatar);
        }


        /*
         * Message bubble
         */
        const bubble = document.createElement('div');

        bubble.className = 'message-bubble';

        bubble.textContent = message;

        row.appendChild(bubble);

        container.appendChild(row);


        /*
         * Scroll to newest message
         */
        chatContent.scrollTo({
            top: chatContent.scrollHeight,
            behavior: 'smooth'
        });
    }


    /* =========================
       TYPING INDICATOR
    ========================= */

    function showTyping() {

        let container =
            chatContent.querySelector('.messages-container');

        if (!container) {

            container = document.createElement('div');

            container.className = 'messages-container';

            chatContent.appendChild(container);
        }


        const row = document.createElement('div');

        row.className =
            'message-row assistant-message typing-message';

        row.id = 'typingIndicator';


        const avatar = document.createElement('div');

        avatar.className = 'message-avatar';

        avatar.textContent = '✦';


        const bubble = document.createElement('div');

        bubble.className = 'message-bubble';


        const dots = document.createElement('div');

        dots.className = 'typing-dots';

        dots.innerHTML = `
            <span></span>
            <span></span>
            <span></span>
        `;


        bubble.appendChild(dots);

        row.appendChild(avatar);

        row.appendChild(bubble);

        container.appendChild(row);


        chatContent.scrollTo({
            top: chatContent.scrollHeight,
            behavior: 'smooth'
        });
    }


    /* =========================
       REMOVE TYPING
    ========================= */

    function removeTyping() {

        const typing =
            document.getElementById('typingIndicator');

        if (typing) {
            typing.remove();
        }
    }


    /* =========================
       TEXTAREA AUTO RESIZE
    ========================= */

    textarea.addEventListener('input', function () {

        this.style.height = 'auto';

        this.style.height =
            Math.min(this.scrollHeight, 150) + 'px';
    });


    /* =========================
       ENTER TO SEND
       SHIFT + ENTER = NEW LINE
    ========================= */

    textarea.addEventListener('keydown', function (event) {

        if (
            event.key === 'Enter' &&
            !event.shiftKey
        ) {

            event.preventDefault();

            form.requestSubmit();
        }
    });


    /* =========================
       SEND MESSAGE
    ========================= */

    form.addEventListener('submit', async function (event) {

        event.preventDefault();


        const message = textarea.value.trim();

        if (!message) {
            return;
        }


        /*
         * Show user's message immediately
         */
        addMessage(message, 'user');


        /*
         * Clear input
         */
        textarea.value = '';

        textarea.style.height = 'auto';


        /*
         * Disable send button
         */
        sendButton.disabled = true;

        sendButton.textContent = '...';


        /*
         * Show AI typing
         */
        showTyping();


        /*
         * Prepare request
         */
        const formData = new FormData(form);


        try {

            const response = await fetch(form.action, {

                method: 'POST',

                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },

                body: formData

            });


            const data = await response.json();


            console.log('Chatbot response:', data);


            if (!response.ok || !data.success) {

                throw new Error(
                    data.message ||
                    'Chatbot response failed.'
                );
            }


            /*
             * Remove "thinking..."
             */
            removeTyping();


            /*
             * Show Gemini answer
             */
            addMessage(data.reply, 'assistant');


        } catch (error) {

            console.error('Chat error:', error);


            removeTyping();


            /*
             * Show error inside chat
             * instead of popup
             */
            addMessage(
                'Sorry, I could not process that message. Please try again.',
                'assistant'
            );


        } finally {

            sendButton.disabled = false;

            sendButton.textContent = '↑';

            textarea.focus();
        }

    });

});
</script>

</x-app-layout>