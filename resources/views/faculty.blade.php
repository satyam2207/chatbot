<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Faculty Directory
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-indigo-700 to-indigo-500 rounded-xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold">
                    Meet Our Faculty
                </h1>

                <p class="mt-3 text-indigo-100">
                    Experienced faculty members dedicated to quality education and student success.
                </p>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($faculties as $faculty)

                <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                    <div class="text-5xl text-center">👨‍🏫</div>

                    <h3 class="text-xl font-bold text-center mt-4">
                        {{ $faculty->name }}
                    </h3>

                    <p class="text-center text-gray-500">
                        {{ $faculty->designation }}
                    </p>

                    <hr class="my-4">

                    <p>
                        <strong>Department:</strong>
                        {{ $faculty->department->name ?? 'N/A' }}
                    </p>

                    <p class="mt-2">
                        <strong>Email:</strong>
                        {{ $faculty->email }}
                    </p>
                </div>

                @endforeach

        
            </div>

        </div>

    </div>

</x-app-layout>