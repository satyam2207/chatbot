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
<!-- Resource Search & Filter -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Find a Resource
            </h2>

            <p class="text-gray-500 mt-1">
                Search or filter resources by subject.
            </p>
        </div>

        <div class="w-full md:w-80">
            <input
                id="resourceSearch"
                type="text"
                placeholder="Search resources..."
                class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500"
            >
        </div>

    </div>

    <div class="flex flex-wrap gap-3 mt-6">

        <button
            type="button"
            class="resource-filter px-4 py-2 rounded-lg bg-gray-900 text-white"
            data-category="all">
            All
        </button>

        <button
            type="button"
            class="resource-filter px-4 py-2 rounded-lg bg-gray-100 text-gray-700"
            data-category="programming">
            Programming
        </button>

        <button
            type="button"
            class="resource-filter px-4 py-2 rounded-lg bg-gray-100 text-gray-700"
            data-category="database">
            Database
        </button>

        <button
            type="button"
            class="resource-filter px-4 py-2 rounded-lg bg-gray-100 text-gray-700"
            data-category="networking">
            Networking
        </button>

    </div>

    <div
        id="resourceResults"
        class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 mt-7"
    >

        <div
            class="resource-item border rounded-xl p-5"
            data-category="programming"
            data-name="C C++ Java Python PHP Programming"
        >
            <div class="text-3xl">💻</div>

            <h3 class="font-bold text-lg mt-3">
                Programming
            </h3>

            <p class="text-gray-500 mt-2">
                C, C++, Java, Python and PHP learning resources.
            </p>
        </div>

        <div
            class="resource-item border rounded-xl p-5"
            data-category="database"
            data-name="SQL MySQL MongoDB DBMS Database"
        >
            <div class="text-3xl">🗄️</div>

            <h3 class="font-bold text-lg mt-3">
                Database
            </h3>

            <p class="text-gray-500 mt-2">
                SQL, MySQL, MongoDB and DBMS resources.
            </p>
        </div>

        <div
            class="resource-item border rounded-xl p-5"
            data-category="networking"
            data-name="Computer Networks Networking"
        >
            <div class="text-3xl">🌐</div>

            <h3 class="font-bold text-lg mt-3">
                Networking
            </h3>

            <p class="text-gray-500 mt-2">
                Computer Networks notes and practical resources.
            </p>
        </div>

    </div>

    <div
        id="noResourceResults"
        class="hidden text-center py-8 text-gray-500"
    >
        No matching resources found.
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('resourceSearch');
    const filterButtons = document.querySelectorAll('.resource-filter');
    const resources = document.querySelectorAll('.resource-item');
    const emptyMessage = document.getElementById('noResourceResults');

    let activeCategory = 'all';

    function filterResources() {

        const searchText = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        resources.forEach(function (resource) {

            const category = resource.dataset.category;
            const name = resource.dataset.name.toLowerCase();

            const categoryMatch =
                activeCategory === 'all' ||
                category === activeCategory;

            const searchMatch =
                name.includes(searchText);

            if (categoryMatch && searchMatch) {
                resource.classList.remove('hidden');
                visibleCount++;
            } else {
                resource.classList.add('hidden');
            }

        });

        if (visibleCount === 0) {
            emptyMessage.classList.remove('hidden');
        } else {
            emptyMessage.classList.add('hidden');
        }
    }

    filterButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            activeCategory = button.dataset.category;

            filterButtons.forEach(function (item) {
                item.classList.remove(
                    'bg-gray-900',
                    'text-white'
                );

                item.classList.add(
                    'bg-gray-100',
                    'text-gray-700'
                );
            });

            button.classList.remove(
                'bg-gray-100',
                'text-gray-700'
            );

            button.classList.add(
                'bg-gray-900',
                'text-white'
            );

            filterResources();
        });

    });

    searchInput.addEventListener(
        'input',
        filterResources
    );

});
</script>
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