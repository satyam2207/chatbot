<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Admin Dashboard
                </h1>

                <p class="mt-2 text-gray-600">
                    Manage and monitor the College AI chatbot system.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">👨‍🎓</div>
                    <p class="text-gray-500 mt-3">Students</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['students'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">📢</div>
                    <p class="text-gray-500 mt-3">Notices</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['notices'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">🏢</div>
                    <p class="text-gray-500 mt-3">Departments</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['departments'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">👨‍🏫</div>
                    <p class="text-gray-500 mt-3">Faculty</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['faculty'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">📚</div>
                    <p class="text-gray-500 mt-3">Courses</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['courses'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">💬</div>
                    <p class="text-gray-500 mt-3">Chat Sessions</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['chat_sessions'] }}
                    </p>
                </div>

                <div class="bg-white rounded-2xl border p-6 shadow-sm">
                    <div class="text-3xl">📝</div>
                    <p class="text-gray-500 mt-3">Messages</p>
                    <p class="text-3xl font-bold mt-1">
                        {{ $statistics['messages'] }}
                    </p>
                </div>

            </div>

            <div class="grid md:grid-cols-3 gap-5 mt-8">

                <a href="{{ route('admin.notices') }}"
                   class="bg-white border rounded-2xl p-6 hover:shadow-md transition">
                    <div class="text-3xl">📢</div>
                    <h2 class="font-bold text-lg mt-3">
                        Manage Notices
                    </h2>
                    <p class="text-gray-500 mt-1">
                        View and manage college announcements.
                    </p>
                </a>

                <a href="{{ route('admin.departments') }}"
                   class="bg-white border rounded-2xl p-6 hover:shadow-md transition">
                    <div class="text-3xl">🏢</div>
                    <h2 class="font-bold text-lg mt-3">
                        Departments
                    </h2>
                    <p class="text-gray-500 mt-1">
                        View department information.
                    </p>
                </a>

                <a href="{{ route('admin.faculty') }}"
                   class="bg-white border rounded-2xl p-6 hover:shadow-md transition">
                    <div class="text-3xl">👨‍🏫</div>
                    <h2 class="font-bold text-lg mt-3">
                        Faculty
                    </h2>
                    <p class="text-gray-500 mt-1">
                        View faculty information.
                    </p>
                </a>

            </div>

        </div>

    </div>

</x-app-layout>