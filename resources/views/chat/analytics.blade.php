<x-app-layout>
    <div class="min-h-screen bg-gray-50">

        <div class="max-w-6xl mx-auto px-6 py-8">

            {{-- Header --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Chat Analytics
                </h1>

                <p class="mt-2 text-gray-600">
                    Overview of your College AI chatbot activity.
                </p>
            </div>

            {{-- Statistics --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">💬</div>
                    <p class="text-sm text-gray-500">Total Chats</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $totalChats }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">📝</div>
                    <p class="text-sm text-gray-500">Total Messages</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $totalMessages }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">👤</div>
                    <p class="text-sm text-gray-500">Your Messages</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $userMessages }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">🤖</div>
                    <p class="text-sm text-gray-500">AI Responses</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $assistantMessages }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">📌</div>
                    <p class="text-sm text-gray-500">Pinned Chats</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $pinnedChats }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-200">
                    <div class="text-3xl mb-3">📦</div>
                    <p class="text-sm text-gray-500">Archived Chats</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ $archivedChats }}
                    </p>
                </div>

            </div>

            {{-- Message Breakdown --}}
            <div class="mt-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-200">

                <h2 class="text-xl font-semibold text-gray-900 mb-5">
                    Conversation Overview
                </h2>

                @if ($totalMessages > 0)

                    @php
                        $userPercentage = round(($userMessages / $totalMessages) * 100);
                        $assistantPercentage = round(($assistantMessages / $totalMessages) * 100);
                    @endphp

                    <div class="space-y-5">

                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">
                                    Your Messages
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ $userPercentage }}%
                                </span>
                            </div>

                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div
                                    class="h-full bg-gray-900 rounded-full"
                                    style="width: {{ $userPercentage }}%">
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">
                                    AI Responses
                                </span>

                                <span class="text-sm text-gray-500">
                                    {{ $assistantPercentage }}%
                                </span>
                            </div>

                            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                                <div
                                    class="h-full bg-gray-500 rounded-full"
                                    style="width: {{ $assistantPercentage }}%">
                                </div>
                            </div>
                        </div>

                    </div>

                @else

                    <div class="text-center py-10">
                        <div class="text-4xl mb-3">📊</div>

                        <p class="font-medium text-gray-700">
                            No chat activity yet
                        </p>

                        <p class="text-sm text-gray-500 mt-1">
                            Start a conversation to see analytics here.
                        </p>
                    </div>

                @endif

            </div>

            {{-- Quick Summary --}}
            <div class="mt-6 bg-gray-900 text-white rounded-2xl p-6">

                <h2 class="text-lg font-semibold">
                    Chatbot Usage Summary
                </h2>

                <p class="mt-2 text-gray-300 text-sm">
                    You have started {{ $totalChats }}
                    {{ $totalChats === 1 ? 'conversation' : 'conversations' }}
                    containing {{ $totalMessages }}
                    {{ $totalMessages === 1 ? 'message' : 'messages' }}.
                </p>

            </div>

        </div>
    </div>
</x-app-layout>