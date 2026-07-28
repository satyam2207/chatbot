<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Settings
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">

        <div class="bg-white shadow rounded-lg p-8">

            <h3 class="text-xl font-semibold mb-6">
                User Settings
            </h3>

            <div class="space-y-6">

                <div>
                    <label class="block font-medium mb-2">
                        Theme
                    </label>

                    <select class="w-full border rounded-lg px-4 py-2">
                        <option>Light</option>
                        <option>Dark</option>
                        <option>System Default</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-2">
                        Language
                    </label>

                    <select class="w-full border rounded-lg px-4 py-2">
                        <option>English</option>
                        <option>Gujarati</option>
                    </select>
                </div>

                <div class="flex items-center justify-between border rounded-lg p-4">

                    <div>
                        <h4 class="font-semibold">
                            Email Notifications
                        </h4>

                        <p class="text-sm text-gray-500">
                            Receive chatbot updates
                        </p>
                    </div>

                    <input type="checkbox" checked>

                </div>

                <div class="flex items-center justify-between border rounded-lg p-4">

                    <div>
                        <h4 class="font-semibold">
                            Sound Notifications
                        </h4>

                        <p class="text-sm text-gray-500">
                            Play notification sound
                        </p>
                    </div>

                    <input type="checkbox">

                </div>

                <div class="pt-4">

                    <button
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">

                        Save Settings

                    </button>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
