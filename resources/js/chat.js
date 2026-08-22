const chatForm = document.querySelector('[data-chat-form]');

if (chatForm) {
    const input = chatForm.querySelector('[data-chat-input]');
    const sendButton = chatForm.querySelector('[data-chat-send]');
    const messagesContainer = document.querySelector('[data-chat-messages]');
    const errorMessage = document.querySelector('[data-chat-error]');
    const suggestedQuestions = document.querySelectorAll('[data-suggested-question]');

    const scrollToLatest = () => {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    };

    const addMessage = (sender, message) => {
        const wrapper = document.createElement('div');
        wrapper.className = sender === 'user' ? 'flex justify-end' : 'flex';

        const bubble = document.createElement('div');
        bubble.className = sender === 'user'
            ? 'max-w-lg rounded-2xl bg-blue-600 px-5 py-4 whitespace-pre-wrap text-white'
            : 'max-w-lg rounded-2xl bg-gray-200 px-5 py-4 whitespace-pre-wrap text-gray-800';
        bubble.textContent = message;

        wrapper.appendChild(bubble);
        messagesContainer.appendChild(wrapper);
        scrollToLatest();
    };

    const showError = (message) => {
        errorMessage.textContent = message;
        errorMessage.classList.remove('hidden');
    };

    const clearError = () => {
        errorMessage.textContent = '';
        errorMessage.classList.add('hidden');
    };

    const setSending = (isSending) => {
        input.disabled = isSending;
        sendButton.disabled = isSending;
        sendButton.textContent = isSending ? 'Sending...' : 'Send';
    };

    chatForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        const message = input.value.trim();
        if (!message || sendButton.disabled) return;

        clearError();
        addMessage('user', message);
        input.value = '';
        setSending(true);

        try {
            const response = await fetch(chatForm.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ message, chat_session_id: chatForm.dataset.chatSessionId }),
            });
            const data = await response.json().catch(() => ({}));

            if (!response.ok || !data.success || typeof data.reply !== 'string') {
                throw new Error('Unable to get a response.');
            }

            addMessage('assistant', data.reply);
        } catch (error) {
            showError('Sorry, I could not send that message. Please try again.');
        } finally {
            setSending(false);
            input.focus();
        }
    });

    suggestedQuestions.forEach((button) => {
        button.addEventListener('click', () => {
            input.value = button.dataset.suggestedQuestion;
            input.focus();
        });
    });

    scrollToLatest();
}
