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


}

