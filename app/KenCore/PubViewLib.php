<?php
namespace App\KenCore\PubViewLib;

use Illuminate\Support\Facades\DB;

/*
 * 页面公共类
 * @author Kenives
 * */
class CPubView
{
    /*
     * 获取网站配置
     * */
    public static function getConfigs()
    {
        $config_tmp = DB::select('select * from webconfig');
        foreach ($config_tmp as $k=>$v)
        {
            $configs[$v->key]=$v->value;
        }
        return $configs;
    }
    /*
     * 获取网站导航栏
     * */
    public static function getNavis()
    {
        $navis_tmp = DB::select('select * from navigations where status=1 and pid=0 order by index_no asc');
        foreach ($navis_tmp as $k=>$v)
        {
            $children_tmp = DB::select('select * from navigations where status=1 and pid='.$v->navigation_id.' order by index_no asc');
            $children=array();
            if(count($children_tmp)>0)
            {
                foreach ($children_tmp as $kk=>$vv)
                {
                    $children[]=array('name'=>$vv->name,'url'=>$vv->url);
                }
            }
            $navis[]=array('name'=>$v->name,'e_name'=>$v->e_name,'url'=>$v->url,'children'=>$children);
        }
        return $navis;
    }
    /*
     * 获取底部关于
     * */
    public static function getFooterAbouts()
    {
        $footerAbouts_tmp = DB::select('select article_id,topic from articles where category_id=4 and status=1 limit 3');
        foreach ($footerAbouts_tmp as $k=>$v)
        {
            $footerAbouts[]=array('article_id'=>$v->article_id,'topic'=>$v->topic);
        }
        return $footerAbouts;
    }
    /*
     * 获取底部博客
     * */
    public static function getFooterArticles()
    {
        $footerArticles_tmp = DB::select('select article_id,topic,pub_time from articles where c_pid=3 and status=1 limit 2');
        foreach ($footerArticles_tmp as $k=>$v)
        {
            $footerArticles[]=array(
                    'article_id'=>$v->article_id,
                    'topic'=>$v->topic,
                    'pub_time'=>date("Y-m-d h:i:s", $v->pub_time)
            );
        }
        return $footerArticles;
    }
}
class CHomeView
{
    /*
     * 获取项目
     * */
    public function getProjects()
    {
        $projects_tmp = DB::select('select * from projects where status=1');
        foreach ($projects_tmp as $k=>$v)
        {
            $projects[]=array('name'=>$v->name,
                    'url'=>$v->url,
                    'picdir'=>$v->picdir,
                    'qrdir'=>$v->qrdir
            );
        }
        return $projects;
    }
    /*
     * 获取网站Banner
     * */
    public function getBanners()
    {
        $banners_tmp = DB::select('select * from banners where status=1 order by index_no asc');
        foreach ($banners_tmp as $k=>$v)
        {
            $banners[]=array('discription'=>$v->discription,
                    'topic'=>$v->topic,
                    'index_no'=>$v->index_no,
                    'content'=>$v->content,
                    'picdir'=>$v->picdir,
                    'url'=>$v->url
            );
        }
        return $banners;
    }
    /*
     * 获取滚动博客列表
     * */
    public function getSlideArticles()
    {
        $slideArticles_tmp = DB::select('select * from articles where c_pid=3 and status=1 limit 4');
        foreach ($slideArticles_tmp as $k=>$v)
        {
            $slideArticles[]=array(
                    'article_id'=>$v->article_id,
                    'topic'=>$v->topic,
                    'content'=>$v->content,
                    'type'=>$v->type,
                    'cover'=>$v->cover,
                    'author'=>$v->author,
                    'comment_count'=>$v->comment_count,
                    'pub_time'=>date("Y-m-d h:i:s", $v->pub_time)
            );
        }
        return $slideArticles;
    }
}

class CArticleView
{
    /*
     * 获取文章列表
     * */
    public function getArticles()
    {
        $articles_tmp = DB::select('select * from articles where status=1 and category_id=9 order by pub_time desc');
        foreach ($articles_tmp as $k=>$v)
        {
            $articles[]=array(
                    'article_id'=>$v->article_id,
                    'topic'=>$v->topic,
                    'content'=>$v->content,
                    'pub_time'=>date("Y-m-d h:i:s", $v->pub_time),
                    'category_id'=>$v->category_id,
                    'comment_count'=>$v->comment_count,
                    'type'=>$v->type,
                    'special'=>$v->special,
                    'cover'=>$v->cover,
                    'author'=>$v->author
            );
        }
        return $articles;
    }
    /*
     * 获取文章详情
     * */
    public function getArticle($article_id)
    {
        $article = DB::select('select * from articles where article_id='.$article_id);

        return $article[0];
    }
}

