<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Chat Sessions
        </h2>
    </x-slot>

    <div class="flex h-[88vh] bg-gray-100">

        <!-- Sidebar -->
        <div class="w-80 bg-white border-r shadow-lg flex flex-col">

            <!-- Header -->
            <div class="p-5 border-b bg-white">

                <div class="flex justify-between items-center">

                    <div>
                        <h2 class="text-xl font-bold text-gray-800">
                            Recent Chats
                        </h2>

                        <p class="text-sm text-gray-500">
                            View previous conversations
                        </p>
                    </div>

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">
                        5 Chats
                    </span>

                </div>

                <a href="{{ route('chat') }}"
                    class="mt-4 block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">
                    + New Chat
                </a>

            </div>

            <!-- Search -->
            <div class="p-4 border-b bg-gray-50">

                <input
                    type="text"
                    placeholder="Search conversations..."
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

            </div>

            <!-- Conversation List -->
            <div class="overflow-y-auto flex-1 p-3 space-y-3">

                <!-- Card 1 -->
                <div class="bg-blue-100 border-l-4 border-blue-600 rounded-lg p-4 shadow-sm hover:bg-blue-200 transition duration-200 cursor-pointer">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-semibold text-gray-800">
                                Admission Inquiry
                            </h3>

                            <p class="text-sm text-gray-500">
                                Asked about admission process...
                            </p>

                        </div>

                        <span class="text-xs text-gray-500">
                            2 min
                        </span>

                    </div>

                    <div class="mt-3 flex justify-between">

                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full">
                            Recent
                        </span>

                        <button class="text-red-600 hover:text-red-800 text-sm">
                            Delete
                        </button>

                    </div>

                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg p-4 shadow hover:bg-gray-50 transition cursor-pointer">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-semibold">
                                Fees Structure
                            </h3>

                            <p class="text-sm text-gray-500">
                                Tuition fees information...
                            </p>

                        </div>

                        <span class="text-xs text-gray-500">
                            Yesterday
                        </span>

                    </div>

                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg p-4 shadow hover:bg-gray-50 transition cursor-pointer">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-semibold">
                                GTU Results
                            </h3>

                            <p class="text-sm text-gray-500">
                                Semester result discussion...
                            </p>

                        </div>

                        <span class="text-xs text-gray-500">
                            Last Week
                        </span>

                    </div>

                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-lg p-4 shadow hover:bg-gray-50 transition cursor-pointer">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-semibold">
                                Scholarship
                            </h3>

                            <p class="text-sm text-gray-500">
                                Government scholarship details...
                            </p>

                        </div>

                        <span class="text-xs text-gray-500">
                            New
                        </span>

                    </div>

                </div>

                <!-- Card 5 -->
                <div class="bg-white rounded-lg p-4 shadow hover:bg-gray-50 transition cursor-pointer">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-semibold">
                                Hostel Inquiry
                            </h3>

                            <p class="text-sm text-gray-500">
                                Hostel facilities and rooms...
                            </p>

                        </div>

                        <span class="text-xs text-gray-500">
                            3 days
                        </span>

                    </div>

                </div>

                <!-- Empty State -->
                <div class="text-center py-8 text-gray-400">

                    <div class="text-4xl">
                        💬
                    </div>

                    <p class="mt-2">
                        No more conversations
                    </p>

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
                    <strong>New Chat</strong>
                    to begin chatting with the AI.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>