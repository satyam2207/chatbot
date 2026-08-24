const chatForm = document.querySelector('[data-chat-form]');

if (chatForm) {
    const input = chatForm.querySelector('[data-chat-input]');
    const sendButton = chatForm.querySelector('[data-chat-send]');
    const messagesContainer = document.querySelector('[data-chat-messages]');
    const suggestedQuestions = document.querySelectorAll('[data-suggested-question]');

    if (!input || !sendButton || !messagesContainer) {
        console.error('Chat UI elements are missing.');
    } else {

        const scrollToLatest = () => {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        };

        const addMessage = (message, sender) => {
            const wrapper = document.createElement('div');

            wrapper.className =
                sender === 'user'
                    ? 'message-row user-message'
                    : 'message-row assistant-message';

            const bubble = document.createElement('div');
            bubble.className = 'message-bubble';

            if (sender === 'user') {
                bubble.textContent = message;
            } else {
                const escapeHtml = (value) => {
                    const div = document.createElement('div');
                    div.textContent = value;
                    return div.innerHTML;
                };

                let html = escapeHtml(message);

                // Code blocks
                html = html.replace(
                    /```(?:\w+)?\n?([\s\S]*?)```/g,
                    '<pre class="ai-code-block"><code>$1</code></pre>'
                );

                // Headings
                html = html.replace(
                    /^### (.+)$/gm,
                    '<h4 class="ai-heading">$1</h4>'
                );

                html = html.replace(
                    /^## (.+)$/gm,
                    '<h3 class="ai-heading">$1</h3>'
                );

                html = html.replace(
                    /^# (.+)$/gm,
                    '<h2 class="ai-heading">$1</h2>'
                );

                // Bold
                html = html.replace(
                    /\*\*(.+?)\*\*/g,
                    '<strong>$1</strong>'
                );

                // Italic
                html = html.replace(
                    /(?<!\*)\*([^*\n]+)\*(?!\*)/g,
                    '<em>$1</em>'
                );

                // Inline code
                html = html.replace(
                    /`([^`\n]+)`/g,
                    '<code class="ai-inline-code">$1</code>'
                );

                // Bullet lists
                html = html.replace(
                    /(?:^|\n)((?:[-•] .+(?:\n|$))+)/g,
                    function(match, list) {
                        const items = list
                            .trim()
                            .split('\n')
                            .map(function(line) {
                                return '<li>' +
                                    line.replace(/^[-•] /, '') +
                                    '</li>';
                            })
                            .join('');

                        return '<ul class="ai-list">' + items + '</ul>';
                    }
                );

                // Tables
                html = html.replace(
                    /((?:^\|.*\|$\n?)+)/gm,
                    function(block) {
                        const rows = block
                            .trim()
                            .split('\n')
                            .filter(row => !/^\|?\s*:?-+:?\s*(\|\s*:?-+:?\s*)+\|?$/.test(row));

                        if (!rows.length) return block;

                        let table = '<table class="ai-table">';

                        rows.forEach((row, index) => {
                            const cells = row
                                .replace(/^\||\|$/g, '')
                                .split('|')
                                .map(cell => cell.trim());

                            const tag = index === 0 ? 'th' : 'td';

                            table += '<tr>';

                            cells.forEach(cell => {
                                table += '<' + tag + '>' + cell + '</' + tag + '>';
                            });

                            table += '</tr>';
                        });

                        table += '</table>';

                        return table;
                    }
                );

                // Line breaks
                html = html.replace(/\n{2,}/g, '<br><br>');
                html = html.replace(/\n/g, '<br>');

                bubble.innerHTML = html;
            }

            wrapper.appendChild(bubble);
            messagesContainer.appendChild(wrapper);

            scrollToLatest();
        };

        const setSending = (sending) => {
            input.disabled = sending;
            sendButton.disabled = sending;

            if (sending) {
                sendButton.innerHTML = '<span class="send-spinner" aria-hidden="true"></span>';
                sendButton.setAttribute('aria-label', 'Sending');
            } else {
                sendButton.textContent = '↑';
                sendButton.setAttribute('aria-label', 'Send message');
            }
        };

        const sendMessage = async () => {
            const message = input.value.trim();

            if (!message || sendButton.disabled) {
                return;
            }

            input.value = '';
            input.style.height = 'auto';

            addMessage(message, 'user');
            setSending(true);

            try {
                const csrf = document.querySelector('meta[name="csrf-token"]');

                const response = await fetch(chatForm.action, {
                    method: 'POST',

                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrf ? csrf.content : ''
                    },

                    body: JSON.stringify({
                        message: message,
                        chat_session_id: chatForm.dataset.chatSessionId
                    })
                });

                const data = await response.json().catch(() => ({}));

                console.log('CHAT STATUS:', response.status);
                console.log('CHAT RESPONSE:', data);

                if (!response.ok || !data.success || typeof data.reply !== 'string') {
                    throw new Error(
                        data.message ||
                        data.error ||
                        'Unable to get a response.'
                    );
                }

                addMessage(data.reply, 'assistant');

            } catch (error) {
                console.error('Chat error:', error);

                addMessage(
                    'Sorry, I could not process that message. Please try again.',
                    'assistant'
                );

            } finally {
                setSending(false);
                input.focus();
            }
        };

        chatForm.addEventListener('submit', (event) => {
            event.preventDefault();
            event.stopPropagation();

            sendMessage();
        });

        input.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();

                if (!sendButton.disabled) {
                    sendMessage();
                }
            }
        });

        suggestedQuestions.forEach((button) => {
            button.addEventListener('click', () => {
                input.value = button.dataset.suggestedQuestion || '';
                input.focus();
            });
        });

        scrollToLatest();

        console.log('CHAT JS LOADED');
    }
}
