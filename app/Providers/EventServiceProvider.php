<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string|\Closure>>
     */
    protected $listen = [
        Registered::class => [
            function ($event) {
                    Mail::to($event->user->email)->send(new WelcomeMail($event->user));
                },
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }
}
