<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Product;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.header',function($view){
            $categories = Category::all();
            $product = Product::all();
            $cart = \Cart::instance('cart')->content();
            $wishlist = \Cart::instance('wishlist')->content();
            $view->with(['categories'=>$categories,'product'=>$product,'cart'=>$cart,'wishlist'=>$wishlist]);
        });

        view()->composer('carts.cart',function($view){
            $categories = Category::all();
            $product = Product::all();
            $cart = \Cart::instance('cart')->content();
            $wishlist = \Cart::instance('wishlist')->content();
            $view->with(['categories'=>$categories,'product'=>$product,'cart'=>$cart,'wishlist'=>$wishlist]);
        });

        view()->composer('pages.wishlist',function($view){
            $wishlist = \Cart::instance('wishlist')->content();
            $view->with('wishlist',$wishlist);
        });

        view()->composer('carts.checkout',function($view){
            $wishlist = \Cart::instance('wishlist')->content();
            $cart = \Cart::instance('cart')->content();
            $view->with(['wishlist'=>$wishlist,'cart'=>$cart]);
        });
    }
}
