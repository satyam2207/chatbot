<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Notifications
        </h2>
    </x-slot>

    <div class="p-8 bg-gray-100 min-h-screen">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    Notification Center
                </h1>

                <p class="text-gray-500">
                    Stay updated with the latest activities.
                </p>

            </div>

            <span class="bg-blue-600 text-white px-4 py-2 rounded-full">
                5 New
            </span>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white border-l-4 border-green-500 rounded-xl shadow p-5 hover:shadow-lg transition">
                <h3 class="font-bold">✅ Admission Approved</h3>
                <p class="text-gray-500 mt-2">
                    Your admission request has been approved.
                </p>
                <p class="text-xs text-gray-400 mt-3">
                    2 minutes ago
                </p>
            </div>

            <div class="bg-white border-l-4 border-blue-500 rounded-xl shadow p-5 hover:shadow-lg transition">
                <h3 class="font-bold">📚 New Assignment</h3>
                <p class="text-gray-500 mt-2">
                    Database assignment uploaded.
                </p>
                <p class="text-xs text-gray-400 mt-3">
                    Today
                </p>
            </div>

            <div class="bg-white border-l-4 border-yellow-500 rounded-xl shadow p-5 hover:shadow-lg transition">
                <h3 class="font-bold">📅 Upcoming Exam</h3>
                <p class="text-gray-500 mt-2">
                    Software Testing exam tomorrow.
                </p>
                <p class="text-xs text-gray-400 mt-3">
                    Tomorrow
                </p>
            </div>

            <div class="bg-white border-l-4 border-red-500 rounded-xl shadow p-5 hover:shadow-lg transition">
                <h3 class="font-bold">💰 Fee Reminder</h3>
                <p class="text-gray-500 mt-2">
                    Semester fee submission closes next week.
                </p>
                <p class="text-xs text-gray-400 mt-3">
                    3 days ago
                </p>
            </div>

            <div class="bg-white border-l-4 border-purple-500 rounded-xl shadow p-5 hover:shadow-lg transition">
                <h3 class="font-bold">🎉 Welcome</h3>
                <p class="text-gray-500 mt-2">
                    Welcome to KDP Connect AI Portal.
                </p>
                <p class="text-xs text-gray-400 mt-3">
                    Just now
                </p>
            </div>

            <div class="bg-gray-50 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center">

                <div class="text-center py-12">

                    <div class="text-5xl">
                        🔔
                    </div>

                    <h3 class="font-semibold mt-4">
                        You're all caught up
                    </h3>

                    <p class="text-gray-500">
                        No additional notifications.
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>