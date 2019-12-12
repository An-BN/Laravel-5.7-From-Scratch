<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
    {
        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        return back();
    }

//    public function update(Task $task)
//    {
        // public function update(Task $task)
        // {
        //     // $task->complete(request()->has('completed'));


        //     // if (request()->has('completed')) {
        //     //     $task->complete();
        //     // } else {
        //     //     $task->incomplete();
        //     // }

//        $method = request()->has('completed') ? 'complete' : 'incomplete';
//
//        $task->$method();

//        return back();
//    }
}
