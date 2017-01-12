<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\KenCore\PubLib\CAbout;
use App\KenCore\PubLib\CCategory;

class AboutController extends Controller
{
    public function index()
    {
        $Ainstance=new CAbout();
        $Cinstance=new CCategory();
        return view('about')->with('abouts',$Ainstance->getAbouts())
                ->with('categorys',$Cinstance->getRootCategory())
                ->with('resdir','');
    }
}
