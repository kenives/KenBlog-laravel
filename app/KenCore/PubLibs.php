<?php
namespace App\KenCore\PubLib;

use Illuminate\Support\Facades\DB;

class CCategory
{
    public function getRootCategory()
    {
        $categorys_tmp = DB::select('select * from category where status=1 and pid=0');
        
        foreach ($categorys_tmp as $k=>$v)
        {
            $categorys[]=array(
                    'category_id'=>$v->category_id,
                    'name'=>$v->name,
                    'url'=>$v->url
            );
        }
        
        return $categorys;
    }
}

class CAbout
{
    public function getAbouts()
    {
        $abouts_tmp = DB::select('select * from articles where status=1 and category_id=4');

        foreach ($abouts_tmp as $k=>$v)
        {
            $abouts[$v->type]=array(
                    'topic'=>$v->topic,
                    'content'=>$v->content
            );
        }

        return $abouts;
    }
}