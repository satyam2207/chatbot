<x-app-layout>
    <div class="min-h-screen bg-gray-50">

        <div class="max-w-6xl mx-auto px-6 py-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    College Notices
                </h1>

                <p class="mt-2 text-gray-600">
                    Stay updated with the latest college announcements.
                </p>
            </div>

            @if ($notices->count())

                <div class="space-y-5">

                    @foreach ($notices as $notice)

                        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">

                            <div class="flex flex-wrap items-center justify-between gap-3">

                                <div class="flex items-center gap-3">
                                    <span class="text-2xl">📢</span>

                                    <h2 class="text-xl font-semibold text-gray-900">
                                        {{ $notice->title }}
                                    </h2>
                                </div>

                                <span class="px-3 py-1 rounded-full bg-gray-100 text-sm text-gray-700">
                                    {{ $notice->category }}
                                </span>

                            </div>

                            <p class="mt-4 text-gray-600 leading-relaxed">
                                {{ $notice->description }}
                            </p>

                            <div class="mt-5 flex flex-wrap gap-5 text-sm text-gray-500">

                                <span>
                                    📅
                                    {{ optional($notice->notice_date)->format('d M Y') }}
                                </span>

                                @if ($notice->expiry_date)
                                    <span>
                                        ⏳
                                        Until
                                        {{ $notice->expiry_date->format('d M Y') }}
                                    </span>
                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="bg-white rounded-2xl border border-gray-200 p-12 text-center">

                    <div class="text-5xl mb-4">📭</div>

                    <h2 class="text-xl font-semibold text-gray-800">
                        No active notices
                    </h2>

                    <p class="mt-2 text-gray-500">
                        There are currently no announcements to display.
                    </p>

                </div>

            @endif

        </div>
    </div>
</x-app-layout>