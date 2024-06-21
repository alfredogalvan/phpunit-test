<x-layout title="{{ auth()->user()->name }}">

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalUsers }}</dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total Posts</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalPosts }}</dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Monsters drinked in the week</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">3</dd>
            </div>
        </dl>
    </div>


</x-layout>
