@extends('admin.layouts.admin')

@section('content')

    @if(isset( $pages))
        <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-4xl font-bold text-gray-900 pb-2">Pages</h1>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Last Edited
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Author
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach( $pages as $page)

                                    @include('admin.page.list')

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        {{ $pages->links() }}
    @endif

@endSection
