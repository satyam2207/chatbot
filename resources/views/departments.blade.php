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

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">💻</div>
                    <h3 class="text-xl font-bold mt-4">Computer Engineering</h3>
                    <p class="text-gray-500 mt-3">
                        Programming, AI, Networking, Database and Software Development.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">⚡</div>
                    <h3 class="text-xl font-bold mt-4">Electrical Engineering</h3>
                    <p class="text-gray-500 mt-3">
                        Power systems, machines and electrical technology.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">🏗️</div>
                    <h3 class="text-xl font-bold mt-4">Civil Engineering</h3>
                    <p class="text-gray-500 mt-3">
                        Construction, surveying and structural engineering.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">⚙️</div>
                    <h3 class="text-xl font-bold mt-4">Mechanical Engineering</h3>
                    <p class="text-gray-500 mt-3">
                        Manufacturing, machines and industrial technology.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">📡</div>
                    <h3 class="text-xl font-bold mt-4">Electronics</h3>
                    <p class="text-gray-500 mt-3">
                        Embedded systems, communication and digital electronics.
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl">🧪</div>
                    <h3 class="text-xl font-bold mt-4">Science & Humanities</h3>
                    <p class="text-gray-500 mt-3">
                        Mathematics, Physics, English and foundational subjects.
                    </p>
                </div>

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

        </div>

    </div>

</x-app-layout>