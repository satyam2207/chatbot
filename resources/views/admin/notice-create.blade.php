<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-3xl mx-auto px-6 py-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Add Notice
                </h1>

                <p class="mt-2 text-gray-600">
                    Create a new college announcement.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border p-8">

                <form method="POST" action="{{ route('admin.notices.store') }}">
                    @csrf

                    <div class="mb-5">
                        <label class="block font-semibold mb-2">
                            Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            required
                            class="w-full border-gray-300 rounded-xl"
                            placeholder="Enter notice title">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2">
                            Category
                        </label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category') }}"
                            required
                            class="w-full border-gray-300 rounded-xl"
                            placeholder="Exam, Event, General...">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            required
                            class="w-full border-gray-300 rounded-xl"
                            placeholder="Enter notice details">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5 mb-5">

                        <div>
                            <label class="block font-semibold mb-2">
                                Notice Date
                            </label>

                            <input
                                type="date"
                                name="notice_date"
                                value="{{ old('notice_date', date('Y-m-d')) }}"
                                required
                                class="w-full border-gray-300 rounded-xl">
                        </div>

                        <div>
                            <label class="block font-semibold mb-2">
                                Expiry Date
                            </label>

                            <input
                                type="date"
                                name="expiry_date"
                                value="{{ old('expiry_date') }}"
                                class="w-full border-gray-300 rounded-xl">
                        </div>

                    </div>

                    <div class="mb-6">

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                checked
                                class="rounded">

                            <span class="font-semibold">
                                Active Notice
                            </span>

                        </label>

                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">
                            Create Notice
                        </button>

                        <a
                            href="{{ route('admin.notices') }}"
                            class="bg-gray-100 hover:bg-gray-200 px-6 py-3 rounded-xl font-semibold">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>