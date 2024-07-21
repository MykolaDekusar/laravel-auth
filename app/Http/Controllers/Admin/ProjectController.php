<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use App\Models\User;
use PhpParser\Node\Stmt\Echo_;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', ['posts' => Project::orderBy('created_at')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        // creo uno slug dal titolo e lo assegno al data
        $data['slug'] = Str::of($data['title'])->slug('-');

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->slug = $data['slug'];
        $project->save();

        return redirect()->route('admin.projects.index')->with('message', `Articolo $project->title creato correttamente`);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.posts.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.posts.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->update($data);
        return redirect()->route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
