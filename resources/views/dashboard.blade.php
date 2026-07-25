<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            KDP Connect Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Section -->

            <div class="bg-gradient-to-r from-blue-700 to-blue-500 rounded-2xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold mb-2">
                    Welcome, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-lg text-blue-100">
                    Access college information, notices, departments and AI assistance from one place.
                </p>

            </div>

            <!-- Dashboard Cards -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="text-5xl mb-4">
                        🎓
                    </div>

                    <h3 class="text-xl font-bold">
                        Departments
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Explore all academic departments.
                    </p>

                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="text-5xl mb-4">
                        📚
                    </div>

                    <h3 class="text-xl font-bold">
                        Courses
                    </h3>

                    <p class="text-gray-500 mt-2">
                        View diploma programmes and subjects.
                    </p>

                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="text-5xl mb-4">
                        📢
                    </div>

                    <h3 class="text-xl font-bold">
                        Notices
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Stay updated with latest announcements.
                    </p>

                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="text-5xl mb-4">
                        🤖
                    </div>

                    <h3 class="text-xl font-bold">
                        KDP Connect AI
                    </h3>

                    <p class="text-gray-500 mt-2">
                        AI assistant coming soon.
                    </p>

                </div>

            </div>

            <!-- Quick Actions -->

            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">

                <h2 class="text-2xl font-bold mb-6">
                    Quick Actions
                </h2>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                  <a href="{{ route('chat') }}"
                 class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-4 font-semibold text-center block">

                  🤖 AI Chat

                  </a>

                    <button class="bg-green-600 hover:bg-green-700 text-white rounded-lg py-4 font-semibold">
                        📢 Notices
                    </button>

                    <button class="bg-purple-600 hover:bg-purple-700 text-white rounded-lg py-4 font-semibold">
                        🎓 Departments
                    </button>

                    <button class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg py-4 font-semibold">
                        👤 Profile
                    </button>

                </div>

            </div>

            <!-- Notices & Student Info -->

            <div class="grid md:grid-cols-2 gap-8">

                <!-- Latest Notices -->

                <div class="bg-white rounded-xl shadow-lg p-8">

                    <h2 class="text-2xl font-bold mb-5">
                        Latest Notices
                    </h2>

                    <ul class="space-y-4 text-gray-700">

                        <li>📢 Mid Semester Examination begins from 12 August.</li>

                        <li>🎉 Freshers Orientation Programme on 5 August.</li>

                        <li>📄 Scholarship application forms are available.</li>

                        <li>🏆 Sports Week registrations are now open.</li>

                    </ul>

                </div>

                <!-- Student Information -->

                <div class="bg-white rounded-xl shadow-lg p-8">

                    <h2 class="text-2xl font-bold mb-5">
                        Student Information
                    </h2>

                    <div class="space-y-4 text-gray-700">

                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>

                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

                        <p><strong>Department:</strong> Computer Engineering</p>

                        <p><strong>Semester:</strong> 5</p>

                        <p><strong>Institute:</strong> K.D. Polytechnic, Patan</p>

                    </div>

                </div>

            </div>

            <!-- Academic Calendar -->

            <div class="bg-white rounded-xl shadow-lg p-8 mt-8">

                <h2 class="text-2xl font-bold mb-5">
                    Academic Calendar
                </h2>

                <div class="grid md:grid-cols-3 gap-6">

                    <div class="border rounded-lg p-5">

                        <h3 class="font-bold text-blue-700">
                            📅 August
                        </h3>

                        <p class="mt-2 text-gray-600">
                            Mid Semester Examination
                        </p>

                    </div>

                    <div class="border rounded-lg p-5">

                        <h3 class="font-bold text-green-700">
                            🎓 September
                        </h3>

                        <p class="mt-2 text-gray-600">
                            Technical Workshops
                        </p>

                    </div>

                    <div class="border rounded-lg p-5">

                        <h3 class="font-bold text-red-700">
                            🏆 October
                        </h3>

                        <p class="mt-2 text-gray-600">
                            Annual Sports Week
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>