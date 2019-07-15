<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Category;
use App\Product;
use App\User;
use App\Order;
use App\Observers\CategoryObserver;
use App\Observers\UserObserver;
use App\Observers\ProductObserver;
use App\Observers\OrderObserver;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
        User::observe(UserObserver::class);
        Order::observe(OrderObserver::class);

    }
}
