<?php

namespace App\Providers;

use App\Models\Admin\Rider;
use App\Models\Merchant;
use App\Observers\MerchantObserver;
use App\Observers\RiderObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        Merchant::observe(MerchantObserver::class);
        Rider::observe(RiderObserver::class);
    }
}
