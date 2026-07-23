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

</body>
</html>