<?php

namespace App\Listeners;

use App\Events\Online;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOnlineNotification
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
     * @param  Online  $event
     * @return void
     */
    public function handle(Online $event)
    {
        //
    }
}
