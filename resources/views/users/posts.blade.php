<x-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
        <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
            <div class="w-full flex items-center justify-between p-6 space-x-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-gray-900 text-sm font-medium truncate">{{ $post->title }}</h3>
                    </div>
                    <p class="mt-1 text-gray-500 text-sm truncate"</p>
                </div>
            </div>
            <div>
                <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="w-0 flex-1 flex">
                        <a href="{{ route('post.view', $post->id) }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">

                            <span class="ml-3">View</span>
                        </a>
                    </div>
                    <div class="-ml-px w-0 flex-1 flex">
                        <a href="#" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                            <span class="ml-3">Edit</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        @endforeach

    </ul>

</x-layout>
