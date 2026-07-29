<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Notifications
        </h2>
    </x-slot>

    <div class="p-8 bg-gray-100 min-h-screen">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

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


        <div class="flex flex-wrap gap-3 mb-6">

    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">
        All
    </button>

    <button class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">
        Academic
    </button>

    <button class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">
        AI Chat
    </button>

    <button class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">
        Fees
    </button>

    <button class="px-4 py-2 bg-white border rounded-lg hover:bg-gray-100">
        Events
    </button>

</div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

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

    <!-- Recent Activity -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Recent Activity
    </h2>

    <div class="space-y-4">

        <div class="flex justify-between border-b pb-3">
            <span>🤖 AI Chat Session Started</span>
            <span class="text-gray-500 text-sm">Today</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>📢 New Notice Published</span>
            <span class="text-gray-500 text-sm">Yesterday</span>
        </div>

        <div class="flex justify-between border-b pb-3">
            <span>📚 Assignment Uploaded</span>
            <span class="text-gray-500 text-sm">2 Days Ago</span>
        </div>

        <div class="flex justify-between">
            <span>🎓 Semester Registration Completed</span>
            <span class="text-gray-500 text-sm">Last Week</span>
        </div>

    </div>

</div>


<!-- Notification Preferences -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Notification Preferences
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="flex justify-between items-center border rounded-lg p-4">

            <div>

                <h3 class="font-semibold">
                    Email Notifications
                </h3>

                <p class="text-gray-500 text-sm">
                    Receive important updates by email.
                </p>

            </div>

            <input type="checkbox" checked class="w-5 h-5">

        </div>

        <div class="flex justify-between items-center border rounded-lg p-4">

            <div>

                <h3 class="font-semibold">
                    AI Chat Alerts
                </h3>

                <p class="text-gray-500 text-sm">
                    Get notified about AI responses.
                </p>

            </div>

            <input type="checkbox" checked class="w-5 h-5">

        </div>

    </div>

</div>

</x-app-layout>