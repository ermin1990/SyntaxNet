@extends('admin.layouts.admin')

@section('content')

    <div class="w-full px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-bold text-gray-900 pb-2 inline-block">Admin Dashboard</h1>
        <p class="mt-2 text-lg text-gray-600">Manage your site content and users</p>

        <!-- Dashboard Stats -->
        @include('admin\partials\dashboardstats')

        <!-- Recent Activity -->
        @include('admin\partials\recentactivity')

        <!-- User Management -->
       @include('admin\partials\userslist')
    </div>


@endsection
