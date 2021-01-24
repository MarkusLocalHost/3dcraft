<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Models\BlogTag;
use App\Models\ShopCategory;
use App\Models\ShopOrder;
use App\Models\ShopProduct;
use App\Models\ShopSection;
use App\Observers\CommentObserver;
use App\Observers\OrderObserver;
use App\Observers\PostObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BlogPost::observe(PostObserver::class);
        BlogComment::observe(CommentObserver::class);
        ShopOrder::observe(OrderObserver::class);

        view()->composer('layouts.include.blog_sidebar', function ($view) {
            $popular_posts = BlogPost::orderBy('views', 'desc')->where('is_published', '=', 1)->limit(4)->get();
            $categories = BlogCategory::all();
            $tags = BlogTag::all();

            $view->with('popular_posts', $popular_posts);
            $view->with('categories', $categories);
            $view->with('tags', $tags);
        });

        view()->composer('layouts.include.header', function ($view) {
            $sections = ShopSection::orderBy('order', 'asc')->limit(3)->get();
            $categories = ShopCategory::all();
            $categories_blog = BlogCategory::all();

            $view->with('sections', $sections);
            $view->with('categories', $categories);
            $view->with('categories_blog', $categories_blog);
        });

        view()->composer('layouts.include.mobile_menu_active', function ($view) {
            $sections = ShopSection::orderBy('order', 'asc')->limit(3)->get();
            $categories = ShopCategory::all();
            $categories_blog = BlogCategory::all();

            $view->with('sections', $sections);
            $view->with('categories', $categories);
            $view->with('categories_blog', $categories_blog);
        });

        view()->composer('layouts.include.footer', function ($view) {
            $sections = ShopSection::orderBy('order', 'asc')->limit(3)->get();

            $view->with('sections', $sections);
        });

        view()->composer('layouts.include.sidebar_cart_active', function ($view) {
            $cartData = session()->get('cart');
            if ($cartData) {
                $product_ids = array_keys($cartData);
                $products_sidebar = ShopProduct::where('status', '=', 1)->whereIn('id', $product_ids)->with('sale')->get();
            } else {
                $products_sidebar = null;
            }

            $view->with('products_sidebar', $products_sidebar);
            $view->with('cartData', $cartData);
        });
    }
}
