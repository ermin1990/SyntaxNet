<div class="mt-8 w-full bg-white p-6 rounded-lg shadow-xl">
    <h2 class="text-lg leading-6 font-semibold text-gray-900 pb-2">Recent Activity</h2>
    <div class="mt-4">
        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse ($activities as $activity)
                    <li class="hover:bg-blue-50 transition-all duration-200">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-blue-700 truncate hover:text-blue-800">
                                    {{ $activity['type'] }}
                                </p>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 shadow-sm">
                                        {{ $activity['created_at']->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-700">
                                        {!!    $activity['description'] !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="text-center py-4 text-gray-500">No recent activity found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
