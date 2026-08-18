<x-app-layout>

    <div class="min-h-screen bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        Manage Notices
                    </h1>

                    <p class="mt-2 text-gray-600">
                        Add, edit and remove college notices.
                    </p>
                </div>

                <a href="{{ route('admin.notices.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-semibold">
                    + Add Notice
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
                                <th class="text-left px-6 py-4">Title</th>
                                <th class="text-left px-6 py-4">Category</th>
                                <th class="text-left px-6 py-4">Date</th>
                                <th class="text-left px-6 py-4">Status</th>
                                <th class="text-right px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">

                            @forelse($notices as $notice)

                                <tr>

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">
                                            {{ $notice->title }}
                                        </div>

                                        <div class="text-sm text-gray-500 mt-1">
                                            {{ Str::limit($notice->description, 60) }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $notice->category }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ optional($notice->notice_date)->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        @if($notice->is_active)
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

                                            <a href="{{ route('admin.notices.edit', $notice) }}"
                                               class="px-4 py-2 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                  action="{{ route('admin.notices.destroy', $notice) }}"
                                                  onsubmit="return confirm('Delete this notice?');">

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
                                    <td colspan="5"
                                        class="px-6 py-12 text-center text-gray-500">
                                        No notices available.
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