<?php

namespace App\Providers;

use App\Events\CreateUsers;
use App\Events\PodcastProcessed;
use App\Listeners\CreateUsersNotification;
use App\Listeners\PodcastProcessedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // CreateUsers::class => [
        //     CreateUsersNotification::class,
        // ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(
            PodcastProcessed::class,
            PodcastProcessedListener::class,
        );

        // Event::listen(function (PodcastProcessed $event) {
           
            
        // });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
