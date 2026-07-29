<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Help & Support
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Hero -->

            <div class="bg-gradient-to-r from-blue-700 to-blue-500 rounded-xl shadow-lg text-white p-8 mb-8">

                <h1 class="text-4xl font-bold">
                    Help Center
                </h1>

                <p class="mt-3 text-blue-100">
                    Find answers to common questions or contact the college support team.
                </p>

            </div>

            <!-- FAQ -->

            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">

                <h2 class="text-2xl font-bold mb-6">
                    Frequently Asked Questions
                </h2>

                <div class="space-y-5">

                    <div>
                        <h3 class="font-semibold">How do I use AI Chat?</h3>
                        <p class="text-gray-500">Open AI Chat from Dashboard and start asking questions.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">How can I change my password?</h3>
                        <p class="text-gray-500">Open Account Settings from your profile menu.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">Where can I see notices?</h3>
                        <p class="text-gray-500">Latest notices are available on the Dashboard.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">How do I contact faculty?</h3>
                        <p class="text-gray-500">Visit the department office or contact administration.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">Can I access previous chats?</h3>
                        <p class="text-gray-500">Yes, open Chat History from the navigation menu.</p>
                    </div>

                    <div>
                        <h3 class="font-semibold">Is my data secure?</h3>
                        <p class="text-gray-500">Yes, your account is protected using Laravel authentication.</p>
                    </div>

                </div>

            </div>

            <!-- Contact -->

            <div class="grid md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">

                    <div class="text-5xl">📞</div>

                    <h3 class="font-bold mt-4">
                        Phone
                    </h3>

                    <p class="text-gray-500 mt-2">
                        +91 9876543210
                    </p>

                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">

                    <div class="text-5xl">📧</div>

                    <h3 class="font-bold mt-4">
                        Email
                    </h3>

                    <p class="text-gray-500 mt-2">
                        support@kdpconnect.com
                    </p>

                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">

                    <div class="text-5xl">🏢</div>

                    <h3 class="font-bold mt-4">
                        Office
                    </h3>

                    <p class="text-gray-500 mt-2">
                        K.D. Polytechnic, Patan
                    </p>

                </div>

            </div>

            <!-- Feedback -->

            <div class="bg-white rounded-xl shadow-lg p-8">

                <h2 class="text-2xl font-bold mb-6">
                    Send Feedback
                </h2>

                <textarea
                    rows="5"
                    class="w-full border rounded-lg p-4 focus:ring-2 focus:ring-blue-500"
                    placeholder="Write your feedback..."></textarea>

                <button
                    class="mt-5 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">

                    Submit Feedback

                </button>

            </div>

        </div>

    </div>

</x-app-layout>