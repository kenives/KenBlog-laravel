<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests;
use App\KenCore\PubViewLib\CArticleView;
use App\KenCore\PubLib\CCategory;

class ArticleController extends Controller
{
    public function index()
    {
        $Instance=new CArticleView();
        return view('article_list')->with('articles',$Instance->getArticles())
                ->with('resdir','');
    }
    public function article($article_id)
    {
        $Instance=new CArticleView();
        $cateInstance=new CCategory();
        
        return view('article')->with('article',$Instance->getArticle($article_id))
                ->with('categorys',$cateInstance->getRootCategory())
                ->with('resdir','../');
    }
}
