@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Edit Task</h1>
        <form action="{{ route('tasks.update', $task['taskID']) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['name'] }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="description" id="description" class="form-control w-full border border-gray-300 p-2 rounded">{{ $task['description'] }}</textarea>
            </div>

            <div class="mb-4">
                <label for="startDate" class="block text-gray-700 font-bold mb-2">Start Date:</label>
                <input type="date" name="startDate" id="startDate" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['startDate'] }}">
            </div>

            <div class="mb-4">
                <label for="endDate" class="block text-gray-700 font-bold mb-2">End Date:</label>
                <input type="date" name="endDate" id="endDate" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['endDate'] }}">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                <input type="text" name="status" id="status" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['status'] }}">
            </div>

            <div class="mb-4">
                <label for="priority" class="block text-gray-700 font-bold mb-2">Priority:</label>
                <input type="number" name="priority" id="priority" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['priority'] }}">
            </div>

            <div class="mb-4">
                <label for="projectID" class="block text-gray-700 font-bold mb-2">Project ID:</label>
                <input type="number" name="projectID" id="projectID" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['projectID'] }}">
            </div>

            <!-- <div class="mb-4">
                <label for="teamMemberID" class="block text-gray-700 font-bold mb-2">Team Member ID:</label>
                <input type="number" name="teamMemberID" id="teamMemberID" class="form-control w-full border border-gray-300 p-2 rounded" value="{{ $task['teamMemberID'] }}">
            </div> -->

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Task</button>
        </form>
    </div>
@endsection
