<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-3xl mx-auto px-6 py-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Edit Department
                </h1>

                <p class="mt-2 text-gray-600">
                    Update department information.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border p-8">

                <form method="POST"
                      action="{{ route('admin.departments.update', $department) }}">

                    @csrf
                    @method('PUT')

                    <!-- Department Name -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Department Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $department->name) }}"
                            required
                            class="w-full border-gray-300 rounded-xl">

                    </div>

                    <!-- Department Code -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Department Code
                        </label>

                        <input
                            type="text"
                            name="code"
                            value="{{ old('code', $department->code) }}"
                            required
                            class="w-full border-gray-300 rounded-xl">

                    </div>

                    <!-- Description -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="w-full border-gray-300 rounded-xl">{{ old('description', $department->description) }}</textarea>

                    </div>

                    <!-- Active -->
                    <div class="mb-6">

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ $department->is_active ? 'checked' : '' }}
                                class="rounded">

                            <span class="font-semibold">
                                Active Department
                            </span>

                        </label>

                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold">
                            Save Changes
                        </button>

                        <a
                            href="{{ route('admin.departments') }}"
                            class="bg-gray-100 hover:bg-gray-200 px-6 py-3 rounded-xl font-semibold">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>