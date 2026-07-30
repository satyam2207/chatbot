<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Student Resources
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-green-700 to-emerald-500 rounded-xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold">
                    Student Resources
                </h1>

                <p class="mt-3 text-green-100">
                    Everything you need for your academic journey in one place.
                </p>

            </div>

            <!-- Resource Cards -->

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-5xl">📚</div>
                    <h3 class="font-bold mt-4">E-Books</h3>
                    <p class="text-gray-500 mt-2">
                        Digital study materials.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-5xl">📄</div>
                    <h3 class="font-bold mt-4">Syllabus</h3>
                    <p class="text-gray-500 mt-2">
                        Latest GTU syllabus.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-5xl">📝</div>
                    <h3 class="font-bold mt-4">Previous Papers</h3>
                    <p class="text-gray-500 mt-2">
                        Download question papers.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="text-5xl">🎥</div>
                    <h3 class="font-bold mt-4">Video Tutorials</h3>
                    <p class="text-gray-500 mt-2">
                        Learn through videos.
                    </p>
                </div>

            </div>

            <!-- Useful Links -->

            <div class="bg-white rounded-xl shadow-lg p-8 mt-8">

                <h2 class="text-2xl font-bold mb-6">
                    Useful Academic Links
                </h2>

                <div class="grid md:grid-cols-2 gap-5">

                    <div class="border rounded-lg p-5">GTU Official Website</div>
                    <div class="border rounded-lg p-5">Academic Calendar</div>
                    <div class="border rounded-lg p-5">Exam Timetable</div>
                    <div class="border rounded-lg p-5">Result Portal</div>
                    <div class="border rounded-lg p-5">Scholarship Information</div>
                    <div class="border rounded-lg p-5">Placement Cell</div>

                </div>

            </div>

            <!-- Downloads -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Downloads
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="border rounded-lg p-5 text-center">
            📘
            <h3 class="font-semibold mt-3">Student Handbook</h3>
            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">
                Download
            </button>
        </div>

        <div class="border rounded-lg p-5 text-center">
            📄
            <h3 class="font-semibold mt-3">Lab Manual</h3>
            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">
                Download
            </button>
        </div>

        <div class="border rounded-lg p-5 text-center">
            📑
            <h3 class="font-semibold mt-3">Academic Calendar</h3>
            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">
                Download
            </button>
        </div>

        <div class="border rounded-lg p-5 text-center">
            📝
            <h3 class="font-semibold mt-3">Exam Forms</h3>
            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">
                Download
            </button>
        </div>

    </div>

</div>

<!-- Resource Categories -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Resource Categories
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-green-50 rounded-lg p-5">
            <h3 class="font-bold">Programming</h3>
            <p class="text-gray-600 mt-2">
                C, C++, Java, Python and PHP study material.
            </p>
        </div>

        <div class="bg-green-50 rounded-lg p-5">
            <h3 class="font-bold">Database</h3>
            <p class="text-gray-600 mt-2">
                SQL, MySQL, MongoDB and DBMS resources.
            </p>
        </div>

        <div class="bg-green-50 rounded-lg p-5">
            <h3 class="font-bold">Networking</h3>
            <p class="text-gray-600 mt-2">
                Computer Networks notes and practicals.
            </p>
        </div>

    </div>

</div>

<!-- Learning Tips -->

<div class="bg-gradient-to-r from-green-700 to-emerald-600 rounded-xl shadow-lg text-white p-8 mt-8">

    <h2 class="text-3xl font-bold">
        Study Tips
    </h2>

    <ul class="mt-5 space-y-3 list-disc list-inside text-green-100">

        <li>Review class notes daily.</li>
        <li>Practice coding every day.</li>
        <li>Solve previous GTU papers.</li>
        <li>Use AI Chat for concept clarification.</li>
        <li>Prepare short revision notes before exams.</li>

    </ul>

</div>

        </div>

    </div>

</x-app-layout>