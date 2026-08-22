<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Chat Sessions</h2>
    </x-slot>

    <div class="flex flex-col md:flex-row h-auto md:h-[88vh] bg-gray-100">
        <div class="w-full md:w-80 bg-white border-r shadow-lg flex flex-col">
            <div class="p-5 border-b bg-white">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Recent Chats</h2>
                        <p class="text-sm text-gray-500">View previous conversations</p>
                    </div>
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                        {{ $sessions->count() }} {{ Str::plural('Chat', $sessions->count()) }}
                    </span>
                </div>

                <a href="{{ route('chat', ['new' => 1]) }}" class="mt-4 block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">
                    + New Chat
                </a>
            </div>

            <div class="overflow-y-auto flex-1 p-3 space-y-3">
                @forelse ($sessions as $session)
                    <a href="{{ route('chat', ['session' => $session->id]) }}" class="block bg-white rounded-lg p-4 shadow hover:bg-blue-50 transition">
                        <div class="flex justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="font-semibold text-gray-800 truncate">{{ $session->title }}</h3>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $session->latestMessage?->message ?? 'No messages yet' }}
                                </p>
                            </div>
                            <span class="shrink-0 text-xs text-gray-500">
                                {{ optional($session->last_message_at ?? $session->updated_at)->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8 text-gray-400">
                        <div class="text-4xl">💬</div>
                        <p class="mt-2">No conversations yet</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="hidden md:flex flex-1 items-center justify-center bg-gray-50">
            <div class="text-center">
                <div class="text-6xl mb-5">🤖</div>
                <h1 class="text-4xl font-bold text-gray-700">KDP Connect AI</h1>
                <p class="mt-4 text-gray-500">Select an existing conversation or click <strong>New Chat</strong> to begin chatting with the AI.</p>
            </div>
        </div>
    </div>
</x-app-layout>
