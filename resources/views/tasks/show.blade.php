@extends('layouts.app')
@include('layouts.navbar')


@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold mb-6 ">Task Details</h1>
            <a href="{{ route('tasks.edit', $task['taskID']) }}" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 space-x-4"><i class="fa-regular fa-pen-to-square"></i><p>Edit Task</p></a>
        </div>


        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Task Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">View details of the task.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">ID</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['taskID'] }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['name'] }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Description</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['description'] }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Start Date</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Carbon::parse($task['startDate'])->format('d-m-Y') }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">End Date</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ Carbon::parse($task['endDate'])->format('d-m-Y') }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['status'] }}</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Priority</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['priority'] }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Project ID</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $task['projectID'] }}</dd>
                    </div>
                    <!-- Add more task details here -->
                </dl>
            </div>
        </div>
    </div>
@endsection
