<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-3xl mx-auto px-6 py-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Edit Faculty
                </h1>

                <p class="mt-2 text-gray-600">
                    Update faculty information.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border p-8">

                <form method="POST"
                      action="{{ route('admin.faculty.update', $faculty) }}">

                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Faculty Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $faculty->name) }}"
                            required
                            class="w-full border-gray-300 rounded-xl">

                    </div>

                    <!-- Email -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $faculty->email) }}"
                            class="w-full border-gray-300 rounded-xl">

                    </div>

                    <!-- Designation -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Designation
                        </label>

                        <input
                            type="text"
                            name="designation"
                            value="{{ old('designation', $faculty->designation) }}"
                            required
                            class="w-full border-gray-300 rounded-xl">

                    </div>

                    <!-- Department -->
                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            Department
                        </label>

                        <select
                            name="department_id"
                            required
                            class="w-full border-gray-300 rounded-xl">

                            @foreach($departments as $department)

                                <option
                                    value="{{ $department->id }}"
                                    {{ old('department_id', $faculty->department_id) == $department->id ? 'selected' : '' }}>

                                    {{ $department->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Active -->
                    <div class="mb-6">

                        <label class="flex items-center gap-3">

                            <input
                                type="checkbox"
                                name="is_active"
                                value="1"
                                {{ $faculty->is_active ? 'checked' : '' }}
                                class="rounded">

                            <span class="font-semibold">
                                Active Faculty
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
                            href="{{ route('admin.faculty') }}"
                            class="bg-gray-100 hover:bg-gray-200 px-6 py-3 rounded-xl font-semibold">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>