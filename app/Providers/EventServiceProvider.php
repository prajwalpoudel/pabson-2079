<?php

namespace App\Providers;

use App\Entities\School;
use App\Entities\User;
use App\Events\AccountVerified;
use App\Listeners\SendAccountVerifiedEmailNotification;
use App\Observers\SchoolObserver;
use App\Observers\UserObserver;
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
        AccountVerified::Class => [
            SendAccountVerifiedEmailNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        User::observe(UserObserver::class);
        School::observe(SchoolObserver::class);

    }
}
