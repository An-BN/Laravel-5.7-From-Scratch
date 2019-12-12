<?php

namespace App\Http\Controllers;

use App\Project;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;


class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->only();
        // $this->middleware('auth')->except();
    }


    public function index()
    {
        // auth()->id()
        // auth()->user()
        // auth()->check()
        // auth()->guest()
        // $projects = Project::all();
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        return view('projects.create');
    }


    public function store()
    {
        Project::create(
            request()->validate([
                'title' => ['required', 'min:3', 'max:255'],
                'description' => 'required|min:3'
            ]) + ['owner_id' => auth()->id()]
        );

        return redirect('/projects');
    }


    public function show(Project $project)
    {
        $filesystem = app('Illuminate\Filesystem\Filesystem');

        return view('projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }


    public function update(Project $project)
    {
        $project->update(
            request()->validate([
                'title' => ['required', 'min:3', 'max:255'],
                'description' => 'required|min:3'
            ])
        );

        return redirect('/projects');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }
}
