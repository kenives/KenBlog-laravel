<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CvInfoController extends Controller
{
    public function index()
    {
        return view('cvinfo')->with('resdir','/cv/');
    }
}
