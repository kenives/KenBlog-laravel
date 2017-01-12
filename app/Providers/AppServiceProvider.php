<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\KenCore\PubViewLib\CPubView;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //添加页头页脚公共数据
        View::share('configs',CPubView::getConfigs());
        View::share('navis',CPubView::getNavis());
        View::share('footerabouts',CPubView::getFooterAbouts());
        View::share('footerarticles',CPubView::getFooterArticles());
        //View::share('banners',CPubView::getBanners());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
