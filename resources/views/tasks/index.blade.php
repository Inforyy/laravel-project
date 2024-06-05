@extends('layouts.app')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold mb-6">Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded-lg mb-4 space-x-4"><i class="fa-solid fa-plus"></i><p>Create Task</p></a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white px-4 py-2 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white px-4 py-2 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Description</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Start Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">End Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Priority</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task['taskID'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task['name'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task['description'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Carbon::parse($task['startDate'])->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ Carbon::parse($task['endDate'])->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task['status'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task['priority'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('tasks.show', $task['taskID']) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                <form action="{{ route('tasks.destroy', $task['taskID']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
