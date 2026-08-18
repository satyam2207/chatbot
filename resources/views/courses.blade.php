<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Courses
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->
            <div class="bg-gradient-to-r from-indigo-700 to-purple-600 rounded-xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold">
                    Academic Courses
                </h1>

                <p class="mt-3 text-indigo-100">
                    Explore diploma courses offered at K.D. Polytechnic, Patan.
                </p>

            </div>

            <!-- Courses -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($courses as $course)

                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">

                        <div class="text-5xl">
                            🎓
                        </div>

                        <h3 class="text-xl font-bold mt-4">
                            {{ $course->name }}
                        </h3>

                        <p class="text-xs font-semibold text-indigo-600 mt-1">
                            {{ $course->code }}
                        </p>

                        <p class="text-gray-500 mt-3">
                            {{ $course->description }}
                        </p>

                        <div class="mt-5 pt-4 border-t">

                            <div class="flex justify-between">
                                <span class="text-gray-500 text-sm">
                                    Duration
                                </span>

                                <span class="font-semibold text-gray-800">
                                    {{ $course->duration }}
                                </span>
                            </div>

                            <div class="flex justify-between mt-2">
                                <span class="text-gray-500 text-sm">
                                    Department
                                </span>

                                <span class="font-semibold text-indigo-600">
                                    {{ $course->department->name ?? 'N/A' }}
                                </span>
                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-xl p-8 text-center text-gray-500">
                        No courses available.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>