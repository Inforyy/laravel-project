@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task['taskID']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $task['name'] }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ $task['description'] }}</textarea>
            </div>

            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" name="startDate" id="startDate" class="form-control" value="{{ $task['startDate'] }}">
            </div>

            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" id="endDate" class="form-control" value="{{ $task['endDate'] }}">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $task['status'] }}">
            </div>

            <div class="form-group">
                <label for="priority">Priority:</label>
                <input type="number" name="priority" id="priority" class="form-control" value="{{ $task['priority'] }}">
            </div>

            <div class="form-group">
                <label for="projectID">Project ID:</label>
                <input type="number" name="projectID" id="projectID" class="form-control" value="{{ $task['projectID'] }}">
            </div>

            <div class="form-group">
                <label for="teamMemberID">Team Member ID:</label>
                <input type="number" name="teamMemberID" id="teamMemberID" class="form-control" value="{{ $task['teamMemberID'] }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
