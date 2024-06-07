@extends('layouts.app')
@include('layouts.navbar')


@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Create Task</h1>

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Task Name:</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea name="description" id="description" class="w-full border border-gray-300 p-2 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select name="status" id="status" class="w-full border border-gray-300 p-2 rounded-lg" required>
                    <option value="To-Do">Pending</option>
                    <option value="In-Progress">In progress</option>
                    <option value="Done">Completed</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="projectID" class="block text-gray-700">Project ID:</label>
                <input type="number" name="projectID" id="projectID" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="startDate" class="block text-gray-700">Start Date:</label>
                <input type="datetime-local" name="startDate" id="startDate" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="endDate" class="block text-gray-700">End Date:</label>
                <input type="datetime-local" name="endDate" id="endDate" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="priority" class="block text-gray-700">Priority:</label>
                <input type="number" name="priority" id="priority" class="w-full border border-gray-300 p-2 rounded-lg" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Create Task</button>
        </form>
    </div>
@endsection
