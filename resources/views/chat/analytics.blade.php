<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Chat Analytics
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-6">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Chat Activity Overview
                </h1>
                <p class="text-gray-500 mt-2">
                    Overview of your chatbot usage and conversation activity.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">Total Chats</p>
                    <h3 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $totalChats }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">Total Messages</p>
                    <h3 class="text-4xl font-bold text-purple-600 mt-2">
                        {{ $totalMessages }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">Your Messages</p>
                    <h3 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $userMessages }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">AI Responses</p>
                    <h3 class="text-4xl font-bold text-indigo-600 mt-2">
                        {{ $assistantMessages }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">Pinned Chats</p>
                    <h3 class="text-4xl font-bold text-orange-500 mt-2">
                        {{ $pinnedChats }}
                    </h3>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <p class="text-gray-500">Archived Chats</p>
                    <h3 class="text-4xl font-bold text-gray-600 mt-2">
                        {{ $archivedChats }}
                    </h3>
                </div>

            </div>

            <div class="mt-8 bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    Conversation Statistics
                </h2>

                <div class="space-y-4">

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Messages sent by student</span>
                        <strong>{{ $userMessages }}</strong>
                    </div>

                    <div class="flex justify-between border-b pb-3">
                        <span class="text-gray-600">Responses generated</span>
                        <strong>{{ $assistantMessages }}</strong>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Total conversations</span>
                        <strong>{{ $totalChats }}</strong>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="mt-8 bg-gradient-to-r from-indigo-600 to-blue-600 rounded-2xl shadow-lg p-8 text-white">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        <div>
            <h2 class="text-2xl font-bold">
                AI Usage Overview
            </h2>

            <p class="mt-2 text-indigo-100">
                Your interaction with KDP Connect AI at a glance.
            </p>
        </div>

        <div class="text-center bg-white/10 rounded-xl px-8 py-5">
            <div class="text-4xl font-bold">
                {{ $totalMessages }}
            </div>

            <div class="text-sm text-indigo-100 mt-1">
                Total interactions
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

        <div class="bg-white/10 rounded-xl p-5">
            <p class="text-indigo-100 text-sm">
                Student Questions
            </p>

            <p class="text-2xl font-bold mt-1">
                {{ $userMessages }}
            </p>
        </div>

        <div class="bg-white/10 rounded-xl p-5">
            <p class="text-indigo-100 text-sm">
                AI Responses
            </p>

            <p class="text-2xl font-bold mt-1">
                {{ $assistantMessages }}
            </p>
        </div>

        <div class="bg-white/10 rounded-xl p-5">
            <p class="text-indigo-100 text-sm">
                Conversations
            </p>

            <p class="text-2xl font-bold mt-1">
                {{ $totalChats }}
            </p>
        </div>

    </div>

</div>

</x-app-layout>