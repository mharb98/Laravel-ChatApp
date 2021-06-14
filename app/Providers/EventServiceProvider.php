<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\GetMessage;
use App\Listeners\GetMessageNotification;
use function Illuminate\Events\queueable;

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

        GetMessage::class => [
            GetMessageNotification::class,
        ],

        LoggedIn::class => [
            LoggedInListener::class,
        ],

        OnlineEvent::class => [
            OnlineEventListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            GetMessage::class,
            [GetMessageNotification::class, 'handle']
        );
    
        Event::listen(queueable(function (GetMessage $event) {
            //
        }));

        Event::Listen(
            LoggedIn::class,
            [LoggedInListener::class, 'handle']
        );

        Event::Listen(queueable(function (LoggedIn $event){
            //
        }));

        Event::Listen(
            OnlineEvent::class,
            [OnlineEventListener::class, 'handle'],
        );

        Event::Listen(queueable(function (OnlineEvent $event){
            //
        }));
    }
}
