<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Chat Sessions
        </h2>
    </x-slot>

    <div class="flex h-[88vh] bg-gray-100">

        <!-- Sidebar -->

        <div class="w-80 bg-white border-r shadow-lg">

            <div class="p-5 border-b">

                <a href="{{ route('chat') }}"
                   class="block text-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">

                    + New Chat

                </a>

            </div>

            <div class="overflow-y-auto">

                <div class="p-4 bg-blue-50 border-l-4 border-blue-600 cursor-pointer">
                    <h3 class="font-semibold">
                        Admission Inquiry
                    </h3>

                    <p class="text-sm text-gray-500">
                        Last message 2 mins ago
                    </p>
                </div>

                <div class="p-4 hover:bg-gray-50 cursor-pointer">
                    <h3 class="font-semibold">
                        Fees Structure
                    </h3>

                    <p class="text-sm text-gray-500">
                        Yesterday
                    </p>
                </div>

                <div class="p-4 hover:bg-gray-50 cursor-pointer">
                    <h3 class="font-semibold">
                        GTU Results
                    </h3>

                    <p class="text-sm text-gray-500">
                        Last Week
                    </p>
                </div>

            </div>

        </div>

        <!-- Right -->

        <div class="flex-1 flex items-center justify-center">

            <div class="text-center">

                <h1 class="text-4xl font-bold text-gray-700">

                    KDP Connect

                </h1>

                <p class="mt-4 text-gray-500">

                    Select a conversation or start a new chat.

                </p>

            </div>

        </div>

    </div>

</x-app-layout>