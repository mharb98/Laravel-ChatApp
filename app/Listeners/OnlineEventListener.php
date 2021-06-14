<?php

namespace App\Listeners;

use App\Events\OnlineEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OnlineEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OnlineEvent  $event
     * @return void
     */
    public function handle(OnlineEvent $event)
    {
        //
    }
}
