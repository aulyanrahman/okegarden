<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Status $status)
    {
        return view('statuses', [
            'active' => 'statuses',
            'title' => 'Statuses',
            'statuses' => $status->all()
        ]);
    }
}
