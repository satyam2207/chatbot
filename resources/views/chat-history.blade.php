<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Chat Sessions
        </h2>
    </x-slot>

    <div class="flex h-[88vh] bg-gray-100">

        <!-- Sidebar -->
        <div class="w-80 bg-white border-r shadow-lg flex flex-col">

            <!-- New Chat -->
            <div class="p-5 border-b">
                <a href="{{ route('chat') }}"
                   class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                    + New Chat
                </a>

                <p class="text-sm text-gray-500 mt-3 text-center">
                    Total Conversations : <strong>3</strong>
                </p>
            </div>

            <!-- Search -->
            <div class="p-4 border-b">
                <input
                    type="text"
                    placeholder="Search conversations..."
                    class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Conversation List -->
            <div class="overflow-y-auto flex-1">

                <!-- Active Chat -->
                <div class="flex justify-between items-center p-4 bg-blue-50 border-l-4 border-blue-600">

                    <div>
                        <h3 class="font-semibold">
                            Admission Inquiry
                        </h3>

                        <p class="text-sm text-gray-500">
                            Last message • 2 mins ago
                        </p>
                    </div>

                    <button
                        class="text-red-600 hover:text-red-800 text-sm font-semibold">
                        Delete
                    </button>

                </div>

                <!-- Chat -->
                <div class="flex justify-between items-center p-4 hover:bg-gray-50">

                    <div>
                        <h3 class="font-semibold">
                            Fees Structure
                        </h3>

                        <p class="text-sm text-gray-500">
                            Yesterday
                        </p>
                    </div>

                    <button
                        class="text-red-600 hover:text-red-800 text-sm font-semibold">
                        Delete
                    </button>

                </div>

                <!-- Chat -->
                <div class="flex justify-between items-center p-4 hover:bg-gray-50">

                    <div>
                        <h3 class="font-semibold">
                            GTU Results
                        </h3>

                        <p class="text-sm text-gray-500">
                            Last Week
                        </p>
                    </div>

                    <button
                        class="text-red-600 hover:text-red-800 text-sm font-semibold">
                        Delete
                    </button>

                </div>

            </div>

        </div>

        <!-- Right Side -->
        <div class="flex-1 flex items-center justify-center bg-gray-50">

            <div class="text-center">

                <div class="text-6xl mb-5">
                    🤖
                </div>

                <h1 class="text-4xl font-bold text-gray-700">
                    KDP Connect AI
                </h1>

                <p class="mt-4 text-gray-500">
                    Select an existing conversation or click
                    <strong>New Chat</strong> to begin chatting with the AI.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>