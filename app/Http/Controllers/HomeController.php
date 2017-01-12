<?php

namespace App\Http\Controllers;
use App\KenCore\PubViewLib\CHomeView;

class HomeController extends Controller
{
    public function index()
    {
        $HomeVewIns=new CHomeView();
        return view('index')->with('projects',$HomeVewIns->getProjects())
                ->with('banners',$HomeVewIns->getBanners())
                ->with('slidearticles',$HomeVewIns->getSlideArticles())
                ->with('resdir','');
    }
}
