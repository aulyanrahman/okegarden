<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('status')) {
            $status = Status::FirstWhere('slug', request('status'));
            $title = ' in ' . $status->name;
        }

        if (request('author')) {
            $author = User::FirstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('projects', [
            'active' => 'projects',
            "title" => "All Projects" . $title,
            "projects" => Project::latest()->filter(request(['search', 'status', 'author']))
                ->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Project $project)
    {
        return view('project', [
            'active' => 'projects',
            "title" => "Single Project",
            "project" => $project,
        ]);
    }
}
