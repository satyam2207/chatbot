<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            KDP Connect AI Chat
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-5xl mx-auto">

            <!-- Header -->

            <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-t-2xl p-6 shadow">

                <h1 class="text-3xl font-bold">
                    🤖 KDP Connect AI
                </h1>

                <p class="text-blue-100 mt-2">
                    Ask anything about K.D. Polytechnic, courses, admissions and college information.
                </p>

            </div>

            <!-- Chat Window -->

            <div class="bg-white h-[500px] overflow-y-auto p-6 space-y-6 shadow">

                <!-- AI Message -->

                <div class="flex">

                    <div class="bg-blue-100 text-gray-800 rounded-2xl px-5 py-4 max-w-lg">

                        👋 Hello {{ Auth::user()->name }}! I'm KDP Connect AI.

                        <br><br>

                        Ask me anything related to the college.

                    </div>

                </div>

                <!-- User Message -->

                <div class="flex justify-end">

                    <div class="bg-blue-600 text-white rounded-2xl px-5 py-4 max-w-lg">

                        When does admission start?

                    </div>

                </div>

                <!-- AI Reply -->

                <div class="flex">

                    <div class="bg-gray-200 text-gray-800 rounded-2xl px-5 py-4 max-w-lg">

                        Admissions generally begin after declaration of qualifying examination results.
                        Please check the official website for latest notifications.

                    </div>

                </div>

            </div>

            <!-- Suggested Questions -->

            <div class="bg-white px-6 py-4 border-t">

                <h3 class="font-semibold mb-3">

                    Suggested Questions

                </h3>

                <div class="flex flex-wrap gap-3">

                    <button class="bg-gray-100 hover:bg-blue-100 px-4 py-2 rounded-full">
                        Admission Process
                    </button>

                    <button class="bg-gray-100 hover:bg-blue-100 px-4 py-2 rounded-full">
                        Courses Offered
                    </button>

                    <button class="bg-gray-100 hover:bg-blue-100 px-4 py-2 rounded-full">
                        Fees Structure
                    </button>

                    <button class="bg-gray-100 hover:bg-blue-100 px-4 py-2 rounded-full">
                        College Timing
                    </button>

                </div>

            </div>

            <!-- Input -->

            <div class="bg-white rounded-b-2xl shadow p-5">

                <form class="flex gap-4">

                    <input
                        type="text"
                        placeholder="Type your message..."
                        class="flex-1 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <button
                        type="button"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-8 rounded-lg">

                        Send

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>