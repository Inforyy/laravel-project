<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $taskData = $request->only(['name', 'description', 'status', 'projectID', 'startDate', 'endDate', 'priority']);
        $newTask = $this->taskService->createTask($taskData);

        if ($newTask) {
            return back()->with('error', 'Failed to create task.');
        }
        
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function destroy($id)
    {
        $deleted = $this->taskService->deleteTask($id);

        if ($deleted) {
            return redirect()->route('tasks.index')->with('error', 'Failed to delete task.');
        } else {
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }
    }

    public function show($id)
    {
        // Fetch the task details by ID using the TaskService
        $task = $this->taskService->getTaskById($id);

        if (!$task) {
            abort(404); // Task not found
        }

        return view('tasks.show', compact('task'));
    }

    public function edit($taskId)
    {
        // Retrieve the task using the task service
        $task = $this->taskService->getTaskById($taskId);

        if ($task) {
            // Ensure the dates are formatted correctly
            $task['startDate'] = \Carbon\Carbon::parse($task['startDate'])->format('Y-m-d');
            $task['endDate'] = \Carbon\Carbon::parse($task['endDate'])->format('Y-m-d');

            // Return the edit view with the task details
            return view('tasks.edit', compact('task'));
        }

        return redirect()->route('tasks.index')->with('error', 'Task not found.');
    }




    public function update(Request $request, $taskId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'projectID' => 'required|integer',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'priority' => 'required|integer',
            // 'teamMemberID' => 'required|integer',
        ]);

        // Extract the task data from the request
        $taskData = $request->only([
            'name', 'description', 'status', 'projectID', 'startDate', 'endDate', 'priority'
        ]);

        // Update the task using the task service
        $updatedTask = $this->taskService->updateTask($taskId, $taskData);

        if ($updatedTask) {
            return back()->with('error', 'Failed to update task.');
        }
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');        
    }   
}

