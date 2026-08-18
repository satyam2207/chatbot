<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Manage Departments
                    </h1>

                    <p class="mt-2 text-gray-600">
                        Add, edit and remove college departments.
                    </p>
                </div>

                <a href="{{ route('admin.departments.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">
                    + Add Department
                </a>

            </div>

            @if(session('success'))
                <div class="mb-6 bg-green-100 text-green-800 px-5 py-4 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-gray-50 border-b">

                            <tr>
                                <th class="text-left px-6 py-4">
                                    Department
                                </th>

                                <th class="text-left px-6 py-4">
                                    Description
                                </th>

                                <th class="text-right px-6 py-4">
                                    Actions
                                </th>
                            </tr>

                        </thead>

                        <tbody class="divide-y">

                            @forelse($departments as $department)

                                <tr>

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">
                                            {{ $department->name }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ Str::limit($department->description, 80) }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('admin.departments.edit', $department) }}"
                                               class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('admin.departments.destroy', $department) }}"
                                                  onsubmit="return confirm('Delete this department?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-4 py-2 rounded-lg bg-red-100 text-red-700 hover:bg-red-200">
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="3"
                                        class="px-6 py-12 text-center text-gray-500">
                                        No departments available.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="mt-6">

                <a href="{{ route('admin.dashboard') }}"
                   class="text-gray-600 hover:text-gray-900">
                    ← Back to Admin Dashboard
                </a>

            </div>

        </div>

    </div>

</x-app-layout>