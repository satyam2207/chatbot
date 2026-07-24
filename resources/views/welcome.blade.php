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
<!-- Features Section -->

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                How KDP Connect Helps You
            </h2>

            <p class="text-gray-600 max-w-3xl mx-auto">
                KDP Connect is your AI-powered college assistant. Simply ask a
                question and receive instant answers about admissions,
                academics, departments, notices and campus services.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card 1 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    🎓
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Ask About Admissions
                </h3>

                <p class="text-gray-600 mb-6">
                    Get instant answers about eligibility,
                    ACPDC admission process,
                    required documents and important dates.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Ask AI
                </button>

            </div>

            <!-- Card 2 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    📚
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Ask About Courses
                </h3>

                <p class="text-gray-600 mb-6">
                    Learn about diploma programs,
                    subjects, curriculum,
                    departments and academic information.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Ask AI
                </button>

            </div>

            <!-- Card 3 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    📢
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Ask About Notices
                </h3>

                <p class="text-gray-600 mb-6">
                    Find examination schedules,
                    announcements,
                    holidays and important updates instantly.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Ask AI
                </button>

            </div>

            <!-- Card 4 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    🏫
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Explore Campus
                </h3>

                <p class="text-gray-600 mb-6">
                    Ask about laboratories,
                    library, classrooms,
                    facilities and student services.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Ask AI
                </button>

            </div>

            <!-- Card 5 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    💬
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Student Support
                </h3>

                <p class="text-gray-600 mb-6">
                    Receive quick answers to
                    frequently asked questions
                    anytime without waiting.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Start Chat
                </button>

            </div>

            <!-- Card 6 -->

            <div class="bg-white rounded-xl shadow-md p-8 hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                <div class="text-5xl mb-5">
                    🤖
                </div>

                <h3 class="text-xl font-bold mb-3">
                    Smart AI Assistant
                </h3>

                <p class="text-gray-600 mb-6">
                    Powered by AI to understand
                    your questions and provide
                    fast, accurate responses.
                </p>

                <button class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">
                    Try Now
                </button>

            </div>

        </div>

    </div>

</section>

<!-- Contact Section -->

<section class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Contact Us
            </h2>

            <p class="text-gray-600">
                Reach out to us for admissions, courses, campus services,
                or any college-related information.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- Contact Information -->

            <div class="bg-white rounded-xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Contact Information
                </h3>

                <div class="space-y-5">

                    <p>
                        <strong>📍 Address:</strong><br>
                        K. D. Polytechnic,<br>
                        Patan, Gujarat
                    </p>

                    <p>
                        <strong>📞 Phone:</strong><br>
                        +91 9876543210
                    </p>

                    <p>
                        <strong>📧 Email:</strong><br>
                        info@kdpolytechnic.edu.in
                    </p>

                    <p>
                        <strong>🌐 Website:</strong><br>
                        www.kdpolytechnic.edu.in
                    </p>

                </div>

            </div>

            <!-- Contact Form -->

            <div class="bg-white rounded-xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Send a Message
                </h3>

                <form>

                    <input
                        type="text"
                        placeholder="Your Name"
                        class="w-full border rounded-lg px-4 py-3 mb-4">

                    <input
                        type="email"
                        placeholder="Email Address"
                        class="w-full border rounded-lg px-4 py-3 mb-4">

                    <textarea
                        rows="5"
                        placeholder="Write your message..."
                        class="w-full border rounded-lg px-4 py-3 mb-6"></textarea>

                    <button
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-3 rounded-lg">

                        Send Message

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>
<!-- Footer -->

<footer class="bg-blue-900 text-white py-12">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- About -->

            <div>

                <h3 class="text-2xl font-bold mb-4">
                    College Chatbot
                </h3>

                <p class="text-gray-300 leading-7">
                    College Chatbot is an AI-powered assistant that helps students
                    access admission details, course information, notices and
                    campus services quickly.
                </p>

            </div>

            <!-- Quick Links -->

            <div>

                <h3 class="text-xl font-semibold mb-4">
                    Quick Links
                </h3>

                <ul class="space-y-3">

                    <li><a href="#" class="hover:text-yellow-300 transition">Home</a></li>

                    <li><a href="#" class="hover:text-yellow-300 transition">About</a></li>

                    <li><a href="#" class="hover:text-yellow-300 transition">Contact</a></li>

                    <li><a href="#" class="hover:text-yellow-300 transition">Login</a></li>

                </ul>

            </div>

            <!-- Contact -->

            <div>

                <h3 class="text-xl font-semibold mb-4">
                    Contact
                </h3>

                <p class="mb-2">📍 K. D. Polytechnic, Patan</p>

                <p class="mb-2">📞 +91 9876543210</p>

                <p class="mb-2">📧 info@kdpolytechnic.edu.in</p>

                <p>🌐 www.kdpolytechnic.edu.in</p>

            </div>

        </div>

        <hr class="border-blue-700 my-8">

        <div class="flex flex-col md:flex-row justify-between items-center">

            <p class="text-gray-300 text-sm">
                © 2026 College Chatbot. All Rights Reserved.
            </p>

            <div class="flex gap-5 mt-4 md:mt-0">

                <a href="#" class="hover:text-yellow-300 transition">
                    Facebook
                </a>

                <a href="#" class="hover:text-yellow-300 transition">
                    Instagram
                </a>

                <a href="#" class="hover:text-yellow-300 transition">
                    LinkedIn
                </a>

            </div>

        </div>

    </div>

</footer>

</body>
</html>