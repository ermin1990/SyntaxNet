<div class="mt-8 bg-white p-6 rounded-lg shadow-xl">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <a href="{{ route('admin.users.index') }}" class="text-lg leading-6 font-semibold text-gray-900 pb-2">Users</a>
        </div>

    </div>
    <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-black text-white">
                        <tr class="border-b border-gray-700">
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">Name</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Email</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Role</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white" id="usersList">
                        @foreach ($users as $user)
                            <tr class="hover:bg-blue-50 transition-all duration-200">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $user->name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700">
                                    <span class="font-medium">{{ $user->role ?? 'User' }}</span>
                                </td>

                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <button class="ml-4 text-red-600 hover:text-red-800 hover:underline font-semibold transition-all duration-200">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
