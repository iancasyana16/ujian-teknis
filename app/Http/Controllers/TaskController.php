<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with(['project', 'assignedTo'])->paginate(10);
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        $users = User::all();

        return view('task.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'assigned_to_user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task added.');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        $users = User::all();

        return view('task.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'assigned_to_user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
