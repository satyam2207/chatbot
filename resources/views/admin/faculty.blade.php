<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="flex items-center justify-between mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Manage Faculty
                    </h1>

                    <p class="mt-2 text-gray-600">
                        Add, edit and remove faculty members.
                    </p>
                </div>

                <a href="{{ route('admin.faculty.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">
                    + Add Faculty
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
                                    Name
                                </th>

                                <th class="text-left px-6 py-4">
                                    Designation
                                </th>

                                <th class="text-left px-6 py-4">
                                    Department
                                </th>

                                <th class="text-left px-6 py-4">
                                    Email
                                </th>

                                <th class="text-left px-6 py-4">
                                    Status
                                </th>

                                <th class="text-right px-6 py-4">
                                    Actions
                                </th>
                            </tr>

                        </thead>

                        <tbody class="divide-y">

                            @forelse($faculties as $faculty)

                                <tr>

                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $faculty->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $faculty->designation }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $faculty->department?->name ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $faculty->email ?? 'N/A' }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($faculty->is_active)
                                            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-sm bg-gray-100 text-gray-600">
                                                Inactive
                                            </span>
                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('admin.faculty.edit', $faculty) }}"
                                               class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('admin.faculty.destroy', $faculty) }}"
                                                  onsubmit="return confirm('Delete this faculty member?');">

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
                                    <td colspan="6"
                                        class="px-6 py-12 text-center text-gray-500">
                                        No faculty members available.
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