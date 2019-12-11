<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        // $porjects = \App\Project::all();
        $projects = Project::all();

        // return $projects;
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        # code...
        // return $id;
        // $project = Project::find($id);
        // $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        # code...
        // dd('hello!');
        // dd(request()->all());
        // $project = Project::find($id);
//        $project = Project::findOrFail($id);
//
//        $project->title = request('title');
//        $project->description = request('description');

        $project->update(request(['title', 'description']));

//        $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
//        // dd('hello');
//        // Project::find($id)->delete();
//        Project::findOrFail($id)->delete();

        $project->delete();

        return redirect('/projects');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        // return request()->all();
//        $project = new Project();
//
//        $project->title = request('title');
//        $project->description = request('description');
//
//        $project->save();

        Project::create(request(['title', 'description']));

        return redirect('/projects');
    }
}
