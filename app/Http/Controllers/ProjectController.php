<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Policies\ProjectPolicy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $this->authorize("projects.view", ProjectPolicy::class);
        $projects = Project::with('manager')->paginate(10);
        return view('project.index', compact('projects'));
    }

    public function create()
    {
        $this->authorize('projects.create', ProjectPolicy::class);
        $managers = User::all();
        return view('project.create', compact('managers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'manager_id' => 'required|exists:users,id'
        ]);

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        $this->authorize('projects.update', ProjectPolicy::class);
        $managers = User::all();
        return view('project.edit', compact('project', 'managers'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'manager_id' => 'required|exists:users,id'
        ]);

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('projects.delete', ProjectPolicy::class);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}
