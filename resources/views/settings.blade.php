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

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PATCH')

                <div class="space-y-6">

                    <!-- Theme -->
                    <div>
                        <label class="block font-medium mb-2">
                            Theme
                        </label>

                        <select
                            name="theme"
                            class="w-full border rounded-lg px-4 py-2"
                        >
                            <option value="light"
                                {{ $user->theme === 'light' ? 'selected' : '' }}>
                                Light
                            </option>

                            <option value="dark"
                                {{ $user->theme === 'dark' ? 'selected' : '' }}>
                                Dark
                            </option>

                            <option value="system"
                                {{ $user->theme === 'system' ? 'selected' : '' }}>
                                System Default
                            </option>
                        </select>
                    </div>

                    <!-- Language -->
                    <div>
                        <label class="block font-medium mb-2">
                            Language
                        </label>

                        <select
                            name="language"
                            class="w-full border rounded-lg px-4 py-2"
                        >
                            <option value="english"
                                {{ $user->language === 'english' ? 'selected' : '' }}>
                                English
                            </option>

                            <option value="gujarati"
                                {{ $user->language === 'gujarati' ? 'selected' : '' }}>
                                Gujarati
                            </option>
                        </select>
                    </div>

                    <!-- Email Notifications -->
                    <div class="flex items-center justify-between border rounded-lg p-4">

                        <div>
                            <h4 class="font-semibold">
                                Email Notifications
                            </h4>

                            <p class="text-sm text-gray-500">
                                Receive chatbot updates
                            </p>
                        </div>

                        <input
                            type="checkbox"
                            name="email_notifications"
                            value="1"
                            {{ $user->email_notifications ? 'checked' : '' }}
                        >

                    </div>

                    <!-- Sound Notifications -->
                    <div class="flex items-center justify-between border rounded-lg p-4">

                        <div>
                            <h4 class="font-semibold">
                                Sound Notifications
                            </h4>

                            <p class="text-sm text-gray-500">
                                Play notification sound
                            </p>
                        </div>

                        <input
                            type="checkbox"
                            name="sound_notifications"
                            value="1"
                            {{ $user->sound_notifications ? 'checked' : '' }}
                        >

                    </div>

                    <!-- Save -->
                    <div class="pt-4">

                        <button
                            type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700"
                        >
                            Save Settings
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>