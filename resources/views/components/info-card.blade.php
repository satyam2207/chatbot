<div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-gray-500 text-sm">
                {{ $title }}
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $value }}
            </h2>

        </div>

        <div class="text-4xl">
            {{ $slot }}
        </div>

    </div>

</div>