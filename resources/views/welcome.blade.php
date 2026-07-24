<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Chatbot</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- Navbar -->

<nav class="bg-blue-700 text-white shadow-md">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold">
            College Chatbot
        </h1>

        <div class="flex items-center gap-6">

            <a href="#">Home</a>

            <a href="#">About</a>

            <a href="#">Contact</a>

            @if (Route::has('login'))

                @auth

                    <a href="{{ url('/dashboard') }}"
                       class="bg-white text-blue-700 px-4 py-2 rounded-lg">
                        Dashboard
                    </a>

                @else

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                    @if(Route::has('register'))

                    <a href="{{ route('register') }}"
                       class="bg-white text-blue-700 px-4 py-2 rounded-lg">

                        Register

                    </a>

                    @endif

                @endauth

            @endif

        </div>

    </div>

</nav>

<!-- Hero -->

<section class="bg-gradient-to-r from-blue-700 to-indigo-700 text-white py-24">

    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-5xl font-bold mb-6">

            College Chatbot

        </h2>

        <p class="text-2xl mb-6">

            Your Smart Campus Assistant

        </p>

        <p class="text-lg max-w-3xl mx-auto mb-10">

            Get instant answers to admissions, departments,
            courses, notices and campus-related queries.

        </p>

        <div class="flex justify-center gap-5">

            <a href="{{ route('register') }}"
               class="bg-white text-blue-700 px-6 py-3 rounded-lg font-semibold">

                Get Started

            </a>

            <a href="{{ route('login') }}"
               class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-blue-700">

                Login

            </a>

        </div>

    </div>

</section>
<!-- About Section -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                About College Chatbot
            </h2>

            <p class="text-gray-600 max-w-3xl mx-auto">
                College Chatbot helps students quickly access important college
                information such as admissions, courses, departments, notices,
                events, and campus services through an intelligent assistant.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">

            <div class="bg-white border border-gray-200 rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 duration-300 transition">

                <div class="text-5xl mb-5">
                    🎓
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Admission Assistance
                </h3>

                <p class="text-gray-600">
                    Learn about admission procedures, eligibility, required
                    documents and important dates instantly.
                </p>

            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 duration-300 transition">

                <div class="text-5xl mb-5">
                    📚
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Course Information
                </h3>

                <p class="text-gray-600">
                    Explore departments, available courses, academic programs
                    and useful study-related information.
                </p>

            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 duration-300 transition">

                <div class="text-5xl mb-5">
                    💬
                </div>

                <h3 class="text-xl font-bold mb-3">
                    24/7 Student Support
                </h3>

                <p class="text-gray-600">
                    Receive quick responses to frequently asked questions anytime,
                    making student support simple and accessible.
                </p>

            </div>

        </div>

    </div>

</section>

</body>
</html>