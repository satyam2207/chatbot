<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Student Profile
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

                <!-- Header -->

                <div class="bg-gradient-to-r from-blue-700 to-blue-500 p-8 text-center text-white">

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=2563eb&size=180"
                        class="w-32 h-32 rounded-full mx-auto border-4 border-white shadow-lg">

                    <h1 class="text-3xl font-bold mt-4">
                        {{ Auth::user()->name }}
                    </h1>

                    <p class="text-blue-100">
                        Computer Engineering Student
                    </p>

                </div>

                <!-- Profile Details -->

                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-6">

                        <div>
                            <label class="font-semibold text-gray-600">
                                Full Name
                            </label>

                            <p class="mt-2 text-lg">
                                {{ Auth::user()->name }}
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">
                                Email
                            </label>

                            <p class="mt-2 text-lg">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">
                                Department
                            </label>

                            <p class="mt-2 text-lg">
                                Computer Engineering
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">
                                Semester
                            </label>

                            <p class="mt-2 text-lg">
                                5
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">
                                Enrollment Number
                            </label>

                            <p class="mt-2 text-lg">
                                240010107001
                            </p>
                        </div>

                        <div>
                            <label class="font-semibold text-gray-600">
                                Mobile
                            </label>

                            <p class="mt-2 text-lg">
                                +91 XXXXX XXXXX
                            </p>
                        </div>

                    </div>

                    <div class="mt-10 text-center">

                        <button
                            class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded-lg font-semibold">

                            Edit Profile

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>