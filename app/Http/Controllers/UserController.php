<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $author)
    {
        return view('projects', [
            'active' => 'projects',
            'title' => "Projects By Author: $author->name",
            'projects' => $author->projects->load('status', 'author'),
        ]);
    }
}
