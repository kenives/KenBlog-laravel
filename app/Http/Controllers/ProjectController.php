<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project_list')->with('resdir','');
    }
    public function project($project_id)
    {
        return view('project')->with('resdir','../');
    }
}
