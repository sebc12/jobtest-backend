<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Projects', [
            'projects' => Project::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $project->load('Comments');

        return inertia('Project', [
            'project' => $project,
        ]);
    }
}
