<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Departments
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-purple-700 to-indigo-600 rounded-xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold">
                    Academic Departments
                </h1>

                <p class="mt-3 text-purple-100">
                    Explore the departments available at K.D. Polytechnic, Patan.
                </p>

            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($departments as $department)

    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

        <div class="text-5xl">
            💻
        </div>

        <h3 class="text-xl font-bold mt-4">
            {{ $department->name }}
        </h3>

        <p class="text-xs font-semibold text-indigo-600 mt-1">
            {{ $department->code }}
        </p>

        <p class="text-gray-500 mt-3">
            {{ $department->description ?? 'Department information available through KDP Connect.' }}
        </p>

        <div class="mt-5 pt-4 border-t flex justify-between">

            <span class="text-gray-500 text-sm">
                Faculty
            </span>

            <span class="font-bold text-indigo-600">
                {{ $department->faculties_count }}
            </span>

        </div>

    </div>

@empty

    <div class="col-span-full bg-white rounded-xl p-8 text-center text-gray-500">
        No departments available.
    </div>

@endforelse

            </div>

            <div class="bg-white rounded-xl shadow-lg p-8 mt-8">

                <h2 class="text-2xl font-bold mb-6">
                    Department Facilities
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div class="border rounded-lg p-5">
                        ✔ Modern Computer Laboratories
                    </div>

                    <div class="border rounded-lg p-5">
                        ✔ High Speed Internet
                    </div>

                    <div class="border rounded-lg p-5">
                        ✔ Smart Classrooms
                    </div>

                    <div class="border rounded-lg p-5">
                        ✔ Project Development Labs
                    </div>

                </div>

            </div>


            <!-- Department Statistics -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Department Statistics
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        <div class="text-center">
            <h3 class="text-4xl font-bold text-blue-600">6</h3>
            <p class="text-gray-500 mt-2">Departments</p>
        </div>

        <div class="text-center">
            <h3 class="text-4xl font-bold text-green-600">60+</h3>
            <p class="text-gray-500 mt-2">Faculty Members</p>
        </div>

        <div class="text-center">
            <h3 class="text-4xl font-bold text-purple-600">1200+</h3>
            <p class="text-gray-500 mt-2">Students</p>
        </div>

        <div class="text-center">
            <h3 class="text-4xl font-bold text-red-600">15+</h3>
            <p class="text-gray-500 mt-2">Laboratories</p>
        </div>

    </div>

</div>

<!-- Why Choose KD Polytechnic -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Why Choose K.D. Polytechnic?
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="border rounded-lg p-5 text-center">
            <div class="text-5xl mb-3">🏆</div>
            <h3 class="font-bold">Experienced Faculty</h3>
            <p class="text-gray-500 mt-2">
                Learn from qualified and experienced lecturers.
            </p>
        </div>

        <div class="border rounded-lg p-5 text-center">
            <div class="text-5xl mb-3">💻</div>
            <h3 class="font-bold">Modern Labs</h3>
            <p class="text-gray-500 mt-2">
                Practical learning with updated laboratories.
            </p>
        </div>

        <div class="border rounded-lg p-5 text-center">
            <div class="text-5xl mb-3">🤝</div>
            <h3 class="font-bold">Industry Exposure</h3>
            <p class="text-gray-500 mt-2">
                Workshops, seminars and industrial visits.
            </p>
        </div>

        <div class="border rounded-lg p-5 text-center">
            <div class="text-5xl mb-3">🎯</div>
            <h3 class="font-bold">Career Support</h3>
            <p class="text-gray-500 mt-2">
                Placement guidance and internship opportunities.
            </p>
        </div>

    </div>

</div>

<!-- Department Highlights -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Department Highlights
    </h2>

    <ul class="space-y-4 text-gray-700">

        <li>✅ Smart classrooms with digital teaching facilities.</li>

        <li>✅ Well-equipped laboratories for practical learning.</li>

        <li>✅ Technical workshops conducted throughout the year.</li>

        <li>✅ Mini and major project guidance.</li>

        <li>✅ Industrial visits and expert lectures.</li>

        <li>✅ Placement preparation and career counselling.</li>

    </ul>

</div>

<!-- Call To Action -->

<div class="bg-gradient-to-r from-purple-700 to-indigo-700 rounded-xl shadow-lg text-white p-8 mt-8 mb-6">

    <h2 class="text-3xl font-bold">
        Explore Your Future
    </h2>

    <p class="mt-4 text-purple-100">
        Discover academic opportunities, interact with departments, and build a successful engineering career with K.D. Polytechnic.
    </p>

    <a href="{{ route('chat') }}"
       class="inline-block mt-6 bg-white text-purple-700 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">

        Ask AI About Departments

    </a>

</div>


<!-- Quick Department Contacts -->

<div class="bg-white rounded-xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">
        Quick Department Contacts
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div class="border rounded-lg p-5">
            <h3 class="font-bold text-lg">Computer Engineering</h3>
            <p class="text-gray-600 mt-2">
                Email: computer@kdpp.edu.in
            </p>
            <p class="text-gray-600">
                Phone: +91 98765 10001
            </p>
        </div>

        <div class="border rounded-lg p-5">
            <h3 class="font-bold text-lg">Civil Engineering</h3>
            <p class="text-gray-600 mt-2">
                Email: civil@kdpp.edu.in
            </p>
            <p class="text-gray-600">
                Phone: +91 98765 10002
            </p>
        </div>

        <div class="border rounded-lg p-5">
            <h3 class="font-bold text-lg">Mechanical Engineering</h3>
            <p class="text-gray-600 mt-2">
                Email: mechanical@kdpp.edu.in
            </p>
            <p class="text-gray-600">
                Phone: +91 98765 10003
            </p>
        </div>

        <div class="border rounded-lg p-5">
            <h3 class="font-bold text-lg">Electrical Engineering</h3>
            <p class="text-gray-600 mt-2">
                Email: electrical@kdpp.edu.in
            </p>
            <p class="text-gray-600">
                Phone: +91 98765 10004
            </p>
        </div>

    </div>

</div>

        </div>

    </div>

</x-app-layout>