<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">KDP Connect AI Chat</h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto">
            <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-t-2xl p-6 shadow">
                <h1 class="text-3xl font-bold">🤖 KDP Connect AI</h1>
                <p class="text-blue-100 mt-2">Ask anything about K.D. Polytechnic, courses, admissions and college information.</p>
            </div>

            <div data-chat-messages class="bg-white h-[500px] overflow-y-auto p-6 space-y-6 shadow" aria-live="polite">
                @forelse ($messages as $message)
                    <div @class(['flex', 'justify-end' => $message->sender === 'user'])>
                        <div @class([
                            'max-w-lg rounded-2xl px-5 py-4 whitespace-pre-wrap',
                            'bg-blue-600 text-white' => $message->sender === 'user',
                            'bg-gray-200 text-gray-800' => $message->sender === 'assistant',
                        ])>{{ $message->message }}</div>
                    </div>
                @empty
                    <div class="flex">
                        <div class="max-w-lg rounded-2xl bg-blue-100 px-5 py-4 text-gray-800">
                            👋 Hello {{ Auth::user()->name }}! I'm KDP Connect AI. Ask me anything related to the college.
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="bg-white px-6 py-4 border-t">
                <h3 class="font-semibold mb-3">Suggested Questions</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach (['Admission Process', 'Courses Offered', 'Fees Structure', 'College Timing'] as $question)
                        <button type="button" data-suggested-question="{{ $question }}" class="bg-gray-100 hover:bg-blue-100 px-4 py-2 rounded-full">
                            {{ $question }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-b-2xl shadow p-5">
                <p data-chat-error class="hidden mb-4 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700" role="alert"></p>
                <form data-chat-form data-chat-session-id="{{ $session->id }}" action="{{ route('chat.send') }}" method="POST" class="flex gap-4">
                    @csrf
                    <input data-chat-input type="text" name="message" placeholder="Type your message..." autocomplete="off" required maxlength="5000"
                        class="flex-1 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button data-chat-send type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-8 rounded-lg disabled:cursor-not-allowed disabled:opacity-70">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
